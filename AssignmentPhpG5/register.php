<?php

header('Content-type:text/html;charset=utf-8');
//Accept Value from register

//Check if data edy post,if yes then give value else give empty value

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

$fname1= isset($_POST['fname']) ? trim($_POST['fname']) : '';
$lname1 = isset($_POST['lname']) ? trim($_POST['lname']) : '';
$email1 = isset($_POST['email']) ? trim($_POST['email']) : '';
$phonenum1 = isset($_POST['phonenum']) ? trim($_POST['phonenum']) : '';
$birthd1 = isset($_POST['birthd']) ? $_POST['birthd'] : '';
$address1 = isset($_POST['address']) ? trim($_POST['address']) : '';
$gender1 = isset($_POST['gender']) ? $_POST['gender'] : '';
$pass1 = isset($_POST['pass']) ? trim($_POST['pass']) : '';
$copass1 = isset($_POST['copass']) ? trim($_POST['copass']) : '';


//connect database
include './connect-database.php';

//get data
$sql = "select email from member";
if(!mysqli_query($con, $sql)){
    echo 'error getting email';
}

$result = mysqli_query($con, $sql);

//get all data by row

//Check if have registration with same email
if (mysqli_num_rows($result) > 0) {
  //Check email and password row by row if wrong then rejected
  while($row = mysqli_fetch_assoc($result)) {
    if($row['email'] == $email1){
        header('Refresh:3; url= login.php');
        exit('This email already registered');
        
    }
  }

} 

//Validfy Accepted data
if(empty($pass1) || empty($pass1)){
    exit ('Password Cannot be empty');
}

//Check password 
if($pass1 != $copass1){
    header('Refresh:2;');
    exit('Password not the same!');
}

//Birthday cannot in future
$date = date('Y-m-d');

if($birthd1 > $date){
     header('Refresh:2;');
    exit('Invalid Birth Day!!');
}


//Insert data
$sql = "INSERT INTO member  "
        . " VALUES  ( null , '{$fname1}', '{$lname1}', '{$email1}', '{$phonenum1}',"
. "             '{$birthd1}','{$gender1}','{$address1}','{$pass1}')";

if(mysqli_query($con, $sql)){
    //Successfully register
header('Refresh:3; url= login.php');
exit('User '.$fname1.' register successfully') ;
    }else{
        echo'error';
    }
}//if get the value from form then execute all the php above



?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
         <link rel="stylesheet" href="css/header.css"> 
         <link rel="shortcut icon" href="images/icon.png">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
         
        <style>
       

            *{
                margin: 0;
                padding: 0;
                font-family:sans-serif;
                box-sizing:border-box;
            }
            body{
                background-image: url("images/slide2.jpg");
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }
            .fr{
                display:flex;
                justify-content:center;
                align-items:center;
            }
            
            h2{
                color:white;
                margin-top:-15px;
                text-align:center;
                margin-bottom:50px
            }
            
            form{
                box-shadow: 10px 7px rgba(217, 217, 217, 0.356);
                width:500px;
                border:2px solid rgba(217, 217, 217, 0.274);;
                padding:70px;
                border-radius:15px;
                margin-top:100px;
                margin-bottom: 50px;
            }
           input,select{
                display:block;
                border:2px solid #ccc;
                width:95%;
                padding:10px;
                margin:10px auto;
                border-radius: 5px;
                margin-top:15px;
                margin-right:10px;
                cursor: pointer;
            }
          
            button{
                float:right;
                border:none;
                padding:10px 15px;
                color:black;
                background: grey;
                border-radius:10px;
                margin-top:15px;
                cursor: pointer;
                
            }
            
            button:hover{
                opacity:.7;               
                
            }
            
            h5{
                color:white;
                padding-top:70px;
                text-align:center;
            }
            
            a{
                cursor: pointer;
                text-decoration:none;
                color:red;
            }
            a:hover{
                opacity:.5;  
            }
            footer{ 
            margin-bottom: 20px;
            text-align: center;
             color: #a8a5ac;
            }
            label{
                color:white;
            }
            .menu-bar ul li a {
                color:white;
            }
        </style>
    </head>
    <body>


<?php
include './heading.php';
?>

<div class = "fr">
       <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <h2>Register</h2>
            <label>First Name</label>
            <input type="text" name="fname" placeholder = "First Name" required><br>
            <label>Last name</label>
            <input type="text" name="lname" placeholder="Last Name" required><br>
            <label>Email</label>
            <input type="email" name="email" placeholder = "Email" required><br>
            <label>Phone Number</label>
            <input type="tel" name="phonenum" placeholder ="01" pattern="[0-9]{3}[0-9}{7}"><br>
             <label>Birth date</label>
            <input type="date" name="birthd"><br>
             <label>Address</label> 
               <input type="text" name="address" placeholder="Address" required><br>
            <label>Gender</label>
            <select name="gender">
                <option value="Female">Female</option>
                <option value="Male">Male</option>
            </select>
            <br>
            <label>Password</label>
            <input type="password" name="pass" placeholder="Password" required><br>
            <label>Confirm Password</label>
            <input type="password" name="copass" placeholder="Confirm Password" required>
            <button type="submit" >Submit</button>
            
           
            <h5>Already become a member? <a href="Login.php">Login now</a></h5>
            
       
        </form>

<?php
include './footer.php';
?>