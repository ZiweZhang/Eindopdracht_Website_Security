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
        <a class="navigationButton" href="../index.html">Home</a>
        <a class="navigationButton" href="https://www.google.com/">test</a>
        <a class="navigationButton" href="#test">test</a>
        <a class="navigationButton" href="#test">test</a>
        <a class="navigationButton" href="#test">test</a>
        <a class="navigationButton" href="#test">test</a>
        <a class="navigationButton" href="#test">test</a>

        <a class="navigationButton" href="login.html" style="float: right;">Login</a>
    </section>

    <section class="content">
        <form action="../PHP/registrerenController.php" method="POST">
            <div class="container">
                <label><b>Naam</b><br>
                    <input class="naam" type="text" placeholder="Voornaam" name="voornaam" required>
                    <input class="tussenvoegsel" type="text" name="tussenvoegsel">
                    <input class="naam" type="text" placeholder="Achternaam" name="achternaam" required>
                    <span class="error"><?php echo "test";?></span>
                </label>

                <label><b>Geboortedatum</b>
                    <input id="datum" type="date" min="1900-01-01" max="today" name="geboortedatum" required>
                </label>

                <label><b>Geslacht</b>
                    <select type="text" name="geslacht" required>
                        <option value="" hidden disabled selected>Selecteer optie</option>
                        <option value="Man">Man</option>
                        <option value="Vrouw">Vrouw</option>
                        <option value="Alien">Alien</option>
                    </select>
                </label>

                <label><b>Emailadres</b>
                    <input type="email" placeholder="Emailadres" name="emailadres" required>
                </label>

                <label><b>Wachtwoord</b>
                    <input type="password" placeholder="Wachtwoord" name="wachtwoord" required>
                </label>

                <label><b>Herhaal wachtwoord</b>
                    <input type="password" placeholder="Wachtwoord" name="wachtwoord_herhaal" required>
                </label>

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