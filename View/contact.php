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
                        <tr><td>UserID</td> <td><input type="text" id="UserID" name="UserID"></td></tr>
                            <tr><td>MemberID</td> <td><input type="text" id="MemberID" name="MemberID"></td></tr>
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
