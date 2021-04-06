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

$getStatusQuery = "SELECT * FROM `status` WHERE emailadres = '$emailadres';";
$getStatus = mysqli_query($conn, $getStatusQuery);

$getNaamQuery = "SELECT * FROM `gebruikers` WHERE emailadres = '$emailadres';";
$getNaam = mysqli_query($conn, $getNaamQuery);

$rowStatus = mysqli_fetch_assoc($getStatus);
$rowNaam = mysqli_fetch_assoc($getNaam);

$naam = ($rowNaam["tussenvoegsel"]  == '') ? $rowNaam["voornaam"] . " " . $rowNaam["achternaam"] : $rowNaam["voornaam"] . " " . $rowNaam["tussenvoegsel"] . " " . $rowNaam["achternaam"];
$positieWachtrij = $rowStatus["wachtrijPositie"];
$ziekenhuis = $rowStatus["ziekenhuis"];
$ziekenhuisPlaats = $rowStatus["plaats"];
$ziekenhuisProvincie = $rowStatus["provincie"];