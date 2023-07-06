<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "itec85_db";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("connection failed!");
}