<?php
//get event id
    $eventID = isset($_GET['id']) ? $_GET['id'] : 0;
    if($eventID == 0){
        header('Refresh:3; url=list-event.php');
        echo'Event not found!';
    }
   
      session_start(); 
        $_SESSION['eventID'] = $eventID;

    
//connect database
include 'connect-database.php';

$sql = "select * from event where eventID = '$eventID'";
if (!mysqli_query($con, $sql)) {
    header('Refresh:3; url=list-event.php');
  echo "event not found";
} 



$result = mysqli_query($con, $sql);
$event = mysqli_fetch_assoc($result);

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
 <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Profile</title>
    
    <style>
      html, body {
      min-height: 100%;
      background-image: linear-gradient(black, grey, rgb(60, 35, 51));
      }
      body, div, form, input, select, textarea, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 32px;
      color: #fff;
      z-index: 2;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 20px 0 #a82877; 
 background-color: rgba(0,0,0, .1);
      }
      .banner {
      position: relative;
          height: 110px;
      background-image: url("/uploads/media/default/0001/02/8ca4045044162379597641472fa0bb5489ba418f.jpeg");      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.5); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, textarea, select {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color: #a82877;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #a82877;
      color: #a82877;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #a9a9a9;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 0;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      input[type="time"]::-webkit-inner-spin-button {
      margin: 2px 22px 0 0;
      }
      input[type=radio], input.other {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 10px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      label.radio:before {
      content: "";
      position: absolute;
      top: 2px;
      left: 0;
      width: 15px;
      height: 15px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      #radio_5:checked ~ input.other {
      display: block;
      }
      input[type=radio]:checked + label.radio:before {
      border: 2px solid #a82877;
      background: #a82877;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 7px;
      left: 5px;
      width: 7px;
      height: 4px;
      border: 3px solid #fff;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .btn-block-right {
      margin-top: 10px;
      text-align: right;
      }
    .btn-block-left {
      margin-top: 10px;
      text-align: left;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #a82877;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #bf1e81;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .city-item input {
      width: calc(50% - 20px);
      }
      .city-item select {
      width: calc(50% - 8px);
      }
        p{
         color:white;
        }
      }
    </style>
</head>
<body>

<?php
include './heading.php';
?>

 <div class="testbox">
     <form action= "update-event.php" method="post">

        <div class="banner">
          <h1>Edit Event Details</h1>
        </div>
        <div class="item">
          <p>Event Name</p>
          <input type="text" name="eventName" value="<?php echo $event['eventName'];?>" />
         
        </div>
          <div class="item">
          <p>Description of Event</p>
          <textarea rows="3" name="eventDesc" ><?php echo $event['eventDesc'];?></textarea>
        </div>
          
             <div class="item">
          <p>Venue</p>
          <input type="text" name="venue" value="<?php echo $event['venue'];?>"/>
        </div>
        
        
  
          <div class="item">
          <p>Maximum Participant</p>
          <input type="text" name="maxPerson"   value=   "<?php echo $event['maxPerson'];?>"  />
        </div>
         <div class="item">
          
                 
          <p>Date of Event</p>
         
          <input type="date" id="date" name="date" />
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="item">
          <p>Event Start Time</p>
          <input type="time" name="start_time"  />
<!--          <i class="fas fa-clock"></i>-->
        </div>
          
          <div class="item">
          <p>Event End Time</p>
          <input type="time" name="end_time"  />
<!--          <i class="fas fa-clock"></i>-->
        </div>
        
          <div class="btn-block-right">
          <button type="reset" >Reset</button>
          <button type="submit">SEND</button>
        </div>
        
      </form>
    </div>

<?php
include './footer.php';
?>
