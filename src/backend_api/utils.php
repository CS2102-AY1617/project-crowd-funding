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
        <div style="text-align:center" class="tab-pane active">
            <h3>Choose the correct topic will help others find your project easily</h3>
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
    $project_data_array = get_project_by_topic_suggested($conn, $topic_name);
    if (is_array($project_data_array) || is_object($project_data_array)) {
        foreach ($project_data_array as $project) {
            $html_output .= display_single_project($project);
        }
    }
    if ($html_output == "") {
        $html_output = "There is no projects under this category.";
    }
    return $html_output;
}

function get_project_by_topic_suggested($conn, $topic) {
    $query = "SELECT p.*, u.avatar_url FROM cs2102_project.projects p, cs2102_project.users u WHERE p.owner = u.email AND p.topic='" . $topic . "' LIMIT 2";
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    return pg_fetch_all($results);
}


function get_project_by_id($conn, $project_id) {
    $query = "SELECT p.*, u.avatar_url FROM cs2102_project.projects p, cs2102_project.users u WHERE p.owner = u.email AND p.id=" . $project_id;
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    return pg_fetch_all($results)[0];  // fetch one
}

function get_project_by_topic($conn, $topic) {
    $query = "SELECT p.*, u.avatar_url FROM cs2102_project.projects p, cs2102_project.users u WHERE p.owner = u.email AND p.topic='" . $topic . "'";
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    return pg_fetch_all($results);
}

function get_project_by_search($conn, $search)
{
    $query = "SELECT p.*, u.avatar_url FROM cs2102_project.projects p, cs2102_project.users u WHERE p.owner = u.email AND (p.title like '%" . $search . "%' OR p.description like '%" . $search . "%')";
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    return pg_fetch_all($results);
}

function display_single_project($project) {
    $project_id = $project['id'];
    $owner = $project['owner'];
    $title = $project['title'];
    $description = $project['description'];
    $start_date = $project['start_date'];
    $start_date_display = date("jS F Y", strtotime($start_date));
    $end_date = $project['end_date'];
    $end_date_display = date("jS F Y", strtotime($end_date));
    $avatar = $project['avatar_url'];
    $objective_amount = $project['objective_amount'];
    //TODO: $completed_amount, $percentage of complete
    return '
        <div class="row">
            <div class="col-lg-12 blog-bg">
                <div class="col-lg-2 centered">
                    <br>
                    <p><img class="img img-circle" src="'.$avatar.'" width="60px" height="60px"></p>
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

function validate_signin($conn, $email, $password) {
    $query = "SELECT count(*) FROM cs2102_project.users WHERE email='" . $email . "' AND hashed_password = '" . $password . "'";
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    return pg_fetch_all($results);
}

/**
 * @param $email
 * @param $conn
 * @return array
 */
function validate_signup($email, $conn)
{
    $query = "SELECT count(*) FROM cs2102_project.users WHERE email='" . $email . "'";
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    return pg_fetch_all($results);
}

function signup($conn, $email, $username, $password)
{
    $query = "INSERT INTO cs2102_project.users (email, user_name, hashed_password) VALUES ('".$email."', '".$username."', '".$password."')";
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
}

function get_user_type($conn, $email) {
    $query = "SELECT type FROM cs2102_project.users WHERE email='" . $email . "'";
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    return pg_fetch_all($results)[0]['type'];
}

function store_project($conn, $project_data, $user_email) {
    $title = $project_data->title;
    $objective = $project_data->objective;
    $description = $project_data->description;
    $end_date = $project_data->date;
    $topic = $project_data->topic;
    $image = $project_data->image;
    $start_date = date("Y-m-d");

    pg_prepare($conn, "query", "INSERT INTO cs2102_project.projects (owner, title, description, start_date, end_date, topic, objective_amount, imageurl) 
                                VALUES ($1, $2, $3, $4, $5, $6, $7, $8)");
    pg_execute($conn, "query", array($user_email, $title, $description, $start_date, $end_date, $topic, $objective, $image));

    // get last id
    $insert_query = pg_query("SELECT id FROM cs2102_project.projects ORDER BY id DESC LIMIT 1;");
    $insert_row = pg_fetch_row($insert_query);
    $insert_id = $insert_row[0];

    header('Location: ../project.php?id='. $insert_id);
    die;

}

function get_comment_array($conn, $project_id) {
    $query = "SELECT * FROM cs2102_project.comments WHERE project_id = ". $project_id . " ORDER BY comment_time DESC LIMIT 5";
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    return pg_fetch_all($results);
}
