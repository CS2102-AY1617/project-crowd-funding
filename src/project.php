<?php
    include "backend_api/config.php";
    include "backend_api/display_routes.php";

    $conn = initialise_pgsql_connection();

    $project_id = $_GET['id'];
    $project_data = get_project_by_id($conn, $project_id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SHIELD - Free Bootstrap 3 Theme">
    <meta name="author" content="Carlos Alvarez - Alvarez.is - blacktie.co">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title> CS2102 </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link href="assets/css/animate-custom.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    <style>
        .search {
            background-color:transparent !important;
            border:none !important;
            outline: none;
            color: white;
        }
    </style>
    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/modernizr.custom.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body data-spy="scroll" data-offset="0" data-target="#navbar-main">
<?php
include "header.php";
?>

<!-- ==== SECTION DIVIDER3 -->
<section class="section-divider textdivider divider3">
    <div class="container">
        <h1>
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Fund This Project
            </button>
        </h1>
        <hr>
    </div><!-- container -->
</section><!-- section -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <form action="">
                    

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- ==== PORTFOLIO ==== -->
<div class="container">


</div>
<div class="container" style="padding-top:20px;padding-bottom: 20px">

    <div class="row">
        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->

            <!-- Title -->
            <h1><?php echo $project_data['title'] ?></h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#"><?php echo $project_data['owner'] ?></a>
            </p>


            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Created on <?php echo date("jS F Y", strtotime($project_data['start_date'])); ?> </p>


            <!-- Preview Image -->
            <?php
                $imageurl = $project_data['imageurl'];
                if ($imageurl) {
                    echo '<img class="img-responsive" src="'.$imageurl.'" alt="">';

                }
            ?>

            <p class="lead" style="padding-top:50px">
                <?php echo $project_data['description'] ?>

            </p>



            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">




            <!-- Blog Categories Well -->


            <!-- Side Widget Well -->
            <div class="well">
                <h4>Summary</h4>
                <div>
                    <p>Number of Unique Backers: 10 <br> Progress: 87%</p>
                </div>

            </div>
            <div class="well">
                <h4>Backers Comment</h4>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                            <?php
                                echo display_comment($conn, $project_id);
                            ?>
                    </div>
                </div>
                <!-- /.row -->
            </div>

        </div>

    </div>
</div>

<!-- ==== BLOG ==== -->

<?php
include "footer.php";
?>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/retina.js"></script>
<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="assets/js/smoothscroll.js"></script>
<script type="text/javascript" src="assets/js/jquery-func.js"></script>
</body>
</html>
