<?php
session_start();

//database informatie
$host = "localhost";
$dbUsername = "root";
$dbPassword = "6A&tGbMgB$";
$dbName = "ProfessionalPills";

// Creeert connectie met database
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

$emailadres = mysqli_real_escape_string($conn, $_POST["emailadres"]);
$wachtwoord = mysqli_real_escape_string($conn, $_POST["wachtwoord"]);

$locatie = "Location: ../HTML/login.php?emailadres=" . $emailadres;

$error = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($emailadres == '') {
        $_SESSION["emailErr"] = "*Vul je emailadres in";
        $error++;
    } else $_SESSION["emailErr"] = "";
    if ($wachtwoord == '') {
        $_SESSION["wachtwoordErr"] = "*Vul een wachtwoord in";
        $error++;
    } else $_SESSION["wachtwoordErr"] = "";
}

// Check connection
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    //connectie goed
    echo "connectie goed";

    // Haalt gehashed wachtwoord uit database
    $getGebruikerQuery = "SELECT * FROM gebruikers INNER JOIN verificatie ON gebruikers.emailadres = verificatie.emailadres WHERE gebruikers.emailadres = ?";
    $getGebruiker = $conn -> prepare($getGebruikerQuery);
    $getGebruiker -> bind_param('s', $emailadres);
    $getGebruiker -> execute();
    $row = $getGebruiker -> get_result() ;

    if ($error == 0) {
        if ($row -> num_rows == 1) {
            $row = $row -> fetch_assoc();
            $hased_wachtwoord = $row["wachtwoord"];
            if(password_verify($wachtwoord, $hased_wachtwoord)){
                $_SESSION["login"] = true;
                $_SESSION["emailadres"] = $emailadres;
                $_SESSION["verified"] = $row["verified"];
                $locatie = "Location: ../index.php";
            }else{
                $_SESSION["wachtwoordErr"] = "Wachtwoord is niet correct!";
            }
        } else {
            $_SESSION["emailErr"] = "Dit emailadres staat niet bij ons geregistreerd";
        }


    }


    header($locatie);


}



