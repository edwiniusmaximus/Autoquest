<!-- 
    MIT License

    Copyright (c) 2016 Cor van Dokkum

    see LICENSE file for more information
-->
<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Panel</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/main.css" rel="stylesheet">

    </head>
    <body>
        <?php
        //database connectie
        include("include/database.php");

        //cookies
        include("include/cookies.php");

        //adminpanel navbar
        include("include/navigation.php");

        //print "<tr>";
        //if (isset($_SESSION['emailadres'])) {
        //    print "<td>Emailadres:</td>";
        //    print "<td>" . $_SESSION['emailadres'] . "</td";
        //} else {
        //    print"<li>login om deze pagina te weergeven.</li>";
        //}
        ?>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                    <div class="panel-body">
                        <div class="row">
                            <div class=" col-md-9 col-lg-9 "> 
                                <table class="table table-user-information">
                                    <tbody>
                                        <?php
                                        $sql = 'select * from klant order by emailadres';
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->setFetchMode(PDO::FETCH_ASSOC); //allows you to refer to them by column name rather than by number
                                        $stmt->execute();
                                        
                                        while ($row = $stmt->fetch()) {
                                        $emailadres = $row["emailadres"];
                                        $fwoonplaats = $row["f_woonplaats"];
                                        $fstraatnaam = $row["f_straatnaam"];
                                        $fhuisnummer = $row["f_huisnummer"];
                                        $fpostcode = $row["f_postcode"];
                                        $bedrijfsnaam = $row["bedrijfsnaam"];
                                        $bwoonplaats = $row["b_woonplaats"];
                                        $bstraatnaam = $row["b_straatnaam"];
                                        $bhuisnummer = $row["b_huisnummer"];
                                        $bpostcode = $row["b_postcode"];
                                        $telefoonnummer = $row["telefoonnummer"];
                                        
                                        print "<form method='POST'>";
                                        print "<tr><h3>Gebruikers profiel:</h3></tr>";
                                        print "<tr>";
                                        print "<td>Emailadres:</td>";
                                        print "<td>" . $_SESSION['emailadres'] . "</td>";
                                        print "</tr>";
                                        print "<tr>";
                                        print "<td>Woonplaats:</td>";
                                        print "<td>" . "<input type='text' name='f_woonplaats' value='$fwoonplaats'</input>" . "</td>";
                                        print "</tr>";
                                        print "<tr>";
                                        print "<td>Straatnaam:</td>";
                                        print "<td>" . "<input type='text' name='f_straatnaam' value='$fstraatnaam'</input>" . "</td>";
                                        print "</tr>";
                                        print "<tr>";
                                        print "<td>Huisnummer:</td>";
                                        print "<td>" . "<input type='text' name='f_huisnummer' value='$fhuisnummer'</input>" . "</td>";
                                        print "</tr>";
                                        print "<tr>";
                                        print "<td>Postcode:</td>";
                                        print "<td>" . "<input type='text' name='f_postcode' value='$fpostcode'</input>" . "</td>";
                                        print "</tr>";
                                        print "<tr><td><h3>Bedrijf:</h3></td><td></td></tr>";
                                        print "<tr>";
                                        print "<td>Bedrijfsnaam:</td>";
                                        print "<td>" . "<input type='text' name='bedrijfsnaam' value='$bedrijfsnaam'</input>" . "</td>";
                                        print "</tr>";
                                        print "<tr>";
                                        print "<td>Woonplaats:</td>";
                                        print "<td>" . "<input type='text' name='b_woonplaats' value='$bwoonplaats'</input>" . "</td>";
                                        print "</tr>";
                                        print "<tr>";
                                        print "<td>Straatnaam:</td>";
                                        print "<td>" . "<input type='text' name='b_straatnaam' value='$bstraatnaam'</input>" . "</td>";
                                        print "</tr>";
                                        print "<tr>";
                                        print "<td>Huisnummer:</td>";
                                        print "<td>" . "<input type='text' name='b_huisnummer' value='$bhuisnummer'</input>" . "</td>";
                                        print "</tr>";
                                        print "<tr>";
                                        print "<td>Postcode:</td>";
                                        print "<td>" . "<input type='text' name='b_postcode' value='$bpostcode'</input>" . "</td>";
                                        print "</tr>";
                                        print "<tr>";
                                        print "<td>Telefoonnummer:</td>";
                                        print "<td>" . "<input type='text' name='telefoonnummer' value='$telefoonnummer'" . "</td>";
                                        print "</tr>";
                                        print "<td></td>";
                                        print "<td>" . "<input type='submit' class='btn btn-primary' value='update' name='update'></input>" . "</td>";
                                        print "</tr>";
                                        print "</form>";
                                        }
                                        if (isset($_POST['update'])) {
                                        // update emailadres, bedrijfsnaam, woonplaats, straatnaam, huisnummer, postcode, bwoonplaats, bstraatnaam, bhuisnummer, bpostcode, telefoonnummer.
                                        $stmt = $pdo->prepare("UPDATE klant set  emailadres = ?, bedrijfsnaam = ?, f_woonplaats = ?, f_straatnaam = ?, f_huisnummer = ?, f_postcode = ?, b_woonplaats = ?, b_straatnaam = ?, b_huisnummer = ?, b_postcode = ?, telefoonnummer = ? WHERE emailadres = ?");
                                        // vraag alle klanten waar de searchstring in voorkomt
                                        $stmt->execute([$_POST['emailadres'], $_POST['bedrijfsnaam'], $_POST['f_woonplaats'], $_POST['f_straatnaam'], $_POST['f_huisnummer'], $_POST['f_postcode'], $_POST['b_woonplaats'], $_POST['b_straatnaam'], $_POST['b_huisnummer'], $_POST['b_postcode'], $_POST['telefoonnummer'], $_POST['emailadres']]);
                                        }                              
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
//footer
//include("include/footer.php");
?>
</body>
</html>


