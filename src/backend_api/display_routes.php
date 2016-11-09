<?php
/**
 * Created by PhpStorm.
 * User: SongYikun
 * Date: 27/10/16
 * Time: 3:26 PM
 */

/**
 * importing statements
 */

include "utils.php";

function display_discover_list($conn) {
    $html_output = '';
    // retrieve list
    $topic_list = get_topic_list($conn);
    $length = count($topic_list);
    $num_of_rows = (int)($length / 4);
    for ($i = 0; $i < $num_of_rows; $i++) {
        $html_output .= '<div class="row">';
        for ($j = 0; $j < 4; $j++) {
            $topic_name = $topic_list[$j + $i * 4]['topic_name'];
            $html_output .= '<div class="col-md-3 ">
                    <div class="grid mask">
                        <figure>
                            <a href="project_list.php?topic=' . $topic_name . '"><img class="img-responsive" src="assets/img/topics/'.$topic_name.'.png" alt=""></a>
                            <figcaption>
                                <h5>' . $topic_name . '</h5>
                            </figcaption>
                        </figure>
                    </div>
                </div>';
        }
        $html_output .= '</div><br>';
    }
    return $html_output;
}

function display_start_sparks($conn) {
    $topic_list = get_topic_list($conn);
    $html_output = get_tab_header($topic_list);
    $html_output .= get_tab_content($conn, $topic_list);
    return $html_output;
}

function display_select_topic($conn) {
    $topic_list = get_topic_list($conn);
    $html_output = '<select class="form-control" name="topic">';
    foreach ($topic_list as $row) {
        $html_output .= '<option>'.$row['topic_name'].'</option>';
    }
    $html_output .= '</select>';
    return $html_output;
}

function display_landing_popular($conn) {
    $query = "SELECT *  FROM cs2102_project.transactions t, cs2102_project.projects p 
              WHERE t.project_id = p.id GROUP BY t.project_id, t.id, p.id ORDER BY COUNT(*) DESC LIMIT 2";
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    $popular_projects = pg_fetch_all($results);
    $html_output = "";
    foreach ($popular_projects as $row) {
        $html_output .= display_single_project($row);
    }
    return $html_output;
}

function display_project_list($conn, $topic) {
    $html_output = '';
    $projects = get_project_by_topic($conn, $topic);
    foreach ($projects as $project) {
        $html_output .= display_single_project($project);
    }
    return $html_output;
}

function display_search_list($conn, $search) {
    $html_output = '';
    $projects = get_project_by_search($conn, $search);
    if ($projects == null) {
        return '
            <h2 style="text-align: center">Oops, the projects you are looking for could not be found.</h2>
            <br>
            <br>
            <br>
        ';
    } else {
        foreach ($projects as $project) {
            $html_output .= display_single_project($project);
        }
    }
    return $html_output;
}

function display_comment($conn, $project_id) {
    $html_output = '';
    $comments = get_comment_array($conn, $project_id);
    if (is_array($comments) || is_object($comments)) {
        foreach ($comments as $comment) {
            $commentor = $comment['commentor'];
            $comment_time = $comment['comment_time'];
            $display_datetime = date("jS F Y, H:i:s", strtotime($comment_time));
            $content = $comment['content'];

            $html_output .= '
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <strong>'. $commentor .'</strong><br><span class="text-muted">at ' .$display_datetime. '</span>
                                        </div>
                                        <div class="panel-body">
                                            '. $content .'
                                        </div><!-- /panel-body -->
                                    </div><!-- /panel panel-default -->
                                </div>
            ';
        }
    }
    if ($html_output == "") {
        return '
            <div>There is no comment about this project.</div>
        ';

    }
    return $html_output;
}

function display_unique_backers($conn, $project_id) {
    $query = "SELECT count(donor) FROM cs2102_project.transactions WHERE project_id = ". $project_id . "GROUP BY project_id";
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    $count = pg_fetch_all($results)[0]['count'];
    return $count;
}

function display_project_progress($conn, $project_id) {
    $query = "SELECT SUM(amount) FROM cs2102_project.transactions WHERE project_id = ".$project_id;
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    $sum = pg_fetch_all($results)[0]['sum'];

    if ($sum == null) {
        $sum = 0;
    }

    $query = "SELECT objective_amount FROM cs2102_project.projects WHERE id =" . $project_id;
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    $objective = pg_fetch_all($results)[0]['objective_amount'];
    $difference = $objective - $sum;
    return $difference;
}

function display_admin_projects($conn) {
    $html_output = '<table class="table table-hover">
                <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Owner</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Objective</th>
                    <th>Action</th>
                </tr>
                </thead>';
    $query = "SELECT * FROM cs2102_project.projects ORDER BY id";
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    $rows = pg_fetch_all($results);
    foreach ($rows as $row) {
        $html_output .= '
                <tbody>
                    <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['owner'].'</td>
                        <td>'.$row['title'].'</td>
                        <td>'.$row['start_date'].'</td>
                        <td>'.$row['end_date'].'</td>
                        <td>'.$row['topic'].'</td>
                        <td><a href="backend_api/form_controller.php?type=delete&project_id='.$row['id'].'" >Delete </a>|
                        <a href="backend_api/form_controller.php?type=update&project_id='.$row['id'].'" > Update</a></td>
                    </tr>
                </tbody>
        ';
    }
    return $html_output .= '</table>';
}

function display_admin_transactions($conn) {
    $html_output = '<table class="table table-hover">
                <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Project ID</th>
                    <th>Donor</th>
                    <th>Transaction Time</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                </thead>';
    $query = "SELECT * FROM cs2102_project.transactions ORDER BY id";
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    $rows = pg_fetch_all($results);
    foreach ($rows as $row) {
        $html_output .= '
                <tbody>
                    <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['project_id'].'</td>
                        <td>'.$row['donor'].'</td>
                        <td>'.$row['transaction_time'].'</td>
                        <td>'.$row['amount'].'</td>
                        <td><a href="#" >Delete </a>|<a href="#" > Update</a></td>
                    </tr>
                </tbody>
        ';
    }
    return $html_output .= '</table>';
}

