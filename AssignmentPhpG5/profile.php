<?php
   // second script
        session_start(); 
        $id = $_SESSION['id'];
        $loginStatus = $_SESSION['loginStatus'];
     
        
      if($loginStatus != "user"){
          header('Location: login.php');
          exit();
      }
      
      
        
     
        
        //connect database
include './connect-database.php';

//get data
$sql = "select * from member";
if(!mysqli_query($con, $sql)){
     header('Refresh:2; url= ../login.html');
     exit('error getting email and password');
}

$result = mysqli_query($con, $sql);

$profile = array();
 
//get all data by row
if (mysqli_num_rows($result) > 0) {
  //Check email and password row by row if wrong then rejected
  while($row = mysqli_fetch_assoc($result)) {
   
      if($row['memberID'] == $id){
          $profile [] = $row;
    
      }
      
  }
} 





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>


body {
    background: rgb(99, 39, 120);
     background-image:url("images/bg2.jpg");
     background-size : cover;
     background-repeat : no-repeat;
}
 .menu-bar ul li a {
                color:white;
}
 input{
                display:block;
                border:2px solid #ccc;
                width:95%;
                padding:10px;
                margin:10px auto;
                border-radius: 5px;
                
            }
            
          

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}

.menu-bar ul li a {
    color:#292421;
}

footer{ 
    padding-top:70px;
    text-align: center;
     color: #a8a5ac;
}

.container rounded bg-white mt-5 mb-5{
    padding-left : 0 !important;
}

label{
    color :#292421;
    font-size : 20px !important;
}

.btn btn-primary profile-button{
    text-align: right !important;
    display: block;
}

.col-md-6{
    margin : 1px 0px 0px 0px !important ;
    padding-bottom : 10px;
}

</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"/>

    <title>Profile</title>
</head>
<body>

<?php
include './heading.php';
?>

 <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
<!--                    <div class="d-flex justify-content-between align-items-center mb-3">-->
                        <h4 class="text-left">Profile Settings</h4>
<!--                    </div>-->
<!--                     <div class="mt-5 text-right">-->
                         <button id="myButton" class="btn btn-primary profile-button" type="button" style="postion : relative; right : 0; text-align: right !important;">Edit</button>
                                  <script>
                            document.getElementById('myButton').onclick = function() {
                             document.getElementById('fname').readOnly =false;
                              document.getElementById('lname').readOnly =false;
                               document.getElementById('pass').readOnly =false;
                                document.getElementById('gender').removeAttribute('disabled');
//                                 document.getElementById('email').readOnly =false;
                                  document.getElementById('phonenum').readOnly =false;
                                   document.getElementById('birthd').readOnly =false;
                                       document.getElementById('address').readOnly =false;
                                   document.getElementById('submit').removeAttribute('disabled');
                         
                            };
                        </script>
<!--                     </div>-->
                     <form action = "update-profile.php" method="post">
                    <div class="row mt-2">
                        <br>
                       
                        <?php foreach($profile as $p => $pro) :?>
                             
                        <?php $encryptedPass = str_repeat("*",strlen($pro['password'])); ?>
                        <div class="col-md-6">
                            <label class="labels">First Name</label><input type="text" id="fname" name ="fname" class="form-control" value="<?php echo $pro['firstN'];?>" readonly required>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Last Name</label><input type="text" class="form-control" id="lname" name ="lname"  value="<?php echo $pro['lastN'];?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Password</label><input type="password" class="form-control" id="pass" name ="pass"  placeholder ="<?php echo $encryptedPass ;?>" readonly required>
                        </div>
                         <div class="col-md-6"  style ="font-size:12px"> 
                          <label>Gender</label>
                          
                         
            <select class="form-control" style="padding: 6px 12px" id="gender" name="gender"   disabled required>
                <option    value="<?php echo $pro['gender'];?>"><?php echo $pro['gender'];?></option>
            


                <option  value="<?php $gender = $pro['gender'] != "Male" ? 'Male' : 'Female' ;  echo $gender ;?>" > <?php $gender = $pro['gender'] != "Male" ? 'Male' : 'Female' ; echo $gender ;?></option>
            </select>
           
                         </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Email</label><input type="email" class="form-control" id="email" name ="email" value ="<?php echo $pro['email'];?>" readonly required>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Phone Number</label><input type="text" class="form-control" id="phonenum" name="phonenum" value ="<?php echo $pro['phoneNum'];?>" readonly required>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Birth date</label><input type="date" class="form-control" id="birthd"  name ="birthd" value ="<?php echo $pro['birth'];?>"readonly required>
                        </div>
                         <div class="col-md-12">
                            <label class="labels">Address</label><input type="text" class="form-control" id="address"  name ="address" value ="<?php echo $pro['address'];?>" readonly required>
                        </div>
                        <div class="col-md-12">
                          <button id="submit" class="btn btn-primary profile-button" type="submit" style="postion : relative; right : 100; margin-top : 15px" disabled>Save Profile</button>
<!--                         <div class="mt-5 text-right"><button class="btn btn-primary profile-button" id="submit" type="submit" disabled>Save Profile</button></div>-->
                        </div>
                    </div>
                    <?php endforeach;?>
               
                </div>
            </div>

<!--   <div class="col-md-4">
                <div class="p-3 py-5">
                  
                    <div class="col-md-12"><label class="labels">Event Joined</label><input type="text" value=""></div> <br>

                </div>
            </div>-->
          
      
                       
                </div>
            </div>
   

<?php
include './footer.php';
?>

