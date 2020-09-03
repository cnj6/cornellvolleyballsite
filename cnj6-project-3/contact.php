<!-- includes -->
<?php include("includes/init.php");
include("inclues/header.php");

// nav bar
$pageContact = "border"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="styles/main.css" rel="stylesheet" type="text/css" media="all" />
    <title>Contact</title>
</head>

<body>

    <?php include("includes/header.php"); ?>

    <main class="content">

        <h2>Contact Us</h2>
        <p>Whether you are looking to be recruited or wanting to get back in touch with your old team and family, we would love to hear from you. Here we have provided you with with the best email address, office phone number, and mailing address of each coaches to reach them at. </p>
        <!-- head coach info -->
        <div id="headC">
            <h3>Trudy Vandeberg</h3>
            <h4>Head Coach</h4>
            <ul class="contactInfo">
                <li>(123)456-7890</li>
                <li>tv@cornell.edu</li>
                <li>521 Campus Rd, Ithaca, NY 14850</li>
            </ul>

            <!--Source: https://cornellbigred.com/images/2018/8/27/Vande_Berg_Trudy_08A1462.jpg?width=300 -->
            <img class="images" src="images/PS_6.jpg" alt="Trudy VandeBerg Headshot" />
            Source: <cite><a href="https://cornellbigred.com/images/2018/8/27/Vande_Berg_Trudy_08A1462.jpg?width=300">Cornell Athletics</a></cite>
        </div>

        <!-- assistant coach info -->
        <div id="assistC">
            <h3>Caitlin Hager</h3>
            <h4>Assistant Coach</h4>
            <ul class="contactInfo">
                <li>(098)765-4321</li>
                <li>cm@cornell.edu</li>
                <li>521 Campus Rd, Ithaca, NY 14850</li>
            </ul>

            <!-- Source:https://cornellbigred.com/images/2015/9/2/Mahoney.jpg?width=300 -->
            <img class="images" src="images/PS_7.jpg" alt="Caitlin Hager Headshot" />
            Source: <cite><a href="https://cornellbigred.com/images/2015/9/2/Mahoney.jpg?width=300"> Cornell Athletics</a></cite>

        </div>

    </main>

    <?php include("includes/footer.php"); ?>


</body>

</html>
