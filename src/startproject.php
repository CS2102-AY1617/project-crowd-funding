<?php
	include "backend_api/routes.php";
	include "backend_api/config.php";

	$conn = initialise_pgsql_connection();
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
        <h1>Craft Your Own Dream</h1>
        <hr>
    </div><!-- container -->
</section><!-- section -->

<!-- ==== PORTFOLIO ==== -->
<div class="container" id="portfolio" name="portfolio">
    <br>
    <div class="row">
        <br>
        <h1 class="centered">Step 1: Spark Your Idea</h1>
        <hr>
        <br>
        <br>
    </div><!-- /row -->
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- tabs right -->
                    
                    <div class="tabbable tabs-right">
                        <?php 
                            echo display_start_sparks($conn);
                        ?>
                    </div>
                    <!-- /tabs -->

                </div>
            </div><!-- /row -->
        </div>
    </div>
</div><!-- /container -->


<!-- ==== BLOG ==== -->
<div class="container" id="blog" name="blog">
    <br>
    <div class="row">
        <br>
        <h1 class="centered">Step 2: Write it Down</h1>
        <hr>
        <br>
        <br>
    </div><!-- /row -->
    <div class="container bootstrap-iso">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Project Title</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your project title">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Objective Amount</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="exampleTextarea">Description</label>
                <textarea class="form-control" id="exampleTextarea" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label class="control-label">Deadline (at 12:00pm)</label>
                <div class="date">
                    <div class="input-group input-append date" id="datePicker">
                        <input type="text" class="form-control" name="date" />
                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleSelect1">Topic</label>
                <select class="form-control" id="exampleSelect1">
                    <option>Art</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">You may choose to upload an image</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter image url. e.g http://searchengineland.com/figz/wp-content/seloads/2016/10/google-cardboard-vr-ss-1920.jpg">
            </div>

            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    By creating a project, you have fully understood and agree to our terms and conditions.
                </label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Create Your Project</button>
        </form>

    </div>
    <br>
    <br>
</div><!-- /container -->


    <?php
    include "footer.php";
    ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<!-- Include Date Range Picker -->


    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/retina.js"></script>
    <script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="assets/js/smoothscroll.js"></script>
    <script type="text/javascript" src="assets/js/jquery-func.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

    <script>
        $(document).ready(function() {
            $('#datePicker')
                .datepicker({
                    format: 'mm/dd/yyyy'
                })
                .on('changeDate', function(e) {
                    // Revalidate the date field
                    $('#eventForm').formValidation('revalidateField', 'date');
                });

            $('#eventForm').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'The name is required'
                            }
                        }
                    },
                    date: {
                        validators: {
                            notEmpty: {
                                message: 'The date is required'
                            },
                            date: {
                                format: 'MM/DD/YYYY',
                                message: 'The date is not a valid'
                            }
                        }
                    }
                }
            });
        });
    </script>
    <style>
        /* custom inclusion of right, left and below tabs */

        .tabs-below > .nav-tabs,
        .tabs-right > .nav-tabs,
        .tabs-left > .nav-tabs {
            border-bottom: 0;
        }

        .tab-content > .tab-pane,
        .pill-content > .pill-pane {
            display: none;
        }

        .tab-content > .active,
        .pill-content > .active {
            display: block;
        }

        .tabs-below > .nav-tabs {
            border-top: 1px solid #ddd;
        }

        .tabs-below > .nav-tabs > li {
            margin-top: -1px;
            margin-bottom: 0;
        }

        .tabs-below > .nav-tabs > li > a {
            -webkit-border-radius: 0 0 4px 4px;
            -moz-border-radius: 0 0 4px 4px;
            border-radius: 0 0 4px 4px;
        }

        .tabs-below > .nav-tabs > li > a:hover,
        .tabs-below > .nav-tabs > li > a:focus {
            border-top-color: #ddd;
            border-bottom-color: transparent;
        }

        .tabs-below > .nav-tabs > .active > a,
        .tabs-below > .nav-tabs > .active > a:hover,
        .tabs-below > .nav-tabs > .active > a:focus {
            border-color: transparent #ddd #ddd #ddd;
        }

        .tabs-left > .nav-tabs > li,
        .tabs-right > .nav-tabs > li {
            float: none;
        }

        .tabs-left > .nav-tabs > li > a,
        .tabs-right > .nav-tabs > li > a {
            min-width: 74px;
            margin-right: 0;
            margin-bottom: 3px;
        }

        .tabs-left > .nav-tabs {
            float: left;
            margin-right: 19px;
            border-right: 1px solid #ddd;
        }

        .tabs-left > .nav-tabs > li > a {
            margin-right: -1px;
            -webkit-border-radius: 4px 0 0 4px;
            -moz-border-radius: 4px 0 0 4px;
            border-radius: 4px 0 0 4px;
        }

        .tabs-left > .nav-tabs > li > a:hover,
        .tabs-left > .nav-tabs > li > a:focus {
            border-color: #eeeeee #dddddd #eeeeee #eeeeee;
        }

        .tabs-left > .nav-tabs .active > a,
        .tabs-left > .nav-tabs .active > a:hover,
        .tabs-left > .nav-tabs .active > a:focus {
            border-color: #ddd transparent #ddd #ddd;
            *border-right-color: #ffffff;
        }

        .tabs-right > .nav-tabs {
            float: right;
            margin-left: 19px;
            border-left: 1px solid #ddd;
        }

        .tabs-right > .nav-tabs > li > a {
            margin-left: -1px;
            -webkit-border-radius: 0 4px 4px 0;
            -moz-border-radius: 0 4px 4px 0;
            border-radius: 0 4px 4px 0;
        }

        .tabs-right > .nav-tabs > li > a:hover,
        .tabs-right > .nav-tabs > li > a:focus {
            border-color: #eeeeee #eeeeee #eeeeee #dddddd;
        }

        .tabs-right > .nav-tabs .active > a,
        .tabs-right > .nav-tabs .active > a:hover,
        .tabs-right > .nav-tabs .active > a:focus {
            border-color: #ddd #ddd #ddd transparent;
            *border-left-color: #ffffff;
        }


    </style>

</body>
</html>
