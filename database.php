<?php

$host = "sql204.infinityfree.com";
$dbname = "if0_34660131_hello";
$username = "if0_34660131";
$password = "vvEiseAeYm";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;