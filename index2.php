<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Information Security and Assurance Hub</title>
  <link href="assets/img/Security-PNG-Transparent-Picture.png" rel="icon">
  <link href="assets/img/Security-PNG-Transparent-Picture.png" rel="apple-touch-icon">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;

  height: 80vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background:#CAF9FF;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px; 
  max-width: 400px;
  height: 720px;
  width: 100%;
  background-color:#37517e;
  padding: 20px 25px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
  margin-bottom: -90px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color:#47b2e4;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form method="POST">
  <div class="container">
    <h1 style="color:white;">INFORMATION ASSURANCE AND SECURITY</h1>


    <p></p>
    <hr>
    <input type="text" placeholder="First Name" name="admin_fname">
    <input type="text" placeholder="Last Name" name="admin_lname">
     <input type="text" placeholder="Enter Email" name="admin_email" id="email" required>
    <input type="password" placeholder="Enter Password" name="admin_password" id="psw" required>
    <input type="password" placeholder="Repeat Password" name="psw_repeat" id="psw-repeat" required>
    <hr>
    <button type="submit" name="submit" class="registerbtn"  onclick="CheckPassword(document.form.admin_password">Register</button><br><br>
    <a href="login.php" class="registerbtn" style="color:white; text-decoration: none; margin-left: 130px;">Login</a>
    
  </div>
</form>
</body>
</html>

<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "itec85_db";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("connection failed!");
}
if(isset($_POST['submit'])){

$admin_fname = $_POST['admin_fname'];
$admin_lname = $_POST['admin_lname'];
$admin_email = $_POST['admin_email'];
$admin_password = $_POST['admin_password'];
$psw_repeat = md5($admin_password);

    if (!empty($admin_fname) && !empty($admin_lname) && !empty($admin_email) && !empty($admin_password)){
   $query = "INSERT INTO register(admin_fname,admin_lname,admin_email, admin_password) VALUES ('$admin_fname','$admin_lname',
  '$admin_email','$psw_repeat')";
   
  $result= mysqli_query($con,$query);
  if($result){
          echo "<script> alert('successful register');
            window.location='login.php';</script>";
      }
  

  }

}
?>
