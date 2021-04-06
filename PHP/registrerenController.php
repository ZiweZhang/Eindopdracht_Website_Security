<?php
session_start();

//database informatie
$host = "localhost";
$dbUsername = "root";
$dbPassword = "6A&tGbMgB$";
$dbName = "ProfessionalPills";

// Creeert connectie met database
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

$voornaam = ucfirst(mysqli_real_escape_string($conn, $_POST["voornaam"]));
$tussenvoegsel = strtolower(mysqli_real_escape_string($conn, $_POST["tussenvoegsel"]));
$achternaam = ucfirst(mysqli_real_escape_string($conn, $_POST["achternaam"]));
$geboortedatum = mysqli_real_escape_string($conn, $_POST["geboortedatum"]);
$geslacht = mysqli_real_escape_string($conn, $_POST["geslacht"]);
$emailadres = mysqli_real_escape_string($conn, $_POST["emailadres"]);
$straatnaam = ucfirst(mysqli_real_escape_string($conn, $_POST["straatnaam"]));
$huisnummer = mysqli_real_escape_string($conn, $_POST["huisnummer"]);
$huisnummerToevoeging = strtoupper(mysqli_real_escape_string($conn, $_POST["huisnummerToevoeging"]));
$woonplaats = ucfirst(mysqli_real_escape_string($conn, $_POST["woonplaats"]));
$wachtwoord = password_hash(mysqli_real_escape_string($conn, $_POST["wachtwoord"]), PASSWORD_BCRYPT);

$locatie = "Location: ../HTML/registreren.php?voornaam=" . $voornaam . "&tussenvoegsel=" . $tussenvoegsel . "&achternaam=" . $achternaam . "&geboortedatum=" . $geboortedatum . "&geslacht=" . $geslacht . "&emailadres=" . $emailadres . "&straatnaam=" . $straatnaam . "&huisnummer=" . $huisnummer . "&huisnummerToevoeging=" . $huisnummerToevoeging . "&woonplaats=" . $woonplaats;

$error = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($voornaam == '') {
        $_SESSION["voorNaamErr"] = "*Vul je voornaam in";
        $error++;
    } else $_SESSION["voorNaamErr"] = "";
    if ($achternaam == '') {
        $_SESSION["achterNaamErr"] = "*Vul je achternaam in";
        $error++;
    } else $_SESSION["achterNaamErr"] = "";
    if ($geboortedatum == '') {
        $_SESSION["geboortedatumErr"] = "*Vul je geboortedatum in";
        $error++;
    } else $_SESSION["geboortedatumErr"] = "";
    if ($geslacht == '') {
        $_SESSION["geslachtErr"] = "*Vul je geslacht in";
        $error++;
    } else $_SESSION["geslachtErr"] = "";
    if ($emailadres == '') {
        $_SESSION["emailErr"] = "*Vul je emailadres in";
        $error++;
    } else if (!filter_var($emailadres, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["emailErr"] = "Vul een geldig emailadres in";
        $error++;
    } else {
        $_SESSION["emailErr"] = "";
    }
    if ($straatnaam == '') {
        $_SESSION["straatnaamErr"] = "*Vul je straatnaam in";
        $error++;
    } else $_SESSION["straatnaamErr"] = "";
    if ($huisnummer == '') {
        $_SESSION["huisnummerErr"] = "*vul je huisnummer in";
        $error++;
    } else $_SESSION["huisnummerErr"] = "";
    if ($woonplaats == '') {
        $_SESSION["woonplaatsErr"] = "*vul je woonplaats in";
        $error++;
    } else $_SESSION["woonplaatsErr"] = "";

    if ($_POST["wachtwoord"] == '') {
        $_SESSION["wachtwoordErr"] = "*vul een wachtwoord in";
        $_SESSION["wachtwoordErr2"] = "";
        $error++;
    } else if ($_POST["wachtwoord_herhaal"] == '') {
        $_SESSION["wachtwoordErr"] = "";
        $_SESSION["wachtwoordErr2"] = "*vul een wachtwoord in";
        $error++;
    } else if ($_POST["wachtwoord_herhaal"] != $_POST["wachtwoord"]) {
        $_SESSION["wachtwoordErr"] = "wachtwoorden komen niet overeen";
        $_SESSION["wachtwoordErr2"] = "wachtwoorden komen niet overeen";
        $error++;
    } else {
        $_SESSION["wachtwoordErr"] = "";
        $_SESSION["wachtwoordErr2"] = "";
    }
}

//echo $voornaam;
//echo "<br>";
//echo $tussenvoegsel;
//echo "<br>";
//echo $achternaam;
//echo "<br>";
//echo $geboortedatum;
//echo "<br>";
//echo $geslacht;
//echo "<br>";
//echo $emailadres;
//echo "<br>";
//echo $straatnaam;
//echo "<br>";
//echo $huisnummer;
//echo "<br>";
//echo $huisnummerToevoeging;
//echo "<br>";
//echo $woonplaats;
//echo "<br>";
//echo $wachtwoord;
//echo "<br>";

// Check connection
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
//connectie goed
    echo "connectie goed";

    // alle queries
    $sql = "INSERT INTO gebruikers (emailadres, voornaam,tussenvoegsel, achternaam, geboortedatum, geslacht,woonplaats, straatnaam, huisnummer, huisnummerToevoeging, wachtwoord) VALUES ('$emailadres', '$voornaam', NULLIF('$tussenvoegsel', ''), '$achternaam', '$geboortedatum', '$geslacht', '$woonplaats', '$straatnaam', '$huisnummer', NULLIF('$huisnummerToevoeging', ''), '$wachtwoord');";


    $bestaatGebruiker = "SELECT * FROM gebruikers WHERE emailadres='$emailadres'";

    // queries uitvoeren
    if ($error == 0) {
        if (mysqli_num_rows(mysqli_query($conn, $bestaatGebruiker)) == 0) {
            $result = mysqli_query($conn, $sql);
            $locatie = "Location: ../index.html";
        } else {
            $_SESSION["emailErr"] = "emailadres is al in gebruik";
        }
    }


    header($locatie);


}



