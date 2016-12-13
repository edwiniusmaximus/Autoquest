<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Autoquest - Login</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" type="text/css" href="../Tijdelijke%20prullenbak/css/bootstrap.css">
        <!-- Custom styles for this template -->
        <link href="../Tijdelijke%20prullenbak/css/main.css" rel="stylesheet">
    </head>
    <body>
        <!-- logo -->
        <?php include 'include/logo.php'; ?>

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

            //login box & register button
            print "<div class=login-box >"
                    . "<form class=login-form method=POST>"
                    . "<h2>Login</h2>"
                    . "   <LABEL>Email adres&nbsp;</LABEL><INPUT type='text' name='emailadres'><br>"
                    . "   <LABEL>Wachtwoord&nbsp;</LABEL><INPUT type='password' name='wachtwoord'><br>"
                    . "   <INPUT type=submit value='Login'>"
                    . "</form>"
                    . "<form class='login-register' action='#'>"
                    . "    <h2>Nog geen account?</h2>"
                    . "    <INPUT type=submit value='Register'>"
                    . "</form>"
                    . "</div>";
            //footer
            include 'include/footer.php';
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
