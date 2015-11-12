<?php

/* 
 * To create, edit, and delete companie employees and non-employees
 */
 include ('Header.php');
 include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
?>
    <script type="text/javascript">
        $(document).ready(function () 
        {
            $('#newDate').datepicker({dateFormat: "yy-mm-dd"});
            
            $('#Company').show();
            $('#NoCompany').hide();
            $('#div1').show();
            $('#div2').hide();
            $('#create1').hide();
            $('#create2').hide();
            $('#edit1').hide();
            $('#edit2').hide();

            $('#compClient').click(function () 
            {
                $('#Company').show();
                $('#NoCompany').hide();
                $('#div2').hide();
                $('#div1').show();
                $('#create1').hide();
                $('#create2').hide();
                $('#edit1').hide();
                $('#edit2').hide();
        });
            $('#client').click(function () 
            {
                $('#Company').hide();
                $('#NoCompany').show();
                $('#div1').hide();
                $('#div2').show();
                $('#create1').hide();
                $('#create2').hide();
                $('#edit1').hide();
                $('#edit2').hide();
            });
            
            $('#createCompClient').click(function ()
            {
                $('#Company').show();
                $('#NoCompany').hide();
                $('#create1').show();
                $('#create2').hide();
                $('#edit1').hide();
                $('#edit2').hide();
            });
            
            $('#createClient').click(function ()
            {
                $('#Company').hide();
                $('#NoCompany').show();
                $('#create1').hide();
                $('#create2').show();
                $('#edit1').hide();
                $('#edit2').hide();
            });
            
            $('.editCompClient').click(function ()
            {
                $('#Company').show();
                $('#NoCompany').hide();
                $('#create1').hide();
                $('#create2').hide();
                $('#edit1').show();
                $('#edit2').hide();
                
                var id = $(this).get(0).id;
    
                document.getElementById('editCompFName').value = document.getElementById('showCompFName'+id).innerHTML;
                document.getElementById('editCompLName').value = document.getElementById('showCompLName'+id).innerHTML;
                document.getElementById('editCompTitle').value = document.getElementById('showCompTitle'+id).innerHTML;
                document.getElementById('editCompCompany').value = document.getElementById('showCompCompany'+id).innerHTML;
                document.getElementById('editCompPhone').value = document.getElementById('showCompPhone'+id).innerHTML;
                document.getElementById('editCompEmail').value = document.getElementById('showCompEmail'+id).innerHTML;
                document.getElementById('editCompFContacted').value = document.getElementById('showCompFContact'+id).innerHTML;
                document.getElementById('hiddenID').value = id;
            });
            
            $('.editClient').click(function ()
            {
                $('#create1').hide();
                $('#create2').hide();
                $('#edit1').hide();
                $('#edit2').show();
                
                var id = $(this).get(0).id;

                document.getElementById('editClientFName').value = document.getElementById('showClientFName'+id).innerHTML;
                document.getElementById('editClientLName').value = document.getElementById('showClientLName'+id).innerHTML;
                document.getElementById('editClientTitle').value = document.getElementById('showClientTitle'+id).innerHTML;
                document.getElementById('editClientAddress').value = document.getElementById('showClientAddress'+id).innerHTML;
                document.getElementById('editClientPhone').value = document.getElementById('showClientPhone'+id).innerHTML;
                document.getElementById('editClientEmail').value = document.getElementById('showClientEmail'+id).innerHTML;
                document.getElementById('editClientFContacted').value = document.getElementById('showClientFContact'+id).innerHTML;
                document.getElementById('hiddenID').value = id;
            });
            
        });
    </script>
    <body>
        <div id="page">
            <div id="body">
                <div>
                   <input id="compClient" type="radio" name="name_radio1" value="value_radio1" />Company
                   <input id="client" type="radio" name="name_radio1" value="value_radio2" />No Company
                </div>
                
                <h1 id="Company">Company Client</h1>
                <h1 id="NoCompany">Client</h1>
                
<!-------------- Create Company Client --------------------------------------------------------------------------------------->
                <div id="create1">
                    <form method="post" action="/JGWentworth/Controller/ClientController.php" enctype="multipart/form-data">
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="4">Create Company Client</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Photo:</td>
                                    <td><input type="file" name="compPhoto" /></td>
                                    <td>First Name:</td>
                                    <td><input type="text" name="compFName" required /></td>
                                </tr>
                                <tr>
                                    <td>Last Name:</td>
                                    <td><input type="text" name="compLName" required /></td>
                                    <td>Title:</td>
                                    <td><input type="text" name="compTitle" /></td>
                                </tr>
                                <tr>
                                    <td>Company:</td>
                                    <td>
                                        <select name='compCompany'>
                                            <?php 
                                                $sql = "SELECT Name FROM COMPANY ORDER BY Name";
                                                $result = $pdo->query($sql);

                                                while ($val = $result->fetch()):

                                                $compName = $val['Name'];

                                                {
                                                    echo "<option>" . $compName . "</option>";
                                                }endwhile;
                                            ?>
                                        </select>
                                    </td>
                                    <td>Phone:</td>
                                    <td><input type="text" name="compPhone" /></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><input type="email" name="compEmail" required /></td>
                                    <td>First Contacted</td>
                                    <td><input type="text" id="newDate" name="compFContacted" /></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="createCompClient" value="Create Company Client" /></td>
                                    <td colspan="3"><button name="cancelCreateComp">Cancel</buton></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                
