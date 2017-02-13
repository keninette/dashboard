<!-- require db connection, dashboard model and controller-->
<?php 
    require_once 'queries_dashboard.php';    
    require_once 'dashboard_model.php';    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Arnaud Charron">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/dashboard.css" rel="stylesheet">
        <link rel="stylesheet" href="../vendor/font-awesome-4.7.0/css/font-awesome.min.css">
        <title>Tableau de bord - FrancePieces</title>
    </head>

    <body>
        <section class="row" id="menu">État du site france-pieces</section>
        
        <section class="row">
            <!-- pending jobs -->
            <section id="jobQueue" class="col-lg-2 col-lg-offset-1 col-sm-6 charts">
                <input id="jobQueue-chart" class="input-chart" data-max="100"></input>
                <p id="jobQueue-title" class="input-title">Pending jobs</p>
            </section>
        
            <!-- remaining articles to be indexed -->
            <section id="toBeIndexed" class="col-lg-2 col-lg-offset-1 col-sm-6 charts">
                <input id="toBeIndexed-chart" class="input-chart" data-max="100"></input>
                <p id="toBeIndexed-title" class="input-title">Articles already indexed</p>
            </section>
        
            <!-- remaining articles to be indexed with corresponding products -->
            <section id="toBeIndexedWithProducts" class="col-lg-2 col-lg-offset-1 col-sm-6 charts">
                <input id="toBeIndexedWithProducts-chart" class="input-chart" data-max="100"></input>
                <p id="toBeIndexedWithProducts-title" class="input-title">Articles already indexed with products</p>
            </section>
        </section>
        
    </body>
    
    <!-- Import des scripts jquery et boostrap -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/function.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../vendor/jQuery-Knob-master/js/jquery.knob.js"></script>
    <script src="../js/dashboard.js"></script>
</html>

    
