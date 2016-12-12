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
    <link href="aanbodpagina.css" rel="stylesheet">


</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Niels Helmantel
 * Date: 11-12-2016
 * Time: 22:27
 */

$db = "mysql:host=localhost;dbname=mydb;port=3306";
$user = "root";
$pdo = new PDO($db, $user);

$stmt = $pdo->prepare("SELECT * FROM product");

$stmt->execute();



?>

<h1>Aanbod</h1>
<div class="aanbod-wrapper">
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
        <table class="col-md-11">
            <tr>
                <th class="col-md-2">Foto</th>
                <th class="col-md-7">Beschrijving</th>
                <th class="col-md-2">Prijs</th>
            </tr>
            <?php
            while ($row = $stmt->fetch())
            {
                $naam = $row["naam"];
                $prijs = $row["prijs"];
                echo "<tr class=\"aanbod-table-data\">";
                echo "<td class=\"col-md-2\">Voeg foto in.</td>";
                echo "<td class=\"col-md-7\">" . $naam . "</td>";
                echo "<td class=\"aanbod-prijs\">" .  $prijs . " EURO" . "</td>";
                echo "<form class=\"aanbod-info-button\">";
                echo "<input type=\"submit\" value=\"Meer informatie\">";
                echo "</form></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../bootstrap-files/https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../bootstrap-files/js/bootstrap.min.js"></script>
</body>
</html>

