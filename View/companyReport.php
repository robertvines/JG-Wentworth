<!DOCTYPE html>
<?php 
if(isset($_POST['compReport']))
 {
     $val = $_POST['comp'];
     $val2 = $_POST['daterange'];
     showReport($val, $val2);            
 }
 else {
     showReport('all', 'no dates');
 }
/* 
 * To run and show CONTACT reports based off each company
 */

 
 function showReport($val, $val2) {
     $compVal = $val;
     $dates = $val2;
     
     
 include ('Header.php');
 include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
 
?>
<script type="text/javascript">
 $(document).ready(function() {     
    $('#daterange').daterangepicker( {dateFormat: "yy-mm-dd", applyOnMenuSelect: false} );
         
     function toggleTableRow(){
         $('.hiderow').hide();
         $('.showrow').show();
     }
     function setRowColours(){
        $('table tr:visible:odd').css({"background": "white"});
        $('table tr:visible:even').css({"background": "#CEF2DF"});
}
    $('.ShowMe').click(function() {
	var id = $(this).get(0).id;
        var x = document.getElementById("comp"+id).className;
       
        if(x === "hiderow") {
             document.getElementById("comp"+id).className = "showrow";
        }
	else {
             document.getElementById("comp"+id).className = "hiderow";
        }
	toggleTableRow();
        setRowColours();
    });
    
     toggleTableRow();
     setRowColours();   
    
 });
    
</script>
<style>
    .table-wrapper {
    float: left;
    overflow-x:scroll;
    overflow-y:visible;
    width: 90%;
    min-width: 300px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 10px;
    padding-bottom: 10px;
}

.main-table-row {
  // background-color: #BBFFBB;
   font-weight: bold;
}


</style>
    <body>
    <div id="page">
      <div id="body">
        <label class="title">REPORT by Company</label>
 <!------------------FORM THAT POSTS TO SAME PAGE, ALLOWS USER TO FILTER CLIENTS BY COMPANY ------------------------->       
        <div id="formDiv">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="myform" method="post">            
            <input type="text" id="daterange" name="daterange">
            <select id="filter" name="comp"> 
                 <option value="all">All Companies</option>
                 <option value="noComp">No Company</option>
             <?php 
                $sql1 = "SELECT CompanyID, Name FROM COMPANY ORDER BY Name;";
                $result1 = $pdo->query($sql1); 
                
                while($val=$result1->fetch()):
                   $comID = $val['CompanyID'];
                    $name = $val['Name'];         
                 ?> 
                        <option id="option<?php echo $comID ?>" value="<?php echo $comID ?>"><?php echo $name ?></option>
             <?php endwhile; ?>
                    </select>
            <input type="submit" name="compReport" value="Run Report">
        </form>
        </div>
 <!-------------------- BEGIN OF TABLE WITH CONTACT FORM --------------------------------------------------------> 
        <div id="reportDiv" class="table-wrapper">
        <table>
            <th>Action</th><th>Company</th><th>Employee</th><th>Client</th><th>Subject</th><th>Duration</th><th>Date/Time</th><th>Result</th>  
             <tr>
                <?php
        /******************************************************************************************
         ********** GET ALL COMPANIES ************************************************************/
                $sql1 = "SELECT CompanyID, Name FROM COMPANY ORDER BY Name;";
                $result1 = $pdo->query($sql1);
                while($compaval=$result1->fetch()):
                   $compaID = $compaval['CompanyID'];
                   $compaName = $compaval['Name'];
                   
                ?>
                 <td><button class="ShowMe" id="<?php echo $compaID ?>">Show Totals</button></td>
                 <td colspan="7" class="main-table-row"><?php echo strtoupper($compaName); ?></td>
                 
              </tr>
                <?php
                    $sql = "SELECT MemberID, FirstName, LastName FROM COMPANY_MEMBER WHERE CompanyID = ".$compaID.";";
                    $result = $pdo->query($sql); 
                
                  while($val=$result->fetch()):
                    $memberID = $val['MemberID'];
                    $memberName = $val['FirstName'] ." ". $val['LastName']; 
                      
                    $sql2 = "SELECT * FROM CONTACT WHERE MemberID = ".$memberID.";";
                    $result2 = $pdo->query($sql2);
                  while($value2=$result2->fetch()){
                    $userID = $value2['UserID'];
                    $subject = $value2['Subject'];
                    $duration = $value2['Duration'];
                    $datetime = $value2['DateTime'];
                    $res = $value2['Result'];
                    
                    $sql3 = "SELECT FirstName, LastName FROM USER WHERE UserID = ".$userID.";";
                    $result3 = $pdo->query($sql3);
                    $value3 = $result3->fetch();
                    $empName = $value3['FirstName'] ." ". $value3['LastName'];
                  }//end inner2 while                  
                    ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td id="compID<?php echo ''; ?>"><?php echo $empName; ?></td>
                    <td id="name<?php echo ''; ?>"><?php echo $memberName; ?></td> 
                    <td id="dateBus<?php echo ''; ?>"><?php echo $subject; ?></td>
                    <td id="dateBus<?php echo ''; ?>"><?php echo $duration; ?></td>
                    <td id="type<?php echo ''; ?>"><?php echo $datetime; ?></td> 
                    <td id="address<?php echo ''; ?>"><?php echo $res; ?></td>
                </tr>
                <?php
                endwhile; //end inner while
                ?> 
                <tr id="comp<?php echo $compaID ?>" class="hiderow">
                    <td></td>
                    <td class="main-table-row">Totals</td>
                    <td class="main-table-row"># of Calls:<?php echo ' 30'; ?></td>
                    <td colspan="2" class="main-table-row">Total Call Time:<?php echo ' 8 minutes'; ?></td>
                    <td class="main-table-row"># Clients collab:<?php echo ' 34'; ?></td>
                    <td class="main-table-row"># Employees collab:<?php echo ' 21'; ?></td>
                    <td></td>
                   
              </tr>
             <?php
            endwhile; // end outer while
                
            showContactNonMem();
                ?>
            </table>
        </div>
      </div>
    </div>
    </body>
</html>
<?php 



}//end function showReport

