<?php
// session starting
    session_start();

$db_username        = 'root'; //MySql database username
$db_password        = ''; //MySql dataabse password
$db_name            = 'massi_blog'; //MySql database name
$db_host            = 'localhost'; //MySql hostname or IP


$conn = mysqli_connect($db_host ,$db_username,$db_password,$db_name) or die(mysqli_error()); //Database Connection

$db = new mysqli($db_host, $db_username, $db_password,$db_name); //connect to MySql
if ($db->connect_error) {//Output any connection error
    die('Error : ('. $db->connect_errno .') '. $db->connect_error);
}

?>