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
    <link href="homepage.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="../bootstrap-files/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="../bootstrap-files/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!--navigatiebar-->
<?php include("../navigationbar/navigation.php");
?>

<!--header-->
<header>
    <section class="slider">
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example" data-slide-to="1"></li>
                <li data-target="#carousel-example" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="item active">
                    <a href="#"><img src="garage.jpg" /></a>

                </div>
                <div class="item">
                    <a href="#" class="picture"><img src="components.jpg"/></a>

                </div>
                <div class="item">
                    <a href="#"><img src="engine.jpg" /></a>

                </div>
            </div>

            <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>

    </section>
</header>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <h2>Waarom AutoQuest?</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                Aenean commodo ligula eget dolor. Aenean massa.
                Cum sociis natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus. Donec quam felis. Etiam rhoncus.
                Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                semper libero, sit amet adipiscing sem neque sed ipsum.
                Nam quam nunc, blandit vel</p>


        </div>
        <div class="col-md-4 col-lg-4">
            <h2>Auto-onderdelen</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                Aenean commodo ligula eget dolor. Aenean massa.
                Cum sociis natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus. Donec quam felis. Etiam rhoncus.
                Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                semper libero, sit amet adipiscing sem neque sed ipsum.
                Nam quam nunc, blandit ve</p>


        </div>
        <div class="col-md-4 col-lg-4">
            <h2>Waarom AutoQuest?</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                Aenean commodo ligula eget dolor. Aenean massa.
                Cum sociis natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus. Donec quam feli. Etiam rhoncus.
                Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                semper libero, sit amet adipiscing sem neque sed ipsum.
                Nam quam nunc, blandit ves</p>
        </div>
    </div>
</div>

<?php
include("../navigationbar/Footer.php");
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../bootstrap-files/jquery-3.1.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../bootstrap-files/bootstrap.min.js"></script>


</body>
</html>