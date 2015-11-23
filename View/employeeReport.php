<!DOCTYPE html>
<?php
if(isset($_POST['empReport']))
 {
     $val = $_POST['emp'];
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
     $userVal = $val;
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

        var x = document.getElementById("emp"+id).className;
       
        if(x === "hiderow") {
            document.getElementById("emp"+id).className = "showrow";
        }
        else {
            document.getElementById("emp"+id).className = "hiderow";
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
          switch($userVal){
                case 'all':
                    $title = "All Employees";
                    break;
                 default:
                     $sqlTitle = "SELECT FirstName, LastName FROM USER WHERE UserID = ".$userVal.";";
                     $resultTitle = $pdo->query($sqlTitle); 
                     $val5=$resultTitle->fetch();
                     $title = $val5['FirstName'] ." ".$val5['LastName'];
          }// end switch
          
          $dateTitle = "";
          if($dates != NULL){
            $dateTitle = "From ".$from." To ".$to;            
          }
                    
          ?>
        <label class="title">REPORT for <?php echo $title." ".$dateTitle ?></label>
 <!------------------FORM THAT POSTS TO SAME PAGE, ALLOWS USER TO FILTER EMPLOYEES ------------------------->       
        <div id="formDiv">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="myform" method="post">            
            <input type="text" id="daterange" name="daterange">
            <select id="filter" name="emp"> 
                 <option value="all">All Employees</option>
             <?php 
                $sql1 = "SELECT UserID, FirstName, LastName FROM USER WHERE Role='Employee' ORDER BY LastName, FirstName;";
                $result1 = $pdo->query($sql1); 
                
                while($val=$result1->fetch()):
                   $userID = $val['UserID'];
                    $fName = $val['FirstName'];
                    $lName = $val['LastName'];
                 ?> 
                    <option id="option<?php echo $userID ?>" value="<?php echo $userID ?>"><?php echo $fName." ".$lName ?></option>
             <?php endwhile;?>
                    </select>
            <input type="submit" name="empReport" value="Run Report">
        </form>
        </div>
  <!-------------------- BEGIN OF TABLE WITH CONTACT FORM --------------------------------------------------------> 
        <div id="reportDiv" class="table-wrapper">
            <table class="local-table">
            <th>Action</th><th>Employee</th><th>Client</th><th>Subject</th><th>Duration</th><th>Date/Time</th><th>Result</th>  
            <tr>
    <?php 
         /******************************************************************************************
         ********** FILTER CONTACT CRITERIA *******************************************************/
         
            switch($userVal){
                case 'all':
                    $sqlCriteria = "SELECT UserID, FirstName, LastName FROM USER WHERE Role='Employee' ORDER BY LastName, FirstName;";
                    break;
                 default:
                    $sqlCriteria = "SELECT UserID, FirstName, LastName FROM USER WHERE UserID = ".$userVal.";";
            }// end switch
               
      /******************************************************************************************
         ********** GET ALL EMPLOYEES ************************************************************/
                $sql4 = $sqlCriteria;
                $result4 = $pdo->query($sql4);
                
                while($usval=$result4->fetch()):
                   $empID = $usval['UserID'];
                   $empfName = $usval['FirstName'];
                   $emplName = $usval['LastName'];
                   
                   //variables for TOTALs
                   $numCalls = 0;
                   $totalTime = 0;
                   $numClient = 0;
                   $allClient = array();
                   $numnonClient = 0;
                   $allnonClient = array();
                ?>
 
                <td><button class="ShowMe" id="<?php echo $empID ?>">Show Totals</button></td>
                <td colspan="7" class="main-table-row"><?php echo strtoupper($empfName." ".$emplName); ?></td>
                 
              </tr>
                <?php
            /******************************************************************************************
            ******* GET ALL USER CONTACT FROM CONTACT TABLE *******************************************/
                    
                    if($dates == NULL){
                        $sql2 = "SELECT * FROM CONTACT WHERE UserID = ".$empID.";";
                    }
                    else{
                        $sql2 = "SELECT * FROM CONTACT WHERE UserID = ".$empID." AND (DateTime BETWEEN '".$from." 00:00:00' AND '".$to." 23:59:00');";
                    }
                    $result2 = $pdo->query($sql2);
                    
                  while($value2=$result2->fetch()):
                    $memID = $value2['MemberID'];
                    $subject = $value2['Subject'];
                    $duration = $value2['Duration'];
                    $datetime = $value2['DateTime'];
                    $res = $value2['Result'];
                    
                    // Get client's name 
                    $sql3 = "SELECT FirstName, LastName FROM COMPANY_MEMBER WHERE MemberID = ".$memID.";";
                    $result3 = $pdo->query($sql3);
                    $value3 = $result3->fetch();
                    $memberName = $value3['FirstName'] ." ". $value3['LastName'];

                    // Continue to Calculate TOTALs
                    $numCalls ++;
                    $totalTime = $totalTime + $duration;   
                    
                    if(!in_array($memID, $allClient)){
                        array_push($allClient, $memID);
                        $numClient ++;
                    }
                    ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?php echo $memberName; ?></td> 
                    <td><?php echo $subject; ?></td>
                    <td><?php echo $duration; ?> minutes</td>
                    <td><?php echo $datetime; ?></td> 
                    <td><?php echo $res; ?></td>
                </tr>
                <?php
                   endwhile;//end inner1 while
            /******************************************************************************************
            ******* GET ALL USER CONTACT FROM CONTACT_NON_MEMBER TABLE *******************************/
                // 
                    if($dates == NULL){
                        $sql7 = "SELECT * FROM CONTACT_NON_MEMBER WHERE UserID = ".$empID.";";
                    }
                    else{
                        $sql7 = "SELECT * FROM CONTACT_NON_MEMBER WHERE UserID = ".$empID." AND (DateTime BETWEEN '".$from." 00:00:00' AND '".$to." 23:59:00');";
                    }
                    $result7 = $pdo->query($sql7);
                    
                  while($value7=$result7->fetch()):
                    $nonmemID = $value7['MemberID'];
                    $subject = $value7['Subject'];
                    $duration = $value7['Duration'];
                    $datetime = $value7['DateTime'];
                    $res = $value7['Result'];
                    
                    // Get client's name 
                    $sql8 = "SELECT FirstName, LastName FROM NON_MEMBER WHERE MemberID = ".$nonmemID.";";
                    $result8 = $pdo->query($sql8);
                    $value8 = $result8->fetch();
                    $memberName = $value8['FirstName'] ." ". $value8['LastName'];

                    // Continue to Calculate TOTALs
                    $numCalls ++;
                    $totalTime = $totalTime + $duration;   
                    
                    if(!in_array($nonmemID, $allnonClient)){
                        array_push($allClient, $nonmemID);
                        $numnonClient ++;
                    }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?php echo $memberName; ?></td> 
                    <td><?php echo $subject; ?></td>
                    <td><?php echo $duration; ?> minutes</td>
                    <td><?php echo $datetime; ?></td> 
                    <td><?php echo $res; ?></td>
                </tr>
                <?php
                   endwhile;//end inner2 while
                ?> 
                <tr id="emp<?php echo $empID ?>" class="hiderow" style="color: red;">
                    <td></td>
                    <td class="main-table-row">Totals</td>
                    <td class="main-table-row"># Clients collab: <?php echo " ".$numClient + $numnonClient ?></td>
                    <td class="main-table-row"># of Calls:<?php echo " ".$numCalls; ?></td>
                    <td colspan="2" class="main-table-row">Total Call Time:<?php echo ' '.$totalTime.' minutes'; ?></td>
                    <td></td>
                   
              </tr>
             <?php
            endwhile; // end outer while
                ?>
            </table>
        </div>
      </div>
    </div>
    </body>
</html>
<?php 

}//end function showReport