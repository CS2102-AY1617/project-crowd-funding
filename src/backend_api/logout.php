<?php
/**
 * Created by PhpStorm.
 * User: SongYikun
 * Date: 9/11/16
 * Time: 2:16 AM
 */

if (!isset($_SESSION)) {
    session_start();
}

session_destroy();
header("Location: ../login.php");