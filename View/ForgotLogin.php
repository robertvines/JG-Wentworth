<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
    include('PlainHeader.php');
?>

<div id="page">
            <div id="loginBox">
                <form method="post" action="/JGWentworth/Controller/ForgotLoginController.php">
                    <p id='loginHeader'>Forgot Username or Password?</p>
                    <table id="tablebody" align ='center'>
                        <tr>
                            <td style="border-color:white"><p id="loginText">Enter Email:</td>
                            <td style="border-color:white"><input type="text" name="Email" required /></td>
                        </tr>
                    </table>
                    <p id="loginText"><input name="forgot" type="submit" value="Submit"></p>    
                </form>
            </div>
        </div>
    </body>
</html>
