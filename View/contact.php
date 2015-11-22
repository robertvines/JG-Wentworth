<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/View/Header.php');
include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
?>
<script>
/* *************************************************************************
     *    
     */
     $(document).ready(function() {  
         $('#DateTime').datepicker({dateFormat:'yy-mm-dd'});
         
     });
     </script>
        <div id="page">
            <div id="body">
              <form id="createForm" method="post" action="/JGWentworth/Controller/ContactController.php">

                    <table style="">
                        <tr><td>User Name</td> <td><select id="filter" name="UserName"> 
                 
                       <?php 
                      $sql3 = "SELECT UserID,FirstName,LastName FROM USER WHERE Role='Employee' ORDER BY LastName, FirstName;";
                      $result3 = $pdo->query($sql3); 
                
                      while($val=$result3->fetch()):
                      $UserID = $val['UserID'];
                      $FirstName = $val['FirstName']; 
                      $LastName = $val['LastName'];
                      

                      ?> 
                      <option id="<?php echo $UserID ?>" value="<?php echo $UserID?>"><?php echo $FirstName." ".$LastName ?></option>
                      <?php endwhile;
                
                      ?>
                      
                    </select></td></tr>
                        <tr><td>Member Name</td> <td><select id="filter" name="MemberName"> 
                 
                       <?php 
                      $sql1 = "SELECT MemberID,FirstName,LastName FROM COMPANY_MEMBER ORDER BY LastName, FirstName;";
                      $result1 = $pdo->query($sql1); 
                
                      while($val=$result1->fetch()):
                      $memID = $val['MemberID'];
                      $FirstName = $val['FirstName']; 
                      $LastName = $val['LastName'];
                      
                      
                      
                      ?> 
                      <option id="<?php echo $memID ?>" value="<?php echo $memID ?>"><?php echo $FirstName." ".$LastName ?></option>
                      <?php endwhile;
                      
                      $sql2 = "SELECT MemberID,FirstName,LastName FROM NON_MEMBER ORDER BY LastName, FirstName;";
                      $result2 = $pdo->query($sql2); 
                
                      while($val=$result2->fetch()):
                      $memID = $val['MemberID'];
                      $FirstName = $val['FirstName']; 
                      $LastName = $val['LastName'];
                      ?>
                      <option id="<?php echo $memID ?>" value="<?php echo $memID ?>"><?php echo $FirstName." ".$LastName ?></option>
                      <?php endwhile;
                      ?>
                      
                    </select>
                                </td></tr>
                            <tr><td>Subject</td> <td><input type="text" id="SubjectID" name="Subject"></td></tr>
                            <tr><td>Duration</td> <td><input type="text" id="Duration" name="Duration"></td></tr>
                            <tr><td>DateTime</td> <td><input type="text" id="DateTime" name="DateTime"></td></tr>
                            <tr><td>Result</td> <td><input type="text" id="Result" name="Result"></td></tr>
                            </table>
                    
                  <input type="submit" class="btnsmall" name="createContact" value="Create">
                    
                </form>
            </div>
        </div>
    </body>
</html>
