<?php
//include_once ("create-database.php");


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "assignment";

// Create connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

//booking
$bookingId = 'bookingID';
$booktime = 'bookingTime';
$quantity = 'quantity';
//member
$memberId = 'memberID';
$fname = 'firstN';
$lname = 'lastN';
$email = 'email';
$phone = 'phoneNum';
$birthdate = 'birth';
$gender = 'gender';
$address = 'address';
$passW = 'password';
//event
$eventId = 'eventID';
$eventN = 'eventName';
$eventDesc = 'eventDesc';
$eventdate = 'EventDate';
$maxPerson = 'maxPerson';

//ticketleft
$ticketBooked = 'totalTicket';
$ticketLeft = 'ticketLefted';

$self = $_SERVER['PHP_SELF'];

function getGenders() {
    return ['M' => 'Male', 'F' => 'Female'];
}

function getGender($g) {
    $genders = getGenders();
    if(array_key_exists($g, $genders)) {
        return $genders[$g];
    } else {
        return NULL;
    }
} 
