<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link href="../bootstrap-files/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">


    </head>
    <body>

        <?php
// database include
        include 'database.php';

// navbar include
        include("../navigationbar/navigation.php");
        
        $query = "SELECT * FROM product";
        
        if (isset($_GET['submit'])) {
            if ($_GET['zoek'] != '') {
                $temp_zoek = $_GET['zoek'];
                $query = "SELECT * FROM product WHERE naam = '%" . trim($temp_zoek) . "%' OR omschrijving = '%" . trim($temp_zoek) . "%'";
            }
            if ($_GET['merk'] != '-') {
                $temp_merk = $_GET['merk'];
                $query = "SELECT * FROM product WHERE merk = '" . trim($temp_merk) . "'";
            } if ($_GET['bouwjaar'] != '-') {
                $temp_bouwjaar = $_GET['bouwjaar'];
                $query = "SELECT * FROM product WHERE bouwjaar = '" . trim($temp_bouwjaar) . "'";
            } if ($_GET['onderdeel'] != '-') {
                $temp_categorie = $_GET['onderdeel'];
                $query = "SELECT * FROM product WHERE categorienaam = '" . trim($temp_categorie) . "'";
            }
            if ($_GET['merk'] != '-' && $_GET['bouwjaar'] != '-') {
                $query = "SELECT * FROM product WHERE merk = '" . trim($temp_merk) . "' AND bouwjaar = '" . trim($temp_bouwjaar) . "'";
            }
            if ($_GET['merk'] != '-' && $_GET['onderdeel'] != '-') {
                $query = "SELECT * FROM product WHERE merk = '" . trim($temp_merk) . "' AND categorienaam = '" . trim($temp_categorie) . "'";
            }
            if ($_GET['bouwjaar'] != '-' && $_GET['onderdeel'] != '-') {
                $query = "SELECT * FROM product WHERE bouwjaar = '" . trim($temp_bouwjaar) . "' AND categorienaam = '" . trim ($temp_categorie) . "'";
            }
            
            
            
        }
           
        $stmt = $pdo->prepare($query);

        $stmt->execute();
        ?>

        <div class="aanbod-wrapper" class="cod-md-3">
            <div class="aanbod-sidebar-wrapper">
                <ul class="aanbod-sidebar-nav">
                    <li class="aanbod-filter-title"><h4>Filter uw resultaten</h4></li>
                    <li>
                        <form method="get" action="aanbodpagina.php" class="aanbod-form-search"> Zoek:<br>
                            <input type="text" class="form-control" name="zoek" value="Zoeken">
                            <Br>
                            </li>
                            <li class="aanbod-dropdown-merk"> Automerk:<Br>
                                <select name="merk">
                                    <?php
                                    $stmt1 = $pdo->prepare("SELECT distinct merk FROM product");
                                    $stmt1->execute();

                                    print "<option>" . "-" . "</option>";
                                    while ($row = $stmt1->fetch()) {
                                        $merk = $row["merk"];
                                        print "<option value= ' " . $row['merk'] . " '>" . $row['merk'] . "</option>";
                                    }
                                    ?>
                                </select></li> <br>
                            <li class="aanbod-dropdown-bouwjaar"> Bouwjaar:<Br>
                                <select name="bouwjaar">
                                    <?php
                                    $stmt2 = $pdo->prepare("SELECT distinct bouwjaar FROM product");
                                    $stmt2->execute();

                                    print "<option>" . "-" . "</option>";
                                    while ($row = $stmt2->fetch()) {
                                        $bouwjaar = $row["bouwjaar"];
                                        print "<option value= ' " . $row['bouwjaar'] . " '>" . $row['bouwjaar'] . "</option>";
                                    }
                                    ?></select></li> <br>
                            <li class="aanbod-dropdown-onderdeel"> Type onderdeel:<Br>
                                <select name="onderdeel">
                                    <?php
                                    $stmt3 = $pdo->prepare("SELECT distinct categorienaam FROM product");
                                    $stmt3->execute();

                                    print "<option>" . "-" . "</option>";
                                    while ($row = $stmt3->fetch()) {
                                        $merk = $row["categorienaam"];
                                        print "<option value= ' " . $row['categorienaam'] . " '>" . $row['categorienaam'] . "</option>";
                                    }
                                    ?></select></li> <br>
                            <li> 
                                <input class="aanbod-search-button" type="submit" name='submit' value="Zoeken">
                        </form>
                    </li>
                </ul>
            </div>
            <div class="container">
                <table class="col-md-9">
                    <tr>
                        <th class="col-md-2">Foto</th>
                        <th class="col-md-7">Productnaam</th>
                        <th class="col-md-2">Prijs</th>
                    </tr>
                    <?php
                    while ($row = $stmt->fetch()) {
                        $productnummer = $row["productnummer"];
                        $naam = $row["naam"];
                        $prijs = $row["prijs"];
                        echo "<tr class=\"aanbod-table-data\">";
                        echo "<td class=\"col-md-2\">Voeg foto in.</td>";
                        echo "<td class=\"col-md-7\"><a href=itempage.php?rowid=$productnummer>" . $naam . "</a></td>";
                        echo "<td class=\"aanbod-prijs\">" . $prijs . " EURO" . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>

        <?php include("../navigationbar/Footer.php"); ?>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="css/https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="css/js/bootstrap.min.js"></script>
    </body>
</html>