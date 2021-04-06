<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Website</title>
    <link href="CSS/base.css" rel="stylesheet" type="text/css"/>
    <link href="CSS/index.css" rel="stylesheet" type="text/css"/>
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
        <a class="navigationButton active" href="index.php">Home</a>
        <a class="navigationButton" href="https://www.google.com/">test</a>
        <a class="navigationButton" href="#test">test</a>
        <a class="navigationButton" href="#test">test</a>
        <a class="navigationButton" href="#test">test</a>
        <a class="navigationButton" href="#test">test</a>
        <a class="navigationButton" href="#test">test</a>

        <?php
        if ($_SESSION["login"] == true){

        } else {

        }
        ?>
        <a class="navigationButton" href="HTML/login.php" style="float: right;">Login</a>
    </section>

    <section class="content">

        <div class="inhoud">
            <h1>Over ons</h1>
            <p>Professional Pills is een jong en dynamisch bedrijf die een flinke groei heeft doorgemaakt over het
                afgelopen
                jaar en wil dit jaar uitbreiden. Wij willen ons specialiseren in de vaccinmarkt en hebben een
                alternatief
                vaccin ontwikkeld tegen een veelvoorkomende virale infectie. Om dit vaccin te laten goedkeuren, moet het
                eerst op vrijwillige proefpersonen getest worden op veiligheid en effectiviteit.</p>

            <p>Jij bent onmisbaar bij de ontwikkeling van nieuwe en betere medicijnen. Samen met PP kan je de kwaliteit
                van
                leven van veel mensen verbeteren. Een belangrijke bijdrage leveren aan de maatschappij? Word deelnemer
                aan
                geneesmiddelenonderzoek bij Professional Pills Health Sciences!</p>
        </div>

        <iframe src="https://www.youtube.com/embed/p47zwuOVXNQ?start=296&end=395&autoplay=1" width="800px"
                height="650px"></iframe>
        <img src="https://media-exp1.licdn.com/dms/image/C4E03AQGnVFcmykr11A/profile-displayphoto-shrink_200_200/0/1616704740974?e=1622073600&v=beta&t=OqzfEREaAsiU1UBkCWXXH8O5kKPO-7N0K3u6ijUladA"
             width="800px" height="650px" alt="">
        <img src="/Images/Deniz.png" width="800px" height="650px" alt="">
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