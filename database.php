<?php

$host = "localhost";
$dbname = "be_care";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connection erroe: ".$mysqli->connect_errno);
}

return $mysqli;