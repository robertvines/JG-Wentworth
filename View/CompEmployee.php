<?php

/* 
 * To create, edit, and delete companie employees and non-employees
 */
 include ('Header.php');
?>
        <script type="text/javascript">
            $(document).ready(function () 
            {
                $('#div2').hide('fast');
                
                $('#compEmployee').click(function () 
                {
                   $('#div2').hide('fast');
                   $('#div1').show('fast');
            });
                $('#employee').click(function () 
                {
                      $('#div1').hide('fast');
                      $('#div2').show('fast');
                });
            });
        </script>
    <body>
        <div id="page">
            <div>
               <input id="compEmployee" type="radio" name="name_radio1" value="value_radio1" />Company Employee
               <input id="employee" type="radio" name="name_radio1" value="value_radio2" />Employee
             </div>
            <div id="div1">
                <h1>Company Employee</h1>
                <button id="createCompEmp">Create Employee</button>
                <table>
                    <thead>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Title</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>First Contacted</th>
                        <th>Photo</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="EditEmployerForm.php?edit_id=<?php echo $empID ?>"><input type="submit" value="Edit"></a></td>
                        <td><a href="EditEmployer.php?delete_id=<?php echo $empID ?>" onclick="return confirm('Are you sure you want to delete this employer?');"><input type="submit" value="Delete"></a></td>
                    </tbody>
                </table>
            </div>
            <div id="div2">
                <h1>Employee</h1>
                <button id="createEmp">Create Employee</button>
                <table>
                    <thead>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Title</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>First Contacted</th>
                        <th>Photo</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="EditEmployerForm.php?edit_id=<?php echo $empID ?>"><input type="submit" value="Edit"></a></td>
                        <td><a href="EditEmployer.php?delete_id=<?php echo $empID ?>" onclick="return confirm('Are you sure you want to delete this employer?');"><input type="submit" value="Delete"></a></td>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>