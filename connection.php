<?php
error_reporting(1);
$mysqli = new mysqli('localhost', 'root', '', 'poll');

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}
?>
