<!DOCTYPE html>
<!--
Initial page to view companies
-->
<html>
    <head>
        <title>Companies</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        $user = 'sql591897';
        $password = 'hA5!kQ4%';
        $db = 'sql591897';  
        $conn ="mysql:host=sql5.freemysqlhosting.net;dbname=sql591897";
        $pdo = new PDO($conn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
                    <td><button>Edit</button><button>Delete</button></td>
                    <td><?php echo $comID; ?></td> <td><?php echo $name; ?></td> <td><?php echo $dateBus; ?></td>
                    <td><?php echo $busType; ?></td> <td><?php echo $address; ?></td>
                    
                </tr>
                <?php
                endwhile;
                ?>
            </table>
            
            <div id="formA">
                <form id="editForm">
                    <fieldset>
                        <legend>Edit Company</legend>
                        <button>Hide form</button>
                        <table>
                            <tr><td>ID:</td> <td>###</td></tr>
                            <tr><td>Name:</td> <td><input type="text"></td></tr>
                            <tr><td>Type of Business:</td> <td><input type="text"></td></tr>
                            <tr><td>Date of First Business</td> <td><input type="text"></td></tr>
                            <tr><td>Address</td> <td><input type="text"></td></tr>
                        </table>
                        <input type="submit">
                    </fieldset>
                </form>
            </div>
            
            <div id="formB">
                <form id="createForm">
                    <fieldset>
                        <legend>Create a Company</legend>
                        <button>Hide form</button>
                        <table>
                            <tr><td>Name:</td> <td><input type="text"></td></tr>
                            <tr><td>Type of Business:</td> <td><input type="text"></td></tr>
                            <tr><td>Date of First Business</td> <td><input type="text"></td></tr>
                            <tr><td>Address</td> <td><input type="text"></td></tr>
                        </table>
                        <input type="submit">
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
//********************************************************
/*
<!-- Forms HTML -->
<div id="form-A">
    ... html form here ....
</div>
<div id="form-B">
    ... another html form here ....
</div>

<!-- Hide forms initially with Javascript (visible for non Javascript users) -->
<script type="text/javascript">
    $("#form-A, #form-B").hide();
</script>

<!-- A dropdown to select a value -->
<select id="choose-form">
    <option>Please choose...</option>
    <option value="form-A">Some form</option>
    <option value="form-B">Another form</option>
</select>

<!-- and some simple jQuery -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#choose-form").change(function() {

            //Hide -other- visible forms
            $("#form-A, #form-B").hide();
            $("#" + $(this).val()).show();
        });
    });
</script>
 
 */
?>