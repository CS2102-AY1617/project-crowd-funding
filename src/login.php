<?php
session_start();
if (isset($_SESSION['user_email'])) {
    header("Location: landing_page.php");
}


?>

<!DOCTYPE html>
<html>
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
    <style>

      .body-background{
        position: absolute;
        top: -20px;
        left: -20px;
        right: -40px;
        bottom: -40px;
        width: auto;
        height: auto;
        background-image: url('assets/img/login.jpg');
        background-size: cover;
        -webkit-filter: blur(5px);
        z-index: -1;
      }

      .login{
      	top: calc(50% - 75px);
        text-align: center;
      	width: 100%;
      	padding-top:10%;
      	z-index: 9999;

      }

      .login input[type=text]{
      	width: 250px;
      	height: 30px;
      	background: transparent;
      	border: 1px solid rgba(255,255,255,0.6);
      	border-radius: 2px;
      	color: #fff;
      	font-family: 'Exo', sans-serif;
      	font-size: 16px;
      	font-weight: 400;
      	padding: 4px;
      }

      .login input[type=password]{
      	width: 250px;
      	height: 30px;
      	background: transparent;
      	border: 1px solid rgba(255,255,255,0.6);
      	border-radius: 2px;
      	color: #fff;
      	font-family: 'Exo', sans-serif;
      	font-size: 16px;
      	font-weight: 400;
      	padding: 4px;
      	margin-top: 10px;
      }

      .login input[type=button]{
      	width: 260px;
      	height: 35px;
      	background: #fff;
      	border: 1px solid #fff;
      	cursor: pointer;
      	border-radius: 2px;
      	color: #a18d6c;
      	font-family: 'Exo', sans-serif;
      	font-size: 16px;
      	font-weight: 400;
      	padding: 6px;
      	margin-top: 20px;
        margin-bottom: 20px;
      }

      .login input[type=button]:hover{
      	opacity: 0.8;
      }

      .login input[type=button]:active{
      	opacity: 0.6;
      }

      .login input[type=text]:focus{
      	outline: none;
      	border: 1px solid rgba(255,255,255,0.9);
      }

      .login input[type=password]:focus{
      	outline: none;
      	border: 1px solid rgba(255,255,255,0.9);
      }

      .login input[type=button]:focus{
      	outline: none;
      }
    </style>
    <script src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/modernizr.custom.js"></script>

  </head>
  <body>
    <div class="body-background"></div>
    <?php include "header.php"; ?>
    <div class="login">
      <div style="font-size:35px;color:white;padding-bottom:20px">
        Log In
      </div>
        <form onsubmit="return validate()" name="loginform" id="login-form" action="backend_api/session_controller.php?type=login" method="post">
            <div class="form-group">
                <input id="email" type="text" placeholder=" email" name="email"><br><br>
            </div>
            <div class="form-group">
                <input type="password" placeholder=" password" name="password"><br>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submit">Log In</button>
            </div>
            <br>
            <div style="color:white">
                <b>New to ProjectName? <a href="signup.php"> Sign Up </a></b>
            </div>
        </form>
    </div>
    <!-- BEGIN SWEETALERT PLUGIN AND SCRIPT -->
    <script src="assets/js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/js/sweetalert.css">
    <script>
        function validate()
        {
            if( document.loginform.email.value == "" ) {
                swal("Oops...", "Please Fill in the email", "error");
                document.loginform.email.focus();
                return false;
            }

            if( document.loginform.password.value == "" ) {
                swal("Oops...", "Please Fill in Your password", "error");
                document.loginform.password.focus();
                return false;
            }

            return true ;
        }
    </script>
    <!-- END SWEETALERT PLUGIN AND SCRIPT -->
  </body>
</html>
