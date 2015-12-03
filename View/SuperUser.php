<?php 
    include ('Header.php');
    include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
    
    session_start();
    $session = $_SESSION[dept];
?>

<body>
    <div id="page">
        <div id="body">
            <label class="title"><?php echo strtoupper($session); ?> DEPARTMENT</label>  
                <table>
                    <tr>
                        <th></th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                </tr>
                <?php 
                
                try {
                    $sql = "SELECT UserID, FirstName, LastName, Phone, Email "
                            . "FROM USER "
                            . "WHERE Department = '".$session."' AND Role = 'Employee' "
                            . "ORDER BY 'FirstName' ;";
                    $result = $pdo->query($sql); 
                    
                    } catch (Exception $ex) {
        echo 'Connection Failed: ' . $ex->getMessage();
    }
                
                    while($val=$result->fetch()):
                        $userID = $val['UserID'];
                        $fName = $val['FirstName'];
                        $lName = $val['LastName'];
                        $phone = $val['Phone'];
                        $email = $val['Email'];
                        
                    ?>
                <tr>
                    <td><button>Activity</button>
                    <td><?php echo $fName; ?></td>
                    <td><?php echo $lName; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $email; ?></td>
                </tr>
                <?php
                    endwhile;
                ?>
            </table>
        </div>     
    </div>
</body>
</html>