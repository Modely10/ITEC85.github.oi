<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "itec85_db";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("connection failed!");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_fname = $_POST['admin_fname'];
    $admin_lname = $_POST['admin_lname'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    if (!empty($admin_fname) && !empty($admin_lname) && !empty($admin_email) && !empty($admin_password)) {
        $query = "INSERT INTO register(admin_fname, admin_lname, admin_email, admin_password) VALUES ('$admin_fname', '$admin_lname', '$admin_email', '$admin_password')";
        $result = mysqli_query($con, $query);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFORMATION ASSURANCE AND SECURITY</title>
      <link href="assets/img/Security-PNG-Transparent-Picture.png" rel="icon">
  <link href="assets/img/Security-PNG-Transparent-Picture.png" rel="apple-touch-icon">
</head>

<body>
    <form action="" method="post">
        <label for="">First Name</label>
        <input type="text" name="admin_fname"></input>
        <label for="">Last Name</label>
        <input type="text" name="admin_lname"></input>
        <label for="">Email</label>
        <input type="text" type="email" name="admin_email"></input>
        <label for="">Password</label>
        <input type="text" name="admin_password"></input>
        <input type="submit" value="submit">
    </form>
</body>

</html>