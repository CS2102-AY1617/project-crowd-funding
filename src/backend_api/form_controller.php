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

if (!isset($_SESSION['user_email'])) {
    session_start();
}


switch ($action) {
    case 'search':
        if (isset($_POST['searchfield'])) {
            $search_field = $_POST['searchfield'];
            header("Location: ../project_list.php?search=" . $search_field);
        }
        break;
    case 'create':
        $title = $_POST['title'];
        $objective = $_POST['objective'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $topic = $_POST['topic'];
        if (isset($_POST['image'])) {
            $image = $_POST['image'];
        } else {
            $image = "";
        }
        $project_data = create_object($title, $objective, $description, $date, $topic, $image);
        $conn = initialise_pgsql_connection();
        store_project($conn, $project_data);
        break;
    case 'comment':
        break;
    case 'fund':
        break;

}