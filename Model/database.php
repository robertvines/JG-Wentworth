<?php

/* 
   Sample Database connection code and queries.
 */

/* CONNECTION CODE - include this code anytime you are interacting with the database
 
    $user = 'sql591897';
    $password = 'hA5!kQ4%';
    $db = 'sql591897';  
    $conn ="mysql:host=sql5.freemysqlhosting.net;dbname=sql591897";
    $pdo = new PDO($conn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 */ 

  /*  SAMPLE SELECT STATEMENT FROM DATABASE

    $sql = "SELECT FirstName, LastName, UserID, Role FROM USER;";
    $result = $pdo->query($sql); 
        while($val=$result->fetch())
        {
            echo '<br/>' . $val['FirstName'] . $val['LastName'] . $val['UserID'] . $val['Role'];
        }
  */     
         
   /*  SAMPLE INSERT STATEMENT TO DATABASE
        
        $sql = "INSERT INTO sql591897.LOGIN (LoginID, UserName, Password) VALUES (NULL, 'usr3333Example', 'pwdE3333xample');";
        $pdo->exec($sql);
    
    */ 
     
 