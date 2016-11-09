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
        $comment = $_POST['comment'];
        $project_id = $_GET['project_id'];
        $user_email = $_SESSION['user_email'];
        $query = "INSERT INTO cs2102_project.comments (project_id, commentor, content) VALUES ('".$project_id."', '".$user_email."','".$comment."')";
        $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
        header("Location: ../project.php?id=".$project_id);
        break;
    case 'fund':
        $fund = $_POST['fund'];
        $project_id = $_GET['project_id'];
        $user_email = $_SESSION['user_email'];
        $query = "INSERT INTO cs2102_project.transactions (project_id, donor, amount) VALUES ('".$project_id."', '".$user_email."','".$fund."')";
        $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
        header("Location: ../project.php?id=".$project_id);
        break;
    case 'delete':
        $project_id = $_GET['project_id'];
        $query = "DELETE FROM cs2102_project.projects WHERE id =" .$project_id;
        $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
        header("Location: ../profile.php");
        break;
    case 'modify':
        $project_id = $_GET['project_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $query = "UPDATE cs2102_project.projects SET title = '".$title."', description='".$description."' WHERE id =" .$project_id;
        $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
        header("Location: ../profile.php");
        break;

}