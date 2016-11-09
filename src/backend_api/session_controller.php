<?php
/**
 * Created by PhpStorm.
 * User: SongYikun
 * Date: 9/11/16
 * Time: 2:59 AM
 */
include "utils.php";
include "config.php";

$conn = initialise_pgsql_connection();
$action = $_GET['type'];

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}


switch ($action) {
    case 'signup':
        if (!validate_signup($email, $conn)[0]['count']) {
            signup($conn, $email, $username, $password);
            session_start();
            $_SESSION['user_email'] = $email;
            header("Location: ../landing_page.php");
        } else {
            header("Location: ../signup.php");
        }
        break;
    case 'login':
        if (validate_signin($conn, $email, $password)[0]['count']) {
            session_start();
            $_SESSION['user_email'] = $email;
            header("Location: ../landing_page.php");
            exit;
        } else {
            header("Location: ../login.php");
            exit;
        }
        break;
    case 'logout':
        session_start();
        session_destroy();
        header("Location: ../login.php");
        break;
}

