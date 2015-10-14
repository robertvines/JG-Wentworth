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
            <div id="body">
            <div>
               <input id="compEmployee" type="radio" name="name_radio1" value="value_radio1" />Company
               <input id="employee" type="radio" name="name_radio1" value="value_radio2" />No Company
             </div>
            <div id="div1">
                <h1>Company Client</h1>
                <p><button id="createCompEmp">Create Client</button></p>
                <table id="column1">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Title</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>First Contacted</th>
                            <th>Photo</th>
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
                            <td><a href="EditEmployerForm.php?edit_id=<?php echo $empID ?>"><input type="submit" value="Edit"></a></td>
                            <td><a href="EditEmployer.php?delete_id=<?php echo $empID ?>" onclick="return confirm('Are you sure you want to delete this employer?');"><input type="submit" value="Delete"></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="div2">
                <h1>Client</h1>
                <p><button id="createEmp">Create Client</button></p>
                <table id="column1">
                    <thead>
                        <tr>
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
                            <td><a href="EditEmployerForm.php?edit_id=<?php echo $empID ?>"><input type="submit" value="Edit"></a></td>
                            <td><a href="EditEmployer.php?delete_id=<?php echo $empID ?>" onclick="return confirm('Are you sure you want to delete this employer?');"><input type="submit" value="Delete"></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div >
                <table id="column2">
                    <th>daf</th>
                    <td></td>
                </table>
            </div>
            </div>
        </div>
    </body>
</html>