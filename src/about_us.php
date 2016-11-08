<?php

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

        <title> CS2102</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/main.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/icomoon.css">
        <link href="assets/css/animate-custom.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

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
            <h1>About Us and This Website</h1>
            <hr>
            <p>This website is designed based on the CS2102 Project Requirement.</p>
            <p>Special thanks to the original author of this bootstrap template, BlackTie.co</p>
            <p>Who made our life easier.</p>
            <br>
        </div><!-- container -->
    </section><!-- section -->

    <!-- ==== BLOG ==== -->
    <div class="container" id="team" name="team">
        <br>
        <div class="row white centered">
            <h1 class="centered">MEET OUR AWESOME TEAM</h1>
            <hr>
            <br>
            <br>
            <div style="width:20%;float:left" class="centered">
                <img class="img img-circle" src="assets/img/team/team01.jpg" height="120px" width="120px" alt="">
                <br>
                <h4><b>Mike Arney</b></h4>
                <a href="#" class="icon icon-twitter"></a>
                <a href="#" class="icon icon-facebook"></a>
                <a href="#" class="icon icon-flickr"></a>
                <p>Mike combines an expert technical knowledge with a real eye for design. Working with clients from a wide range of industries, he fully understands client objectives when working on a project, large or small.</p>
            </div><!-- col-lg-3 -->
            <div style="width:20%;float:left" class="centered">
                <img class="img img-circle" src="assets/img/team/team01.jpg" height="120px" width="120px" alt="">
                <br>
                <h4><b>Mike Arney</b></h4>
                <a href="#" class="icon icon-twitter"></a>
                <a href="#" class="icon icon-facebook"></a>
                <a href="#" class="icon icon-flickr"></a>
                <p>Mike combines an expert technical knowledge with a real eye for design. Working with clients from a wide range of industries, he fully understands client objectives when working on a project, large or small.</p>
            </div><!-- col-lg-3 -->
            <div style="width:20%;float:left" class="centered">
                <img class="img img-circle" src="assets/img/team/team01.jpg" height="120px" width="120px" alt="">
                <br>
                <h4><b>Mike Arney</b></h4>
                <a href="#" class="icon icon-twitter"></a>
                <a href="#" class="icon icon-facebook"></a>
                <a href="#" class="icon icon-flickr"></a>
                <p>Mike combines an expert technical knowledge with a real eye for design. Working with clients from a wide range of industries, he fully understands client objectives when working on a project, large or small.</p>
            </div><!-- col-lg-3 -->
            <div style="width:20%;float:left" class="centered">
                <img class="img img-circle" src="assets/img/team/team01.jpg" height="120px" width="120px" alt="">
                <br>
                <h4><b>Mike Arney</b></h4>
                <a href="#" class="icon icon-twitter"></a>
                <a href="#" class="icon icon-facebook"></a>
                <a href="#" class="icon icon-flickr"></a>
                <p>Mike combines an expert technical knowledge with a real eye for design. Working with clients from a wide range of industries, he fully understands client objectives when working on a project, large or small.</p>
            </div><!-- col-lg-3 -->
            <div style="width:20%;float:left" class="centered">
                <img class="img img-circle" src="assets/img/team/team01.jpg" height="120px" width="120px" alt="">
                <br>
                <h4><b>Mike Arney</b></h4>
                <a href="#" class="icon icon-twitter"></a>
                <a href="#" class="icon icon-facebook"></a>
                <a href="#" class="icon icon-flickr"></a>
                <p>Mike combines an expert technical knowledge with a real eye for design. Working with clients from a wide range of industries, he fully understands client objectives when working on a project, large or small.</p>
            </div><!-- col-lg-3 -->


        </div><!-- row -->

    </div><!-- container -->

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
