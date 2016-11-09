<?php
include "backend_api/config.php";
include "backend_api/display_routes.php";

$conn = initialise_pgsql_connection();
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Bootstrap 3 Admin</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="assets/css/styles.css" rel="stylesheet">
	</head>
	<body>
<!-- header -->
<?php include "header.php" ?>
<!-- /Header -->

<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <ul class="nav nav-stacked" style="padding-top:75px">
                <li class="active"><a data-toggle="pill" href="#home"><i class="glyphicon glyphicon-user"></i>Home</a></li>
                <li><a data-toggle="pill" href="#creation"><i class="glyphicon glyphicon-user"></i> Creations </a>
                <li><a data-toggle="pill" href="#transaction"><i class="glyphicon glyphicon-flag"></i> Transactions</a></li>
                <li><a data-toggle="pill" href="#setting"><i class="glyphicon glyphicon-cog"></i> Setting</a></li>
            </ul>
            <hr>
            <ul class="nav nav-stacked">
                <li><a href="#">Active Days: 10</a></li>
                <li><a href="#">Custom Support</a></li>
                <li><a href="#">Upgrade User to Entrepreneur</a></li>
            </ul>


            <!-- Left column -->


        </div>
        <!-- /col-3 -->

        <div class="col-sm-10" style="padding-top:50px">
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="col-lg-12">
                        <h1 class="page-header">Home Tab</h1>
                    </div>
                </div>
                <div id="creation" class="tab-pane fade">
                    <div class="col-lg-12">
                        <h1 class="page-header">Projects people have participated</h1>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Project List
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <?php echo display_admin_projects($conn); ?>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
                <div id="transaction" class="tab-pane fade">
                    <div class="col-lg-12">
                        <h1 class="page-header">Projects people have participated</h1>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Project List
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <?php echo display_admin_transactions($conn); ?>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
                <div id="setting" class="tab-pane fade">
                    <div class="col-lg-12">
                        <h1 class="page-header">Admin Setting</h1>
                        <!-- /.panel -->
                    </div>
                </div>

            </div>

        </div>
</div>
<!-- /Main -->


<!-- /.modal -->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/scripts.js"></script>
	</body>
</html>