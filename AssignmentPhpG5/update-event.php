<?php

session_start(); 
        $eventID = $_SESSION['eventID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$eventName = isset($_POST['eventName']) ? trim($_POST['eventName']) : '';
$eventDesc = isset($_POST['eventDesc']) ? trim($_POST['eventDesc']) : '';
$venue = isset($_POST['venue']) ? trim($_POST['venue']) : '';
$maxPerson= isset($_POST['maxPerson']) ? trim($_POST['maxPerson']) : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';
$start_time = isset($_POST['start_time']) ? trim($_POST['start_time']) : '';
$end_time = isset($_POST['end_time']) ? trim($_POST['end_time']) : '';
}



//data should not be null
if(empty($eventName) || empty($eventDesc)){
    header('Refresh:3;url=list-event.php');
    echo "Data should not be blank!";
}
//connect database
include 'connect-database.php';

$sql ="UPDATE event SET "
        . "eventName = '{$eventName}', "
        . "eventDesc = '{$eventDesc}', "
        . "venue = '{$venue}', "
        . "maxPerson = '{$maxPerson}', "
        . "event_date = '{$date}', "
        . "event_start_time = '{$start_time}', "
        . "event_end_time = '{$end_time}' "
        . "WHERE eventID = '{$eventID}';";
        
 if(mysqli_query($con, $sql)){
//Successfully update event
header('Refresh:3; url= list-event.php');
exit('Event '.$eventName.' updated successfully') ;
}else{
    echo 'failed';
}