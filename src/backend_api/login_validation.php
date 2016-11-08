<?php
/**
 * Created by PhpStorm.
 * User: SongYikun
 * Date: 9/11/16
 * Time: 1:20 AM
 */
include "utils.php";
include "config.php";
$conn = initialise_pgsql_connection();

$email = strval($_POST['email']);
$password = strval($_POST['password']);


if (validate_signin($conn, $email, $password)[0]['count']) {
    session_start();
    $_SESSION['user_email'] = $email;
    header("Location: ../landing_page.php");
    exit;
} else {
    header("Location: ../login.php");
    exit;
}


