<?php

/* 
 * To insert, edit, and delete a company and non-company client.
 * 
 * @author: Robert Vines
 */
  
    include ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php');
    
/****** create company client ************************************************************************************************/
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
        $lName = $_POST['compLName'];
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
 
/******* Create No Company Client *******************************************************************************************/    
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
        $address2 = $_POST['clientAddress'];
        $fContacted2 = $_POST['clientFContacted'];
            
        $sql = "INSERT INTO `NON_MEMBER` (`FirstName`, `LastName`, `Title`, `Email`, `Phone`, `Address`, `DateFirstContact`, `PhotoURL`) "
                . "VALUES('".$fName2."', '".$lName2."', '".$title2."', '".$email2."', '".$phone2."', '".$address2."', '".$fContacted2."', '".$target_file."');";
        $pdo->exec($sql);
    
        header("Location: /JGWentworth/View/Client.php");
    }
    
/******* Edit Company Client ************************************************************************************************/    
    if (isset($_POST['editCompClient']))
    {
        $target_dir = $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/ClientImages/';
        $target_file = $target_dir . basename($_FILES['editCompPhoto']['name']);
        
                $compClientId = $_POST['editCompID'];
                $editCompFName = $_POST['editCompFName'];
                $editCompLName = $_POST['editCompLName'];
                $editCompCompany = $_POST['editCompCompany'];
                $editCompTitle = $_POST['editCompTitle'];
                $editCompEmail = $_POST['editCompEmail'];
                $editCompPhone = $_POST['editCompPhone'];
                $editCompAddress = $_POST['editCompAddress'];
                $editCompFContacted = $_POST['editCompFContacted'];
                
                if(!empty($editCompCompany))
                {
                    
                    $fk = $pdo->prepare("SELECT CompanyID FROM COMPANY WHERE Name=?");
                    $fk->execute(array($editCompCompany));
                    $companyID = $fk->fetchColumn();
   
                }
                if(empty($editCompCompany))
                {
                    $companyID = '3';
                }
        
            if (!empty($target_file))
            {
                (move_uploaded_file($_FILES['editCompPhoto']['tmp_name'], $target_file));

                    $sql = "UPDATE COMPANY_MEMBER "
                        . "SET CompanyID ='".$companyID."', FirstName ='".$editCompFName."', "
                        . "LastName ='".$editCompLName."', Title ='".$editCompTitle."', "
                        . "Phone ='".$editCompPhone."', Email ='".$editCompEmail."', "
                        . "DateFirstContact ='".$editCompFContacted."', PhotoURL ='".$target_file."' "
                        . "WHERE MemberID ='".$compClientId."';";
                    $pdo->query($sql);

            }
            if (empty($target_file))
            {
                $sql = "UPDATE COMPANY_MEMBER "
                     . "SET CompanyID ='".$companyID."', FirstName = '".$editCompFName."', "
                     . "LastName = '".$editCompLName."', Title ='".$editCompTitle.", "
                     . "Phone = '".$editCompPhone."', Email = '".$editCompEmail."', "
                     . "DateFirstContact = '".$editCompFContacted."' "
                     . "WHERE MemberID ='".$compClientId."';";
                $pdo->query($sql);
            }
            
        header("Location: /JGWentworth/View/Client.php");
    }
    
/******* Edit No Company Client *********************************************************************************************/
    if (isset($_POST['editNoCompClient']))
    {
        $target_dir = $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/ClientImages/';
        $target_file = $target_dir . basename($_FILES['editNoCompPhoto']['name']);
        
                $compClientId = $_POST['editClientID'];
                $editClientFName = $_POST['editClientFName'];
                $editClientLName = $_POST['editClientLName'];
                $editClientCompany = $_POST['editClientAddress'];
                $editClientTitle = $_POST['editClientTitle'];
                $editClientEmail = $_POST['editClientEmail'];
                $editClientPhone = $_POST['editClientPhone'];
                $editClientAddress = $_POST['editClientAddress'];
                $editClientFContacted = $_POST['editClientFContacted'];
        
            if (!empty($target_file))
            {
                (move_uploaded_file($_FILES['editNoCompPhoto']['tmp_name'], $target_file));
                
                    $sql = "UPDATE NON_MEMBER "
                        . "SET FirstName ='".$editCompFName."', LastName ='".$editCompLName."', "
                        . "Title ='".$editCompTitle."', Email ='".$editCompEmail."', Phone ='".$editCompPhone."',  "
                        . "Address = '".$editClientAddress."', DateFirstContact ='".$editCompFContacted."', "
                        . "PhotoURL ='".$target_file."' "
                        . "WHERE MemberID ='".$editClientID."';";
                    $pdo->query($sql);
            }
            if (empty($target_file))
            {
                
                $sql = "UPDATE NON_MEMBER "
                    . "SET FirstName = '".$editCompFName."', "
                        . "LastName = '".$editCompLName."', Title ='".$editCompTitle.", "
                        . "Email = '".$editCompEmail."', Phone = '".$editCompPhone."',  "
                        . "Address = '".$editClientAddress."', DateFirstContact = '".$editCompFContacted."' "
                        . "WHERE MemberID ='".$editClientID."';";
                    $pdo->query($sql);
            }
            
        header("Location: /JGWentworth/View/Client.php");
    }
    
/******* Delete Company Client **********************************************************************************************/
    
    if(isset($_GET['delete_compClient']))
    { 
        $memberId = $_GET['delete_compClient'];

        $sql = "DELETE FROM COMPANY_MEMBER WHERE MemberID=".$memberId;
        $pdo->exec($sql);
        
        header("Location: /JGWentworth/View/Client.php");
    }
        
/******* Delete No Company Client *******************************************************************************************/
    if(isset($_GET['delete_client']))
    { 
        $memberId = $_GET['delete_client'];

        $sql = "DELETE FROM NON_MEMBER WHERE MemberID=".$memberId;
        $pdo->exec($sql);
        
        header("Location: /JGWentworth/View/Client.php");
    }

        
?>