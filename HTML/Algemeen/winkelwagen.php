<?php
session_start();

/**
 * Created by PhpStorm.
 * User: Niels Helmantel
 * Date: 13-12-2016
 * Time: 20:55
 */

include("../navigationbar/navigation.php");
include "database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../bootstrap-files/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="../bootstrap-files/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="../bootstrap-files/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php

// GET moet POST worden. Door probleem met usbwebserver tijdelijk aangepast
// proces: bestelregel toevoegen -> bestelregel opvragen -> bestelregel printen in winkelwagen
if (isset($_GET)) {

    $stmt = $pdo->prepare("INSERT INTO `mydb`.`bestelregel` 
(`bestelnummer`, `emailadres`, `productnummer`, `aantal`, 
`datum`, `betaald`) VALUES (:bestelnummer, :emailadres, :productnummer, 
:aantal, :datum, :betaald)");

    $stmt->bindParam(':bestelnummer', $bestelnummer);
    $stmt->bindParam(':emailadres', $emailadres);
    $stmt->bindParam(':productnummer', $productnummer);
    $stmt->bindParam(':aantal', $aantal);
    $stmt->bindParam(':datum', $datum);
    $stmt->bindParam(':betaald', $betaald);

    $aantal = $_GET["aantal"];
    $productnummer = $_GET["productnummer"];
    $bestelnummer =+ 1;
    $emailadres = 'testklant@gmail.com';
    $datum = date("Y-m-d H:i:s");
    $betaald = 0;

    $stmt->execute();
}

?>

<div class="container">
    <div class="row">
        <table class="col-md-6 producten table">
            <tr>
                <th>Product</th>
                <th>Prijs</th>
                <th>Aantal</th>
            </tr>
        </table>
        <div class="col-md-4 overzichtdiv">
            <table class="overzicht table">
                <tr>
                    <th>Betaal Overzicht</th>
                </tr>
                <tr>
                    <td>Subtotaal</td>
                    <td>5 euro</td>
                </tr>
                <tr>
                    <td>Verzendkosten</td>
                    <td>5 euro</td>
                </tr>
                <tr>
                    <td>Totaal</td>
                    <td>10 euro</td>
                </tr>
            </table>
            <form class="bestelknop">
                <button>Bestellen</button>
            </form>
        </div>


    </div>
</div>

<?php include("../navigationbar/Footer.php"); ?>
</body>
</html>


