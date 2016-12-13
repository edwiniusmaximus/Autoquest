<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>cpanel - klanten</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="../Tijdelijke%20prullenbak/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- Custom styles for this template -->
<!--    <link href="css/main.css" rel="stylesheet">-->
</head>
<body>
<?php
session_start();



// navbar include
include("../navigationbar/navigation.php");

// database include
include 'database.php';

$productnummer = $_GET["rowid"];
$stmt = $pdo->prepare("SELECT * FROM product WHERE productnummer = ?");
$stmt ->execute(array($productnummer));
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 boxlinks">
            <?php
            while ($row = $stmt->fetch()) {
                $naam = $row["naam"];
                echo "<h1>" . $naam . "</h1>";
                $omschrijving = $row["omschrijving"];
                echo "<p>omschrijving: " . $omschrijving . "</p>";
                echo "<p>productnummer: " . $productnummer . "</p>";
                $bouwjaar = $row["bouwjaar"];
                echo "<p>bouwjaar: " . $bouwjaar . "</p>";
                $merk = $row["merk"];
                echo "<p>merk: " . $merk . "</p>";
                $gewicht = $row["gewicht"];
                echo "<p>gewicht: " . $gewicht . "</p>";
                $type = $row["type"];
                echo "<p>type: " . $type . "</p>";
                $prijs = $row["prijs"];
                echo "<h1>" . $prijs . " euro</h1>";
            }

            ?>
        </div>
        <div class="col-md-6 boxrechts">
            <div class="item-image">

            </div>
            <form method="get">
                <button>Bestellen</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>