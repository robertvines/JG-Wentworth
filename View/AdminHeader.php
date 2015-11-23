<?php

/* 
 * Header When logged in as an admin
 */
?>
<html>
    <head>
        <title>J. G. Wentworth</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/JGWentworth/View/CSS/JGWentworth.css" type="text/css"/>
        
        <link rel="stylesheet" href="/JGWentworth/jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.css"/>
        <link rel="stylesheet" href="/JGWentworth/jquery-ui-daterangepicker-devel/jquery.comiseo.daterangepicker.css"/>
        
        <script src="/JGWentworth/jquery-ui-1.11.4/external/jquery/jquery.js"></script>
        <script src="/JGWentworth/jquery-ui-1.11.4/jquery-ui.min.js"></script>

        <script src="/JGWentworth/moment-develop/min/moment.min.js"></script>
        
        <script src="/JGWentworth/moment-develop/moment.js"></script>
        <script src="/JGWentworth/jquery-ui-daterangepicker-devel/jquery.comiseo.daterangepicker.js" ></script>
       
        <script src="/JGWentworth/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
    </head>
    <body>
    <header>
        <img style="float:left; z-index: 1;" src="/JGWentworth/Images/JGLogo.jpg" alt="J. G. Wentworth Logo" id="logo">
        <div id="nav">
            <ul>
                <li><a id="user" href="Home.php">Home</a></li>
                <li><a href="/JGWentworth/View/Company.php">Company</a></li>
                <li><a href="/JGWentworth/View/Client.php">Client</a></li>
                <li><a href="/JGWentworth/View/User.php">User</a></li>
                <li><a href="/JGWentworth/View/contact.php">Contact</a></li>
                <li><a href="/JGWentworth/View/companyReport.php">Company Reports</a></li>
                <li><a href="/JGWentworth/View/employeeReport.php">Employee Reports</a></li>
                
                <li><a id="user" href="/JGWentworth/View/Logout.php">Log out</a></li>
            </ul>    
        </div>
        <hr noshade />
    </header>