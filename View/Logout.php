<?php

/* 
 * Page to end session and logout
 * 
 * @author: Robert Vines
 */

session_start();
session_unset();
session_destroy();

header("Location: Login.php");
?>