<?php

session_start(); 
      
       $loginStatus = $_SESSION['loginStatus'];
         
      if($loginStatus != "admin"){
          header('Location: admin-login.php');
          exit();
      }
        
        
//connect database
include 'connect-database.php';

//get all event info
$sql = "select * from event";
if(!mysqli_query($con, $sql)){
    die("error getting info in event table");
}


$result = mysqli_query($con, $sql);
$events = array();

//get all data by row

   while($row = mysqli_fetch_assoc($result)) {
       $events[] = $row;
   }
   
   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" ></script>
<title>Profile</title>
    <style>

     body {
     background-image:url("images/bg2.jpg");
     background-size : 100%;
     background-repeat : no-repeat;
    background-attachment: fixed;
}

tbody{
    color:white;
}


    </style>
</head>
<body>

<?php
include './heading.php';
?>

   <h3 style="color:white;">Event Information</h3>
<!--        <button class="btn btn-primary float-end " href="edit_event.html" >Add Event</button>-->
<a class="btn btn-primary btn btn-info btn btn-primary float-end" style="color: white; text-align: right;" href ="add-event.php">Add Event</a>

        <table class="table table-bordered table table-hover table-dark">
            <!--thead=======================-->
            <thead class="thead-dark ">
                <tr>
                    <th>Event ID</th>
                    <th>Event Name</th>
                    <th>Event Description</th>
                    <th>Venue</th>
                    <th>Max Person</th>
                    <th>Event date</th>
                     <th>Event Start Time</th>
                     <th>Event End Time</th>
                      <th>Event Created date</th>
                    <th>Modify</th>
                </tr>
            </thead>
            <!--thead======================-->
            <tbody class="table-striped">
            <?php foreach ($events as $e => $event):?>
            <!--info in table================-->
            <tr>
                <td><?php echo $event['eventID']; ?></td>
                    <td><?php echo $event['eventName'];?></td>
                    <td><?php echo $event['eventDesc'];?></td>
                    <td><?php echo $event['venue'];?></td>
                    <td><?php echo $event['maxPerson'];?></td>
                     <td><?php echo $event['event_date'];?></td>
                      <td><?php echo $event['event_start_time'];?></td>
                        <td><?php echo $event['event_end_time'];?></td>
                       <td><?php echo $event['event_date_created'];?></td>
                     <td>   <!--Modify-->
                          <a href='edit-event.php?id=<?php echo $event['eventID'];?>' class="badge badge-primary" >Edit</a>&nbsp;
                         <a href ="delete-event.php?id=<?php echo $event['eventID'];?>" onclick="return confirm('Do you wish to delete the event?')" class="badge badge-danger">Delete</a>&nbsp;
                     </td>  
            </tr>
             <!--info in table================-->
            <tbody>
             <?php endforeach;?>
        </table>

<?php
include './footer.php';
?>