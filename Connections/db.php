<?php
//Define connection to server
$mysqli = new mysqli('localhost', 'user', 'password', 'resume');

//Test connection
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>