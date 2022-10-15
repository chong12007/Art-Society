<?php

$p = $_GET['p'] ?? '';
$o = $_GET['o'] ?? '';
$page_title = 'Show Manage';
$cssName = 'show-member';
include 'helper.php';
include 'header.php';

$sql = "SELECT $memberId, $fname ,$lname, $email,$phone, $birthdate, $gender, $address FROM member ";
$sql .= $o ? "ORDER BY $o" : '';
$result = $conn->query($sql);

if ($result->num_rows > 0) { ?>
    <table class='table table-hover'>
        <tr>
            <th><a href="<?= "$self?o=$memberId" ?>">Member ID</a></th>
            <th><a href="<?= "$self?o=$fname $lname" ?>">Name</a></th>
            <th><a href="<?= "$self?o=$email" ?>">Email</a></th>
            <th><a href="<?= "$self?o=$$phone" ?>">Phone</a></th>
            <th><a href="<?= "$self?o=$$birthdate" ?>">Birth Date</a></th>
            <th><a href="<?= "$self?o=$gender" ?>">Gender</a></th>
            <th><a href="<?= "$self?o=$address" ?>">Address</a></th>
            <th></th>
            <th><a href='membership-manage.php' class='back' style='text-decoration: none;background-color: grey;border-radius: 30px;padding: 5px;margin: 2px'>Back</a></th>
        </tr>
        
    <?php while ($row = $result->fetch_assoc()) {
        $g = getGender($row[$gender]);
        echo "<tr><td>$row[$memberId]</td><td>$row[$fname] $row[$lname]</td><td>$row[$email]</td><td>$row[$phone]</td><td>$row[$birthdate]</td><td>$g</td><td>$row[$address]<td>
            <td><a href='edit-member.php?id=$row[$memberId]' class='btn btn-warning'>Edit </a><p>&nbsp</p>
                <a href='delete-member.php?id=$row[$memberId]' class='btn btn-danger'>Delete</a></td></tr>";
    }
    echo "<tr><td colspan=4>$result->num_rows record(s) returned.</td>";
    echo "</table>";
    
} else {
    echo "No result.";
    
}

include './footer.php';