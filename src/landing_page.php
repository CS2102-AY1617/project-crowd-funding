<?php
	include "backend_api/config.php";
	include "backend_api/display_routes.php";
	$conn = initialise_pgsql_connection();
	if (!isset($_SESSION['user_email'])) {
		session_start();
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="SHIELD - Free Bootstrap 3 Theme">
		<meta name="author" content="Carlos Alvarez - Alvarez.is - blacktie.co">
		<link rel="shortcut icon" href="assets/ico/favicon.png">

		<title>DREAMFUNDER</title>
		<!-- Bootstrap core CSS -->
		<link href="assets/css/bootstrap.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="assets/css/main.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/icomoon.css">
		<link href="assets/css/animate-custom.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
		<link href="assets/css/full-slider.css" rel="stylesheet">
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
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item active">
			<img src="assets/img/bg/banner1.jpg" alt="...">
			<div class="carousel-caption">
				<h3>Dream With Us Today</h3>
				<br>
				<p><a class="btn btn-success" href="signup.php">SIGN UP</a></p>
			</div>
		</div>
		<div class="item">
			<img src="assets/img/bg/banner2.jpg" alt="...">
			<div class="carousel-caption">
				<h3> FEATURED THEME: Cultural Bazzar</h3>
			</div>
		</div>
		<div class="item">
			<img src="assets/img/bg/banner3.jpg" alt="...">
			<div class="carousel-caption">
				<h3>FEATURED PROJECT: Cat Life</h3>
				<br>
				<p><a href="project.php?id=1" class="btn btn-success">View Dream Detail</a></p>
			</div>
		</div>
	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
	</a>
	</div> <!-- Carousel -->

		<div id="greywrap">
			<div class="row">
				<div class="col-lg-4 callout">
					<h2> <img src="assets/img/logo.png" height=60px>Fund what you dream</h2>
					<p>Every DreamFunder project is the creation of someone like you. Support the dream creator who dreams the same dream as you.</p>
				</div><!-- col-lg-4 -->

				<div class="col-lg-4 callout">
					<h2><img src="assets/img/logo.png" height=60px>Dream what you want</h2>
					<p>You can be a dream creator. All dreamers are welcomed to share your dream, those who dream the same dream as you will support you. </p>
				</div><!-- col-lg-4 -->

				<div class="col-lg-4 callout">
					<h2><img src="assets/img/logo.png" height=60px>Start your dream here</h2>
					<p>We want to hear you dream, and we keen to help you to let other dreamers hear your dream!  </p>
				</div><!-- col-lg-4 -->
			</div><!-- row -->
		</div><!-- greywrap -->

		<div class="container" id="about" name="about">
			<div class="row white">
			<br>
				<h1 class="centered">A LITTLE DREAM ABOUT DREAMFUNDER</h1>
				<hr>
				<div class="col-lg-offset-2 col-lg-8">
					<p>We dream, and we love people who dream, and who are passionate just like you. We love, and we share our love for dream with everyone in DreamFunder. We have a dream, we dream that DreamFunder can be the harbour for everyone's dream. We welcome all dreams, be it big or tiny, we value them.</p>
				</div>
			</div><!-- row -->
		</div><!-- container -->

		<section class="section-divider textdivider divider1">
			<div class="container">
				<h1>YOUR DREAM DEPARTURE WITH US</h1>
			</div><!-- container -->
		</section><!-- section -->
		<br>

		<?php
			include "footer.php"
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
