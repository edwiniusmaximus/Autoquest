<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/aanmelden/aanmelden.css">
        <meta charset="UTF-8">
        <title>Autoquest - inloggen</title>
    </head>
    <body>
        <!-- navigation bar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Inloggen</a>
                </div>
                <!-- navigation bar - links -->
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="registreren.php">Registreren</a></li>
                        <li><a href="aanmelden.php">Aanmelden</a></li>
                        <li><a href="#">Producten</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <!-- navigation bar - search -->
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav>
        <!-- login box -->
        <div class="container">
            <form class="form-signin">
                <h2 class="form-signin-heading">inloggen</h2><br>
                <!-- Email Adress -->
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus> <br>
                <!-- Voornaam -->
                <label for="Wachtwoord" class="sr-only">Wachtwoord</label>
                <input type="password" id="Wachtwoord" class="form-control" placeholder="Wachtwoord" required> <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button><a href="#">Wachtwoord vergeten?</a>
            </form>
            <div class="signin-border">
            </div>
            <div class="signin-register">
                <h2 class="form-signin-heading">Nog geen account?</h2><br>
                <form action="registreren.php">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Registreren</button>
                </form>
            </div>
        </div> 
    </body>
</html>
