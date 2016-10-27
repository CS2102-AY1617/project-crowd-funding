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
                            <a href="project-list.php?topic=' . $topic_name . '"><img class="img-responsive" src="assets/img/portfolio/folio01.jpg" alt=""></a>
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
    $html_output .= get_tab_content($topic_list);
    return $html_output;
}


/**
 * Sub functions
 */

function get_tab_header($topic_list) {
    $html_output = '<ul class="nav nav-tabs">';

    foreach ($topic_list as $row) {
        $current_topic = $row['topic_name'];
        $html_output .= '<li><a href="#'.$current_topic.'" data-toggle="tab">'. $current_topic .'</a></li>';

    }
    $html_output .= '</ul>';
    return $html_output;
}

function get_tab_content($topic_list) {
    $html_output = '<div class="tab-content">';
    foreach ($topic_list as $row) {
        $html_output .= '
                <div class="tab-pane" id="'.$row['topic_name'].'">
                    <h3>Introduction</h3>
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