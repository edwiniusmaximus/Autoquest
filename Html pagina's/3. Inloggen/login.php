<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inloggen</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Algemeen/css/main.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../bootstrap-files/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="../bootstrap-files/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
    <body>


        <!-- navigation bar -->
        <?php include("../navigationbar/navigation.php"); ?>

        <!-- login script -->
        <?php
        start_secure_session();

        function start_secure_session() {
            session_name("wikel-app-session");
            // Forces sessions to only use cookies.
            if (ini_set('session.use_only_cookies', 1) === FALSE) {
                header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
                exit();
            }
            // Gets current cookies params.
            $cookieParams = session_get_cookie_params();
            // to set secure to TRUE you need to setup https
            $secure = FALSE;
            session_set_cookie_params(
                    $cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, TRUE
            );
            session_start();
            //session_regenerate_id(true);
        }

        if (!is_logged_in()) {

            //login box & register button
            print "<div class='container'>"
                    ."<div class='row myrow'>"
                    ."<div class='col-md-6'>"
                    . "<form class='form-signin' method=POST>"
                    . "<h2 class='form-signin-heading'>Login</h2>"
                    // Email adres
                    . " <label for=\"Emailadres\" class=\"sr-only\">Emailadres</label>
                        <input type=\"email\" id=\"Emailadres\" class=\"form-control\" placeholder=\"Emailadres\" required> <br>"
                    //Wachtwoord
                    . "<label for=\"Wachtwoord\" class=\"sr-only\">Wachtwoord</label>
                        <input type=\"password\" id=\"wachtwoord\" class=\"form-control\" placeholder=\"Wachtwoord\" required autofocus> <br>"
                    ."<button id=\"RegisButton\" class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Inloggen</button>"
                    . "</form>"
                    ."</div>"
                    ."<div class='col-md-6'>"
                    . "<form class='login-register' action='#'>"
                    . "    <h2>Nog geen account?</h2>"
                    ."<a href=\"../Registreren/registreren.php\" class=\"btn btn-lg btn-primary btn-block\" id=\"RegisButton\" role=\"button\">Registreren</a>"
                    . "</form>"
                    ."</div>"
                    ."</div>"
                    ."</div>";
            //footer
        include("../navigationbar/Footer.php");
            exit();
        };

//login functies
        function is_logged_in() {
            if (isset($_SESSION["emailadres"])) {
                return TRUE;
            } else {
                if (isset($_POST['emailadres'])) {
                    if ($_POST['emailadres'] == "admin" && $_POST['wachtwoord'] == "wachtwoord") {
                        $_SESSION["emailadres"] = $_POST["emailadres"];
                        return TRUE;
                    } else {
                        return FALSE;
                    }
                } else {
                    return FALSE;
                }
            }
        }

        function get_current_username() {
            if (is_logged_in()) {
                return $_SESSION['emailadres'];
            } else {
                if (isset($_POST['emailadres'])) {
                    if ($_POST['emailadres'] == "admin" && $_POST['wachtwoord'] == "wachtwoord") {
                        $_SESSION['emailadres'] == $_POST['emailadres'];
                        return $_SESSION['emailadres'];
                    } else {
                        return FALSE;
                    }
                }
            }
        }
        ?>



    </body>
</html>
