
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
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../css/main.css" rel="stylesheet">

    </head>
    <body>
        <?php
        //database connectie
        include("../include/database.php");

        //cookies
        include("../include/cookies.php");

        //adminpanel navbar
        include("../include/apanelnav.php");
        ?>
        <div class="klanten-container">
            <table class="klanten-overview">
                <tr>
                    <th>Productnummer</th>
                    <th>Naam</th>
                    <th>Categorie</th>
                    <th>Omschrijving</th>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Bouwjaar</th>
                    <th>Formule</th>
                    <th>Gewicht</th>
                    <th>Prijs</th>
                    <th>Toevoegen</th>
                    <th>Opslaan</th>
                    <th>Delete</th>
                </tr>
                <?php
                $query = "select * from Product order by productnummer asc";

                $stmt = $pdo->prepare($query);
                $stmt->execute();

                while ($row = $stmt->fetch()) {
                    $productnummer = $row["productnummer"];
                    $naam = $row["naam"];
                    $categorienaam = $row["categorienaam"];
                    $omschrijving = $row["omschrijving"];
                    $merk = $row["merk"];
                    $type = $row["type"];
                    $bouwjaar = $row["bouwjaar"];
                    $formule = $row["formule"];
                    $geiwcht = $row["geiwcht"];
                    $prijs = $row["prijs"];
                    
                    print "<form method='POST'>";
                    print "<tr>";
                    print "<td>" . "<input type='text' name='productnummer' value='$productnummer'</input>" . "</td>";
                    print "<td>" . "<input type='text' name='naam' value='$naam'</input>" . "</td>";
                    print "<td>" . "<input type='text' name='categorienaam' value='$categorienaam'</input>" . "</td>";
                    print "<td>" . "<input type='text' name='omschrijving' value='$omschrijving'</input>" . "</td>";
                    print "<td>" . "<input type='text' name='merk' value='$merk'</input>" . "</td>";
                    print "<td>" . "<input type='text' name='type' value='$type'</input>" . "</td>";
                    print "<td>" . "<input type='text' name='bouwjaar' value='$bouwjaar'</input>" . "</td>";
                    print "<td>" . "<input type='text' name='formule' value='$formule'</input>" . "</td>";
                    print "<td>" . "<input type='text' name='geiwcht' value='$geiwcht'</input>" . "</td>";
                    print "<td>" . "<input type='text' name='prijs' value='$prijs'</input>" . "</td>";
                    print "<td>" . "<input type='submit' value='toevoegen' name='toevoegen'></input>" . "</td>";
                    print "<td>" . "<input type='submit' value='opslaan' name='opslaan'></input>" . "</td>";
                    print "<td>" . "<input type='submit' value='delete' name='delete'></input>" . "</td>";
                    print "</tr>";
                    print "</form>";
                }

                if (isset($_POST['toevoegen'])) {
                    $stmt = $pdo->prepare("INSERT INTO Product productnummer = ?, naam = ?, categorienaam = ?, omschrijving = ?, merk = ?, type = ?, bouwjaar = ?, formule = ?, geiwcht = ?, prijs = ? WHERE productnummer = ?");
                    $stmt->execute([$_POST['productnummer'], $_POST['naam'], $_POST['categorienaam'], $_POST['omschrijving'], $_POST['merk'], $_POST['type'], $_POST['formule'], $_POST['geiwcht'], $_POST['prijs'], $_POST['productnummer']]);
                }
                
                if (isset($_POST['opslaan'])) {
                    $stmt = $pdo->prepare("UPDATE Product set productnummer = ?, naam = ?, categorienaam = ?, omschrijving = ?, merk = ?, type = ?, bouwjaar = ?, formule = ?, geiwcht = ?, prijs = ? WHERE productnummer = ?");
                    $stmt->execute([$_POST['productnummer'], $_POST['naam'], $_POST['categorienaam'], $_POST['omschrijving'], $_POST['merk'], $_POST['type'], $_POST['formule'], $_POST['geiwcht'], $_POST['prijs'], $_POST['productnummer']]);
                }
                if (isset($_POST['delete'])) {
                    $stmt = $pdo->prepare("DELETE FROM Product WHERE productnummer = ?");
                    $stmt->execute([$_POST['productnummer']]);
                }
                //footer
                include("../include/footer.php");
                ?>
            </table>
        </div>
    </body>
</html>


