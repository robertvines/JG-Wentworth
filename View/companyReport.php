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
         $('#daterange').daterangepicker();
     });
    
</script>
    <body>
    <div id="page">
      <div id="body">
        <label class="title">REPORT</label>
        <!------------FORM THAT POSTS TO SAME PAGE, ALLOWS USER TO FILTER CLIENTS BY COMPANY ------------------------->       
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
        <?php
        echo 'COMPANY ID:'.$compVal;
        echo '<br>DATES:' .$dates;
        ?>
      </div>
    </div>
    </body>
</html>
<?php 
}//end function showReport