<!DOCTYPE html>
<!--
Initial page to view companies
-->

<?php 
    include ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/View/Header.php');
    include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
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
         
      //   $("#datepicker").datepicker();
 
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
         
    //     $("#newDate").datepicker();
        });
 
        $('.editCom').click(function(){ 
            // SHOW THE EDIT FORM, HIDE CREATE FORM
            $('#form-A').show();
            if($( '#form-B' ).is(":visible")){
              $( '#form-B' ).hide();
         }
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
         
    });// end documet.ready function   
</script>

<style>

.table-wrapper {
    float: left;
    overflow-x:scroll;
    overflow-y:visible;
    //width:65%;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

th, td {
  white-space: nowrap;
}

th:first-child {
   position: absolute;
  //  left: 5px;
  //  color: red;
}
#right-side {
    float: right;
    margin-left: auto;
    margin-right: auto;
    
    
}
</style>
<body>
        <div id="page">
            <div id="body">
            <h1>Companies</h1>
            <div>
                <button id="createCom" class="button">Create new Company</button>
            </div>
            <div class="table-wrapper">
            <table>
                <tr>
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

                    ?>
                <tr>
                    <td><button class="editCom" id=<?php echo $comID; ?> >Edit</button><a href="/JGWentworth/Controller/companyController.php?deleteCompany=<?php echo $comID; ?>" 
                                                                                          onclick="return confirm('Are you sure you want to delete this company?');"><input type="submit" value="Delete"></a></td>
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
     <!-- FORM THAT ALLOWS USER TO EDIT COMPANY INFORMATION --> 
          <div id="right-side">
            <div id="form-A">
                <form id="editForm" method="post" action="/JGWentworth/Controller/companyController.php">
                    <fieldset>
                        <legend>Edit a Company</legend>
                        
                        <table>
                            <tr><td>ID:</td> <td id="editID"></td></tr>
                            <tr><td>Name:</td> <td><input type="text" id="editName" name="editName"></td></tr>
                            <tr><td>Type of Business:</td> <td><input type="text" id="editType" name="editType"></td></tr>
                            <tr><td>Date of First Business</td> <td><input type="text" id="editDate" name="editDate"></td></tr>
                            <tr><td>Address</td> <td><input type="text" id="editAddress" name="editAddress"></td></tr>
                        </table>
                        <input type="text" id="hiddenID" name="editID">
                        <input type="submit" name="edit-submit" value="Submit"> <button id='hideEdit' type="button">Cancel</button>
                    </fieldset>
                </form>
            </div>
      <!-- FORM THAT ALLOWS A USER TO CREATE A NEW COMPANY -->      
            <div id="form-B">
                <form id="createForm" method="post" action="/JGWentworth/Controller/companyController.php">
                    <fieldset>
                        <legend>Create a Company</legend>
                        
                        <table>
                            <tr><td>Name:</td> <td><input type="text" id="createName" name="newCompName"></td></tr>
                            <tr><td>Type of Business:</td> <td><input type="text" name='newBusiness'></td></tr>
                            <tr><td>Date of First Business</td> <td><input type="text" id="newDate" name='newDateOfBusiness'></td></tr>
                            <tr><td>Address</td> <td><input type="text" name='newAddress'></td></tr>
                        </table>
                        <input type="submit" name="create-submit" value="Submit"> <button id='hideCreate' type="button">Cancel</button>
                    </fieldset>
                </form>
            </div>
          </div>
         </div>     
       </div>
    </body>
</html>