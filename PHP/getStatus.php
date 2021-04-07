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
$getStatusQuery = "SELECT * FROM `status` WHERE emailadres = ?;";
$getStatus = $conn -> prepare($getStatusQuery);
$getStatus -> bind_param('s', $emailadres);
$getStatus -> execute();
$rowStatus = $getStatus -> get_result() -> fetch_assoc();

// get patient naam
$getNaamQuery = "SELECT * FROM `gebruikers` WHERE emailadres = ?;";
$getNaam = $conn -> prepare($getNaamQuery);
$getNaam -> bind_param('s', $emailadres);
$getNaam -> execute();
$rowNaam = $getNaam -> get_result() -> fetch_assoc();


$naam = ($rowNaam["tussenvoegsel"]  == '') ? $rowNaam["voornaam"] . " " . $rowNaam["achternaam"] : $rowNaam["voornaam"] . " " . $rowNaam["tussenvoegsel"] . " " . $rowNaam["achternaam"];
$positieWachtrij = $rowStatus["wachtrijPositie"];
$ziekenhuis = $rowStatus["ziekenhuis"];
$ziekenhuisPlaats = $rowStatus["plaats"];
$ziekenhuisProvincie = $rowStatus["provincie"];
