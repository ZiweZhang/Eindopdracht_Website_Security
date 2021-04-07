<?php
session_start();

//database informatie
$host = "localhost";
$dbUsername = "root";
$dbPassword = "6A&tGbMgB$";
$dbName = "ProfessionalPills";

// Creeert connectie met database
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

$emailadres = $_SESSION["emailadres"];

// get status informatie
$getCodeQuery = "SELECT * FROM `verificatie` WHERE emailadres = ?;";
$getCode = $conn -> prepare($getCodeQuery);
$getCode -> bind_param('s', $emailadres);
$getCode -> execute();
$rowCode = $getCode -> get_result() -> fetch_assoc();

$verificatieCode = $rowCode["token"];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Website</title>
    <link href="../CSS/base.css" rel="stylesheet" type="text/css"/>
    <link href="../CSS/login.css" rel="stylesheet" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<div class="grid">
    <header>
        <div>
            <h1>Professional Pills</h1>
            <h3>-- Quote --</h3>
        </div>
    </header>

    <section id="navigationBar">
        <a class="navigationButton" href="../index.php">Home</a>
        <a class="navigationButton" href="../index.php#Nieuws">Nieuws</a>
        <a class="navigationButton" href="../index.php#HetVaccin">Het Vaccin</a>
        <a class="navigationButton" href="../index.php#OverOns">Over Professional Pills</a>
        <a class="navigationButton" href="../index.php#Contact">Contact</a>

        <?php if ($_SESSION["login"] == true) : ?>
            <a class="navigationButton" href="../PHP/uitloggen.php" style="float: right;">Uitloggen</a>
            <?php if ($_SESSION["verified"] == 'true') : ?>
                <a class="navigationButton" href="../HTML/status.php" style="float: right;">Status</a>
            <?php else : ?>
                <a class="navigationButton active" href="../HTML/verify.php" style="float: right;">Verifiëren</a>
            <?php endif; ?>
        <?php else : ?>
            <a class="navigationButton" href="../HTML/login.php" style="float: right;">Inloggen</a>
        <?php endif; ?>

    </section>


    <section class="content">
        <div class="inhoud">
            <h1 style="padding-top: 20px; text-decoration: underline overline;">Verifiëren</h1>
            <?php if ($_SESSION["login"] == true) : ?>
               <p>je verificatie code is: <?php echo $verificatieCode; ?></p>
            <?php else : ?>
                <br><br>
                <h2>U moet ingelogd zijn om dit te kunnen zien.</h2>
                <h4>Klik <a href="login.php">hier</a> om in te loggen.</h4>
                <br><br>
            <?php endif; ?>
        </div>

    </section>

    <footer id="footer">
        <p id="Copyright" style="float: left"></p>
        <p style="float: right">Ziwe Zhang - 0984223</p>
    </footer>

</div>

<!--  Huidige datum opvragen-->
<script>
    let today = new Date();
    let dd = today.getDate();
    let mm = today.getMonth() + 1; //January is 0 so need to add 1 to make it 1!
    let yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("Copyright").innerHTML = "&#169; " + yyyy + " Profesional Pills, Inc. All rights reserved";
</script>

<!--  Script voor navigatie bar-->
<script>
    window.onscroll = function () {
        myFunction();
        scrollFunction()
    };

    let navbar = document.getElementById("navigationBar");
    let navbutton = navbar.getElementsByClassName("navigationButton");

    let sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky");
        } else {
            navbar.classList.remove("sticky");
        }
    }

    function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            for (let index = 0; index < navbutton.length; index++) {
                navbutton[index].style.padding = "7px 20px";
            }
        } else {
            for (let index = 0; index < navbutton.length; index++) {
                navbutton[index].style.padding = "20px 20px";
            }
        }
    }
</script>
</body>

</html>