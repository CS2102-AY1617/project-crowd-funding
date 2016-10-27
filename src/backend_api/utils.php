<?php
/**
 * Created by PhpStorm.
 * User: SongYikun
 * Date: 27/10/16
 * Time: 3:27 PM
 */

function get_topic_list($conn) {
    $query = "SELECT * FROM cs2102_project.topics";
    $results = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());
    return pg_fetch_all($results);
}




