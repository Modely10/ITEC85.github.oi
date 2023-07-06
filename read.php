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
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include('connection.php');
            $sql = "select * from register";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $admin_fname = $row['admin_fname'];
                $admin_lname = $row['admin_lname'];
                $admin_email = $row['admin_email'];
                $admin_password = $row['admin_password'];


                echo '
                <tr>
                    <th>$id</th>
                    <th>$admin_fname</th>
                    <th>$admin_lname</th>
                    <th>$admin_email</th>
                    <th>$admin_password</th>
                    <th>
                                 <a href="update.php?id='.$id.'">Update</a>                    
                    </th>
                    <th>
                                    <a href="delete.php?id='.$id.'">Delete</a>                     
                    </th>
                    <th>
                                    <a href="index.php?id='.$id.'">Back</a>                     
                    </th>
                </tr>';
           
                 }          
            ?> 
         
        </tbody>

    </table>
</body>

</html>