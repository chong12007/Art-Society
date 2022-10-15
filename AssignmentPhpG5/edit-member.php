<?php

$p = $_GET['p'] ?? '';
$o = $_GET['o'] ?? '';
$page_title = 'Member edit';
$cssName = 'edit-member';
include 'helper.php';
include 'header.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //var_export($_POST);
    $id = trim($_POST['id']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $Email = trim($_POST['Email']);
    $birthDate = trim($_POST['birthDate']);
    $gender = trim($_POST['gender']);
    $phoneNumber =trim($_POST['phoneNumber']);
    $Address = trim($_POST['Address']);
    $passw = trim($_POST['passw']);

    
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
     }else {
        $sql = "UPDATE member SET firstN=?,lastN=?,email=?,phoneNum=?,birth=?,gender=?,address=?,password=? 
                WHERE memberID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssssss', $firstname,$lastname,$Email, $phoneNumber,$birthDate,$gender, $Address,$passw, $id);
        $result = $stmt->execute();
        if ($result == true) {
            echo '<div class="alert alert-dismissible alert-success" style="background-color:lightgreen;padding:5px">
  <h4 class="alert-heading">Success!</h4>
  <p class="mb-0">';
            echo "Member <b>$firstname $lastname</b> updated successfully.</p></div>";
        } else {
            var_dump($result);
        }
    }

        }else {
    $id = $_GET['id'] ?? '';
    $phoneNumber = $_GET['phoneNumber'] ?? '';
    //check if ID is in correct pattern
    $pattern = "/[22]{2}[0-9]{4}/";
    $phonePattern = "/[01]{2}[0-9]{1}[-]{1}[0-10]{8}/";
    if (!preg_match($pattern, $id)) {
        $error['id'] = "Please use an <b>ID</b> with a valid pattern.";
    }else if(!preg_match($phonePattern, $phoneNumber)){
        $error['phoneNumber'] = "Please use valid <b>phone number</b>";
    } else {
        $sql = "SELECT * FROM member WHERE memberID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $firstname = $row[$fname];
            $lastname = $row[$lname];
            $Email = $row[$email];
            $phoneNumber = $row[$phone];
            $birthDate = $row[$birthdate];
            $Gender = $row[$gender];
            $Address = $row[$address];
            $passw = $row[$passW];
        }
    }
}
?>
    
        <div class="form">
          <div class="edit-form">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <legend>Edit member</legend>
            <table cellspacing="10" cellpadding="20">
               
            
            <fieldset>
              
              
              <div class="form-group">
                <tr>
                    <th>Member ID :</th>
                    <td><?= $id ?>
                        <input type="hidden"
                               name="id"
                               <?= isset($id) ? "value='$id'" : null ?>
                               class="form-control">                      
                    </td>
                </tr>                 
              </div>
              <div class="form-group">
                <tr>
                    <th>First Name :</th>
                    <td><input type="text"
                               name="firstname" <?= isset($firstname) ? "value='$firstname'" : null ?>
                               class="form-control">                      
                    </td>
                </tr>              
              </div
              <div class="form-group">
                <tr>
                    <th>Last Name :</th>
                    <td><input type="text"
                               name="lastname" <?= isset($lastname) ? "value='$lastname'" : null ?>
                               class="form-control">                      
                    </td>
                </tr>              
              </div>
              <div class="form-group">
                  <tr>
                      <th>Email :</th>
                      <td><input type="email"
                                 name="Email" <?= isset($Email) ? "value='$Email'" : null ?>
                                 class="form-control">                      
                      </td>
                  </tr>              
              </div>
              <div class="form-group">
                  <tr>
                      <th>Phone Number:</th>
                      <td><input type="phone"
                                 name="phoneNumber" <?= isset($phoneNumber) ? "value='$phoneNumber'" : null ?>
                                 class="form-control">                      
                      </td>
                  </tr>              
              </div>

              <div class="form-group">
                  <tr>
                      <th>Birth date: </th>
                      <td><input type="date"
                                 name="birthDate" <?= isset($birthDate) ? "value='$birthDate'" : null ?>
                                 class="form-control">                      
                      </td>
                  </tr>              
              </div>     
              <div  class="form-group">
              <tr>
            <th>Gender :</th>
            <td>
<?php
foreach (getGenders() as $v => $t) {
    echo "<input type='radio'
                                 name='gender'
                                 value='$v' id='$v'
                                 class='form-check-input'>
                          <label for='$v'
                                 class='form-check-label'>
                          $t&nbsp;</label>";
}
?>
            </td>
        </tr>
        </div>
              <div class="form-group">
                  <tr>
                      <th>Location Address: </th>
                      <td><input type="text"
                                 name="Address" <?= isset($Address) ? "value='$Address'" : null ?>
                                 class="form-control">                      
                      </td>
                  </tr>              
              </div>
              <div class="form-group">
                  <tr>
                      <th>Password: </th>
                      <td><input type="password"
                                 name="passw" <?= isset($passw) ? "value='$passw'" : null ?>
                                 class="form-control">                      
                      </td>
                  </tr>              
              </div>
            </fieldset>
            </table>
            <input type="submit" value="Update" class="btn btn-primary">
            <a href="show-member.php" class="btn btn-outline-secondary">Cancel</a>
        </form>
          </div>
        </div>
<?php

include 'footer.php';