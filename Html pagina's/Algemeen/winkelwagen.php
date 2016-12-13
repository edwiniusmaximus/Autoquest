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
/**
 * Created by PhpStorm.
 * User: Niels Helmantel
 * Date: 13-12-2016
 * Time: 20:55
 */

include("../navigationbar/navigation.php");

?>

<div class="container">
    <div class="row">
        <table class="col-md-7 producten">
            <tr>
                <th>Product</th>
                <th>Prijs</th>
                <th>Aantal</th>
            </tr>
            <tr>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
            </tr>
        </table>
        <table class="col-md-4 overzicht">
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
        <form>
            <button>Bestellen</button>
        </form>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../bootstrap-files/https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../bootstrap-files/js/bootstrap.min.js"></script>
</body>
</html>


