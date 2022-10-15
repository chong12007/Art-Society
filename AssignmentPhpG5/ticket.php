<?php

$page_title = 'Ticket Booking';
$cssName = 'ticket';
include 'helper.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //var_export($_POST);
    
    $memberid = trim($_POST['memberid']);
    $eventid = trim($_POST['eventid']);
    $Quantity = $_POST['Quantity'];

    //check if ID is in correct pattern
     $pattern = "/[22]{2}[0-9]{4}/";
     $bookingpattern = "/[22]{2}[55]{2}[0-9]{4}/";
    if (!preg_match($pattern, $memberid)) {
        $error['id'] = "Please insert an <b>ID</b> with a valid pattern.";
    } else {
        $sql = "SELECT * FROM booking WHERE bookingID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $bookingid);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $error['bookingid'] = "<b>Booking ID</b> given already exist. Try another.";
        }
    }

    //check name, gender, program
    if (empty($memberid)) {
        $error['memberid'] = 'Please insert a <b>Member ID</b>.';
    }
    if (empty($eventid)) {
        $error['eventid'] = 'Please insert an <b>Event</b>.';
    }
    if (empty($Quantity)) {
        $error['Quantity'] = 'Please insert a <b>Quantity</b>.';
    }
    
//    $sql2 = "SELECT $ticketLeft FROM ticketleft where eventID = ?";
//        $stmt = $conn->prepare($sql2);
//        $stmt->bind_param('s', $eventid);
//        $stmt->execute();
//        $result = $stmt->get_result();
//        if ($result->num_rows > 0) {
//            $row = $result->fetch_assoc();
//            $ticketCheck = $row[$ticketLeft];
//            
//        }
//
//    if (isset($error)) {
//        echo '<div class="alert" style="background-color:red;padding:10px">
//        <h4 class="alert-heading">Warning!</h4>
//        <ul class="mb-0">';
//        foreach ($error as $e => $t) {
//            echo "<li>$t</li>";
//        }
//        echo '</ul></div>';   
//    }else if($ticketCheck < $Quantity ){
//                
//             echo '<div class="alert" style="background-color:red;padding:5px">
//        <h4 class="alert-heading">Ticket has out of stock!</h4></div>';
//
//    }else{       
        $sql = "INSERT INTO booking (memberID,eventID,quantity) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $memberid, $eventid, $Quantity);
        $result = $stmt->execute();
        if ($result == true) {
             
            echo '<div class="alert" style="background-color:lightgreen;padding:5px">
  <h4 class="alert-heading" style="color:white">Success!</h4>
  <p class="mb-0" style="color:white">';
            echo "Please keep it until you the Exhibition coming.</p>";
        echo '<a href="landing_page.php" class="cancel" style="text-decoration: none;background-color: grey;border-radius: 30px;padding: 5px;margin: 2px">Back</a></div>';
        } else {
            var_dump($result);
        }
    }

?>
                <div class="content">
                    <div class="ticket-form">
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <div class="ticket">
                            <h1>Here to book your TICKET</h1>
                            <table cellspacing="0" cellpadding="20">
                                <tr>
                                    <th>Member ID :</th>
                                    <td><input type="text"
                                               name="memberid"
                                               placeholder="Format of ID: 22????"
                                               maxlength="10" <?= isset($memberid) ? "value='$memberid'" : null ?>
                                               class="form-control">                      
                                    </td>
                                </tr>

                                <tr>
                                    <th>Which Event :</th>
                                    <td><select name="eventid" class="form-select">
                                            <option value="">-- Select One --</option>
                                            <?php
                                            $sqll = "SELECT eventID, eventName FROM event ";
                                            $eventresult = $conn->query($sqll);
                                            while ($eventrow = $eventresult->fetch_assoc()) {
                                                $eventName = $eventrow['eventName'];
                                                $eventID = $eventrow['eventID'];
                                                
                                                echo "<option value='$eventID'>$eventName</option>";
                                                
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>How many person to go :</th>
                                    <td><input type="number"
                                               name="Quantity"
                                               min="1" max="100" step="1" value="1" <?= isset($Quantity) ? "value='$Quantity'" : null ?>
                                               class="form-control">                      
                                    </td>
                                </tr>
                            </table>
                            <input type="submit" value="Insert" class="btn btn-primary">
                            <a href="landing_page.php" class="cancel" style="text-decoration: none">Cancel</a>
                            </div>
                        </form>

                        </div>
                </div>
<?php 
include './footer.php';
?>