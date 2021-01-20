<!-- includes -->
<?php include("includes/init.php");

$pageGallery = "border";

//filter input
// $image_id = trim($_GET['id']);
// $image_id=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
// $image_file_ext= trim($_GET["file_ext"]);
// $image_file_ext=filter_input(INPUT_GET, 'file_ext', FILTER_SANITIZE_STRING);

$image_id=htmlspecialchars($_GET["id"]);
$image_file_ext=htmlspecialchars($_GET["file_ext"]);

//user wants to delete imgae
if (isset($_POST['delete_post'])) {

    //delete record in images table
    $sql = "DELETE FROM images WHERE id= :image_id";
    $params = array(
        ':image_id' => $image_id
    );
    $entry = exec_sql_query($db, $sql, $params)->fetchAll();

    unlink("uploads/images/" . $image_id . "." . $image_file_ext);

    //delete record in image_tags
    $sql = "DELETE FROM image_tags WHERE image_id=:image_id";
    $params = array(
        ':image_id' => $image_id
    );
    $entry2 = exec_sql_query($db, $sql, $params);

    //take back to gallery page
    header("Location:gallery.php");
}
//user wants to add a tag
if (isset($_POST['send_new_tag'])) {

    //get user input for new tag
    $new_tag = trim($_POST['input_of_tag']);
    $new_tag = filter_input(INPUT_POST, "input_of_tag", FILTER_SANITIZE_STRING);
    //convert all capitals to lower case
    $new_tag = strtolower($new_tag);
    //make sure user doesn't include '#'
    $new_tag= str_replace("#", "", $new_tag);
    //if user has spaces, condense into one to withhold hashtag style
    $new_tag= str_replace(" ", "", $new_tag);

    if (!$new_tag == '') {
        //check if already has the tag first
        $sql = "SELECT images.id FROM images INNER JOIN image_tags ON image_tags.image_id=images.id INNER JOIN tags ON tags.id=image_tags.tag_id WHERE tags.tag_name=:new_tag AND images.id=:image_id";
        $params = array(
            ':new_tag' => $new_tag,
            ':image_id' => $image_id
        );
        $existing = exec_sql_query($db, $sql, $params)->fetchAll(PDO::FETCH_COLUMN);
        if ($existing == NULL) {
            //if the photo doesnt already have the tag, add it
            $sql = "SELECT id FROM tags WHERE tag_name=:new_tag";
            $params = array(
                ':new_tag' => $new_tag
            );
            $tag_id = exec_sql_query($db, $sql, $params)->fetchAll(PDO::FETCH_COLUMN);
            $tag_id = $tag_id[0];

            if (!$tag_id == NULL) {
                //if that name already exists, just add the connection to the image_tags table
                $sql = "INSERT INTO image_tags (image_id, tag_id) VALUES (:image_id, :tag_id)";
                $params = array(
                    ':image_id' => $image_id,
                    ':tag_id' => $tag_id
                );
                $result = exec_sql_query($db, $sql, $params);
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

                $sql = "INSERT INTO image_tags (image_id, tag_id) VALUES (:image_id, :tag_id)";
                $params = array(
                    ':image_id' => $image_id,
                    ':tag_id' => $tag_id
                );
                $result = exec_sql_query($db, $sql, $params);
            }
        }
    }
}
if (isset($_POST['delete_tag'])) {
    //filter input
    $old_tag = trim($_POST['delete_tag_list']);
    $old_tag = filter_input(INPUT_POST, "delete_tag_list", FILTER_SANITIZE_STRING);

    $sql = 'SELECT id FROM tags WHERE tag_name=:old_tag';
    $params = array(
        ':old_tag' => $old_tag
    );
    $entry = exec_sql_query($db, $sql, $params)->fetchAll(PDO::FETCH_COLUMN);
    $tag_id = $entry[0];

    $sql = "DELETE FROM image_tags WHERE image_id=:image_id AND tag_id=:tag_id";
    $params = array(
        ':image_id' => $image_id,
        ':tag_id' => $tag_id
    );
    $entry = exec_sql_query($db, $sql, $params);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="styles/main.css" rel="stylesheet" type="text/css" media="all" />
    <title>Post</title>
</head>

<body>
    <?php include("includes/header.php");


    ?>

    <main class="content">

        <a href="gallery.php" id="back_to_gallery">Back to Gallery</a>

        <h2 id="selected_post">Selected Post</h2>

        <!-- dropdown with option to delete post -->
        <form method="post" id="edit_post" name="edit_post" novalidate>
            <div class="dropdown">
                <button name="post_options" id="post_options">...</button>
                <div class="dropdown_c">
                    <button type="submit" name="delete_post" id="delete_post" value="delete_post">Delete</button>
                </div>
            </div>
        </form>



        <?php
        // get image information
        $sql = "SELECT * FROM images WHERE id = :image_id";
        $params = array(
            ':image_id' => $image_id
        );
        $entries = exec_sql_query($db, $sql, $params)->fetchAll();


        foreach ($entries as $entry) { ?>
            <div class="one_post">
                <?php
                echo "<img class='single_photo' alt='SelectedPost' src=\"uploads/images/" . htmlspecialchars($entry["id"]) . "." . htmlspecialchars($entry["file_ext"]) . "\">";
                ?>
                <div class="post_details">
                    <div class="align_contents">
                        <?php
                        //put source directly under the image
                        $sql = "SELECT source FROM images WHERE id=:image_id";
                        $params = array(
                            ':image_id' => $image_id
                        );
                        $results = exec_sql_query($db, $sql, $params)->FetchAll(PDO::FETCH_COLUMN);

                        if (!$results[0] == NULL) { ?>
                            <cite><a class='post_source' href="<?php echo htmlspecialchars($results[0]) ?> ">Source: Cornell Athletics></a></cite>
                            <?php
                       }


                        //caption
                        echo "<p class='single_caption_head'> Caption: </p>";

                        echo "<p class='single_caption'>" . htmlspecialchars($entry["description"]) . '</p>';
                        ?> </div>
                    <div><?php
                            //image name
                            echo "<p class='single_caption_head'> Image Name: </p>";
                            echo '<p class="single_caption">' . htmlspecialchars($entry["image_name"]) . '</p>';
         }
                            ?> </div>
                    <div>
                        <p class="single_caption_head">Hashtags: </p>
                        <p class="single_caption">
                            <?php
                            //photo tags
                            $sql = "SELECT tag_name FROM tags INNER JOIN image_tags ON image_tags.tag_id=tags.id WHERE image_tags.image_id=:image_id";
                            $params = array(
                                ':image_id' => $image_id
                            );
                            $entries = exec_sql_query($db, $sql, $params)->fetchAll();


                            foreach ($entries as $entry) {

                                echo htmlspecialchars($entry["tag_name"]) . ", ";
                            }
                            ?>

                            <div class="change_tags">
                                <!-- Form to change the image's current tags -->
                                <form method="post" id="edit_tags" name="edit_tags" action="<?php echo "posts.php?id=" . $image_id ?>" novalidate>
                                    <input type="text" maxlength="30" name="input_of_tag" id="input_of_tag" placeholder="New Tag">
                                    <button type="submit" class="tag_buttons" name="send_new_tag" id="send_new_tag">Add Tag</button>

                                    <select id="delete_tag_list" name="delete_tag_list">
                                        <?php
                                        $sql = "SELECT tag_name FROM tags INNER JOIN image_tags ON image_tags.tag_id=tags.id WHERE image_tags.image_id=:image_id";
                                        $params = array(
                                            ':image_id' => $image_id
                                        );
                                        $results = exec_sql_query($db, $sql, $params)->fetchAll(PDO::FETCH_COLUMN);

                                        foreach ($results as $result) {
                                            echo "<option value=" . htmlspecialchars($result) . ">" . htmlspecialchars($result) . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" class="tag_buttons" name="delete_tag" id="delete_tag">Delete Tag</button>
                                </form>
                            </div>






                    </div>
                </div>
            </div>


    </main>

    <?php include("includes/footer.php"); ?>

</body>

</html>
