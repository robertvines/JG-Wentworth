<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/validate.php';

if (isset($_POST['createContact'])) {
    
                    $newUserID =  $_POST['UserID'];
                    $newMember = $_POST['MemberID'];
                    $newSubject = valString($_POST['Subject'], true);
                    $newDuartion = valString($_POST['Duration'], true);
                    $newDateTime = valDate($_POST['DateTime'], true);
                    $newResult = valString($_POST['Result'], true);
                    
                   $sql = "INSERT INTO sql591897.CONTACT (ContactID,UserID,MemberID, Subject, Duration, DateTime, Result)"
                           . " VALUES (NULL, '".$newUserID."', '".$newMember."', '".$newSubject."', '".$newDuartion."','".$newDateTime."','".$newResult."');";                
                  
                    $pdo->exec($sql);
                    
          header("Location: /JGWentworth/View/contact.php");  
            }// end second if