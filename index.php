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
        <a class="navigationButton" href="#Nieuws">Nieuws</a>
        <a class="navigationButton" href="#HetVaccin">Het Vaccin</a>
        <a class="navigationButton" href="#OverOns">Over Professional Pills</a>
        <a class="navigationButton" href="#Contact">Contact</a>

        <?php if ($_SESSION["login"] == true) : ?>
            <a class="navigationButton" href="PHP/uitloggen.php" style="float: right;">Uitloggen</a>
            <a class="navigationButton" href="HTML/status.php" style="float: right;">Status</a>
        <?php else : ?>
            <a class="navigationButton" href="HTML/login.php" style="float: right;">Inloggen</a>
        <?php endif; ?>

    </section>

    <section class="content">

        <div class="inhoud">
            <h1 id="Nieuws">Nieuws</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin porttitor mattis augue et varius. Aenean
                eget leo sit amet diam gravida feugiat a ut enim. Donec imperdiet non diam at feugiat. Nullam diam nunc,
                condimentum in ornare at, dignissim cursus neque. Donec in lacus vel risus sollicitudin bibendum a eu
                enim. In ac vehicula nisl. Sed eget eleifend risus, eu iaculis ante. Mauris id congue sapien. Fusce
                feugiat magna id urna lobortis facilisis et et ante. Duis accumsan, mauris ac cursus viverra, nisl ipsum
                ultrices velit, sed bibendum diam diam fermentum augue. Suspendisse ornare accumsan malesuada.</p>

            <p>Nam gravida tortor orci, eget aliquam elit ornare ac. Mauris sit amet purus id velit auctor cursus eget
                vel magna. Vestibulum sodales aliquam venenatis. Nunc iaculis tortor ex, ut sollicitudin purus iaculis
                vel. Vestibulum interdum, sapien imperdiet eleifend tempor, elit nunc maximus ante, ac cursus nibh nibh
                pulvinar metus. Etiam vel arcu elementum, hendrerit neque eu, hendrerit tortor. Proin dictum at nisl id
                bibendum.</p>

            <p>Nam suscipit vehicula tellus, eu luctus elit viverra a. Fusce at consequat dui, eu congue massa. Nulla
                facilisi. Nulla nec nisi venenatis, ullamcorper nisi vitae, aliquet metus. Cras sem dui, pulvinar sit
                amet iaculis quis, faucibus quis risus. Pellentesque commodo, quam vel tincidunt tempus, ex dui
                vulputate erat, et pretium quam quam eget diam. Praesent sed vestibulum leo. Integer lobortis nisl non
                metus consectetur sollicitudin. Aliquam vulputate ligula et mauris tincidunt euismod. Praesent sodales
                mi eu diam eleifend, ut tempus velit luctus. Vivamus lobortis sagittis neque id molestie. Nulla et eros
                urna. Etiam porta quam viverra urna sodales blandit. Cras id felis vel mauris consectetur fringilla nec
                eu ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut neque leo, interdum ac nunc
                quis, tristique volutpat metus.</p>

            <p>Curabitur at semper nulla. Nunc ullamcorper non ex eget fermentum. Duis et metus eros. Pellentesque non
                congue velit, tempor fringilla ex. Fusce volutpat leo in sem condimentum tincidunt. Sed iaculis neque
                nec tempor mollis. Nullam sit amet lorem suscipit, fringilla mauris et, tempus urna. Proin posuere
                bibendum massa et condimentum. Nunc vulputate maximus commodo. Suspendisse et nulla ultrices, cursus
                nibh vel, placerat est. Integer bibendum quam in turpis ornare dapibus. Maecenas tempus vestibulum
                dignissim. Curabitur lorem nibh, tristique nec tempor auctor, mollis eget massa. Pellentesque
                scelerisque, est vitae lacinia facilisis, sapien neque laoreet enim, vitae lobortis ipsum sapien eget
                nibh. Integer dui nibh, ullamcorper at lectus ac, auctor lacinia lectus. Orci varius natoque penatibus
                et magnis dis parturient montes, nascetur ridiculus mus.</p>

            <p>Nullam sodales, augue eget convallis maximus, nulla eros tempus felis, eu posuere ipsum ligula sed lorem.
                Fusce fermentum viverra nisi, eget mollis sapien pellentesque a. Sed quis imperdiet magna, in fringilla
                tortor. Aliquam vitae volutpat quam, quis consectetur nunc. Morbi at quam consequat, eleifend leo ut,
                facilisis lorem. Morbi egestas turpis sed finibus finibus. Donec rutrum scelerisque urna vitae suscipit.
                Ut sit amet tincidunt erat. Aliquam nec diam a ipsum hendrerit malesuada id sit amet risus. Pellentesque
                aliquam, nibh sed blandit commodo, leo eros sagittis turpis, non efficitur risus tortor ut turpis. Nulla
                facilisi. Mauris in elit mauris. Etiam nulla sem, iaculis eu augue eget, suscipit sagittis dui. Etiam
                cursus dui et dignissim aliquet. Nulla facilisi. Morbi efficitur eros eget est viverra egestas.</p>
        </div>

        <div class="inhoud">
            <h1 id="HetVaccin">Het vaccin</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin porttitor mattis augue et varius. Aenean
                eget leo sit amet diam gravida feugiat a ut enim. Donec imperdiet non diam at feugiat. Nullam diam nunc,
                condimentum in ornare at, dignissim cursus neque. Donec in lacus vel risus sollicitudin bibendum a eu
                enim. In ac vehicula nisl. Sed eget eleifend risus, eu iaculis ante. Mauris id congue sapien. Fusce
                feugiat magna id urna lobortis facilisis et et ante. Duis accumsan, mauris ac cursus viverra, nisl ipsum
                ultrices velit, sed bibendum diam diam fermentum augue. Suspendisse ornare accumsan malesuada.</p>

            <img src="Images/coronavaccin.jpg" style="float: left; margin-left: 40px; margin-right: 20px;">

            <p>Nam gravida tortor orci, eget aliquam elit ornare ac. Mauris sit amet purus id velit auctor cursus eget
                vel magna. Vestibulum sodales aliquam venenatis. Nunc iaculis tortor ex, ut sollicitudin purus iaculis
                vel. Vestibulum interdum, sapien imperdiet eleifend tempor, elit nunc maximus ante, ac cursus nibh nibh
                pulvinar metus. Etiam vel arcu elementum, hendrerit neque eu, hendrerit tortor. Proin dictum at nisl id
                bibendum.</p>

            <p>Nam suscipit vehicula tellus, eu luctus elit viverra a. Fusce at consequat dui, eu congue massa. Nulla
                facilisi. Nulla nec nisi venenatis, ullamcorper nisi vitae, aliquet metus. Cras sem dui, pulvinar sit
                amet iaculis quis, faucibus quis risus. Pellentesque commodo, quam vel tincidunt tempus, ex dui
                vulputate erat, et pretium quam quam eget diam. Praesent sed vestibulum leo. Integer lobortis nisl non
                metus consectetur sollicitudin. Aliquam vulputate ligula et mauris tincidunt euismod. Praesent sodales
                mi eu diam eleifend, ut tempus velit luctus. Vivamus lobortis sagittis neque id molestie. Nulla et eros
                urna. Etiam porta quam viverra urna sodales blandit. Cras id felis vel mauris consectetur fringilla nec
                eu ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut neque leo, interdum ac nunc
                quis, tristique volutpat metus.</p>
            <img src="Images/coronavaccin.jpg" style="float: right; margin-right: 40px">

            <p>Curabitur at semper nulla. Nunc ullamcorper non ex eget fermentum. Duis et metus eros. Pellentesque non
                congue velit, tempor fringilla ex. Fusce volutpat leo in sem condimentum tincidunt. Sed iaculis neque
                nec tempor mollis. Nullam sit amet lorem suscipit, fringilla mauris et, tempus urna. Proin posuere
                bibendum massa et condimentum. Nunc vulputate maximus commodo. Suspendisse et nulla ultrices, cursus
                nibh vel, placerat est. Integer bibendum quam in turpis ornare dapibus. Maecenas tempus vestibulum
                dignissim. Curabitur lorem nibh, tristique nec tempor auctor, mollis eget massa. Pellentesque
                scelerisque, est vitae lacinia facilisis, sapien neque laoreet enim, vitae lobortis ipsum sapien eget
                nibh. Integer dui nibh, ullamcorper at lectus ac, auctor lacinia lectus. Orci varius natoque penatibus
                et magnis dis parturient montes, nascetur ridiculus mus.</p>

            <p>Nullam sodales, augue eget convallis maximus, nulla eros tempus felis, eu posuere ipsum ligula sed lorem.
                Fusce fermentum viverra nisi, eget mollis sapien pellentesque a. Sed quis imperdiet magna, in fringilla
                tortor. Aliquam vitae volutpat quam, quis consectetur nunc. Morbi at quam consequat, eleifend leo ut,
                facilisis lorem. Morbi egestas turpis sed finibus finibus. Donec rutrum scelerisque urna vitae suscipit.
                Ut sit amet tincidunt erat. Aliquam nec diam a ipsum hendrerit malesuada id sit amet risus. Pellentesque
                aliquam, nibh sed blandit commodo, leo eros sagittis turpis, non efficitur risus tortor ut turpis. Nulla
                facilisi. Mauris in elit mauris. Etiam nulla sem, iaculis eu augue eget, suscipit sagittis dui. Etiam
                cursus dui et dignissim aliquet. Nulla facilisi. Morbi efficitur eros eget est viverra egestas.</p>

                <h3>Klik <a href="HTML/registreren.php">hier</a> om te registreren!</h3>
        </div>

        <div class="inhoud">
            <h1 id="OverOns">Over ons</h1>
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

            <img src="https://media-exp1.licdn.com/dms/image/C4E03AQGnVFcmykr11A/profile-displayphoto-shrink_200_200/0/1616704740974?e=1622073600&v=beta&t=OqzfEREaAsiU1UBkCWXXH8O5kKPO-7N0K3u6ijUladA"
                 width="200px" height="200px" alt="">
            <img src="/Images/Deniz.png" width="200px" height="200px" alt="">
            <iframe src="https://www.youtube.com/embed/p47zwuOVXNQ?start=296&end=320&autoplay=0" width="200px"
                    height="200px"></iframe>
        </div>

        <div class="inhoud">
            <h1 id="Contact">Contact</h1>
            <p>Wij zijn telefonisch bereikbaar van maandag t/m vrijdag van 07:45 uur tot 17:00 uur.</p>
            <br>
            <p>EmailL: test123123@gmail.com</p>
            <p>Telefoon Nummer: +3161234566</p>
            <p>Adres: Constantstraat 6, 3202 SV Spijkenisse</p>

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