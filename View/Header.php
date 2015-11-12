<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
    $session = $_SESSION[role];
    
    switch($session)
    {
        case 'Admin':
            include('AdminHeader.php');
            break;
        case 'Employee':
            include('EmployeeHeader.php');
            break;
        case 'Supervisor':
            include('SupervisorHeader.php');
            break;
        default :
            header('location:Login.php');
            exit();
    }    
?>