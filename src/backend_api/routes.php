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


