<?php
/**
 * Created by PhpStorm.
 * User: SongYikun
 * Date: 27/10/16
 * Time: 12:53 PM
 */


/**
 * initialise the connection to Elephant SQL
 */
function initialise_pgsql_connection() {
    $host = "elmer-01.db.elephantsql.com";
    $user = "xouefvbh";
    $pass = "zKZQu8LvSwwgOq89VVV6QpXAMzNpbpt_";
    $db = "xouefvbh";

    // Open a PostgreSQL connection
    $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
    or die ("Could not connect to server\n");

    $query = 'SELECT * FROM cs2102_project.users';
    $results = pg_query($con, $query) or die('Query failed: ' . pg_last_error());

    $row = pg_fetch_row($results);
    echo $row[0] . "\n";
}
