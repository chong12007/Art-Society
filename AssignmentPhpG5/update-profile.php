<?php
//Check if data edy post,if yes then give value else give empty value
  // second script
        session_start(); 
        $id = $_SESSION['id'];
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
$fname2 = isset($_POST['fname']) ? trim($_POST['fname']) : '';
$lname2= isset($_POST['lname']) ? trim($_POST['lname']) : '';
$email3 = isset($_POST['email']) ? trim($_POST['email']) : '';
$phonenum2 = isset($_POST['phonenum']) ? trim($_POST['phonenum']) : '';
$birthd2 = isset($_POST['birthd']) ? $_POST['birthd'] : '';
$address2 = isset($_POST['address']) ? trim($_POST['address']) : '';
$gender2 = isset($_POST['gender']) ? $_POST['gender'] : '';
$pass2 = isset($_POST['pass']) ? trim($_POST['pass']) : '';


}

//connect database
include './connect-database.php';

//get data
$sql = "select * from member";
if(!mysqli_query($con, $sql)){
    echo 'error getting email';
}

$result = mysqli_query($con, $sql);

//get all data by row



//Validfy Accepted data
if(empty($pass2)){
    exit ('Password Cannot be empty');
}


//
////Check password 
//if($pass != $copass){
//    header('Refresh:2; url=register.html');
//    exit('Password not the same!');
//}

//Birthday cannot in future
$date = date('Y-m-d');

if($birthd2 > $date){
     header('Refresh:2; url= profile.php');
    exit('Invalid Birth Day!!');
}

//Update data
$sql = "UPDATE `member` SET "
        . "`firstN` = '{$fname2}', "
        . "`lastN` = '{$lname2}', "
        . "`email` = '{$email3}', "
        . "`phoneNum` = '{$phonenum2}', "
        . "`birth` = '{$birthd2}', "
        . "`gender` = '{$gender2}', "
        . "`address` = '{$address2}', "
        . "`password` = '{$pass2}' "
        . "WHERE `member`.`memberID` = $id";

if(mysqli_query($con, $sql)){
    //Successfully update profile
header('Refresh:3; url= profile.php');
exit('Profile '.$fname2.' updated successfully') ;
}