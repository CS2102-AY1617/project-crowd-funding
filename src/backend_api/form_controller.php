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



if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}


switch ($action) {
    case 'search':
        if (isset($_POST['searchfield'])) {
            $search_field = $_POST['searchfield'];
            echo $search_field;
            die;
        }
        break;

}