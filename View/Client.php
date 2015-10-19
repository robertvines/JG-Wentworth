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
            $('#div2').hide();
            $('#create1').hide();
            $('#create2').hide();
            $('#edit1').hide();
            $('#edit2').hide();

            $('#compClient').click(function () 
            {
                $('#div2').hide();
                $('#div1').show();
                $('#create1').hide();
                $('#create2').hide();
                $('#edit1').hide();
                $('#edit2').hide();
        });
            $('#client').click(function () 
            {
                $('#div1').hide();
                $('#div2').show();
                $('#create1').hide();
                $('#create2').hide();
                $('#edit1').hide();
                $('#edit2').hide();
            });
            
            $('#createCompClient').click(function ()
            {
                $('#create1').show();
                $('#create2').hide();
                $('#edit1').hide();
                $('#edit2').hide();
            });
            
            $('#createClient').click(function ()
            {
                $('#create1').hide();
                $('#create2').show();
                $('#edit1').hide();
                $('#edit2').hide();
            });
            
            $('.editCompClient').click(function ()
            {
                $('#create1').hide();
                $('#create2').hide();
                $('#edit1').show();
                $('#edit2').hide();
            });
            
            $('.editClient').click(function ()
            {
                $('#create1').hide();
                $('#create2').hide();
                $('#edit1').hide();
                $('#edit2').show();
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
                
                <!-- Show Company Client -->
                <div id="div1">
                    <h1>Company Client</h1>
                    <p><button id="createCompClient">Create Company Client</button></p>               
                    <table id="column1">
                        <tr>
                            <th>Photo</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Title</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>First Contacted</th>
                            <th></th>
                            <th></th>
                        <tbody>
                        </tr>
                        <?php
                            $sql = "SELECT * FROM COMPANY_MEMBER";

                            $result = $pdo->query($sql);

                            while($val=$result->fetch()):
                            
                                $companyId = $val['CompanyID'];
                                $memberId = $val['MemberID'];
                                $fName = $val['FirstName'];
                                $lName = $val['LastName'];
                                $title = $val['Title'];
                                $phone = $val['Phone'];
                                $email = $val['Email'];
                                $fContacted = $val['DateFirstContact'];
                                $photo = $val['PhotoURL'];  
                                
                                $trimm = str_replace("C:/MAMP/htdocs","", $photo);
                        ?>
                        <tr>
                            <input type="hidden" id="CompClientId" value="<?php echo $memberId; ?>" />
                            <td><img src="<?php echo $trimm; ?>" alt="N/A" style="width: 30px;
                                    height: 45px;" /></td>
                            <td><?php echo $fName; ?><input type="hidden" name="showFName" /></td>
                            <td id="showLName"><?php echo $lName; ?></td>
                            <td id="showTitle"><?php echo $title; ?></td>
                            <td id="showPhone"><?php echo $phone; ?></td>
                            <td id="showEmail"><?php echo $email; ?></td>
                            <td id="showFContacted"><?php echo $fContacted; ?></td>
                            <td><button class="editCompClient" id="editCompClient" id="<?php echo $memberId; ?>">Edit</button></td>
                            <td><a href="/JGWentworth/Controller/ClientController.php?delete_compClient=<?php echo $memberId; ?>" onclick="return confirm('Are you sure you want to delete this client?');"><input type="submit" value="Delete"></a></td>
                        </tr>                        
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                
                <!-- Show Client -->
                <div id="div2">
                    <h1>Client</h1>
                    <p><button id="createClient">Create Client</button></p>
                    <table id="column1">
                        <tr>
                            <th>Photo</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Title</th>
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
                                
                                $trimm = str_replace("C:/MAMP/htdocs","", $photo);
                        ?>
                        <tr>
                            <input type="hidden" id="CompClientId" value="<?php echo $memberId; ?>" />
                            <td><img src="<?php echo $trimm; ?>" alt="N/A" style="width: 30px;
                                    height: 45px;" /></td>
                            <td name="showFName"><?php echo $fName; ?></td>
                            <td id="showCLName"><?php echo $lName; ?></td>
                            <td id="showCTitle"><?php echo $title; ?></td>
                            <td id="showCPhone"><?php echo $phone; ?></td>
                            <td id="showCEmail"><?php echo $email; ?></td>
                            <td id="showCFContacted"><?php echo $fContacted; ?></td>
                            <td><button class="editClient" id="editClient">Edit</button></td>
                            <td><a href="ClientContoller.php?delete_client=<?php echo $memberId ?>" onclick="return confirm('Are you sure you want to delete this client?');"><input type="submit" value="Delete"></a></td>
                        </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
                
                <!-- Create Company Client -->
                <div id="create1">
                    <form method="post" action="/JGWentworth/Controller/ClientController.php" enctype="multipart/form-data">
                        <table id="column2">
                            <thead>
                                <tr>
                                    <th colspan="2">Create Company Client</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Photo:</td>
                                    <td><input type="file" name="compPhoto" /></td>
                                </tr>
                                <tr>
                                    <td>First Name:</td>
                                    <td><input type="text" name="compFName" required /></td>
                                </tr>
                                <tr>
                                    <td>Last Name:</td>
                                    <td><input type="text" name="compFName" required /></td>
                                </tr>
                                <tr>
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
                                </tr>
                                <tr>
                                    <td>Phone:</td>
                                    <td><input type="text" name="compPhone" /></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><input type="email" name="compEmail" required /></td>
                                </tr>
                                <tr>
                                    <td>First Contacted:</td>
                                    <td><input type="text" name="compFContacted" placeholder="(yyyy-mm-dd)" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="createCompClient" value="Create Company Client" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                
                <!-- Create Client -->
                <div id="create2">  
                    <form method="post" action="/JGWentworth/Controller/ClientController.php" enctype="multipart/form-data">
                        <table id="column2">
                            <tr>
                                <th colspan="2">Create Client</th>
                            </tr>
                            <tr>
                                <td>Photo:</td>
                                <td><input type="file" name="clientPhoto" /></td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" name="clientFName" /></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" name="clientLName" /></td>
                            </tr>
                            <tr>
                                <td>Title:</td>
                                <td><input type="text" name="clientTitle" /></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><input type="text" name="clientPhone" /></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="email" name="clientEmail" /></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" name="clientAddress" /></td>
                            </tr>
                            <tr>
                                <td>First Contacted:</td>
                                <td><input type="text" name="clientFContacted" placeholder="yyyy-mm-dd" /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="createClient" value="Create Client" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
                
                <!-- Edit Company Client -->
                <div id="edit1">      
                    <form method="post" action="/JGWentworth/Controller/ClientController.php">
                        <table id="column2">
                            <tr>
                                <th colspan="2">Edit Company Client</th>
                            </tr>
                            <tr>
                                <td>Photo:</td>
                                <td><input type="text" id='photo' /></td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" name='editCompFName' /></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" id='editCompLName' /></td>
                            </tr>
                            <tr>
                                <td>Title:</td>
                                <td><input type="text" id='editCompTitle' /></td>
                            </tr>
                            <tr>
                                <td>Company:</td>
                                <td>
                                    <select name='company' id="editCompany">
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
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><input type="text" id='editCompPhone' /></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="email" id='editCompEmail' /></td>
                            </tr>
                            <tr>
                                <td>First Contacted:</td>
                                <td><input type="text" id='editCompFContacted' /></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" id="hiddenID" name="editID"></td>
                                <td><input type="submit" value="Save Company Client" id="client" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
                
                <!-- Edit Client -->
                <div id="edit2">
                    <form method="post" action="/JGWentworth/Controller/ClientController.php">
                        <table id="column2">
                            <tr>
                                <th colspan="2">Edit Client</th>
                            </tr>
                            <tr>
                                <td>Photo:</td>
                                <td><input type="text" id='photo' /></td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" id='editClientFName' /></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" id='editClientLName' /></td>
                            </tr>
                            <tr>
                                <td>Title:</td>
                                <td><input type="text" id='editClientTitle' /></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><input type="text" id='editClientPhone' /></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="email" id='editClientEmail' /></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" id='editClientAddress' /></td>
                            </tr>
                            <tr>
                                <td>First Contacted:</td>
                                <td><input type="text" id='editClientFContacted' /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Save Client" id="client" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>