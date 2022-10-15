<?php
//get event id



    
    
       $eventID = isset($_GET['id']) ? $_GET['id'] : 0;
    if($eventID == 0){
        header('Refresh:3; url=list-event.php');
        echo'Event not found!';
    }
    
    echo $eventID;

//connect database
include 'connect-database.php';

// sql to delete a record
$sql = "DELETE FROM event WHERE eventID = '$eventID'";

if (mysqli_query($con, $sql)) {
    header('Refresh:3; url=list-event.php');
  echo "Event deleted successfully";
} 