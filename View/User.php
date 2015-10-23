<?php

/* 
 * To create, edit, and delete user
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
                <!-- Show Company Users -->
                <div id="div1">
                    <h1>Company User</h1>
                    <p><button id="createUser">Create User</button></p>               
                    <table id="column1">
                        
                            <th>UserID</th>
                            <th>LoginID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Role</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th></th>
                            <th></th>
                        
                        <?php
                            $sql = "SELECT * FROM USER";

                            $result = $pdo->query($sql);

                            while($val=$result->fetch()):
                            {
                                $userID = $val['UserID'];
                                $loginID = $val['LoginID'];
                                $fName = $val['FirstName'];
                                $lName = $val['LastName'];
                                $role = $val['Role'];
                                $phone = $val['Phone'];
                                $email = $val['Email'];
                                $department = $val['Department'];
                                    
                        ?>
                        <tr>
                            <td></td>
                            <td><?php echo $userID; ?></td>
                            <td><?php echo $loginID; ?></td>
                            <td><?php echo $fName; ?></td>
                            <td><?php echo $lName; ?></td>
                            <td><?php echo $role; ?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $department; ?></td>
                            <td><input id="editCompClient" type="submit" value="Edit"></td>
                            <td><a onclick="return confirm('Are you sure you want to delete this user?');"><input type="submit" name='deleteCompClient' value="Delete"></a></td>
                        </tr>                        
                        <?php }endwhile; ?>
                    </table>
                </div>
                
                <!-- Create User -->
                <div id="create1">
                    <form method="post" action="/JGWentworth/Controller/UserController.php">
                        <table id="column2">
                            <thead>
                                <tr>
                                    <th colspan="2">Create User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>UserID:</td>
                                    <td><input type="text" name="userID" required/></td>
                                </tr>
                                                                <tr>
                                    <td>LoginID:</td>
                                    <td><input type="text" name="loginID" required/></td>
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
                                    <td>Role:</td>
                                    <td><input type="text" name="role" required/></td>
                                </tr>
                                <tr>
                                    <td>Phone:</td>
                                    <td><input type="text" name="phone" required/></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><input type="email" name="email" required /></td>
                                </tr>
                                <tr>
                                    <td>Department:</td>
                                    <td><input type="text" name="department" required /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="user" value="Create User" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                            
                <!-- Edit User -->
                <div id="edit1">
                    <form method="post" action="/JGWentworth/Controller/UserController.php">
                        <table id="column2">
                            <tr>
                                <th colspan="2">Edit User Info</th>
                            </tr>
                            <tr>
                                <td>UserID:</td>
                                <td><input type="text" id='userID' /></td>
                            </tr>
                                                        <tr>
                                <td>LoginID:</td>
                                <td><input type="text" id='loginID' /></td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" id='fName' value="" /></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" id='lName' /></td>
                            </tr>
                            <tr>
                                <td>Role:</td>
                                <td><input type="text" id='title' /></td>
                            </tr>
                            <tr>
                                <td>Department:</td>
                                <td><input type="text" id='department' /></td>
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
                                <td></td>
                                <td><input type="submit" value="Save User Info" id="client" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
                
            </div>
        </div>
    </body>
</html>
