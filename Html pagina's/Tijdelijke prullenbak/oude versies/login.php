<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Autoquest - Login</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <!-- Custom styles for this template -->
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <!-- navigation bar -->
        <?php include 'include/navbar.php'; ?>

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

            //login box
            print "<FORM method=POST>"
                    . "<div class='login-container'>"
                    . "<h2 class'login-login-header'>inloggen</h2><br>"
                    . "<form class'login-form-login' action='#'>"
                    //Input email Adress
                    . "<label for='inputEmail' class='sr-only'>Email address</label>"
                    . "<input type='email' id='inputEmail' class='form-control' placeholder='Email address' required autofocus name='emailadres'> <br>"
                    //Input wachtwoord
                    . "<label for='Wachtwoord' class='sr-only'>Wachtwoord</label>"
                    . "<input type='password' id='Wachtwoord' class='form-control' placeholder='Wachtwoord' required name='wachtwoord'> <br>"
                    //Login button
                    . "<button class='btn btn-lg btn-primary btn-block' type='submit'>Log in</button><a href='#'>Wachtwoord vergeten?</a>"
                    . "</form>"
                    . "<div class='login-border'>"
                    . "</div>"
                    . "<div class='login-register-header'>"
                    . "<h2 class='login-header'>Nog geen account?</h2><br>"
                    //Register button
                    . "<form class='login-form-register' action='#'>"
                    . "<button class='btn btn-lg btn-primary btn-block' type='submit'>Registreren</button>"
                    . "</form>"
                    . "</div>"
                    . "</div>";
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
        <!-- footer -->
        <?php include 'include/footer.php'; ?>
    </body>
</html>