<!-------------- Create Client --------------------------------------------------------------------------------------------->
                <div id="create2">  
                    <form method="post" action="/JGWentworth/Controller/ClientController.php" enctype="multipart/form-data">
                        <table id="column2">
                            <tr>
                                <th colspan="4">Create Client</th>
                            </tr>
                            <tr>
                                <td>Photo:</td>
                                <td><input type="file" name="clientPhoto" /></td>
                                <td>First Name:</td>
                                <td><input type="text" name="clientFName" /></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" name="clientLName" /></td>
                                <td>Title:</td>
                                <td><input type="text" name="clientTitle" /></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><input type="text" name="clientPhone" /></td>
                                <td>Email:</td>
                                <td><input type="email" name="clientEmail" /></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" name="clientAddress" /></td>
                                <td>First Contacted</td>
                                <td><input type="text" id="newDate" name="clientFContacted" /></td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="createClient" value="Create Client" /></td>
                                <td colspan="3"><input type="submit" name="cancelCreateClient" value="Cancel" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
                
<!-------------- Edit Company Client -------------------------------------------------------------------------------------->
                <div id="edit1">      
                    <form method="post" action="/JGWentworth/Controller/ClientController.php" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <th colspan="4">Edit Company Client</th>
                            </tr>
                            <tr>
                                <td>Photo:</td>
                                <td><input type="file" id='editCompPhoto' name='editCompPhoto' /></td>
                                <td>First Name:</td>
                                <td><input type="text" id='editCompFName' name='editCompFName' /></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" id='editCompLName' name='editCompLName' /></td>
                                <td>Title:</td>
                                <td><input type="text" id='editCompTitle' name='editCompTitle' /></td>
                            </tr>
                            <tr>
                                <td>Company:</td>
                                <td>
                                    <select id="editCompCompany" name="editCompCompany">
                                        <?php
                                            $sql = "SELECT Name FROM COMPANY ORDER BY Name";
                                            $result = $pdo->query($sql);

                                            while ($val = $result->fetch()):

                                            $compName = $val['Name'];

                                            {
                                                echo "<option>" . $compName . "</option>";
                                            }endwhile;
                                        ?>
                                    </select>
                                </td>
                                <td>Phone:</td>
                                <td><input type="text" id='editCompPhone' name='editCompPhone' /></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="email" id='editCompEmail' name='editCompEmail' /></td>
                                <td>First Contacted<br>yyyy-mm-dd:</td>
                                <td><input type="text" id='editCompFContacted' name='editCompFContacted' /></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" id="hiddenID" name="editCompID"></td>
                                <td><input type="submit" name='editCompClient' value="Save" /></td>
                                <td colspan="3"><input type="submit" name="cancelEditComp" value="Cancel" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
                
<!-------------- Edit Client ----------------------------------------------------------------------------------------------->
                <div id="edit2">
                    <form method="post" action="/JGWentworth/Controller/ClientController.php" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <th colspan="4">Edit Client</th>
                            </tr>
                            <tr>
                                <td>Photo:</td>
                                <td><input type="file" id='editClientPhoto' name='editClientPhoto' /></td>
                                <td>First Name:</td>
                                <td><input type="text" id='editClientFName' name='editClientFName' /></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" id='editClientLName' name='editClientLName' /></td>
                                <td>Title:</td>
                                <td><input type="text" id='editClientTitle' name='editClientTitle' /></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><input type="text" id='editClientPhone' name='editClientPhone' /></td>
                                <td>Email:</td>
                                <td><input type="email" id='editClientEmail' name='editClientEmail' /></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" id='editClientAddress' name='editClientAddress' /></td>
                                <td>First Contacted<br>yyyy-mm-dd:</td>
                                <td><input type="text" id='editClientFContacted' name='editClientFContacted' /></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" id="hiddenID" name="editClientID"></td>
                                <td><input type="submit" value="Save" name="editNoCompClient" /></td>
                                <td colspan="3"><input type="submit" name="cancelEditClient" value="Cancel" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
                
