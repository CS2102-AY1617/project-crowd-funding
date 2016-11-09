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




