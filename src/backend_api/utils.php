<?php
/**
 * Created by PhpStorm.
 * User: SongYikun
 * Date: 27/10/16
 * Time: 3:27 PM
 */


function get_topic_list($conn) {
    $query = "SELECT topic_name, description FROM cs2102_project.topics";
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    return pg_fetch_all($results);
}



function get_tab_header($topic_list) {
    $html_output = '<ul class="nav nav-tabs">';

    foreach ($topic_list as $row) {
        $topic_name = $row['topic_name'];
        $html_output .= '<li><a href="#'.$topic_name.'" data-toggle="tab">'. $topic_name .'</a></li>';
    }
    $html_output .= '</ul>';
    return $html_output;
}

function get_tab_content($conn, $topic_list) {
    $html_output = '<div class="tab-content">';

    // default display
    $html_output .= '
        <div class="tab-pane active">
            <h3>Choose the correct topic will help other locate your project easily</h3>
        </div>
    ';
    // END default display

    foreach ($topic_list as $row) {
        $topic_name = $row['topic_name'];
            $html_output .= '
            <div class="tab-pane" id="'.$topic_name.'">
                <h3>What is ' . $topic_name . '?</h3>
                <div>
                '.$row['description'].'
                </div>
                <h3>Popular Projects You May Want to Reference</h3>
                '. display_suggested_projects($conn, $topic_name) . '
            </div>';
        }
    $html_output .= '</div>';
    return $html_output;
}

function create_object($title, $objective, $description, $date, $topic, $image) {
    $project_data = new stdClass();
    $project_data->title = $title;
    $project_data->objective = $objective;
    $project_data->description = $description;
    $project_data->date = $date;
    $project_data->topic = $topic;
    $project_data->image = $image;
    return $project_data;
}

function display_suggested_projects($conn, $topic_name) {
    $html_output = "";
    $query = "SELECT * FROM cs2102_project.projects WHERE topic='".$topic_name ."' LIMIT 2";
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    $project_data_array = pg_fetch_all($results);
    if (is_array($project_data_array) || is_object($project_data_array)) {
        foreach ($project_data_array as $project) {
            $project_id = $project['id'];
            $owner = $project['owner'];
            $title = $project['title'];
            $description = $project['description'];
            $start_date = $project['start_date'];
            $start_date_display = date("jS F Y", strtotime($start_date));
            $end_date = $project['end_date'];
            $end_date_display = date("jS F Y", strtotime($end_date));
            $objective_amount = $project['objective_amount'];
            //TODO: $completed_amount, $percentage of complete
            $html_output .= '
        <div class="row">
            <div class="col-lg-12 blog-bg">
                <div class="col-lg-2 centered">
                    <br>
                    <p><img class="img img-circle" src="assets/img/team/team04.jpg" width="60px" height="60px"></p>
                    <h4>' .$owner. '</h4>
                    <h5>Start: '.$start_date_display.'.</h5>
                    <h5>End: '.$end_date_display.'.</h5>
                </div>
                <div class="col-lg-10 blog-content" >
                    <h2>'.$title.'</h2>
                    <p>'. $description .'<p>
                    <p><a href="project.php?id='. $project_id .'" class="icon icon-link"> Read More</a></p>
                    <br>
                </div>
            </div>
        </div>
        <br>

    ';
        }
    }
    if ($html_output == "") {
        $html_output = "There is no projects under this category.";
    }
    return $html_output;
}

function get_project_by_id($conn, $project_id) {
    $query = "SELECT * FROM cs2102_project.projects WHERE id=" . $project_id;
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    return pg_fetch_all($results)[0];  // fetch one
}