<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/userClass.php');

    if (isset($_POST['CreateUser'])) {
   
        $newfName = $_POST['fName'];
        $newlName = $_POST['lName'];
        $newRole = $_POST['Role'];
        $newPhone = $_POST['phone'];
        $newEmail = $_POST['email'];
        $newDepartment = $_POST['department'];
        $newUserName = $_POST['username'];
        $newPassword = $_POST['pass'];
        
        $newUser = new userClass($newfName, $newlName, $newRole, $newPhone,
                 $newEmail, $newDepartment, $newUserName, $newPassword);                        
        $newUser->createUser();
         
        header("Location: /JGWentworth/View/User.php");
 
    }// end first if
    
     if (isset($_POST['EditUser'])){
       
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $role = $_POST['Role'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $userName = $_POST['username'];
        $password = $_POST['pass']; 
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