<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "itec85_db";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("connection failed!");
}

if (!isset($_GET["id"])) {
    header('location: \htdocs\ITEC85\read.php');
    exit;
}

$id = $_GET['id'];
// read row 
$sql = "SELECT * FROM register WHERE id = $id";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    header('location: \htdocs\ITEC85\read.php');
    exit;
}

$admin_fname = $row['admin_fname'];
$admin_lname = $row['admin_lname'];
$admin_email = $row['admin_email'];
$admin_password = $row['admin_password'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $admin_fname = $_POST['admin_fname'];
    $admin_lname = $_POST['admin_lname'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    if (count($_POST) > 0) {
        $sql = "UPDATE register
        set admin_fname = '$admin_fname', admin_lname = '$admin_lname', admin_email= '$admin_email', admin_password = '$admin_password'
        where id = '$id'
        ";
        mysqli_query($con, $sql);
    }

    $selectsql = "select * from register where id = '$id'";
    $result = mysqli_query($con, $selectsql);
    $row = mysqli_fetch_array($result);
    header("location:read.php");
    $con->close();
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
        <input type="text" name='admin_fname' value="<?php echo $row['admin_fname'] ?>"></input>
        <label for="">Last Name</label>
        <input type="text" name="admin_lname" value="<?php echo $row['admin_lname'] ?>"></input>
        <label for="">Email</label>
        <input type="text" type='email' name='admin_email' value="<?php echo $row['admin_email'] ?>"></input>
        <label for="">Password</label>
        <input type="text" name='admin_password' value="<?php echo $row['admin_password'] ?>"></input>
        <input type="submit" value="update">
         <input type="submit" value="back">
       
       
    </form>
</body>

</html>