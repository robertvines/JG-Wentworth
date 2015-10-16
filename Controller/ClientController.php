<?php

/* 
 * To insert, edit, and delete a company and non-company client.
 * 
 * @author: Robert Vines
 */

    include ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php');
    
    switch ($_POST['client'])
    {
    case 'Create Company Client':
    {
  
        $photo = $_POST['photo'];
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $title = $_POST['title'];
        $compName = $_POST['company'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $fContacted = $_POST['fContacted'];
   
        $sql = "SELECT CompanyID FROM COMPANY WHERE Name = '".$compName."';";
        $pdo->query($sql);

            $result = $pdo->query($sql);
            
            while($val=$result->fetch()):
            {
            $compId = $val['CompanyID'];
            }
            endwhile;
            
        $sql = "INSERT INTO COMPANY_MEMBER (CompanyID, FirstName, LastName, Title, Phone, Email, DateFirstContact, PhotoURL) "
                . "VALUES('".$compId."', '".$fName."', '".$lName."', '".$title."', '".$phone."', '".$email."', '".$fContacted."', '".$photo."');";
        $pdo->query($sql);
    
        header("Location: /JGWentworth/View/Client.php");
    }// end createCompantClient
    break;
    
    case 'Create Client':
    {
        include ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php');
        
        $photo = $_POST['photo'];
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $title = $_POST['title'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $fContacted = $_POST['fContacted'];
        
        
            
        $sql = "INSERT INTO `NON_MEMBER` (`FirstName`, `LastName`, `Title`, `Email`, `Phone`, `Address`, `DateFirstContact`, `PhotoURL`) "
                . "VALUES('".$fName."', '".$lName."', '".$title."', '".$email."', '".$phone."', '".$address."', '".$fContacted."', '".$photo."');";
        $pdo->exec($sql);
    
        header("Location: /JGWentworth/View/Client.php");
    }//end second if createNoCompClient
    break;
    }
?>