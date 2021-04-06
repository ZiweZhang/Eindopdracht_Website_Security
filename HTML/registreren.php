<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Website</title>
    <link href="../CSS/base.css" rel="stylesheet" type="text/css"/>
    <link href="../CSS/registreren.css" rel="stylesheet" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  Reload pagina automatich na verandering-->
    <script type="text/javascript" src="https://livejs.com/live.js"></script>
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
        <a class="navigationButton" href="https://www.google.com/">test</a>
        <a class="navigationButton" href="#test">test</a>
        <a class="navigationButton" href="#test">test</a>
        <a class="navigationButton" href="#test">test</a>
        <a class="navigationButton" href="#test">test</a>
        <a class="navigationButton" href="#test">test</a>

        <a class="navigationButton" href="login.php" style="float: right;">Login</a>
    </section>

    <section class="content">
        <form method="POST" action="../PHP/registrerenController.php">
            <div class="container">
                <label><b>Naam</b><br>
                    <input class="naam" type="text" placeholder="Voornaam" name="voornaam"
                           value="<?php echo isset($_GET["voornaam"]) ? $_GET["voornaam"] : ''; ?>" >
                    <input class="tussenvoegsel" type="text" name="tussenvoegsel"
                           value="<?php echo isset($_GET["tussenvoegsel"]) ? $_GET["tussenvoegsel"] : ''; ?>">
                    <input class="naam" type="text" placeholder="Achternaam" name="achternaam"
                           value="<?php echo isset($_GET["achternaam"]) ? $_GET["achternaam"] : ''; ?>" >
                </label>
                <span class="error errorNaam1"><?php echo $_SESSION["voorNaamErr"]; ?></span>
                <span class="error errorNaam2"><?php echo $_SESSION["achterNaamErr"]; ?></span>

                <label><b>Geboortedatum</b>
                    <input id="datum" type="date" min="1900-01-01" max="today" name="geboortedatum"
                           value="<?php echo isset($_GET["geboortedatum"]) ? $_GET["geboortedatum"] : ''; ?>" >
                </label>
                <span class="error"><?php echo $_SESSION["geboortedatumErr"]; ?></span>

                <label><b>Geslacht</b>
                    <select type="text" name="geslacht" >
                        <option value=""
                                hidden <?php echo ($_GET['geslacht'] == '') ? ' selected="selected"' : ''; ?>>
                            Selecteer optie
                        </option>
                        <option value="Man" <?php echo ($_GET['geslacht'] == 'Man') ? ' selected="selected"' : ''; ?>>
                            Man
                        </option>
                        <option value="Vrouw"<?php echo ($_GET['geslacht'] == 'Vrouw') ? ' selected="selected"' : ''; ?>>
                            Vrouw
                        </option>
                        <option value="Alien"<?php echo ($_GET['geslacht'] == 'Alien') ? ' selected="selected"' : ''; ?>>
                            Alien
                        </option>
                    </select>
                </label>
                <span class="error"><?php echo $_SESSION["geslachtErr"]; ?></span>

                <label><b>Emailadres</b>
                    <input type="email" placeholder="Emailadres" name="emailadres"
                           value="<?php echo $_GET["emailadres"]; ?>" >
                </label>
                <span class="error"><?php echo $_SESSION["emailErr"]; ?></span>

                <label><b>adres</b><br>
                    <input type="text" placeholder="Straatnaam" name="straatnaam"
                           value="<?php echo $_GET["straatnaam"]; ?>" >
                    <span class="error errorAdres"><?php echo $_SESSION["straatnaamErr"]; ?></span>
                    <input class="adres" type="text" placeholder="Huisnummer" name="huisnummer"
                           value="<?php echo $_GET["huisnummer"]; ?>" >
                    <input class="adres" type="text" placeholder="Toevoeging" name="huisnummerToevoeging"
                           value="<?php echo $_GET["huisnummerToevoeging"]; ?>">
                    <span class="error errorAdres"><?php echo $_SESSION["huisnummerErr"]; ?></span>
                    <input type="text" placeholder="Woonplaats" name="woonplaats"
                           value="<?php echo $_GET["woonplaats"]; ?>" >
                    <span class="error errorAdres"><?php echo $_SESSION["woonplaatsErr"]; ?></span>
                </label>

                <label><b>Wachtwoord</b>
                    <input type="password" placeholder="Wachtwoord" name="wachtwoord">
                </label>
                <span class="error" ><?php echo $_SESSION["wachtwoordErr"]; ?></span>

                <label><b>Herhaal wachtwoord</b>
                    <input type="password" placeholder="Wachtwoord" name="wachtwoord_herhaal">
                </label>
                <span class="error" ><?php echo $_SESSION["wachtwoordErr2"]; ?></span>

                <button type="submit">Aanmelden</button>
            </div>

        </form>
    </section>

    <footer id="footer">
        <p id="Copyright"></p>
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
                navbutton[index].style.padding = "7px 0";
            }
        } else {
            for (let index = 0; index < navbutton.length; index++) {
                navbutton[index].style.padding = "20px 0";
            }
        }
    }
</script>
</body>

</html>
