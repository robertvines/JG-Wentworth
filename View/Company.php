<!DOCTYPE html>
<!--
Initial page to view companies
-->
<?php $user = 'sql591897';
    $password = 'hA5!kQ4%';
    $db = 'sql591897';  
    $conn ="mysql:host=sql5.freemysqlhosting.net;dbname=sql591897";
    
 
    try {
        $pdo = new PDO($conn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $ex) {
        echo 'Connection Failed: ' . $ex->getMessage();
    } ?>

<html>
    <head>
        <title>Companies</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
        <script type="text/javascript">
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
     });
     /* *************************************************************************
     * Show the form that the user selects, hide the other if it is visible
     */
    $(document).ready(function() {
        $('#createCom').click(function(){
            $('#form-B').show();
            if($( '#form-A' ).is(":visible")){
              $( '#form-A' ).hide();
         }
        });
 
        $('.editCom').click(function(){ 
            // SHOW THE EDIT FORM, HIDE CREATE FORM
            $('#form-A').show();
            if($( '#form-B' ).is(":visible")){
              $( '#form-B' ).hide();
         }
         //POPULATE FIELDS WITH EXISTING COMPANY INFORMATION USING ID
            var id = $(this).get(0).id;
            document.getElementById('editID').innerHTML = id;
            document.getElementById('editName').value = document.getElementById('name'+id).innerHTML;
            document.getElementById('editDate').value = document.getElementById('dateBus'+id).innerHTML;
            document.getElementById('editType').value = document.getElementById('type'+id).innerHTML;
            document.getElementById('editAddress').value = document.getElementById('address'+id).innerHTML;
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
    });


        </script>

    </head>
    <body>
        <?php
                
        ?>
        
        <div class="container">
            <h1>Companies</h1>
            
            <div>
                <button id="createCom">Create new Company</button>
            </div>
            
            <table class="table-striped">
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
                    <td><button class="editCom" id=<?php echo $comID; ?> >Edit</button><button>Delete</button></td>
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
     <!-- FORM THAT ALLOWS USER TO EDIT COMPANY INFORMATION -->       
            <div id="form-A">
                <form id="editForm" name="edit-submit" method="post" action="/JGWentworth/Controller/companyController.php">
                    <fieldset>
                        <legend>Edit Company</legend>
                        
                        <table>
                            <tr><td>ID:</td> <td id="editID"></td></tr>
                            <tr><td>Name:</td> <td><input type="text" id="editName"></td></tr>
                            <tr><td>Type of Business:</td> <td><input type="text" id="editType"></td></tr>
                            <tr><td>Date of First Business</td> <td><input type="text" id="editDate"></td></tr>
                            <tr><td>Address</td> <td><input type="text" id="editAddress"></td></tr>
                        </table>
                        <input type="submit" value="Submit"> <button id='hideEdit' type="button">Cancel</button>
                    </fieldset>
                </form>
            </div>
      <!-- FORM THAT ALLOWS A USER TO CREATE A NEW COMPANY -->      
            <div id="form-B">
                <form id="createForm">
                    <fieldset>
                        <legend>Create a Company</legend>
                        
                        <table>
                            <tr><td>Name:</td> <td><input type="text" name="newCompName"></td></tr>
                            <tr><td>Type of Business:</td> <td><input type="text" name='newBusiness'></td></tr>
                            <tr><td>Date of First Business</td> <td><input type="text" name='newDateOfBusiness'></td></tr>
                            <tr><td>Address</td> <td><input type="text" name='newAddress'></td></tr>
                        </table>
                        <input type="submit" value="Submit"> <button id='hideCreate' type="button">Cancel</button>
                    </fieldset>
                </form>
            </div>
                
        </div>
    </body>
</html>




<?php 
/*
if (!empty($_POST['mailing-submit'])) {
   //do something here;
}

if (!empty($_POST['contact-submit'])) {
   //do something here;
}
 */
?>