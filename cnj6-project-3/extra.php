?>




<!-- includes -->
<?php include("includes/init.php");

//nav bar
$pageGallery = "border";

//set defaults
$valid_form = TRUE;
$size_feedback = FALSE;
$caption_feedback = FALSE;

const MAX_FILE_SIZE = 1000000;

 //function to add any popular tags that were checked to image_tags
function add_popular_tag($input_name, $image_id, $tag_id, $db, $added)
{
    $tag = trim($_POST[$input_name]);
    $tag = filter_input(INPUT_POST, $input_name, FILTER_SANITIZE_STRING);
    if (!$tag == "") {
        $sql = "INSERT INTO image_tags (image_id, tag_id) VALUES (:image_id, :tag_id)";
        $params = array(
            ':image_id' => $image_id,
            ':tag_id' => $tag_id
        );
        $added_tag = exec_sql_query($db, $sql, $params);
        $added=TRUE;
    }else{
        $added=FALSE;
    }
}

//If the user tries to upload a file
if (isset($_POST["send_post"])) {
    //filter input

    $image_file = $_FILES['upload_image_file'];
    $image_caption = trim($_POST['caption']);
    $image_caption = filter_input(INPUT_POST, "caption", FILTER_SANITIZE_STRING);

    //make captions mandatory
    if ($image_caption == "") {
        $valid_form = FALSE;
        $caption_feedback = TRUE;
    }

    //Get image id, name, and file extension
    if ($valid_form) {
        if ($image_file['error'] == UPLOAD_ERR_OK) {
            if ($image_file['size'] < MAX_FILE_SIZE) {
                $image_file_name = basename($image_file["name"]);

                $image_file_ext = strtolower(pathinfo($image_file_name, PATHINFO_EXTENSION));

                $test = strpos($image_file_name, $image_file_ext);
                if (!$test = FALSE) {
                    $image_file_name = str_replace("." . $image_file_ext, '', $image_file_name);
                }
            } else {
                $valid_form = FALSE;
                $size_feedback = TRUE;
            }
        } else {
            $valid_form = FALSE;
        }
    }


    //enter record into database
    if ($valid_form) {
        //insert info into images table
        $sql = "INSERT INTO images (description, file_ext, image_name) VALUES (:image_caption, :image_file_ext, :image_file_name)";
        $params = array(
            ':image_caption' => $image_caption,
            ':image_file_ext' => $image_file_ext,
            ':image_file_name' => $image_file_name
        );

        $result = exec_sql_query($db, $sql, $params);

        //insert image into database
        if ($result) {
            $image_file_id = $db->lastInsertId("id");
            $new_path = "uploads/images/$image_file_id.$image_file_ext";
            move_uploaded_file($_FILES["upload_image_file"]["tmp_name"], $new_path);
        }

        //find the popular tags clicked, store them in the image_tags table using function add_popular_tag
        $team=add_popular_tag('team_tag', $image_file_id, '1', $db, $team);
        $games=add_popular_tag('games_tag', $image_file_id, '2', $db, $games);
        $ivies=add_popular_tag('ivies_tag', $image_file_id, '3', $db, $ivies);
        $equiptment=add_popular_tag('equiptment_tag', $image_file_id, '4', $db, $equiptment);
        $coaches=add_popular_tag('coaches_tag', $image_file_id, '5', $db, $coaches);
        $fun=add_popular_tag('fun_tag', $image_file_id, '6', $db, $fun);
        $alumni=add_popular_tag('alumni_tag', $image_file_id, '7', $db, $alumni);
        $travel=add_popular_tag('travel_tag', $image_file_id, '8', $db, $travel);
        $outreach=add_popular_tag('outreach_tag', $image_file_id, '9', $db, $outreach);

        //find new hashtags, add them to tags and image_tags table

        $new_tag = trim($_POST['add_hashtag']);
        $new_tag = filter_input(INPUT_POST, "add_hashtag", FILTER_SANITIZE_STRING);
        //convert all capitals to lower case
        $new_tag = strtolower($new_tag);
        //make sure user doesn't include '#'
        str_replace("#", "", $new_tag);
        //if user has spaces, condense into one to withhold hashtag style
        str_replace(" ", "", $new_tag);

        //make sure the tag isnt empty
        if (!$new_tag == '') {
            //see if the tag already exists in the database
            $sql = "SELECT id FROM tags WHERE tag_name=:new_tag";
            $params = array(
                ':new_tag' => $new_tag
            );
            $tag_id = exec_sql_query($db, $sql, $params)->fetchAll(PDO::FETCH_COLUMN);
            $tag_id = $tag_id[0];




            if (!$tag_id == NULL) {
                //that tag exists already in tags table
                //check to see if tagged in the checklist boxes already
                $exists=TRUE;
                if(($new_tag=='team') && $team){
                    $exists=FALSE;
                }elseif(($new_tag=='games') && $games){
                    $exists=FALSE;
                }elseif(($new_tag=='ivies') && $ivies){
                    $exists=FALSE;
                }elseif(($new_tag=='equiptment')&& $equiptment){
                    $exists=FALSE;
                }elseif(($new_tag=='coaches') && $coaches){
                    $exists=FALSE;
                }elseif(($new_tag=='fun')&& $fun){
                    $exists=FALSE;
                }elseif(($new_tag=='alumni') && $alumni){
                    $exists=FALSE;
                }elseif(($new_tag=='travel')&& $travel){
                    $exists=FALSE;
                }elseif(($new_tag=='outreach') && $outreach){
                    $exists=FALSE;
                }

                //if wasn't checked already, add the connection in the image_tags table
                if ($exists) {
                    $sql = "INSERT INTO image_tags (image_id, tag_id) VALUES (:image_file_id, :tag_id)";
                    $params = array(
                        ':image_file_id' => $image_file_id,
                        ':tag_id' => $tag_id
                    );
                    $result = exec_sql_query($db, $sql, $params);
                }
            } else {
                //if no tag is found with that name
                //insert new tag into tags table

                $sql = "INSERT INTO tags (tag_name) VALUES (:new_tag)";

                $params = array(
                    ':new_tag' => $new_tag
                );

                $result = exec_sql_query($db, $sql, $params);
                $tag_id = $db->lastInsertId('id');


                //insert new tag into image_tags table

                $sql = "INSERT INTO image_tags (image_id, tag_id) VALUES (:image_file_id, :tag_id)";
                $params = array(
                    ':image_file_id' => $image_file_id,
                    ':tag_id' => $tag_id
                );
                $result = exec_sql_query($db, $sql, $params);
            }
        }
    }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="styles/main.css" rel="stylesheet" type="text/css" media="all" />
    <title>Gallery Page</title>
</head>


<body id="gallery_body">

    <?php include("includes/header.php"); ?>

    <main class="content">

        <h2 id="welcome">What CUVB is Doing!</h2>

        <!-- file upload form -->
        <div class="upload_form">

            <input type="image" class="upload_arrow" alt="NewPost" src="images/upload_arrow.png" onclick="displaying_content()">

            <form id="upload_image" name="upload_image" action="gallery.php" enctype="multipart/form-data" method="post" novalidate>


                <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>" />



                <?php
                //if image too large, display feedback message
                if ($size_feedback == TRUE) { ?>
                    <p class="feedback_2"> Image storage size too large. </p>
                <?php
                }
                //if the image didn't upload, display feedback message
                if ($valid_form == FALSE && $size_feedback == FALSE && $caption_feedback == FALSE) { ?>
                    <p class="feedback_2">Image upload failed</p>
                <?php }

                //if the user did not put a caption
                if ($caption_feedback) {
                    echo "<p class='feedback_2'> Post failed. Make sure to include a caption.</p>";
                }
                ?>
                <div id="display_form_contents">

                    <div class="upload_image_btn">
                        <button class="image_btn">Upload an Image</button>
                        <input type="file" accept="image/*" id="upload_image_file" name="upload_image_file" />
                    </div>



                    <div>
                        <textarea id="caption" name="caption" cols="40" rows="3" maxlength="105" placeholder="Add a caption..."></textarea>
                    </div>

                    <!-- List of popular hashtags to choose from -->
                    <div class="tag_section">
                        <h3>Popular hashtags:</h3>

                        <div class="tag_spacing">
                            <div class="tags_input">

                                <input type="checkbox" id='team_tag' name='team_tag' value='team'>

                                <label class="tag_name_input" for='team_tag'>Team</label>
                            </div>
                            <div class="tags_input">

                                <input type="checkbox" id='games_tag' name='games_tag' value='games'>

                                <label class="tag_name_input" for='games_tag'>Games</label>
                            </div>
                            <div class="tags_input">

                                <input type="checkbox" id='ivies_tag' name='ivies_tag' value='ivies'>

                                <label class="tag_name_input" for='ivies_tag'>Ivies</label>
                            </div>
                            <div class="tags_input">

                                <input type="checkbox" id='equiptment_tag' name='equiptment_tag' value='equiptment'>

                                <label class="tag_name_input" for='equiptment_tag'>Equiptment</label>
                            </div>
                            <div class="tags_input">

                                <input type="checkbox" id='coaches_tag' name='coaches_tag' value='coaches'>

                                <label class="tag_name_input" for='coaches_tag'>Coaches</label>
                            </div>
                            <div class="tags_input">

                                <input type="checkbox" id='fun_tag' name='fun_tag' value='fun'>

                                <label class="tag_name_input" for='fun_tag'>Fun</label>
                            </div>
                            <div class="tags_input">

                                <input type="checkbox" id='alumni_tag' name='alumni_tag' value='alumni'>

                                <label class="tag_name_input" for='alumni_tag'>Alumni</label>
                            </div>
                            <div class="tags_input">

                                <input type="checkbox" id='travel_tag' name='travel_tag' value='travel'>

                                <label class="tag_name_input" for='travel_tag'>Travel</label>
                            </div>
                            <div class="tags_input">

                                <input type="checkbox" id='outreach_tag' name='outreach_tag' value='outreach'>

                                <label class="tag_name_input" for='outreach_tag'>Outreach</label>
                            </div>
                        </div>

                    </div>


                    <!-- <div class="form_input">
                        <input type="text" id="add_hashtag" name="add_hashtag">
                        <label id="add_original_tag" for="add_hashtag" class="popular_hashtags">Add an Original Hashtag: </label>
                    </div> -->




                    <span></span>
                    <button type="submit" name="send_post" id="send_post">Post</button>

                </div>

            </form>
        </div>
        <div class="search_form">
            <form action="gallery.php" name="hashtag_search_form" method="get" novalidate>
                <label id="input_search" for="search_hashtag">Filter by Hashtag:</label>
                <select id="search_hashtag" name="search_hashtag">
                    <option value="all">All Tags</option>
                    <?php
                    $results = exec_sql_query($db, "SELECT tag_name FROM tags")->fetchAll(PDO::FETCH_COLUMN);
                    foreach ($results as $result) {
                        echo '<option value=' . htmlspecialchars($result) . ">" . htmlspecialchars($result) . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" name="hashtag_search" value="Search" class="button_new" id="hashtag_search" />
            </form>
        </div>
        <ul id="photos_position">

            <?php

            if (isset($_GET['hashtag_search'])) {
                //if someone wants to filter by hashtag

                //filter input
                $search_hashtag = trim($_GET['search_hashtag']);
                $search_hashtag = filter_input(INPUT_GET, 'search_hashtag', FILTER_SANITIZE_STRING);

                if ($search_hashtag == "all") {
                    $entries = exec_sql_query($db, "SELECT * FROM images")->fetchALL(PDO::FETCH_ASSOC);
                } else {

                    //query
                    $sql = "SELECT images.id, images.file_ext, images.description, images.image_name, images.source FROM images INNER JOIN image_tags ON image_tags.image_id=images.id INNER JOIN tags ON image_tags.tag_id=tags.id WHERE tags.tag_name=:search_hashtag";
                    $params = array(
                        ':search_hashtag' => $search_hashtag
                    );
                    $entries = exec_sql_query($db, $sql, $params)->fetchAll(PDO::FETCH_ASSOC);
                }
            } else {
                //wants to view all entries
                $entries = exec_sql_query($db, "SELECT * FROM images")->fetchALL(PDO::FETCH_ASSOC);
            }

            ?><?php
                foreach ($entries as $entry) {  ?>

            <?php
                    echo "<li class=\"listing_photos\"><a href=\"posts.php?" . http_build_query($entry) . "\"><img alt='Post' class=\"gallery_photos\" src=\"./uploads/images/" . htmlspecialchars($entry["id"]) . "." . htmlspecialchars($entry["file_ext"]) . "\"> </a>";

            ?>



            <div class="gallery_captions"><?php echo htmlspecialchars($entry["description"]);
                                            if (!$entry["source"] == NULL) {
                                                echo "<cite><a href=" . htmlspecialchars($entry["source"]) . ">   /   Source: Cornell Athletics></a></cite>";
                                            }
                                            ?>

            </div>
            </li>

        <?php
                } ?>

        </ul>



    </main>

    <?php include("includes/footer.php"); ?>
    <script>
        function displaying_content() {
            var cont = document.getElementById("display_form_contents");
            var photos = document.getElementById("photos_position");
            if (cont.style.display == "none") {
                cont.style.display = "block";
            } else {
                cont.style.display = "none";
            }

        }
    </script>

</body>

</html>
