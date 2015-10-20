<?php

/*
 * Login page
 * 
 * @author Robert Vines
 */

?>

<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="AlumniTracker.css" type="text/css"/>
    </head>
    <body>
        <?php include('PlainHeader.php'); ?>
        <div id="page">
            <div id="loginBox">
                <form method="post" action="CheckLogin.php">
                    <p id='loginHeader'>Enter User Name and Password to Login</p>
                    <table id="tablebody" align ='center'>
                        <tr>
                            <td style="border-color:white"><p id="loginText">User Name:</td>
                            <td style="border-color:white"><input type="text" name="UserName" required /></td>
                        </tr>
                        <tr style="background-color : white">
                            <td style="border-color:white"><p id="loginText">Password:</td>
                            <td style="border-color:white"><input type="password" name="Password" required /></td>
                        </tr>
                    </table>
                    <p id="loginText"><input type="submit" value="Sign In"></p>    
                </form>
            </div>
        </div>
    </body>
</html>
