<?php

/* 
 * @author: Robert Vines
 */
     
 include ('Header.php');
 include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
 
 session_start();
 $deptSession = $_SESSION[dept];
 
?>

<body>
    <div id="page">
        <div id="body">
            <h1 class="title"><?php echo $deptSession . ' Employee Reports'; ?></h1>
            
            <table>
                <tr>
                    <th></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Number</th>
                    <th>Email</th>
                </tr>
                <?php
                    $sql = "SELECT FirstName, LastName, Phone, Email FROM USER ORDER BY FirstName, LastName;";
                    $result1 = $pdo->query($sql); 
                
                    while($val=$result1->fetch()):
                        $fName = $val['FirstName'];
                        $lName = $val['LastName'];
                        $phone = $val['Phone'];
                        $email = $val['Email'];
                ?>
                <tr>
                    <td><button>Activity</button></td>
                    <td><?php echo $fName; ?></td>
                    <td><?php echo $lName; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><b>Subject</b></td>
                    <td><b>Duration</b></td>
                    <td><b>Time Stamp</b></td>
                    <td><b>Result</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php endwhile; ?>
            </table>
            
        </div>
    </div>
</body>
</html>