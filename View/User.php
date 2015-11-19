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
            $('#createUser').hide();
            $('#editUser').hide();
            $('.hiddenClass').hide();
       
            $('#showCreateUser').click(function(){
                 $('#createUser').show();
                 $('#editUser').hide();
            });
            
            $('#cancelCreate').click(function(){
                $('#createUser').hide();
            });
            
            $('.showEditUser').click(function(){
                 $('#editUser').show();
                 $('#createUser').hide();

                var id = $(this).get(0).id;
    
                document.getElementById('editID').innerHTML = id;
                document.getElementById('editfName').value = document.getElementById('fName'+id).innerHTML;
                document.getElementById('editlName').value = document.getElementById('lName'+id).innerHTML;
                document.getElementById('editRole').value = document.getElementById('role'+id).innerHTML;
                document.getElementById('editDep').value = document.getElementById('dep'+id).innerHTML;
                document.getElementById('editPhone').value = document.getElementById('phone'+id).innerHTML;
                document.getElementById('editEmail').value = document.getElementById('email'+id).innerHTML;
                document.getElementById('editUserName').value = document.getElementById('un'+id).innerHTML;
                document.getElementById('editPass').value = document.getElementById('pass'+id).innerHTML;
                document.getElementById('hiddenEdit').value = id;
            });
            
            $('#cancelEdit').click(function(){
                $('#editUser').hide();
            });
            
            $('#showCreatePass').click(function(){
                $('#createPass').each(function() {
                $("<input type='text' id='createPass' />").attr({ name: this.name, value: this.value }).insertBefore(this);
                }).remove();
            });
            
            $('#hideCreatePass').click(function(){
                $('#createPass').each(function() {
                $("<input type='password' id='createPass' />").attr({ name: this.name, value: this.value }).insertBefore(this);
                }).remove();
            });
            
            $('#showEditPass').click(function(){
                $('#editPass').each(function() {
                $("<input type='text' id='editPass' />").attr({ name: this.name, value: this.value }).insertBefore(this);
                }).remove();
            });
            
            $('#hideEditPass').click(function(){
                $('#editPass').each(function() {
                $("<input type='password' id='editPass' />").attr({ name: this.name, value: this.value }).insertBefore(this);
                }).remove();
            });
        });
    </script>
    <style>
    #form-wrapper{
       margin-bottom: 25px; 
       width: 50%;
       min-width: 300px;
    }
    
    legend {
    font-weight: bold;
    font-size: 18px;
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

th, td {
  white-space: nowrap;
}
        
    </style>
    <body>
        <div id="page">
            <div id="body">
            <h1 class="title">USER</h1>
            <div id="form-wrapper">
             <!------- Create User ------------------------------------------------------------->
                <div id="createUser">
                    <form method="post" action="/JGWentworth/Controller/userController.php">
                     <fieldset>
                      <legend>Create User</legend>
                      <div id="first-table" style="float: left;">
                        <table style="margin-bottom: 5px;">
                          <thead>
                          <th colspan="2">User Info</th>
                          </thead>
                            <tbody> 
                                <tr>
                                    <td>First Name:</td>
                                    <td><input type="text" name="fName" /></td>
                                </tr>
                                <tr>
                                    <td>Last Name:</td>
                                    <td><input type="text" name="lName" /></td>
                                </tr>
                                <tr>
                                    <td>Role:</td>
                                    <td><select name="Role">
                                        <option value="Admin">Administrator</option>
                                        <option value="Supervisor">Supervisor</option>
                                        <option value="Employee">Employee</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Phone:</td>
                                    <td><input type="text" class="phone" name="phone" /></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><input type="email" name="email" /></td>
                                </tr>
                                <tr>
                                    <td>Department:</td>
                                    <td><input type="text" name="department" /></td>
                                </tr>
                            </tbody>
                        </table>
                          <input class="btnsmall" type="submit" name="CreateUser" value="Create User" />
                          <button type="button" class="btnsmall" id="cancelCreate">Cancel</button>
                      </div>
                      <div id="second-table" style="float: right;">
                      <table>
                          <thead>
                          <th colspan="2">Login Info</th>
                          </thead>
                              <tr>
                                <td>User Name:</td>
                                <td><input type="text" name="username" /></td>
                              </tr>
                              <tr>
                                <td>Password:</td>
                                <td><input id="createPass" type="password" name="pass" /></td>
                              </tr>
                      </table>
                          <button type="button" id="showCreatePass">show text</button>
                          <button type="button" id="hideCreatePass">hide text</button>
                      </div>  
                     </fieldset>
                    </form>
                </div>
                <!----------- Edit User ------------------------------------------------------------------->
                <div id="editUser">
                    <form method="post" action="/JGWentworth/Controller/userController.php">
                        <fieldset>
                            <legend>Edit User</legend>
                      <div style="float: left">
                        <table style="margin-bottom: 5px;">
                            <tr>
                                <td>UserID:</td>
                                <td id="editID"></td>
                            </tr>                 
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" id='editfName' name="fName" /></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" id='editlName' name="lName"/></td>
                            </tr>
                            <tr>
                                <td>Role:</td>
                                    <td><select name="Role" id='editRole'>
                                        <option value="Admin">Administrator</option>
                                        <option value="Supervisor">Supervisor</option>
                                        <option value="Employee">Employee</option>
                                        </select></td>
                            </tr>
                            <tr>
                                <td>Department:</td>
                                <td><input type="text" id='editDep' name="department" /></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><input type="text" class="phone" id='editPhone' name="phone" /></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="email" id="editEmail" name="email" /></td>
                            </tr>
                        </table>
                            <input type="submit" value="Save" name="EditUser" id="editUser" class="btnsmall" />
                            <button type="button" id="cancelEdit" class="btnsmall">Cancel</button>
                      </div>
                      <div style="float: right">
                          <table>
                              <tr>
                                <td>User Name:</td>
                                <td><input type="text" id="editUserName" name="username" /></td>
                              </tr>
                              <tr>
                                <td>Password:</td>
                                <td><input type="password" id="editPass" name="pass" /></td>
                              </tr>
                          </table>
                          <button type="button" id="showEditPass">show text</button>
                          <button type="button" id="hideEditPass">hide text</button>
                      </div>
                        </fieldset>
                        <input type="text" id="hiddenEdit" class="hiddenClass" name="editID">
                    </form>
                </div>
            </div>    
            <div style="margin-bottom: 8px;">
              <button class="btn" id="showCreateUser">Create User</button>      
            </div>
                <!---- Show Company Users ----------------------------------------------------------->
            <div id="table-wrapper">    
                    <table>
                     <thead>
                        <th>Action</th>
                        <th>UserName</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Role</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Department</th>
                    </thead>
                        <?php
                            $sql = "SELECT * FROM USER";
                            $result = $pdo->query($sql);

                            while($val=$result->fetch()):
                            
                                $userID = $val['UserID'];
                                $loginID = $val['LoginID'];
                                $fName = $val['FirstName'];
                                $lName = $val['LastName'];
                                $role = $val['Role'];
                                $phone = $val['Phone'];
                                $email = $val['Email'];
                                $department = $val['Department'];  
                                
                                 $sql1 = "SELECT * FROM LOGIN WHERE LoginID=".$loginID;
                                 $result1 = $pdo->query($sql1);
                                 $val1=$result1->fetch();
                                 $un = $val1['UserName'];
                                 $pass = $val1['Password'];
                                
                                $url = $userID;
                        ?>
                    
                    <label class="hiddenClass" id="un<?php echo $userID; ?>"><?php echo $un; ?></label>
                    <label class="hiddenClass" id="pass<?php echo $userID; ?>"><?php echo $pass; ?></label>
                       
                        <tr>
                            <td>
                                <button class="showEditUser" id=<?php echo $userID; ?> >Edit</button>
                                <a href="/JGWentworth/Controller/userController.php?delete=<?php echo urlencode(base64_encode($url)); ?>"
                                   onclick="return confirm('Are you sure you want to delete this user?');"><input type="submit" value="Delete"></a>
                            </td>
                            <td id="userID<?php echo $userID; ?>"><?php echo $un; ?></td>
                            <td id="fName<?php echo $userID; ?>"><?php echo $fName; ?></td>
                            <td id="lName<?php echo $userID; ?>"><?php echo $lName; ?></td>
                            <td id="role<?php echo $userID; ?>"><?php echo $role; ?></td>
                            <td id="phone<?php echo $userID; ?>"><?php echo $phone; ?></td>
                            <td id="email<?php echo $userID; ?>"><?php echo $email; ?></td>
                            <td id="dep<?php echo $userID; ?>"><?php echo $department; ?></td>
                        </tr>    
                        <?php endwhile; ?>
                    </table>
                </div>

            </div>
        </div>
    </body>
</html>
