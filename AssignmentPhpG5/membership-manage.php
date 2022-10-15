<?php

$p = $_GET['p'] ?? '';
$o = $_GET['o'] ?? '';
$page_title = 'Member Manage';
$cssName = 'membership-manage';
include 'helper.php';
include 'header.php';


$sql = "SELECT $memberId, $fname ,$lname, $email FROM member ";
$sql .= $o ? "ORDER BY $o" : '';
$result = $conn->query($sql);

$count = 0;
while ($row = $result->fetch_assoc()){
    $count++;
}
$sql = "SELECT $memberId, $fname ,$lname, $email FROM member ";
$sql .= $o ? "ORDER BY $o" : '';
$result = $conn->query($sql);

?>
<main>
    <h2>What do we have here today?</h2>
        <div class="cards">
        <div class="card-single">
            <div class="card-content">
                <h1><?=$count?> &nbsp;<i class='fa fa-users'></i></h1>
                <span>Total Membership</span>
            </div>
            <a href="add-member.php" id="card-footer">Add members&nbsp;<i class="fa fa-arrow-right"></i></a>
        </div>
            <div class="card-single">
            <div class="card-content">
                <h1>Up Coming</h1>

            </div>

        </div>
    </div>
        <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h2>Members list</h2>
                    <a href="show-member.php">Edit&nbsp;<span class="fa fa-arrow-right"></span></a>
                </div>
                <div class="card-body">
                    <table class='table table-hover' width="100%">
                        <thead>
                            
                                <?php if ($result->num_rows > 0) { ?>

                                <tr>
                                    <th><a href="<?= "$self?o=$memberId" ?>">Member ID</a></th>
                                    <th><a href="<?= "$self?o=$fname" ?>">Name</a></th>
                                    
                                    <th><a href="<?= "$self?o=$email" ?>">Email</a></th>

                                </tr>
                            </thead>
                            <?php
                            $count=0;
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr><td>$row[$memberId]</td><td>$row[$fname] $row[$lname]</td>
                                        <td>$row[$email]</td></tr>";
                                        $count++;
                                    } 
                                }else {
                                    echo "No result.";
                                    }
                            ?>
                                
                                </table>

                        </div>
                    </div>
                </div>
            </div>


        </main>
<?php include './footer.php';
?>