<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    include ('Header.php');
    include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
?>

<body>
    <div id="page">
        <div id="body">
            <label class="title">
                <?php session_start();
                    $fName = $_SESSION[fName];
                    $lName = $_SESSION[lName];
                    $department = $_SESSION[dept];
                    echo 'Welcome '. $fName .' '. $lName .','; 
                ?>
            </label>
            
    </body>
</html>