<!-------------- Show Company Client ---------------------------------------------------------------------------------------->
                <div id="div1">
                    <p><button id="createCompClient">Create Company Client</button></p>               
                    <table>
                        <tr>
                            <th>Photo</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Title</th>
                            <th>Company</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>First Contacted</th>
                            <th></th>
                            <th></th>
                        <tbody>
                        </tr>
                        <?php
                        
                            $companyId = $val['CompanyID'];
                            
                            $sql = "SELECT COMPANY_MEMBER.*, COMPANY.Name FROM COMPANY_MEMBER "
                                    . "JOIN COMPANY "
                                    . "ON COMPANY.CompanyID = COMPANY_MEMBER.CompanyID";

                            $result = $pdo->query($sql);

                            while($val=$result->fetch()):
                            
                                $compName = $val['Name'];
                                $memberId = $val['MemberID'];
                                $fName = $val['FirstName'];
                                $lName = $val['LastName'];
                                $title = $val['Title'];
                                $phone = $val['Phone'];
                                $email = $val['Email'];
                                $fContacted = $val['DateFirstContact'];
                                $photo = $val['PhotoURL'];  
                                
                                $trimm = str_replace( $_SERVER["DOCUMENT_ROOT"],"", $photo);
                                
                        ?>
                        <tr>
                            <td><img src="<?php echo $trimm; ?>" alt="N/A" style="width: 29px;
                                    height: 39px;" /></td>
                            <td id="showCompFName<?php echo $memberId; ?>"><?php echo $fName; ?></td>
                            <td id="showCompLName<?php echo $memberId; ?>"><?php echo $lName; ?></td>
                            <td id="showCompTitle<?php echo $memberId; ?>"><?php echo $title; ?></td>
                            <td id="showCompCompany<?php echo $memberId; ?>">
                                <?php echo $compName; ?></td>
                            <td id="showCompPhone<?php echo $memberId; ?>"><?php echo $phone; ?></td>
                            <td id="showCompEmail<?php echo $memberId; ?>"><?php echo $email; ?></td>
                            <td id="showCompFContact<?php echo $memberId; ?>"><?php echo $fContacted; ?></td>
                            <td><button class="editCompClient" id="<?php echo $memberId; ?>">Edit</button></td>
                            <td><a href="/JGWentworth/Controller/ClientController.php?delete_compClient=<?php echo $memberId; ?>" onclick="return confirm('Are you sure you want to delete this client?');"><input type="submit" value="Delete"></a></td>
                        </tr>     
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                
<!-------------- Show Client ----------------------------------------------------------------------------------------------->
                <div id="div2">
                    <p><button id="createClient">Create Client</button></p>
                    <table>
                        <tr>
                            <th>Photo</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Title</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>First Contacted</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            $sql = "SELECT * FROM NON_MEMBER";

                            $result = $pdo->query($sql);

                            while($val=$result->fetch()):
                         
                            $memberId = $val['MemberID'];
                            $fName = $val['FirstName'];
                            $lName = $val['LastName'];
                            $title = $val['Title'];
                            $address = $val['Address'];
                            $phone = $val['Phone'];
                            $email = $val['Email'];
                            $fContacted = $val['DateFirstContact'];
                            $photo = $val['PhotoURL'];  
                                
                                $trimm = str_replace($_SERVER["DOCUMENT_ROOT"],"", $photo);
                        ?>
                        <tr>
                            <input type="hidden" id="CompClientId" value="<?php echo $memberId; ?>" />
                            <td><img src="<?php echo $trimm; ?>" alt="N/A" style="width: 29px;
                                    height: 39px;" /></td>
                            <td id="showClientFName<?php echo $memberId; ?>"><?php echo $fName; ?></td>
                            <td id="showClientLName<?php echo $memberId; ?>"><?php echo $lName; ?></td>
                            <td id="showClientTitle<?php echo $memberId; ?>"><?php echo $title; ?></td>
                            <td id='showClientAddress<?php echo $memberId; ?>'><?php echo $address; ?></td>
                            <td id="showClientPhone<?php echo $memberId; ?>"><?php echo $phone; ?></td>
                            <td id="showClientEmail<?php echo $memberId; ?>"><?php echo $email; ?></td>
                            <td id="showClientFContact<?php echo $memberId; ?>"><?php echo $fContacted; ?></td>
                            <td><button class="editClient" id="<?php echo $memberId; ?>">Edit</button></td>
                            <td><a href="/JGWentworth/Controller/ClientController.php?delete_client=<?php echo $memberId; ?>" onclick="return confirm('Are you sure you want to delete this client?');"><input type="submit" value="Delete"></a></td>
                        </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>