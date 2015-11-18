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
                    
//        echo '<script type="text/javascript">'
//        , 'redirect();'
//        , '</script>';   
            }// end second if
               
     //      public function __construct($first, $last, $rle, $phne, $emal, $dep, $un = NULL, $pass = NULL, $id = NULL)    