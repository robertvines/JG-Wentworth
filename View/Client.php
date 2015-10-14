<?php

/* 
 * To create, edit, and delete companie employees and non-employees
 */
 include ('Header.php');
?>

<?php 
    $user = 'sql591897';
    $password = 'hA5!kQ4%';
    $db = 'sql591897';  
    $conn ="mysql:host=sql5.freemysqlhosting.net;dbname=sql591897";

    try 
    {
          $pdo = new PDO($conn, $user, $password);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $ex) 
    {
          echo 'Connection Failed: ' . $ex->getMessage();
    }
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
                    <p><button id="createCompClient">Create Client</button></p>               
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input id="editCompClient" type="submit" value="Edit"></td>
                                <td><a href="EditEmployer.php?delete_id=<?php echo $empID ?>" onclick="return confirm('Are you sure you want to delete this employer?');"><input type="submit" value="Delete"></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Show Client -->
                <div id="div2">
                    <h1>Client</h1>
                    <p><button id="createClient">Create Company Client</button></p>
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
                                <td>we</td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td>we</td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>Title:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>First Contacted:</td>
                                <td>daf</td>
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
                                <td>we</td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td>we</td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>Title:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>First Contacted:</td>
                                <td>daf</td>
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
                                <td>we</td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td>we</td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>Title:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>First Contacted:</td>
                                <td>daf</td>
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
                                <td>we</td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td>we</td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>Title:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td>daf</td>
                            </tr>
                            <tr>
                                <td>First Contacted:</td>
                                <td>daf</td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>