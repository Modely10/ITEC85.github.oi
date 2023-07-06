<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include("connection.php");

    //check connection
    if (mysqli_connect_errno()) {
        // die equivalent to exit
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM register WHERE id = $id";
    mysqli_query($con, $sql);

    header('location:read.php');
    exit;
}
