<!DOCTYPE html>
<!--
Initial page to view companies
-->

<?php 
    include ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/View/Header.php');
    include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
?>
<script src="JavaScript/companyViewJS.js"></script>
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
<body>
        <div id="page">
            <div id="body">
            <h1>Companies</h1>
            <div>
                <button id="createCom" class="button">Create new Company</button>
            </div>
            
            <table id="will_be_assigned">
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
     <!-- FORM THAT ALLOWS USER TO EDIT COMPANY INFORMATION --> 
          <div id="will_be_assigned">
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