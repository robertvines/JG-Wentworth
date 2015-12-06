<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/userClass.php');
include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/validate.php';

    if (isset($_POST['CreateUser'])) {
   
        $newfName = valString($_POST['fName'], true);
        $newlName = valString($_POST['lName'], true);
        $newRole = valString($_POST['Role'], true);
        $newPhone = valPhone($_POST['phone'], true);
        $newEmail = valEmail($_POST['email'], true);
        $newDepartment = valString($_POST['department'], true);
        $newUserName = valString($_POST['username'], true);
        $newPassword = valString($_POST['pass'], true);
       
        $newUser = new userClass($newfName, $newlName, $newRole, $newPhone,
                 $newEmail, $newDepartment, $newUserName, $newPassword);                        
        $newUser->createUser();
         
        header("Location: /JGWentworth/View/User.php");
 
    }// end first if
    
     if (isset($_POST['EditUser'])){
       
        $fName = valString($_POST['fName'], true);
        $lName = valString($_POST['lName'], true);
        $role = valString($_POST['Role'], true);
        $phone = valPhone($_POST['phone'], true);
        $email = valEmail($_POST['email'], true);
        $department = valString($_POST['department'], true);
        $userName = valString($_POST['username'], true);
        $password = valString($_POST['pass'], true); 
        $userID = $_POST['editID'];
        
        $updateUser = new userClass($fName, $lName, $role, $phone,
                 $email, $department, $userName, $password, $userID);      
        $updateUser->updateUser();
        
         header("Location: /JGWentworth/View/User.php");
    }// end second if
     
     if (isset($_GET['delete'])) {

        $deleteID = urldecode(base64_decode($_GET['delete']));
        userClass::deleteUser($deleteID);
             
        header("Location: /JGWentworth/View/User.php");
    }