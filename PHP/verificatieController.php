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

if (isset($_POST["bevestigen"])) {
    $verificatieCode = $_POST["verificatieCode"];

    $getVerificatieCodeQuery = "SELECT * FROM gebruikers INNER JOIN verificatie ON gebruikers.emailadres = verificatie.emailadres WHERE gebruikers.emailadres = ?";
    $getVerificatieCode = $conn->prepare($getVerificatieCodeQuery);
    $getVerificatieCode->bind_param('s', $emailadres);
    $getVerificatieCode->execute();
    $rowGebruiker = $getVerificatieCode->get_result()->fetch_assoc();

    $verificatieCodeDatabase = $rowGebruiker["token"];

    // provincie van de gebruiker
    $provincie = $rowGebruiker["provincie"];


    if ($verificatieCode == $verificatieCodeDatabase) {
        // status bepalen
        // kiest ziekenhuis in zelfde profincie en bepaald de positie in de wachtrij aan de hand van aantal plekken in ziekenhuis
        $ziekenhuis = NULL;

        $getZiekenhuisQuery = "SELECT * FROM ziekenhuizen WHERE provincie = ?";
        $getZiekenhuis = $conn->prepare($getZiekenhuisQuery);
        $getZiekenhuis->bind_param('s', $provincie);
        $getZiekenhuis->execute();

        while ($rowZiekenhuis = $getZiekenhuis->get_result()->fetch_assoc()) {
            if ($rowZiekenhuis["provincie"] == $provincie) {
                $ziekenhuis = $rowZiekenhuis["ziekenhuis"];
                $plaatsZiekenhuis = $rowZiekenhuis["plaats"];
                $provincieZiekenhuis = $rowZiekenhuis["provincie"];

                $inschrijvingenZiekenhuis = $rowZiekenhuis["inschrijvingen"]; // kijkt hoeveel inschrijvingen er zijn bij de gekozen ziekenhuis
                $positie = $inschrijvingenZiekenhuis + 1; // plaats in de wachtrij is het aantal inschrijvingen + 1

                // update database
                $updateStatusQuery = "INSERT INTO `status` (`emailadres`, `ziekenhuis`, `plaats`, `provincie`, `wachtrijPositie`) VALUES (?, ?, ?, ?, ?);";
                $updateStatus = $conn->prepare($updateStatusQuery);
                $updateStatus->bind_param('sssss', $emailadres, $ziekenhuis, $plaatsZiekenhuis, $provincieZiekenhuis, $positie);
                $updateStatus->execute();

                $updateZiekenhuisQuery = "UPDATE `ziekenhuizen` SET `inschrijvingen` = ? WHERE `ziekenhuizen`.`plaats` = ? AND `ziekenhuizen`.`provincie` = ?";
                $updateZiekenhuis = $conn->prepare($updateZiekenhuisQuery);
                $updateZiekenhuis->bind_param('sss', $positie, $plaatsZiekenhuis, $provincieZiekenhuis);
                $updateZiekenhuis->execute();

                $updateVerifyQuery = "UPDATE `verificatie` SET `verified` = 'true' WHERE `verificatie`.`emailadres` = ?;";
                $updateVerify = $conn->prepare($updateVerifyQuery);
                $updateVerify->bind_param('s', $emailadres);
                $updateVerify->execute();

                echo '<script type="text/javascript">';
                echo 'alert("Uw email is succesvol geverifieerd.")';
                echo 'window.location.href = "../index.php";';
                echo '</script>';
                break;
            }
        }

        $_SESSION["verified"] = 'true';

        echo '<script type="text/javascript">';
        echo 'alert("Uw emailadres is succesvol geverificeerd.");';
        echo 'window.location.href = "../index.php";';
        echo '</script>';
    } else {
        echo "niet geverified";
        $_SESSION["verificatieErr"] = "Opgegeven code is niet correct.";
        header("Location: ../HTML/verify.php");
    }
} elseif (isset($_POST["mailOpnieuwSturen"])) {
    // verificatie token genereren en opslaan in database
    $token = bin2hex(openssl_random_pseudo_bytes(5));

    // stuurt een mail met de verificatie code, dit werkt helaas nog niet
    //$to = "'$emailadres";
    //$subject = "Verificatie code Professional Pills";
    //$txt = "Beste " . $voornaam . ", <br> Uw verificatie code is: " . $token;
    //mail($to,$subject,$txt);

    // update database met nieuwe verificatie code
    $tokenUpdatenQuery = "UPDATE `verificatie` SET `token` = ? WHERE `verificatie`.`emailadres` = ?";
    $tokenUpdaten = $conn->prepare($tokenUpdatenQuery);
    $tokenUpdaten->bind_param('ss', $token, $emailadres);
    $tokenUpdaten->execute();

    echo '<script type="text/javascript">';
    echo 'alert("Er is een email gestuurd met een nieuwe verificatie code");';
    echo 'window.location.href = "../HTML/verify.php";';
    echo '</script>';
}



