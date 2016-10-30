<?php
/**
 * Created by PhpStorm.
 * User: SongYikun
 * Date: 27/10/16
 * Time: 10:22 PM
 */

include "database_routes.php";
include "utils.php";
include "config.php";

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

function store_project($conn, $project_data) {
    $title = $project_data->title;
    $objective = $project_data->objective;
    $description = $project_data->description;
    $end_date = $project_data->date;
    $topic = $project_data->topic;
    $image = $project_data->image;
    $start_date = date("Y-m-d");

    pg_prepare($conn, "query", "INSERT INTO cs2102_project.projects (owner, title, description, start_date, end_date, topic, objective_amount, imageurl) 
                                VALUES ($1, $2, $3, $4, $5, $6, $7, $8)");
    pg_execute($conn, "query", array("Test", $title, $description, $start_date, $end_date, $topic, $objective, $image));

    // get last id
    $insert_query = pg_query("SELECT id FROM cs2102_project.projects ORDER BY id DESC LIMIT 1;");
    $insert_row = pg_fetch_row($insert_query);
    $insert_id = $insert_row[0];

    header('Location: ../project.php?id='. $insert_id);
    die;

}



