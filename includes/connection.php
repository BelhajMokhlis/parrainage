<?php

$host = "localhost";
$user = "root";
$pwd = "";
$db_name = "mychat";

$connection = new mysqli($host, $user, $pwd, $db_name);
if ($connection->connect_error) {
    die("error" . mysqli_error($connection));
}
