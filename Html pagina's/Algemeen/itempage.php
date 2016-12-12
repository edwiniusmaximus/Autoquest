<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>cpanel - klanten</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
<?php
session_start();

// logo include
include 'include/logo.php';

// navbar include
include 'include/navbar.php';

// database include
include 'database.php';

$productnummer = $_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM product WHERE productnummer = ?");
$stmt ->execute(array($productnummer));
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">

        </div>
    </div>
</div>

</body>
</html>