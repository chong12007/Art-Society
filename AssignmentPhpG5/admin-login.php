<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';


//connect database
include './connect-database.php';

//get data
$sql = "select admin_id, admin_username, admin_password from admin";
if(!mysqli_query($con, $sql)){
    echo 'error getting email and password';
}

$result = mysqli_query($con, $sql);

//get all data by row
if (mysqli_num_rows($result) > 0) {
  //Check email and password row by row if wrong then rejected
  while($row = mysqli_fetch_assoc($result)) {
    if($row['admin_username'] == $username){
        
       if($row['admin_password'] == $password){
        session_start(); 
        $_SESSION['id'] = $row['admin_id'];
        $_SESSION['loginStatus'] = "admin";
           header('Refresh:2; url=admin-page.php');
            exit('Login Successful');
       }
      
    }
  }
  
    $_SESSION['id'] = 0;
    $_SESSION['loginStatus'] = "null";
   header('Refresh:2; url= admin-login.php');
        exit('Invalid Email or Password!!');
        } 
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Staff Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/manager-login.css">
        <link rel="stylesheet" href="css/header.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
        <link rel="shortcut icon" href="images/icon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    </head>
    <body>

<?php
include './heading.php';
?>

<div class="form">
       <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <fieldset>
              <legend>Staff Login</legend>
              
              <div class="form-group">
                <label for="username" class="form-label mt-4">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
              </div>
              <div class="form-group">
                <label for="password" class="form-label mt-4">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
              </div>
            
             <div class="log-in">
              <button type="submit" class="btn btn-primary">Log in</button>
              <a href="landing-page.php" class="back-home">I am not a manager</a>
            </div>
            </fieldset>
          </form>
          </div>

<?php
include './footer.php';
?>