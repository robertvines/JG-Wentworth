<?php

/* 
 * To insert, edit, and delete a company and non-company client.
 * 
 * @author: Robert Vines
 */
  
    include ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php');
    
        //create company client
    if (isset($_POST['createCompClient']))
    {
        $target_dir = $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/ClientImages/';
        $target_file = $target_dir . basename($_FILES['compPhoto']['name']);
      
            if (move_uploaded_file($_FILES['compPhoto']['tmp_name'], $target_file)) //if file is moved to folder
            {
                echo 'The file'. basename($_FILES['compPhoto']['name'])." has been uploaded.";
            }else 
            {
               echo 'Sorry, there was an error uploading your file. '.$target_file; 
            }
        
        $fName = $_POST['compFName'];
        $lName = $_POST['compFName'];
        $title = $_POST['compTitle'];
        $compName = $_POST['compCompany'];
        $phone = $_POST['compPhone'];
        $email = $_POST['compEmail'];
        $fContacted = $_POST['compFContacted'];
   
        $sql = "SELECT CompanyID FROM COMPANY WHERE Name = '".$compName."';";
        $pdo->query($sql);

            $result = $pdo->query($sql);
            
            while($val=$result->fetch()):
            {
            $compId = $val['CompanyID'];
            }
            endwhile;
            
        $sql = "INSERT INTO COMPANY_MEMBER (CompanyID, FirstName, LastName, Title, Phone, Email, DateFirstContact, PhotoURL) "
                . "VALUES('".$compId."', '".$fName."', '".$lName."', '".$title."', '".$phone."', '".$email."', '".$fContacted."', '".$target_file."');";
        $pdo->query($sql);
        header("Location: /JGWentworth/View/Client.php");
    }
    
    if (isset($_POST['createClient']))
    {
        //create client
        $target_dir = $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/ClientImages/';
        $target_file = $target_dir . basename($_FILES['clientPhoto']['name']);
      
            if (move_uploaded_file($_FILES['clientPhoto']['tmp_name'], $target_file)) //if file is moved to folder
            {
                echo 'The file'. basename($_FILES['clientPhoto']['name'])." has been uploaded.";
            }else 
            {
               echo 'Sorry, there was an error uploading your file. '.$target_file; 
            }
        
        $fName2 = $_POST['clientFName'];
        $lName2 = $_POST['clientLName'];
        $title2 = $_POST['clientTitle'];
        $email2 = $_POST['clientEmail'];
        $phone2 = $_POST['clientPhone'];
        $address = $_POST['clientAddress'];
        $fContacted2 = $_POST['clientFContacted'];
            
        $sql = "INSERT INTO `NON_MEMBER` (`FirstName`, `LastName`, `Title`, `Email`, `Phone`, `Address`, `DateFirstContact`, `PhotoURL`) "
                . "VALUES('".$fName2."', '".$lName2."', '".$title2."', '".$email2."', '".$phone2."', '".$address2."', '".$fContacted2."', '".$target_file."');";
        $pdo->exec($sql);
    
        header("Location: /JGWentworth/View/Client.php");
    }
    
    if(isset($_GET['delete_compClient']))
    { 
        $memberId = $_GET['delete_compClient'];

        $sql = "DELETE FROM COMPANY_MEMBER WHERE MemberID=".$memberId;
        $pdo->exec($sql);
        
        header("Location: /JGWentworth/View/Client.php");
    }
        
    if(isset($_GET['delete_client']))
    { 
        $memberId = $_GET['delete_client'];

        $sql = "DELETE FROM NON_MEMBER WHERE MemberID=".$memberId;
        $pdo->exec($sql);
        
        header("Location: /JGWentworth/View/Client.php");
    }

        
?>