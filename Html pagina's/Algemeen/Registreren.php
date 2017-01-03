<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Registreren</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/main.css" rel="stylesheet">

        

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../bootstrap-files/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="../bootstrap-files/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
    <?php
    
    include 'include/database.php';
    $regist_array   = [];
    $errors         = [];
    $error_count    = 0;
    
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
          
		$email = ($_POST['emailadres']);
		$first_name = ($_POST['voornaam']);
		$last_name = ($_POST['achternaam']);
		$passw = ($_POST['wachtwoord']);
		$pass_rep = ($_POST['wachtwoord2']);
                $rechten = 1;

		$query = $pdo->prepare("SELECT emailadres FROM account WHERE emailadres = :emailadres");
		$query->execute(array(':emailadres' => $email));
		$result = $query->fetchAll(PDO::FETCH_OBJ);

		if (count($result)) { // Controleer het email adres
			$errors[] = 'Dit e-mailadres is al in gebruik.';
			$error_count = 1;
		} 
			elseif (empty($first_name)) {
				$errors[] = 'Vul a.u.b. uw voornaam in.';
				$error_count = 1;
			}
			elseif (empty($last_name)) {
				$errors[] = 'Vul a.u.b. uw achternaam in.';
				$error_count = 1;
			}
			elseif (empty($email)) {
				$errors[] = 'Vul a.u.b. uw e-mailadres in.';
				$error_count = 1;
			}
			elseif (empty($passw)) {
				$errors[] = 'Vul a.u.b. een wachtwoord in.';
				$error_count = 1;
			}
			elseif (empty($pass_rep)) {
				$errors[] = 'Herhaal a.u.b. uw wachtwoord.';
				$error_count = 1;
			}
		
		elseif (!ctype_alpha(str_replace(array(' ', "'", '-'), '', $first_name)) && !empty($first_name)) { // voornaam validator.
			$errors[] = 'Uw voornaam is niet geldig.';
			$error_count = 1;
			$first_name = '';
		}
		elseif (!ctype_alpha(str_replace(array(' ', "'", '-'), '', $last_name)) && !empty($first_name)) { // achternaam validator.
			$errors[] = 'Uw achternaam is niet geldig.';
			$error_count = 1;
			$last_name = '';
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Email validator.
			$errors[] = 'Uw e-mailadres is niet geldig.';
			$error_count = 1;
			$email = '';
		}
		elseif (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', $passw) && !empty($passw) && !empty($pass_rep)) { // Pass validator.
			$errors[] = 'Uw wachtwoord moet minimaal 1 teken en 1 nummer bevatten, tussen de 8 en 20 tekens lang zijn en mag alleen deze !@#$% speciale tekens bevatten.';
			$error_count = 1;
		}
		elseif ($passw != $pass_rep) { // vergelijk passwords.
			$errors[] = 'De wachtwoorden komen niet overeen.';
			$error_count = 1;
		}
              
		else{
                        $regist_array[0] = $_POST['voornaam'];
                        $regist_array[1] = $_POST['achternaam'];
                        $regist_array[2] = $_POST['emailadres'];
                        $regist_array[3] = $_POST['wachtwoord'];
                        $regist_array[4] = 1;
                        
			$query = "INSERT INTO account (voornaam, achternaam, emailadres, wachtwoord, rechten) VALUES (?, ?, ?, ?, ?)";
			$stmt = $pdo->prepare($query);
			$stmt->execute($regist_array);
                        print "U bent geregistreerd!";
		}
            
            
	}
        
	?>


    <!--navigatiebar-->
    <?php include("include/navigation.php"); ?>

        <div class="container">
			<?php
			if($error_count > 0) {
				echo '<div class="alert alert-error"><span>ERROR</span><ul class="no-padding">';
				foreach ($errors as $error) {
					echo '<li>'.$error.'</li>';
				}
				echo '</ul></div>';
			}
			?>
            <form class="form-signin" method="post" action="Registreren.php">
                <h2 class="form-signin-heading">Registreren</h2>
                        <!-- Voorletters -->
                        <label for="Emailadres" class="sr-only">Emailadres</label>
                        <input name="emailadres" type="email" id="emailadres" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Emailadres" required><?= (isset($email))? $email:'' ?> <br>
                        <!-- Voornaam -->
                        <label for="Voornaam" class="sr-only">Voornaam</label>
                        <input name="voornaam" type="text" id="voornaam" class="form-control" placeholder="Voornaam" required><?= (isset($first_name))? $first_name:'' ?> <br>
                        <!-- Achternaam -->
                        <label for="Achternaam" class="sr-only">Achternaam</label>
                        <input name="achternaam" type="text" id="achternaam" class="form-control" placeholder="Achternaam" required autofocus><?= (isset($last_name))? $last_name:'' ?> <br>
                        <!-- Wachtwoord -->
                        <label for="Wachtwoord" class="sr-only">Wachtwoord</label>
                        <input name="wachtwoord" type="password" id="wachtwoord" class="form-control" placeholder="Wachtwoord" required autofocus><?= (isset($passw))? $passw:'' ?> <br>
                        <!-- Wachtwoord -->
                        <label for="Wachtwoord2" class="sr-only">Verifieer Wachtwoord</label>
                        <input name="wachtwoord2" type="password" id="wachtwoord2" class="form-control" placeholder="Verifieer wachtwoord" required autofocus><?= (isset($pass_rep))? $pass_rep:'' ?> <br>
                        <!-- Button Registreren -->
                        <button id="RegisButton" class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Registreren</button>
            </form>
        </div>


    <?php include("include/Footer.php"); ?>
    </body>
</html>