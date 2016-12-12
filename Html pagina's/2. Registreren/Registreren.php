<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Registreren</title>

        <!-- Bootstrap core CSS -->
        <link href="../bootstrap-files/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../bootstrap-files/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../1. Home page/homepage.css" rel="stylesheet">

        

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../bootstrap-files/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="../bootstrap-files/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

    <!--navigatiebar-->
    <?php include("../navigationbar/navigation.php");
    ?>

        <div class="container">

            <form class="form-signin">
                <h2 class="form-signin-heading">Registreren</h2>
                <!-- Voornaam -->
                <label for="Voornaam" class="sr-only">Voornaam</label>
                <input type="text" id="Voornaam" class="form-control" placeholder="Voornaam" required> <br>
                <!-- Achternaam -->
                <label for="Achternaam" class="sr-only">Achternaam</label>
                <input type="text" id="Achternaam" class="form-control" placeholder="Achternaam" required autofocus> <br>
                <!-- Straatnaam -->
                <label for="Straatnaam" class="sr-only">Straatnaam</label>
                <input type="text" id="Straatnaam" class="form-control" placeholder="Straatnaam" required autofocus> <br>
                <!-- Huisnummer -->
                <label for="Huisnummer" class="sr-only">Huisnummer</label>
                <input type="text" id="Huisnummer" class="form-control" placeholder="Huisnummer" required autofocus> <br>
                <!-- Woonplaats -->
                <label for="Woonplaats" class="sr-only">Woonplaats</label>
                <input type="text" id="Woonplaats" class="form-control" placeholder="Woonplaats" required autofocus> <br>
                <!-- Email Adress -->
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus> <br>
                <!-- Wachtwoord -->
                <label for="Wachtwoord" class="sr-only">Wachtwoord</label>
                <input type="password" id="Huisnummer" class="form-control" placeholder="Wachtwoord" required autofocus> <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Registreren</button>
            </form>

        </div> <!-- /container -->



    <?php include("../navigationbar/Footer.php"); ?>
    </body>
</html>
