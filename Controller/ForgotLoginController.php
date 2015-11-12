<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php');

$Email = $_POST['Email'];

$sql = "SELECT Email FROM USER";
//while($val=$result->fetch()):
//        {
        $email = $val['Email'];
//        }endwhile;

if ($Email == $email)
{
    $sql = "SELECT Username, Password FROM User WHERE Email ='".$Email."'; ";
    $result = $pdo->query($sql);

        while($val=$result->fetch()):
        {
            $username = $val['Username'];
            $password = $val['Password'];
    
    // the message
    $msg = "UserName: '".$username."' \nPassword: ".$password;

    // send email
    mail($email,"Login Information",$msg);
        }endwhile;
        
    header("Location: /JGWentworth/View/Login.php");
}
if ($Email != $email)
{
    echo "<script>
        alert('Enter a correct email address.');
        window.location.href='/JGWentworth/View/ForgotLogin.php';
        </script>";
}
?>