<!-- includes -->
<?php include("includes/init.php");

//Nav bar
$pageRecruiting = "border";

//Defaults
$validForm = FALSE;
$show = TRUE;
$showFNameFeedback = FALSE;
$showLNameFeedback = FALSE;
$showSchoolFeedback = FALSE;
$showHeightFeetFeedback = FALSE;
$showHeightInchesFeedback = FALSE;

$playerFName = '';
$playerLName = '';
$emailName = '';
$clubName = '';
$schoolName = '';
$videoName = '';
$yearName = '';
$heightFeetName = 0;
$heightInchesName = 0;

//assign yearName variable
if (isset($_POST['yearName'])) {
    $yearName = $_POST['yearName'];
}

//If the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Assign variables and validate
    $playerFName = trim($_POST['playerFName']);
    $playerFName = filter_var($playerFName, FILTER_SANITIZE_STRING);
    $playerLName = trim($_POST['playerLName']);
    $playerLName = filter_var($playerLName, FILTER_SANITIZE_STRING);
    $emailName = trim($_POST['emailName']);
    $emailName = filter_var($emailName, FILTER_VALIDATE_EMAIL);
    $schoolName = trim($_POST['schoolName']);
    $schoolName = filter_var($schoolName, FILTER_SANITIZE_STRING);
    $yearName = trim($_POST['yearName']);
    $clubName = trim($_POST['clubName']);
    $clubName = filter_var($clubName, FILTER_SANITIZE_STRING);
    $videoName = trim($_POST['videoName']);
    $videoName = filter_var($videoName, FILTER_VALIDATE_URL);
    $heightInchesName = filter_input(INPUT_POST, 'heightInchesName', FILTER_VALIDATE_INT);
    $heightFeetName = filter_input(INPUT_POST, 'heightFeetName', FILTER_VALIDATE_INT);

    //assume the questionaire is valid
    $show = FALSE;

    //Require first name, last name, school name
    if (empty($playerFName)) {
        $validForm = FALSE;
        $showFNameFeedback = TRUE;
        $show = TRUE;
    }
    if (empty($playerLName)) {
        $validForm = FALSE;
        $showLNameFeedback = TRUE;
        $show = TRUE;
    }
    if (empty($schoolName)) {
        $validForm = FALSE;
        $showSchoolFeedback = TRUE;
        $show = TRUE;
    }
    if ($heightFeetName < 0) {
        $validForm = FALSE;
        $showHeightFeetFeedback = TRUE;
        $show = TRUE;
    }
    if ($heightInchesName < 0 || $heightInchesName > 12) {
        $validForm = FALSE;
        $showHeightInchesFeedback = TRUE;
        $show = TRUE;
    }
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="styles/main.css" rel="stylesheet" type="text/css" media="all" />
    <title>Recruiting</title>
</head>

