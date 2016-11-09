<?php



if (!isset($_SESSION['user_email'])) {
        echo '
        <div id="navbar-main">
          <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
                </button>
                <a class="navbar-brand page-scroll" href="landing_page.php"></i> Dream Funder</a>
              </div>
              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li><a href="discover.php" class="smoothScroll">Discover</a></li>
                  <li> <a href="create_project.php" class="smoothScroll">Start A Project</a></li>
                  <li> <a href="about_us.php" class="smoothScroll"> About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="signup.php">Sign Up</a>
                    </li>
                    <li>
                        <a href="login.php">Log In</a>
                    </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        ';
    } else {
    $conn = initialise_pgsql_connection();
    $user_type = get_user_type($conn, $_SESSION['user_email']);
    $temp = '
        <div id="navbar-main">
          <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
                </button>
                <a class="navbar-brand page-scroll" href="landing_page.php"></i> Dream Funder</a>
              </div>
              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li><a href="discover.php" class="smoothScroll">Discover</a></li>
                  <li> <a href="create_project.php" class="smoothScroll">Start A Project</a></li>
                  <li> <a href="about_us.php" class="smoothScroll"> About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>';
                if ($user_type == 'admin') {
                    $temp .= '<a href="profile.php">'.$_SESSION['user_email'].'</a>';
                } else {
                    $temp .= '<a href="#">'.$_SESSION['user_email'].'</a>';
                }
            $temp .='</li>
                    <li>
                        <a href="backend_api/session_controller.php?type=logout">Log Out</a>
                    </li>
                </ul>
              </div>
            </div>
          </div>
        </div>';
        echo $temp;
    }

?>

