<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
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

//function getEventName($eventid) {
//    $sql = "SELECT $eventId, $eventN FROM event ";
//    $result = $conn->query($sql);
//    while ($row = $result->fetch_assoc()) {
//        if($eventid = $row[$eventId]){
//        $eventName = $row[$eventN];
//        return $eventName;
//        } 
//    }
//}