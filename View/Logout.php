<?php

/* 
 * Page to end session and logout
 * 
 * @author: Robert Vines
 */

session_start();
session_destroy();

header("Location: Login.php");
?>