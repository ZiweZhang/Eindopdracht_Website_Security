<?php
//database informatie
$host = "localhost";
$dbUsername = "root";
$dbPassword = "6A&tGbMgB$";
$dbName = "ProfessionalPills";

// Creeert connectie met database
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

$voornaam = ucfirst($_POST["voornaam"]);
$tussenvoegsel = strtolower($_POST["tussenvoegsel"]);
$achternaam = ucfirst($_POST["achternaam"]);
$geboortedatum = $_POST["geboortedatum"];
$geslacht = $_POST["geslacht"];
$emailadres = $_POST["emailadres"];
$wachtwoord = password_hash($_POST["wachtwoord"], PASSWORD_BCRYPT);

if (!filter_var($emailadres, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
}

echo $voornaam;
echo "<br>";
echo $tussenvoegsel;
echo "<br>";
echo $achternaam;
echo "<br>";
echo $geboortedatum;
echo "<br>";
echo $geslacht;
echo "<br>";
echo $emailadres;
echo "<br>";
echo $wachtwoord;
echo "<br>";

// Check connection
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
//connectie goed
    echo "connectie goed";

    // alle queries
    if ($tussenvoegsel == "") {
        $sql = "INSERT INTO gebruikers (emailadres, voornaam,tussenvoegsel, achternaam, geboortedatum, geslacht, wachtwoord) VALUES ('$emailadres', '$voornaam', NULL, '$achternaam', '$geboortedatum', '$geslacht', '$wachtwoord');";
    } else {
        $sql = "INSERT INTO gebruikers (emailadres, voornaam,tussenvoegsel, achternaam, geboortedatum, geslacht, wachtwoord) VALUES ('$emailadres', '$voornaam', '$tussenvoegsel', '$achternaam', '$geboortedatum', '$geslacht', '$wachtwoord');";
    }

    $bestaatGebruiker = "SELECT * FROM gebruikers WHERE emailadres='$emailadres'";

    // queries uitvoeren
    if (mysqli_num_rows(mysqli_query($conn, $bestaatGebruiker)) == 0) {
        $result = mysqli_query($conn, $sql);
    } else {
        echo "emailadres is al in gebruik";
    }

//    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");


}



