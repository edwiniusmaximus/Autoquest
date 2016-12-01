<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/aanmelden/aanmelden.css">
        <meta charset="UTF-8">
        <title>Autoquest - aanmelden</title>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Aanmelden</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Home</a></li>
            <li><a href="registreren.php">Registreren</a></li>
            <li><a href="aanmelden.php">Aanmelden</a></li>
            <li><a href="#">Producten</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
        
    <div class="container">
      <form class="form-signin">
        <h2 class="form-signin-heading">Aanmelden</h2>
          <!-- Email Adress -->
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus> <br>
          <!-- Voornaam -->
        <label for="Wachtwoord" class="sr-only">Wachtwoord</label>
        <input type="password" id="Wachtwoord" class="form-control" placeholder="Wachtwoord" required> <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
      </form>
</div> <!-- /container -->
    </body>
</html>
