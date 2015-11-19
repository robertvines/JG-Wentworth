<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';

if (isset($_POST['createContact'])) {
    echo 'if statement';
                    $newUserID = $_POST['UserID'];
                    $newMember = $_POST['MemberID'];
                    $newSubject = $_POST['Subject'];
                    $newDuartion = $_POST['Duration'];
                    $newDateTime = $_POST['DateTime'];
                    $newResult = $_POST['Result'];
                    
                   $sql = "INSERT INTO sql591897.CONTACT (ContactID,UserID,MemberID, Subject, Duration, DateTime, Result)"
                           . " VALUES (NULL, '".$newUserID."', '".$newMember."', '".$newSubject."', '".$newDuartion."','".$newDateTime."','".$newResult."');";                
                  
                    $pdo->exec($sql);
                    
                  
            }// end second if