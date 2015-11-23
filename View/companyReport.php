<!DOCTYPE html>
<?php
if(isset($_POST['compReport']))
 {
     $val = $_POST['comp'];
     $val2 = $_POST['daterange'];
     showReport($val, $val2);            
 }
 else {
     showReport('all', NULL);
 }
/* 
 * To run and show CONTACT reports based off each company
 */
 function showReport($val, $val2) {
     $compVal = $val;
     $dates = $val2;
     $from = substr($dates, 10, 10);
     $to = substr($dates, 29, 10);
     
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
        
        if(id === "noCompID"){
            var x = document.getElementById("nonComp").className;
            
            if(x === "hiderow") {
                 document.getElementById("nonComp").className = "showrow";
            }
            else {
                document.getElementById("nonComp").className = "hiderow";
            }
        }// end if
        else{
            var x = document.getElementById("comp"+id).className;
       
            if(x === "hiderow") {
                document.getElementById("comp"+id).className = "showrow";
            }
            else {
                document.getElementById("comp"+id).className = "hiderow";
            }
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

.local-table {
    white-space: nowrap;
}


</style>
    <body>
    <div id="page">
      <div id="body">
          <?php
        /******************************************************************************************
         ********** FILTER TITLE CRITERIA ********************************************************/
          $title = "";
          switch($compVal){
                case 'all':
                    $title = "All Companies";
                    break;
                case 'noComp':
                    // does not return anything for COMPANY, continues to showContactNonMem();
                    $title = "All Clients w/o a Company";
                    break;
                 default:
                     $sqlTitle = "SELECT Name FROM COMPANY WHERE CompanyID = ".$compVal.";";
                     $resultTitle = $pdo->query($sqlTitle); 
                     $val5=$resultTitle->fetch();
                     $title = $val5['Name'];
          }// end switch
          
          $dateTitle = "";
          if($dates != NULL){
            $dateTitle = "From ".$from." To ".$to;            
          }
                    
          ?>
        <label class="title">REPORT for <?php echo $title." ".$dateTitle ?></label>
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
            <table class="local-table">
            <th>Action</th><th>Company</th><th>Employee</th><th>Client</th><th>Subject</th><th>Duration</th><th>Date/Time</th><th>Result</th>  
             <tr>
    <?php 
         /******************************************************************************************
         ********** FILTER CONTACT CRITERIA *******************************************************/
         
            switch($compVal){
                case 'all':
                    $sqlCriteria = "SELECT CompanyID, Name FROM COMPANY ORDER BY Name;";
                    break;
                case 'noComp':
                    // does not return anything for COMPANY, continues to showContactNonMem();
                    $sqlCriteria = "SELECT CompanyID, Name FROM COMPANY WHERE CompanyID = -1;";
                    break;
                 default:
                    $sqlCriteria = "SELECT CompanyID, Name FROM COMPANY WHERE CompanyID = ".$compVal.";";
            }// end switch
               
        /******************************************************************************************
         ********** GET ALL COMPANIES ************************************************************/
                $sql4 = $sqlCriteria;
                $result4 = $pdo->query($sql4);
                
                while($compaval=$result4->fetch()):
                   $compaID = $compaval['CompanyID'];
                   $compaName = $compaval['Name'];
                   
                   //variables for TOTALs
                   $numCalls = 0;
                   $totalTime = 0;
                   $numEmp = 0;
                   $allEmp = array();
                   $numClient = 0;
                   $allClient = array();
                ?>
                 <td><button class="ShowMe" id="<?php echo $compaID ?>">Show Totals</button></td>
                 <td colspan="7" class="main-table-row"><?php echo strtoupper($compaName); ?></td>
                 
              </tr>
                <?php
                    $sql = "SELECT MemberID, FirstName, LastName FROM COMPANY_MEMBER WHERE CompanyID = ".$compaID.";";
                    $result = $pdo->query($sql); 
                
                  while($val4=$result->fetch()):
                    $memberID = $val4['MemberID'];
                    $memberName = $val4['FirstName'] ." ". $val4['LastName']; 
                    
                    if($dates == NULL){
                        $sql2 = "SELECT * FROM CONTACT WHERE MemberID = ".$memberID.";";
                    }
                    else{
                        $sql2 = "SELECT * FROM CONTACT WHERE MemberID = ".$memberID." AND (DateTime BETWEEN '".$from." 00:00:00' AND '".$to." 23:59:00');";
                    }
                    $result2 = $pdo->query($sql2);
                    
                  while($value2=$result2->fetch()):
                    $userID = $value2['UserID'];
                    $subject = $value2['Subject'];
                    $duration = $value2['Duration'];
                    $datetime = $value2['DateTime'];
                    $res = $value2['Result'];
                    
                    $sql3 = "SELECT FirstName, LastName FROM USER WHERE UserID = ".$userID.";";
                    $result3 = $pdo->query($sql3);
                    $value3 = $result3->fetch();
                    $empName = $value3['FirstName'] ." ". $value3['LastName'];
                    
                    // Continue to Calculate TOTALs
                    $numCalls ++;
                    $totalTime = $totalTime + $duration;   
                    
                    if(!in_array($memberID, $allClient)){
                        array_push($allClient, $memberID);
                        $numClient ++;
                    }
                    if(!in_array($userID, $allEmp)){
                        array_push($allEmp, $userID);
                        $numEmp++;
                    }
                    ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?php echo $empName; ?></td>
                    <td><?php echo $memberName; ?></td> 
                    <td><?php echo $subject; ?></td>
                    <td><?php echo $duration; ?> minutes</td>
                    <td><?php echo $datetime; ?></td> 
                    <td><?php echo $res; ?></td>
                </tr>
                <?php
                   endwhile;//end inner2 while
                endwhile; //end inner while
                ?> 
                <tr id="comp<?php echo $compaID ?>" class="hiderow" style="color: red;">
                    <td></td>
                    <td class="main-table-row">Totals</td>
                    <td class="main-table-row"># Employees collab:<?php echo ' '.$numEmp; ?></td>
                    <td class="main-table-row"># Clients collab:<?php echo ' '.$numClient ?></td>
                    <td class="main-table-row"># of Calls:<?php echo ' '.$numCalls; ?></td>
                    <td colspan="2" class="main-table-row">Total Call Time:<?php echo ' '.$totalTime.' minutes'; ?></td>
                    <td></td>
                   
              </tr>
             <?php
            endwhile; // end outer while
                
            if($compVal == "noComp" || $compVal == "all"){
                showContactNonMem($dates, $from, $to);
            }
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
 ********** GET ALL CONTACT info FROM NON_MEMBER **********************************************/
 function showContactNonMem($dates, $from, $to){
          include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
       ?>
       <tr>
       <td><button class="ShowMe" id="noCompID">Show Totals</button></td>    
       <td colspan="7" class="main-table-row"><?php echo strtoupper('Clients with no company'); ?></td>
       </tr>
       <?php
       //variables for TOTALs
        $numCalls = 0;
        $totalTime = 0;
        $numEmp = 0;
        $allEmp = array();
        $numClient = 0;
        $allClient = array(); 
       
      $sql = "SELECT MemberID, FirstName, LastName FROM NON_MEMBER;";
                    $result = $pdo->query($sql); 
                
                  while($val=$result->fetch()):
                    $memberID = $val['MemberID'];
                    $memberName = $val['FirstName'] ." ". $val['LastName']; 
                      
                    if($dates == NULL){
                        $sql2 = "SELECT * FROM CONTACT_NON_MEMBER WHERE MemberID = ".$memberID.";";
                    }
                    else{
                        $sql2 = "SELECT * FROM CONTACT_NON_MEMBER WHERE MemberID = ".$memberID." AND (DateTime BETWEEN '".$from." 00:00:00' AND '".$to." 23:59:00');";
                    }
                    $result2 = $pdo->query($sql2);
                    
                  while($value2=$result2->fetch()):
                    $userID = $value2['UserID'];
                    $subject = $value2['Subject'];
                    $duration = $value2['Duration'];
                    $datetime = $value2['DateTime'];
                    $res = $value2['Result'];
                    
                    $sql3 = "SELECT FirstName, LastName FROM USER WHERE UserID = ".$userID.";";
                    $result3 = $pdo->query($sql3);
                    $value3 = $result3->fetch();
                    $empName = $value3['FirstName'] ." ". $value3['LastName']; 
                    
                    // Continue to Calculate TOTALs
                    $numCalls ++;
                    $totalTime = $totalTime + $duration;   
                    
                    if(!in_array($memberID, $allClient)){
                        array_push($allClient, $memberID);
                        $numClient ++;
                    }
                    if(!in_array($userID, $allEmp)){
                        array_push($allEmp, $userID);
                        $numEmp ++;
                    }
                        ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td id="compID<?php echo $comID; ?>"><?php echo $empName; ?></td>
                    <td id="name<?php echo $comID; ?>"><?php echo $memberName; ?></td> 
                    <td id="dateBus<?php echo $comID; ?>"><?php echo $subject; ?></td>
                    <td id="dateBus<?php echo $comID; ?>"><?php echo $duration; ?> minutes</td>
                    <td id="type<?php echo $comID; ?>"><?php echo $datetime; ?></td> 
                    <td id="address<?php echo $comID; ?>"><?php echo $res; ?></td>
                </tr>
                <?php
                endwhile;//end inner2 while
            endwhile; // end outer while
            ?>
                <tr id="nonComp" class="hiderow" style="color: red;">
                    <td></td>
                    <td class="main-table-row">Totals</td>
                    <td class="main-table-row"># Employees collab:<?php echo ' '.$numEmp; ?></td>
                    <td class="main-table-row"># Clients collab:<?php echo ' '.$numClient; ?></td>
                    <td class="main-table-row"># of Calls:<?php echo ' '.$numCalls; ?></td>
                    <td colspan="2" class="main-table-row">Total Call Time:<?php echo ' '.$totalTime.' minutes'; ?></td>        
                    <td></td>
              </tr>
            <?php
  }// end function showContactNonMem