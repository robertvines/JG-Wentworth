<!DOCTYPE html>
<?php
/* 
 * @author John Cochran
 * Handles multiple forms that will be submitted from Company.php
 */
include ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/View/Header.php');

?>
    <body>
        <p>paragraph</p>
        <div id="page">
            <?php 
            if (!empty($_POST['edit-submit'])) {
                    echo 'made it inside the if statement';
                
                    $id = $_POST['editID'];
                    $name = $_POST['editName'];
                    $type = $_POST['editType'];
                    $dateBusiness = $_POST['editDate'];
                    $compAdd = $_POST['editAddress'];
                    
            }// end first if

            if (!empty($_POST['create-submit'])) {
    
                    $newName = $_POST['newCompName'];
                    $newBusiness = $_POST['newBusiness'];
                    $newDate = $_POST['newDateOfBusiness'];
                    $newAddress = $_POST['newAddress'];
                      
            }// end second if
            ?>
        </div>
    </body>
</html>
