<?php

/* 
 * @author John Cochran
 * Handles multiple forms that will be submitted from Company.php
 */

$user = 'sql591897';
$password = 'hA5!kQ4%';
$db = 'sql591897';  
$conn ="mysql:host=sql5.freemysqlhosting.net;dbname=sql591897";
    
 
try {
      $pdo = new PDO($conn, $user, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
      echo 'Connection Failed: ' . $ex->getMessage();
  }
  
  if (!empty($_POST['editName'])) {
  echo 'edit submit is not empty';
}

if (!empty($_POST[''])) {
   //do something here;
}
    
    
