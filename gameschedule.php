<!-- includes -->
<?php include("includes/init.php");

// nav bar
$pageGameSchedule = "border"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="styles/main.css" rel="stylesheet" type="text/css" media="all" />
    <title>Game Schedule</title>
</head>

<body>
    <?php include("includes/header.php"); ?>

    <main class="content">

        <h2>Game Schedule</h2>
        <p>Below we have listed the upcoming volleyball games of the next season. We would love your support! Look out for fun themes and promotions. </p>
        <ul class="commits">
            <li> 9/28, vs Columbia, at Home, 7PM</li>
            <li> 10/4, vs UPenn, away, 7PM</li>
            <li> 10/5, vs Princeson, away, 5PM</li>
            <li> 10/11, vs Darmouth, at Home, 7PM</li>
            <li> 10/12, vs Harvard, at Home, 5PM</li>
            <li> 10/18, vs Brown, away, 7PM</li>
            <li> 10/19, vs Yale, away, 5PM</li>
            <li> 10/26, vs Columbia, away, 7PM</li>
            <li> 11/1, vs Princeton, at Home, 7PM</li>
            <li> 11/2, vs UPenn, at Home, 5PM</li>
            <li> 11/8, vs Yale, at Home, 7PM</li>
            <li> 11/9, vs Brown, at Home, 5PM</li>
            <li> 11/15, vs Harvard, away, 7PM</li>
            <li> 11/16, vs Dartmouth, away, 5PM</li>
        </ul>

        <!-- 3 events in 3 even compartments -->
        <h2> Team Events</h2>
        <div class="threeThings">
            <h3>Banquet</h3>
            <p> We welcome current team members, their families, and past alumni to join us in our end of the season celebration. There will be dinner provided, a recap of last season's accomplishments, and the debut of last season's highlight reel. Additionally, the individual awards will be awarded to the chosen players for this past season. Please RSVP with Trudy VandeBerg.</p>
        </div>

        <div class="threeThings">
            <h3>Alumni Match</h3>
            <p>We would love Cornell Alumni to come support us in our alumni dedicated match on March 31st, 2020. Come reconnect with old friends and teammates! After the match, there will be a celebration with the team that we would love all Alumni to join us for! There is also a team/alumni scrimmage that is always heaps of fun.</p>
        </div>

        <div class="threeThings">
            <h3>Extravaganza</h3>
            <p>Come join all varsity teams on August 25th for the varsity student athlete extravaganza. There will be a recap of last year's highlights across all of Cornell's varsity sports, as well as a gift for all who attend. While this is not a volleyball-specific event, it highlights the glories that come with being a past or present varsity athlete at Cornell.</p>
        </div>

    </main>

    <?php include("includes/footer.php"); ?>

</body>

</html>
