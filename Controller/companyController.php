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
  
  if (!empty($_POST['edit-submit'])) {
  echo 'edit submit is not empty';
  
  echo $_POST['editID'];
  echo $_POST['editName'];
  echo $_POST['editType'];
  echo $_POST['editDate'];
  echo $_POST['editAddress'];
  
}

if (!empty($_POST['create-submit'])) {
    echo 'create submit is not empty';
    
    echo $_POST['newCompName'];
    echo $_POST['newBusiness'];
    echo $_POST['newDateOfBusiness'];
    echo $_POST['newAddress'];

}
    
    
