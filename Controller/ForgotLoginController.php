<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php');

if(isset($_POST['forgot']))
{
$Email = $_POST['Email'];

if(!empty($Email))
{
   
    echo "<script>
        alert('Password Reset.');
        window.location.href='/JGWentworth/View/Login.php';
        </script>";
}
    
if (empty($Email))
{
    echo "<script>
        alert('Enter a correct email.');
        window.location.href='/JGWentworth/View/ForgotLogin.php';
        </script>";
}
}
?>