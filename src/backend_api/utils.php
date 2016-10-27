<?php
/**
 * Created by PhpStorm.
 * User: SongYikun
 * Date: 27/10/16
 * Time: 3:27 PM
 */

function get_topic_list($conn) {
    $query = "SELECT topic_name FROM cs2102_project.topics";
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

function get_tab_content($topic_list) {
    $html_output = '<div class="tab-content">';
    $html_output .= '
        <div class="tab-pane active">
            <h3>Choose the correct topic will help other locate your project easily</h3>
            <div class="row">
                <div class="col-lg-10 blog-bg">
                    <div class="col-lg-2 centered">
                        <br>
                        <p><img class="img img-circle" src="assets/img/team/team04.jpg" width="60px" height="60px"></p>
                        <h4>Jaye Smith</h4>
                        <h5>Published Aug 30.</h5>
                    </div>
                    <div class="col-lg-10 blog-content">
                        <h2>We Define Success</h2>
                        <p>Armed with insight, we embark on designing the right brand experience that engages the audience. It encompasses both the strategic direction and creative execution that solves a business problem and brings the brand to life.</p>
                        <p>In the create phase, the big idea is unleashed to the world through different media touchpoints. This is when we watch the audience fall in love all over again with our client’s brand.</p>
                        <p><a href="project.php" class="icon icon-link"> Read More</a></p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    ';
    foreach ($topic_list as $row) {
        $topic_name = $row['topic_name'];
            $html_output .= '
            <div class="tab-pane" id="'.$topic_name.'">
                <h3>What is ' . $topic_name . '?</h3>
                <div>
                Art is a diverse range of human activities in creating visual, auditory or performing artifacts (artworks), expressing the author\'s imaginative or technical skill, intended to be appreciated for their beauty or emotional power.[1][2] In their most general form these activities include the production of works of art, the criticism of art, the study of the history of art, and the aesthetic dissemination of art.
                </div>
                <h3>Popular Projects You May Want to Reference</h3>
                <div class="row">
                    <div class="col-lg-10 blog-bg">
                        <div class="col-lg-2 centered">
                            <br>
                            <p><img class="img img-circle" src="assets/img/team/team04.jpg" width="60px" height="60px"></p>
                            <h4>Jaye Smith</h4>
                            <h5>Published Aug 30.</h5>
                        </div>
                        <div class="col-lg-10 blog-content">
                            <h2>We Define Success</h2>
                            <p>Armed with insight, we embark on designing the right brand experience that engages the audience. It encompasses both the strategic direction and creative execution that solves a business problem and brings the brand to life.</p>
                            <p>In the create phase, the big idea is unleashed to the world through different media touchpoints. This is when we watch the audience fall in love all over again with our client’s brand.</p>
                            <p><a href="project.php" class="icon icon-link"> Read More</a></p>
                            <br>
                        </div>
                    </div>
                </div>
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
