<?php

$page_title = 'Delete Member';
$cssName = 'delete-member';
include 'helper.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //var_export($_POST);
    $id = trim($_POST['id']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $Email = trim($_POST['Email']);
    $birthDate = trim($_POST['birthDate']);
    $phoneNumber =trim($_POST['phoneNumber']);
    $Address = trim($_POST['Address']);
    $passw = trim($_POST['passw']);

    //check name, gender, program
    
    if (empty($firstname)) {
        $error['firstname'] = 'Please insert a <b>First Name</b>.';
    }
    if (empty($lastname)) {
        $error['lastname'] = 'Please insert a <b>Last Name</b>.';
    }
    if (empty($Email)) {
        $error['Email'] = 'Please insert a <b>Email</b>.';
    }
    
    if (empty($phoneNumber)) {
        $error['phoneNumber'] = 'Please insert a <b>Phone Number</b>.';
    }
    if (empty($birthDate)) {
        $error['birthDate'] = 'Please insert a <b>Birth Date</b>.';
    }
    if (empty($Address)) {
        $error['Address'] = 'Please insert a <b>Address</b>.';
    }
    if (empty($passw)) {
        $error['passw'] = 'Please insert a <b>Password</b>.';
    }


    if (isset($error)) {
        echo '<div class="alert alert-dismissible alert-warning">
  <h4 class="alert-heading">Warning!</h4>
  <ul class="mb-0">';
        foreach ($error as $e => $t) {
            echo "<li>$t</li>";
        }
        echo '</ul><a href="delete-member.php" class="btn btn-outline-secondary">Retry</a></div>';
    } else {
        $sql = "DELETE FROM booking WHERE memberID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $id);
        $result = $stmt->execute();
        $sql = "DELETE FROM member WHERE memberID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $id);
        $result = $stmt->execute();
        if ($result == true) {
            echo '<div class="alert alert-dismissible alert-success">
  <h4 class="alert-heading">Success!</h4>
  <p class="mb-0">';
            echo "Member <b>$firstname $lastname</b> deleted successfully.</p></div>";
            echo '<a href="show-member.php" class="btn btn-primary">Back to List</a>';
        } else {
            var_dump($result);
        }
    }
} else { 
    $id = $_GET['id'] ?? '';
    $phoneNumber = $_GET['phoneNumber'] ?? '';
    //check if ID is in correct pattern
    $pattern = "/[22]{2}[0-9]{4}/";
    $phonePattern = "/[01]{2}[0-9]{1}[-]{1}[0-10]{8}/";
    if (!preg_match($pattern, $id)) {
        $error['id'] = "Please use an <b>ID</b> with a valid pattern.";
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
            $Address = $row[$address];
            $passw = $row[$passW];
        }
    
}
?>
<div class="delete-member">
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="delete">
        <legend>Delete?</legend>
    <table class="table table-hover" cellspacing="5" cellpadding="10">
        <tr>
            <th>Member ID:</th>
            <td><?= $id ?>
                <input type="hidden"
                       name="id"
                       <?= isset($id) ? "value='$id'" : null ?>
                       class="form-control">                      
            </td>
        </tr>
        <tr>
            <th>First Name:</th>
            <td><?= $firstname ?>
                <input type="hidden"
                       name="firstname" <?= isset($firstname) ? "value='$firstname'" : null ?>
                       class="form-control">                      
            </td>
        </tr>
        <tr>
            <th>Last Name:</th>
            <td><?= $lastname ?>
                <input type="hidden"
                       name="lastname" <?= isset($lastname) ? "value='$lastname'" : null ?>
                       class="form-control">                      
            </td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?= $Email ?>
                <input type="hidden"
                       name="Email" <?= isset($Email) ? "value='$Email'" : null ?>
                       class="form-control">                      
            </td>
        </tr>
        <tr>
            <th>Phone Number:</th>
            <td><?= $phoneNumber ?>
                <input type="hidden"
                       name="phoneNumber" <?= isset($phoneNumber) ? "value='$phoneNumber'" : null ?>
                       class="form-control">                      
            </td>
        </tr>
        <tr>
            <th>Birth Date:</th>
            <td><?= $birthDate ?>
                <input type="hidden"
                       name="birthDate" <?= isset($birthDate) ? "value='$birthDate'" : null ?>
                       class="form-control">                      
            </td>
        </tr>
                <tr>
            <th>Gender:</th>
            <td><?= getGender($gender) ?></td>
        </tr>
        <tr>
            <th>Address:</th>
            <td><?= $Address ?>
                <input type="hidden"
                       name="Address" <?= isset($Address) ? "value='$Address'" : null ?>
                       class="form-control">                      
            </td>
        </tr>
        <tr>
            <th>Password:</th>
            <td><?= $passw ?>
                <input type="hidden"
                       name="passw" <?= isset($passw) ? "value='$passw'" : null ?>
                       class="form-control">                      
            </td>
        </tr>
    </table>
    <input type="submit" value="Delete" class="btn btn-primary">
    <a href="show-member.php" class="btn btn-outline-secondary">Cancel</a>
    </div>
</form>
</div>
<?php
}
include 'footer.php';
