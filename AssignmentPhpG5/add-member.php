<?php
$page_title = 'Add Member';
$cssName = 'add-member';
include 'helper.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //var_export($_POST);
    
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $Email = trim($_POST['Email']);
    $birthDate = trim($_POST['birthDate']);
    $gender = array_key_exists('gender', $_POST) ? $_POST['gender'] : null;
    $phoneNumber =trim($_POST['phoneNumber']);
    $Address = trim($_POST['Address']);
    $passw = trim($_POST['passw']);

    //check if ID is in correct pattern
    //$pattern = "/[22]{2}[0-9]{4}/";
    //if (!preg_match($pattern, $id)) {
      //  $error['id'] = "Please insert an <b>ID</b> with a valid pattern.";
    //} else {
        $sql = "SELECT * FROM member WHERE memberID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $error['id'] = "<b>Member ID</b> given already exist. Try another.";
        }
        
         //check name, gender, program
   if (empty($firstname)) {
        $error['firstname'] = 'Please insert a <b>First Name</b>.';
    }
    if (empty($lastname)) {
        $error['lastname'] = 'Please insert a <b>Last Name</b>.';
    }
    if (empty($Email)) {
        $error['Email'] = 'Please insert an <b>Email</b>.';
    }
    
    if (empty($phoneNumber)) {
        $error['phoneNumber'] = 'Please insert a <b>Phone Number</b>.';
    }
    if (empty($birthDate)) {
        $error['birthDate'] = 'Please insert a <b>Birth Date</b>.';
    }
    if (empty($gender)) {
        $error['gender'] = 'Please insert a <b>Gender</b>.';
    }
    if (empty($Address)) {
        $error['Address'] = 'Please insert an <b>Address</b>.';
    }
    if (empty($passw)) {
        $error['passw'] = 'Please insert a <b>Password</b>.';
    }

    if (isset($error)) {
        echo '<div class="alert alert-dismissible alert-warning" style="background-color:red;padding:5px">
  <h4 class="alert-heading">Warning!</h4>
  <ul class="mb-0">';
        foreach ($error as $e => $t) {
            echo "<li>$t</li>";
        }
        echo '</ul></div>';
    } else {
        $sql = "INSERT INTO member (firstN,lastN,email,phoneNum,birth,gender,address,password) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssss',$firstname,$lastname,$Email,$phoneNumber,$birthDate,$gender,$Address,$passw);
        $result = $stmt->execute();
        if ($result == true) {
            echo '<div class="alert alert-dismissible alert-success" style="background-color:lightgreen;padding:5px">
  <h4 class="alert-heading">Success!</h4>
  <p class="mb-0">';
            echo "Member $firstname $lastname added successfully.</p></div>";
            $id = null;
            $firstname = null;
            $lastname = null;
        } else {
            var_dump($result);
        }
    }
    }

   
//}
?>
<div class="content">
        <div class="add-member">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="add">
                <h1>Add member</h1>
                <table class="table table-hover" cellspacing="10" cellpadding="20">
                  
                        <tr>
                            <th>First Name :</th>
                            <td><input type="text"
                                       name="firstname" <?= isset($firstname) ? "value='$firstname'" : null ?>
                                       class="form-control">                      
                            </td>
                        </tr>
                    
                        <tr>
                            <th>Last Name :</th>
                            <td><input type="text"
                                       name="lastname" <?= isset($lastname) ? "value='$lastname'" : null ?>
                                       class="form-control">                      
                            </td>
                        </tr>              
                   
                        <tr>
                            <th>Email :</th>
                            <td><input type="email"
                                       name="Email" <?= isset($Email) ? "value='$Email'" : null ?>
                                       class="form-control">                      
                            </td>
                        </tr>              
                  
                        <tr>
                            <th>Phone Number:</th>
                            <td><input type="phone"
                                       name="phoneNumber" <?= isset($phoneNumber) ? "value='$phoneNumber'" : null ?>
                                       class="form-control">                      
                            </td>
                        </tr>              
                   
                        <tr>
                            <th>Birth date: </th>
                            <td><input type="date"
                                       name="birthDate" <?= isset($birthDate) ? "value='$birthDate'" : null ?>
                                       class="form-control">                      
                            </td>
                        </tr>              
                  
                        <tr>
                            <th>Gender :</th>
                            <td>
                                <?php
                                foreach (getGenders() as $v => $t) {
                                    echo "<input type='radio'
                                 name='gender'
                                 value='$v' id='$v'
                                 class='form-check-input' style='color:black'>
                          <label for='$v'
                                 class='form-check-label'>
                          $t&nbsp;</label>";
                                }
                                ?>
                            </td>
                        </tr>
                
                        <tr>
                            <th>Location Address: </th>
                            <td><input type="text"
                                       name="Address" <?= isset($Address) ? "value='$Address'" : null ?>
                                       class="form-control">                      
                            </td>
                        </tr>              
                
                        <tr>
                            <th>Password: </th>
                            <td><input type="password"
                                       name="passw" <?= isset($passw) ? "value='$passw'" : null ?>
                                       class="form-control">                      
                            </td>
                        </tr>              
                  

                </table>

                <input type="submit" value="Insert" class="btn btn-primary">
                <a href="membership-manage.php" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
        
<?php
    include 'footer.php';
?>
  