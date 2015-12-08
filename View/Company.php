<!DOCTYPE html>
<!--
Initial page to view companies
-->

<?php 
    include ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/View/Header.php');
    include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
    
    session_start();
    $role = $_SESSION[role];
?>
<script>
/* *************************************************************************
     * Initially hide forms on page load    
     */
     $(document).ready(function() {     
         if($( '#form-A' ).is(":visible")){
              $( '#form-A' ).hide();
         }
         if($( '#form-B' ).is(":visible")){
              $( '#form-B' ).hide();
         }
         $('#hiddenID').hide();
         $('.hideInput').hide();
 
     });
     /* *************************************************************************
     * Shows the form that the user selects, hide the other if it is visible
     */
    $(document).ready(function() {
        $('#createCom').click(function(){
            $('#form-B').show();
            if($( '#form-A' ).is(":visible")){
              $( '#form-A' ).hide();
         }
         
       $('#newDate').datepicker({dateFormat: "yy-mm-dd"});
       
        });
 
        $('.editCom').click(function(){ 
            // SHOW THE EDIT FORM, HIDE CREATE FORM
            $('#form-A').show();
            if($( '#form-B' ).is(":visible")){
              $( '#form-B' ).hide();
         }
         
         $('#editDate').datepicker({dateFormat: "yy-mm-dd"});
     //    document.getElementById('createName').focus();
         
      //POPULATE FIELDS WITH EXISTING COMPANY INFORMATION USING ID
            var id = $(this).get(0).id;
    
            document.getElementById('editID').innerHTML = id;
            document.getElementById('editName').value = document.getElementById('name'+id).innerHTML;
            document.getElementById('editDate').value = document.getElementById('dateBus'+id).innerHTML;
            document.getElementById('editType').value = document.getElementById('type'+id).innerHTML;
            document.getElementById('editAddress').value = document.getElementById('address'+id).innerHTML;
            document.getElementById('hiddenID').value = id;
            
      //      document.getElementById('editName').focus();
        });
        
        //Select the text inside the textbox when it has focus
        $('#editName, #editType, #editDate, #editAddress').click( function(){
            $(this).select();
        });
       // hide the form when the user clicks the hide form button
       $('#hideCreate').click(function(){
            $('#form-B').hide(); 
         });
       
        $('#hideEdit').click(function(){
            $('#form-A').hide();  
         });
         
    });// end document.ready function   
</script>

<style>
#form-wrapper{
       margin-bottom: 25px; 
       width: 50%;
       min-width: 300px;
    }
    
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

.clientForm {
    display: inline;
}

th, td {
  white-space: nowrap;
}

 th:first-child {
 //  position: absolute;
    //left: 5px;
  //  color: red;
}
th:nth-child(2){
   // position: fixed;
}
legend {
    font-weight: bold;
    font-size: 18px;
}
</style>
<body>
        <div id="page">
            <div id="body">
                <label class="title">COMPANY</label>
  
            <!-- FORM THAT ALLOWS USER TO EDIT COMPANY INFORMATION --> 
          <div id="form-wrapper">
            <div id="form-A">
                <form id="editForm" method="post" action="/JGWentworth/Controller/companyController.php">
                    <fieldset>
                        <legend>Edit a Company</legend>
                        
                        <table style="margin-bottom: 5px;">
                            <tr><td>ID:</td> <td id="editID"></td></tr>
                            <tr><td>Name:</td> <td><input type="text" id="editName" name="editName"></td></tr>
                            <tr><td>Type of Business:</td> <td><input type="text" id="editType" name="editType"></td></tr>
                            <tr><td>Date of First Business:</td> <td><input type="text" id="editDate" name="editDate"></td></tr>
                            <tr><td>Address</td> <td><input type="text" id="editAddress" name="editAddress"></td></tr>
                        </table>
                        <input type="text" id="hiddenID" name="editID">
                        <input type="submit" name="edit-submit" class="btnsmall" value="Save"> <button id='hideEdit' class="btnsmall" type="button">Cancel</button>
                    </fieldset>
                </form>
            </div>
<!----------- FORM THAT ALLOWS A USER TO CREATE A NEW COMPANY --------------------------------->      
            <div id="form-B">
                <form id="createForm" method="post" action="/JGWentworth/Controller/companyController.php">
                    <fieldset>
                        <legend>Create a Company</legend>
                        
                        <table style="margin-bottom: 5px;">
                            <tr><td>Name:</td> <td><input type="text" id="createName" name="newCompName"></td></tr>
                            <tr><td>Type of Business:</td> <td><input type="text" name='newBusiness'></td></tr>
                            <tr><td>Date of First Business:</td> <td><input type="text" id="newDate" name='newDateOfBusiness'></td></tr>
                            <tr><td>Address:</td> <td><input type="text" name='newAddress'></td></tr>
                        </table>
                        <input type="submit" name="create-submit" value="Submit" class="btnsmall"> <button id='hideCreate' class="btnsmall" type="button">Cancel</button>
                    </fieldset>
                </form>
            </div>
          </div>    
         <?php if($role != "Employee"){ ?>       
          <div>
             <button id="createCom" class="btn">Create New Company</button>
          </div>      
         <?php } ?>
            <div class="table-wrapper">
            <table>
                    <th>Action</th><th>ID</th><th>Name</th><th>Date of First Business</th><th>Business Type</th><th>Address</th>
                
                <?php 
                $sql = "SELECT * FROM COMPANY;";
                $result = $pdo->query($sql); 
                
                while($val=$result->fetch()):
                   $comID = $val['CompanyID'];
                    $name = $val['Name'];
                    $dateBus = $val['DateFirstBusiness'];
                    $busType = $val['BusinessType'];
                    $address = $val['Address'];
                    
                    $url = $comID;
                    ?>
                <tr>
                    <td> <?php if($role != "Employee"){ ?> <button class="editCom" id=<?php echo $comID; ?> >Edit</button>
                        <a href="/JGWentworth/Controller/companyController.php?delete=<?php echo urlencode(base64_encode($url));?>" 
                        onclick="return confirm('Are you sure you want to delete this company?');"><input type="submit" value="Delete"></a>  <?php } ?>
                        
                        <form action="/JGWentworth/View/Client.php" method="post" class="clientForm">
                            <input class="hideInput" type="text" name="selector" value="<?php echo $comID;?>">
                            <input onclick="return confirm('Are you sure you want to leave this page?');" 
                            type="submit" name="select"  value="View Clients"> 
                        </form>
                    </td>
                    <td id="compID<?php echo $comID; ?>"><?php echo $comID; ?></td>
                    <td id="name<?php echo $comID; ?>"><?php echo $name; ?></td> 
                    <td id="dateBus<?php echo $comID; ?>"><?php echo $dateBus; ?></td>
                    <td id="type<?php echo $comID; ?>"><?php echo $busType; ?></td> 
                    <td id="address<?php echo $comID; ?>"><?php echo $address; ?></td>
                    
                </tr>
                <?php
                endwhile;
                ?>
            </table>
            </div>
         </div>     
       </div>
    </body>
</html>