<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../Tijdelijke%20prullenbak/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
<!--    <link href="css/main.css" rel="stylesheet">-->

</head>
<body>

<?php

// database include
include 'database.php';
// logo include
include 'include/logo.php';

// navbar include
include 'include/navbar.php';

$stmt = $pdo->prepare("SELECT * FROM product");

$stmt->execute();

?>

<div class="aanbod-wrapper col-md-3">
    <div class="aanbod-sidebar-wrapper">
        <ul class="aanbod-sidebar-nav">
            <li class="aanbod-filter-title"><h4>Filter uw resultaten</h4></li>
            <li>
                <form class="aanbod-form-search"> Zoek:<br>
                    <input type="text" class="form-control" name="zoek" value="Zoeken">
                </form> <Br>
            </li>
            <li class="aanbod-dropdown-merk"> Automerk:<Br>
                <select name="merk"> </select></li> <br>
            <li class="aanbod-dropdown-bouwjaar"> Bouwjaar:<Br>
                <select name="bouwjaar"> </select></li> <br>
            <li class="aanbod-dropdown-onderdeel"> Type onderdeel:<Br>
                <select name="onderdeel"> </select></li> <br>
            <li> <form class="aanbod-search-button">
                    <input type="submit" value="Zoeken" </form>
            </li>
        </ul>
    </div>
    <div class="container">
        <table class="col-md-9">
            <tr>
                <th class="col-md-2">Foto</th>
                <th class="col-md-7">Productnaam</th>
                <th class="col-md-2">Prijs</th>
            </tr>
            <?php
            while ($row = $stmt->fetch())
            {
                $productnummer = $row["productnummer"];
                $naam = $row["naam"];
                $prijs = $row["prijs"];
                echo "<tr class=\"aanbod-table-data\">";
                echo "<td class=\"col-md-2\">Voeg foto in.</td>";
                echo "<td class=\"col-md-7\"><a href=itempage.php?rowid=$productnummer>" . $naam . "</a></td>";
                echo "<td class=\"aanbod-prijs\">" .  $prijs . " EURO" . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="css/https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="css/js/bootstrap.min.js"></script>
</body>
</html>