<?php
    include "backend_api/config.php";
    include "backend_api/utils.php";

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
            <input class="search" type="text" placeholder="Search">
        </h1>
        <hr>
        <p>Discover projects for you</p>
    </div><!-- container -->
</section><!-- section -->

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
                <p>L=um odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>
            <div class="well">
                <h4>Backers Comment</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-unstyled">
                            <li><a href="#">Art</a>
                            </li>
                            <li><a href="#">Culture</a>
                            </li>
                            <li><a href="#">Comics</a>
                            </li>
                            <li><a href="#">Design</a>
                            </li>
                            <li><a href="#">Fashion</a>
                            </li>
                            <li><a href="#">Film</a>
                            </li>
                        </ul>
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
