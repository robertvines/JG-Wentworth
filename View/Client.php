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
            
            $('#editCompClient').click(function ()
            {
                $('#create1').hide();
                $('#create2').hide();
                $('#edit1').show();
                $('#edit2').hide();
            });
            
            $('#editClient').click(function ()
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
                        <thead>
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
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM COMPANY_MEMBER";
                                
                                $result = $pdo->query($sql);
                           
                                while($val=$result->fetch()):
                                {
                                $memberId = $val['MemberID'];
                                $fName = $val['FirstName'];
                                $lName = $val['LastName'];
                                $title = $val['Title'];
                                $phone = $val['Phone'];
                                $email = $val['Email'];
                                $fContacted = $val['DateFirstContact'];
                            ?>
                            <tr>
                                <td></td>
                                <td><?php echo $fName; ?></td>
                                <td><?php echo $lName; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $phone; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $fContacted; ?></td>
                                <td><input id="editCompClient" type="submit" value="Edit"></td>
                                <td><a onclick="return confirm('Are you sure you want to delete this client?');"><input type="submit" value="Delete"></a></td>
                            </tr>
                        </tbody>
                        <?php }endwhile; ?>
                    </table>
                </div>
                
                <!-- Show Client -->
                <div id="div2">
                    <h1>Client</h1>
                    <p><button id="createClient">Create Client</button></p>
                    <table id="column1">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Title</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>First Contacted</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input id="editClient" type="submit" value="Edit"></td>
                                <td><a href="EditEmployer.php?delete_id=<?php echo $empID ?>" onclick="return confirm('Are you sure you want to delete this employer?');"><input type="submit" value="Delete"></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Create Company Client -->
                <div id="create1">
                    <form method="post" action="/JGWentworth/Controller/ClientController.php">
                        <table id="column2">
                            <tr>
                                <th colspan="2">Create Company Client</th>
                            </tr>
                            <tr>
                                <td>Photo:</td>
                                <td><input type="text" name="photo" /></td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" name="fName" required /></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" name="lName" required /></td>
                            </tr>
                            <tr>
                                <td>Title:</td>
                                <td><input type="text" name="title" /></td>
                            </tr>
                            <tr>
                                <td>Company:</td>
                                <td>
                                    <select name='company'>
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
                                <td><input type="text" name="phone" /></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="email" name="email" required /></td>
                            </tr>
                            <tr>
                                <td>First Contacted:</td>
                                <td><input type="text" name="fContacted" /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name='createCompanyClient' value="submit" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
                
                <!-- Create Client -->
                <div id="create2">  
                    <form method="post" action="/JGWentworth/Controller/ClientController.php">
                        <table id="column2">
                            <tr>
                                <th colspan="2">Create Client</th>
                            </tr>
                            <tr>
                                <td>Photo:</td>
                                <td><input type="text" id='photo' /></td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" id='fName' /></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" id='lName' /></td>
                            </tr>
                            <tr>
                                <td>Title:</td>
                                <td><input type="text" id='title' /></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><input type="text" id='phone' /></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="email" id='email' /></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" id='address' /></td>
                            </tr>
                            <tr>
                                <td>First Contacted:</td>
                                <td><input type="text" if='fContacted' /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" id='createNoCompClient' /></td>
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
                                <td><input type="text" id='fName' /></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" id='lName' /></td>
                            </tr>
                            <tr>
                                <td>Title:</td>
                                <td><input type="text" id='title' /></td>
                            </tr>
                            <tr>
                                <td>Company:</td>
                                <td>
                                    <select id='company'>
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
                                <td><input type="text" id='phone' /></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="email" id='email' /></td>
                            </tr>
                            <tr>
                                <td>First Contacted:</td>
                                <td><input type="text" id='fContacted' /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" id='editCompanyClient' /></td>
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
                                <td><input type="text" id='fName' /></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" id='lName' /></td>
                            </tr>
                            <tr>
                                <td>Title:</td>
                                <td><input type="text" id='title' /></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><input type="text" id='phone' /></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="email" id='email' /></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" id='address' /></td>
                            </tr>
                            <tr>
                                <td>First Contacted:</td>
                                <td><input type="text" id='fContacted' /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" id='editNoCompClient' /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>