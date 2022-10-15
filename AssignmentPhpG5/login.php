<?php

header('Content-type:text/html;charset=utf-8');
//Accept Value from register

//Check if data edy post,if yes then give value else give empty value

if($_SERVER['REQUEST_METHOD'] == "POST"){
$email2 = isset($_POST['email']) ? trim($_POST['email']) : '';
$password2 = isset($_POST['password']) ? trim($_POST['password']) : '';


//connect database
include 'connect-database.php';

//get data from database 
$sql = "select memberID, email, password from member";
if(!mysqli_query($con, $sql)){
     header('Refresh:2;');
     exit('error getting email and password');
}

$result = mysqli_query($con, $sql);

 
//get all data by row
if (mysqli_num_rows($result) > 0) {
  //Check email and password row by row if wrong then rejected
  while($row = mysqli_fetch_assoc($result)) {
   
  
    if($row['email'] == $email2){
        
      
       if($row['password'] == $password2){
           // first script
          
           
         
        session_start(); 
        $_SESSION['id'] = $row['memberID'];
        $_SESSION['loginStatus'] = "user";
           header('Refresh:2; url=profile.php');
           exit('Login Succesful');
       }
      
    }
  }
    $_SESSION['id'] = 0;
    $_SESSION['loginStatus'] = "null";
   header('Refresh:2;');
        exit('Invalid Email or Password!!');
    } 
}//if get value from post then execute php above

?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/header.css">  
       
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
        <link rel="shortcut icon" href="images/icon.png">
      
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
                background-size: cover;
            }
            .fr{
                display:flex;
                justify-content:center;
                align-items:center;
            }
            h2{
                text-align:center;
                margin-bottom:40px;
                color:white;
            }
            label{
                color:white;
            }
            form{
                box-shadow: 10px 7px 5px  rgba(217, 217, 217, 0.356);
                margin-top:100px;
                width:500px;
                border:2px solid rgba(217, 217, 217, 0.274);
                padding:30px;
                border-radius:15px;
                margin-bottom: 200px;
            }
            input{
                display:block;
                border:2px solid #ccc;
                width:95%;
                padding:10px;
                margin:10px auto;
                border-radius: 5px;
                
            }
            button{
                float:right;
                border:none;
                padding:10px 15px;
                color:white;
                background: grey;
                border-radius:10px;
                margin-top:15px;
                margin-right:10px;
                cursor: pointer;
            }
            button:hover{
                opacity:.7;               
                
            }
            
            h5{
                padding-top:70px;
                text-align:center;
                color:white;
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
                <h2>LOGIN</h2>
                <label>Email</label><br>
                <input type="email" name ="email" placeholder = "Email"><br>
                <label>Password</label><br>
                <input type="password" name="password" placeholder="Password">
                <button type="submit" >Login</button>
                
               
                <h5>Havent's become a member? <a href="register.php">Sign Up</a></h5>
                
           
            </form>
</div>


<?php
include './footer.php';
?>