<body>
    <?php include("includes/header.php"); ?>

    <main class="content">
        <h2>Recruiting</h2>
        <!-- committed classes -->
        <h3>2020 Commits</h3>
        <p>We have finished recruiting for the class of 2020. The current '22 players are listed below.</p>
        <ul class="commits">
            <li> Jennifer Lawrence, MB</li>
            <li> Samantha White, L/DS</li>
            <li>Emma Will, MB</li>
            <li> Kate Bathe, OH</li>
        </ul>

        <h3>2021 Commits</h3>
        <p>We have currently committed the 2 players listed below, and are seeking a Setter and Middle Blocker. However, if you are in the class of '21 and do not play either of those positions, there still may potentially be an opening for you. Please reach out.</p>
        <ul class="commits">
            <li>Madi Burrows, OH</li>
            <li> Riley Short, L/DS</li>
        </ul>

        <h3>2022 Commits</h3>
        <p>We have not recruited any players of the class of 2022. We are especially looking for 2 Outside Hitters, a Liber-DS, and a Setter. Once again, if you are in the class of '22 and do not play any of those positions, there still may be a spot for you on the team. Please reach out.</p>

        <h3>Recruiting Schedule</h3>
            <p>Below we have listed the club volleyball tournaments we plan on attending in 2020. If you choose to reach out to the coaches, please let us know which tournaments your club teams will be attending. </p>
            <ul id="tournaments">
                <li> January Jam ~ 1/4-5 ~ Charleston, SC</li>
                <li> Kickoff Classic ~ 1/4-5 ~ Charleston, CS</li>
                <li> The Monument City Classic ~ 1/18-20 ~ Richmond, VA</li>
                <li> Jewel of the Mountains ~ 2/15-16 ~ Kingsport, TN</li>
                <li> Disney Showcase Qualifier ~ 5/16-18 ~ Orlando, FL</li>
                <li> East Coast Championshps ~ 5/26-28 ~ Pittsburg, PA</li>
                <li> NorthEast Qualifier (NEQ) ~ 5/31-6/2 ~ Philidelphia, PA</li>
                <li> 2019 USAV Junior Nationals ~ tbd ~ Detroit, MI</li>
            </ul>


            <?php
            //if the form has not been submitted or is not valid, show the form
            if ($show) { ?>
                <h3 id="questionaireTitle">Recruiting Questionaire</h3>
                <form id="questionaire" method="post" action="./recruiting.php" novalidate>

                    <!-- first name required -->
                    <?php if ($showFNameFeedback == TRUE) { ?>
                        <p class="feedback"> First name required to submit recruiting questionaire.</p>
                    <?php } ?>

                    <div class="personal">
                        <label for="fNameField">First Name:</label>
                        <input id="fNameField" type="text" name="playerFName" value="<?php echo htmlspecialchars($playerFName); ?>" />
                    </div>

                    <!-- last name required -->
                    <?php if ($showLNameFeedback == TRUE) { ?>
                        <p class="feedback"> Last name required to submit recruiting questionaire.</p>
                    <?php } ?>

                    <div class="personal">
                        <label for="lastNameField">Last Name:</label>
                        <input id="lastNameField" type="text" name="playerLName" value="<?php echo htmlspecialchars($playerLName); ?>" />
                    </div>

                    <div class="personal">
                        <label for="emailField">Email Address:</label>
                        <input id="emailField" type="email" name="emailName" value="<?php echo htmlspecialchars($emailName); ?>" />
                    </div>

                    <div class="personal">
                        <label for="clubField">Club Name:</label>
                        <input type="text" id="clubField" name="clubName" value="<?php echo htmlspecialchars($clubName); ?>" />
                    </div>

                    <!-- high school name required -->
                    <?php if ($showSchoolFeedback == TRUE) { ?>
                        <p class="feedback"> High School name required to submit recruiting questionaire.</p>
                    <?php } ?>

                    <div class="personal">
                        <label for="schoolField">High School Name:</label>
                        <input type="text" id="schoolField" name="schoolName" value="<?php echo htmlspecialchars($schoolName); ?>" />
                    </div>

                    <div class="personal">
                        <label for="videoField">Highlight Footage URL:</label>
                        <input type="text" id="videoField" name="videoName" value="<?php echo htmlspecialchars($videoName); ?>" />
                    </div>

                    <!-- valid height measurements -->
                    <?php if ($showHeightFeetFeedback == TRUE) { ?>
                        <p class="feedback"> Height measurement must be positive.</p>
                    <?php } ?>

                    <div class="personal">
                        <label for="heightFeetField">Height(feet):</label>
                        <!-- account for input less than 0 feet -->
                        <input type="number" min="0" id="heightFeetField" name="heightFeetName" value="<?php echo htmlspecialchars($heightFeetName); ?>" />
                    </div>

                    <!-- valid height measurements -->
                    <?php if ($showHeightInchesFeedback == TRUE) { ?>
                        <p class="feedback"> Height measurement in inches must be between 0 and 12 inches.</p>
                    <?php } ?>

                    <div class="personal">
                        <label for="heightInchesField">Height(inches):</label>
                        <!-- account for input less than 0 or greater than 12 inches -->
                        <input type="number" min="0" max="12" id="heightInchesField" name="heightInchesName" value="<?php echo htmlspecialchars($heightInchesName); ?>" />
                    </div>

                    <div class="personal">
                        <label for="yearField">Year of Graduation:</label>
                        <select name="yearName" id="yearField">
                            <option <?php if ($yearName == "Please Select") echo 'selected="selected"'; ?> value='Please Select'>Please Select</option>
                            <option <?php if ($yearName == "2020") echo 'selected="selected"'; ?> value="2020">2020</option>
                            <option <?php if ($yearName == "2021") echo 'selected="selected"'; ?> value="2021">2021</option>
                            <option <?php if ($yearName == "2022") echo 'selected="selected"'; ?> value="2022">2022</option>
                            <option <?php if ($yearName == "2023") echo 'selected="selected"'; ?> value="2023">2023</option>
                        </select>
                    </div>

                    <div>
                        <input type="submit" value="Submit" class="button" />
                    </div>

                </form>
                `
            <?php } else { ?>
                <!-- Confirmation message -->
                <div id="overview">
                    <h3> <?php echo htmlspecialchars($playerFName) . " " . htmlspecialchars($playerLName) ?>'s Recruiting Questionaire has been submitted</h3>
                    <ul id="overviewList">
                        <li>Name: <?php echo htmlspecialchars($playerFName) . " " . htmlspecialchars($playerLName) ?></li>
                        <li>Email Address: <?php echo htmlspecialchars($emailName) ?> </li>
                        <li>Club: <?php echo htmlspecialchars($clubName) ?> </li>
                        <li>High School: <?php echo htmlspecialchars($schoolName) ?> </li>
                        <li>Highlight Footage URL: <?php echo htmlspecialchars($videoName) ?></li>
                        <li>Height: <?php echo htmlspecialchars($heightFeetName) ?> feet <?php echo htmlspecialchars($heightInchesName) ?> inches </li>
                        <li>Graduation year: <?php echo htmlspecialchars($yearName) ?> </li>
                    </ul>
                </div>

                <!-- new player form -->
                <p><a href="recruiting.php" class="button">New player</a></p>

            <?php } ?>

    </main>

    <?php include("includes/footer.php"); ?>

</body>

</html>
