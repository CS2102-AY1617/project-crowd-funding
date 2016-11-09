<?php
    include "backend_api/config.php";
    include "backend_api/display_routes.php";

    $conn = initialise_pgsql_connection();
    session_start();

    if (!isset($_SESSION['user_email'])) {
        $mode = 'offline';
    } else {
        $mode = 'online';
    }

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
            <input class="search" type="text" value="Are You Interested?">
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
                <h4 class="modal-title" id="myModalLabel">Fund This Project</h4>
            </div>
            <div class="modal-body">
                <form onsubmit="return validate_fund()" method="post" name="fundform" action="backend_api/form_controller.php?type=fund&project_id=<?php echo $project_id; ?>" >
                    <div>
                        Amount Remaining: $<?php echo display_project_progress($conn, $project_id); ?> <br>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="title">Amount of Money</label>
                        <input type="text" class="form-control" name="fund" placeholder="Enter your amount">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Confirm</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="container" style="padding-top:20px;padding-bottom: 20px">
    <div class="row">
        <!-- Blog Post Content Column -->
        <div class="col-lg-8">
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
                if ($project_data['imageurl'] != null || $project_data['imageurl'] == "") {
                    $imageurl = $project_data['imageurl'];
                    echo '<img class="img-responsive" src="'.$imageurl.'" alt="">';
                }

            ?>
            <p class="lead" style="padding-top:50px">
                <?php echo $project_data['description'] ?>
            </p>
            <!-- Blog Comments -->
            <!-- Comments Form -->

                <?php
                if ($mode == 'online') {
                    echo '<div class="well">
                        <h4>Leave a Comment:</h4>
                          <form onsubmit="return validate_comment();" method="post" name="commentform" action="backend_api/form_controller.php?type=comment&project_id='. $project_id .'">
                            <div class="form-group" >
                                <textarea class="form-control" rows="3" name="comment"></textarea>
                            </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form></div>
                            ';
                }
                ?>

            <hr>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">
            <!-- Blog Categories Well -->
            <!-- Side Widget Well -->
            <div class="well">
                <h4>Summary</h4>
                <div>
                    <p>
                        Number of Unique Backers:
                        <?php
                            $num = display_unique_backers($conn, $project_id);
                        if ($num == null) {
                            echo 0;
                        } else {
                            echo display_unique_backers($conn, $project_id);
                        }

                         ?> <br>
                        Amount Remaining: $<?php echo display_project_progress($conn, $project_id); ?> <br>
                    </p>
                </div>
                <div style="text-align:center">
                    <?php
                        if ($mode == 'online') {
                            if (display_project_progress($conn, $project_id) == '0') {
                                echo '
                                <button type="button" class="btn btn-primary btn-lg">
                                    Project is Completed!
                                </button>
                            ';
                            } else {
                                echo '
                                <button  type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                    Fund This Project
                                </button>
                            ';
                            }

                        } else if ($mode == 'offline') {
                            echo '
                                <button onclick="location.href=\'login.php\'" type="button" class="btn btn-primary btn-lg">
                                    Please Sign In First to Fund
                                </button>
                            ';
                        }
                    ?>

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
<!-- BEGIN SWEETALERT PLUGIN AND SCRIPT -->
<script src="assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/js/sweetalert.css">
<script>
    function validate_fund()
    {
        if( document.fundform.fund.value == "" ) {
            swal("Oops...", "Please enter a valid dollar amount", "error");
            document.fundform.fund.focus() ;
            return false;
        }

        if( document.fundform.fund.value > <?php echo display_project_progress($conn, $project_id) ?> ) {
            swal("Oops...", "Please enter an amount smaller than the remaining goal", "error");
            document.fundform.fund.focus() ;
            return false;
        }

        return true ;
    }
    function validate_comment()
    {
        if( document.commentform.comment.value == "" ) {
            swal("Oops...", "If you want to comment, say something please.", "error");
            document.commentform.comment.focus() ;
            return false;
        }

        return true ;
    }
</script>
<!-- END SWEETALERT PLUGIN AND SCRIPT -->
</body>
</html>