/******************************************************************************************
 ********** GET ALL CONTACT FROM NON_MEMBER **********************************************/
 function showContactNonMem(){
          include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
       ?>
       <tr>
       <td><button class="ShowMe" id="noCompID">Show Totals</button></td>    
       <td colspan="7" class="main-table-row"><?php echo strtoupper('Clients with no company'); ?></td>
       </tr>
       <?php
        
      $sql = "SELECT MemberID, FirstName, LastName FROM NON_MEMBER;";
                    $result = $pdo->query($sql); 
                
                  while($val=$result->fetch()):
                    $memberID = $val['MemberID'];
                    $memberName = $val['FirstName'] ." ". $val['LastName']; 
                      
                    $sql2 = "SELECT * FROM CONTACT_NON_MEMBER WHERE MemberID = ".$memberID.";";
                    $result2 = $pdo->query($sql2);
                  while($value2=$result2->fetch()){
                    $userID = $value2['UserID'];
                    $subject = $value2['Subject'];
                    $duration = $value2['Duration'];
                    $datetime = $value2['DateTime'];
                    $res = $value2['Result'];
                    
                    $sql3 = "SELECT FirstName, LastName FROM USER WHERE UserID = ".$userID.";";
                    $result3 = $pdo->query($sql3);
                    $value3 = $result3->fetch();
                    $empName = $value3['FirstName'] ." ". $value3['LastName'];
                  }//end inner2 while
                        ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td id="compID<?php echo $comID; ?>"><?php echo $empName; ?></td>
                    <td id="name<?php echo $comID; ?>"><?php echo $memberName; ?></td> 
                    <td id="dateBus<?php echo $comID; ?>"><?php echo $subject; ?></td>
                    <td id="dateBus<?php echo $comID; ?>"><?php echo $duration; ?></td>
                    <td id="type<?php echo $comID; ?>"><?php echo $datetime; ?></td> 
                    <td id="address<?php echo $comID; ?>"><?php echo $res; ?></td>
                </tr>
                <tr id="noCompID" class="hiderow">
                    <td></td>
                    <td class="main-table-row">Totals</td>
                    <td class="main-table-row"># of Calls:<?php echo ''; ?></td>
                    <td class="main-table-row">Total Call Time:<?php echo ''; ?></td>
                    <td class="main-table-row"># of Clients Contacted:<?php echo ''; ?></td>
                    <td class="main-table-row"># of Employees Contacted<?php echo ''; ?></td>
                    <td></td>
                    <td></td>
              </tr>
                <?php
            endwhile; // end outer while
  }// end function showContactNonMem