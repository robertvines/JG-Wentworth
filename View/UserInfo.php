<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    include('PlainHeader.php');
    include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
?>

<div id="page">
            <div id="loginBox">
                    <p id='loginHeader'>Forgot Username or Password?</p>
                    <table id="tablebody" align ='center'>
                        <?php 
                            if (isset($_POST['forgot']))
                            {
                                $email = $_POST['Email'];

                                    $sql1 = "SELECT LOGIN.UserName, LOGIN.Password, USER.Email FROM LOGIN "
                                            . "JOIN USER "
                                            . "ON LOGIN.LoginID = USER.LoginID "
                                            . "WHERE Email = ".$email;
                                    $result1 = $pdo->query($sql1); 

                                    while($val=$result1->fetch()):

                                    $username = $val['UserName'];
                                    $pass = $val['Password'];
                                    endwhile;                            
                            ?>
                        <tr>
                            <td style="border-color:white"><p id="loginText">Username: </td>
                            <td style="border-color:white"><?php echo $username; ?></td>
                        </tr>
                        <tr>
                            <td style="border-color:white"><p id="loginText">Password: </td>
                            <td style="border-color:white"><?php echo $pass; ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                    <p id="loginText"><a href="/JGWentworth/View/Login.php"><input type="submit" value="Login Page"></p>          
            </div>
        </div>
    </body>
</html>
