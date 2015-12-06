<?php

/* 
 * To insert, edit, and delete a company and non-company client.
 * 
 * @author: Robert Vines
 */
  
    include ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php');
    include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/validate.php';
    
/****** create company client ************************************************************************************************/
    if (isset($_POST['createCompClient']))
    {
        $target_dir = $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/ClientImages/';
        $target_file = $target_dir . basename($_FILES['compPhoto']['name']);
      
            if (move_uploaded_file($_FILES['compPhoto']['tmp_name'], $target_file)) //if file is moved to folder
            {
              //  echo 'The file'. basename($_FILES['compPhoto']['name'])." has been uploaded.";
            }else 
            {
             //  echo 'Sorry, there was an error uploading your file. '.$target_file; 
            }
        
        $fName = valString($_POST['compFName'], true);
        $lName = valString($_POST['compLName'], true);
        $title = valString($_POST['compTitle'], true);
        $compName = valString($_POST['compCompany'], true);
        $phone = valPhone($_POST['compPhone'], true);
        $email = valEmail($_POST['compEmail'], true);
        $fContacted = valDate($_POST['compFContacted'], true);
   
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
              //  echo 'The file'. basename($_FILES['clientPhoto']['name'])." has been uploaded.";
            }else 
            {
              // echo 'Sorry, there was an error uploading your file. '.$target_file; 
            }
        
        $fName2 = valString($_POST['clientFName'], true);
        $lName2 = valString($_POST['clientLName'], true);
        $title2 = valString($_POST['clientTitle'], true);
        $email2 = valEmail($_POST['clientEmail'], true);
        $phone2 = valPhone($_POST['clientPhone'], true);
        $address2 = valString($_POST['clientAddress'], true);
        $fContacted2 = valDate($_POST['clientFContacted'], true);
            
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
                $editCompFName = valString($_POST['editCompFName'], true);
                $editCompLName = valString($_POST['editCompLName'], true);
                $editCompCompany = $_POST['editCompCompany'];//valString($_POST['editCompCompany'], true);
                $editCompTitle = valString($_POST['editCompTitle'], true);
                $editCompEmail = valEmail($_POST['editCompEmail'], true);
                $editCompPhone = valPhone($_POST['editCompPhone'], true);
                $editCompFContacted = valDate($_POST['editCompFContacted'], true);
                
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
                $editClientFName = valString($_POST['editClientFName'], true);
                $editClientLName = valString($_POST['editClientLName'], true);
                $editClientTitle = valString($_POST['editClientTitle'], true);
                $editClientEmail = valEmail($_POST['editClientEmail'], true);
                $editClientPhone = valPhone($_POST['editClientPhone'], true);
                $editClientAddress = valString($_POST['editClientAddress'], true);
                $editClientFContacted = valDate($_POST['editClientFContacted'], true);
        
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