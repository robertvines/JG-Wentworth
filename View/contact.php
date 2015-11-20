<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/View/Header.php');
include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
        // put your code here
        ?>
<script>
/* *************************************************************************
     * Initially hide forms on page load    
     */
     $(document).ready(function() {  
         $('#DateTime').datepicker({dateFormat:'yy-mm-dd'});
     });
     </script>
    
    <body>
        <div id="page">
            <div id="body">
              <form id="createForm" method="post" action="/JGWentworth/Controller/ContactController.php">
>
                    <table style="">
                        <tr><td>UserName</td> <td><select id="filter" name="UserName"> 
                 
                       <?php 
                      $sql3 = "SELECT UserName,FirstName,LastName FROM USER ORDER BY LastName, FirstName;";
                      $result3 = $pdo->query($sql3); 
                
                      while($val=$result3->fetch()):
                      $UserName = $val['UserName'];
                      $FirstName = $val['FirstName']; 
                      $LastName = $val['LastName'];
                      
                      
                      
                      ?> 
                      <option id="<?php echo $UserName ?>" value="<?php echo $UserName?>"><?php echo $FirstName." ".$LastName ?></option>
                      <?php endwhile;
                
                      ?>
                      
                    </select></td></tr>
                        <tr><td>MemberName</td> <td><select id="filter" name="MemberName"> 
                 
                       <?php 
                      $sql1 = "SELECT MemberName,FirstName,LastName FROM COMPANY_MEMBER ORDER BY LastName, FirstName;";
                      $result1 = $pdo->query($sql1); 
                
                      while($val=$result1->fetch()):
                      $memName = $val['MemberName'];
                      $FirstName = $val['FirstName']; 
                      $LastName = $val['LastName'];
                      
                      
                      
                      ?> 
                      <option id="<?php echo $memName ?>" value="<?php echo $memName ?>"><?php echo $FirstName." ".$LastName ?></option>
                      <?php endwhile;
                      
                      $sql2 = "SELECT MemberName,FirstName,LastName FROM NON_MEMBER ORDER BY LastName, FirstName;";
                      $result2 = $pdo->query($sql2); 
                
                      while($val=$result2->fetch()):
                      $memName = $val['MemberName'];
                      $FirstName = $val['FirstName']; 
                      $LastName = $val['LastName'];
                      ?>
                      <option id="<?php echo $memName ?>" value="<?php echo $memName ?>"><?php echo $FirstName." ".$LastName ?></option>
                      <?php endwhile;
                      ?>
                      
                    </select>
                                </td></tr>
                            <tr><td>Subject</td> <td><input type="text" id="SubjectID" name="Subject"></td></tr>
                            <tr><td>Duration</td> <td><input type="text" id="Duration" name="Duration"></td></tr>
                            <tr><td>DateTime</td> <td><input type="text" id="DateTime" name="DateTime"></td></tr>
                            <tr><td>Result</td> <td><input type="text" id="Result" name="Result"></td></tr>
                            </table>
                    
                    <input type="submit" name="createContact" value="Create">
                    
                </form>
            </div>
        </div>
       
        
            
        <?php
        // put your code here
        ?>
    </body>
</html>
