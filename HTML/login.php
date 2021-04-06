<?php
session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

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

        <a class="navigationButton active" href="login.php" style="float: right;">Login</a>
    </section>

    <section class="content">
        <form action="../PHP/loginController.php" method="POST">
            <label><b>Emailadres</b>
                <input type="text" placeholder="Emailadres" name="emailadres" value="<?php echo $_GET["emailadres"]; ?>" >
            </label>
            <span class="error"><?php echo $_SESSION["emailErr"]; ?></span>

            <label><b>Wachtwoord</b>
                <input type="password" placeholder="Wachtwoord" name="wachtwoord" >
            </label>
            <span class="error"><?php echo $_SESSION["wachtwoordErr"]; ?></span>

            <button type="submit">Inloggen</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Laat mij ingelogd blijven
            </label>
        </form>


        <div class="aanmelden">
            <span id="wachtwoord"><a href="#">Wachtwoord</a> vergeten?</span>
            <p>Geen account?</p>
            <a href=registreren.php>klik hier om aan te melden</a>
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