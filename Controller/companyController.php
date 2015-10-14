<!DOCTYPE html>
<?php
/* 
 * @author John Cochran
 * Handles multiple forms that will be submitted from Company.php
 */
include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
include ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/View/Header.php');

?>
    <body>
        <p>paragraph</p>
        <div id="page">
            <?php 
            if (!empty($_POST['edit-submit'])) {
  
                try{
                    echo $_POST['editID'];
                    echo $_POST['editName'];
                    echo $_POST['editType'];
                    echo $_POST['editDate'];
                    echo $_POST['editAddress'];
                    
                    
                } catch (Exception $ex) {
                }//end try catch
            }// end first if

            if (!empty($_POST['create-submit'])) {
    
                try{
                    echo $_POST['newCompName'];
                    echo $_POST['newBusiness'];
                    echo $_POST['newDateOfBusiness'];
                    echo $_POST['newAddress'];
                } catch (Exception $ex) {
                }//end try catch
            }// end second if
            ?>
        </div>
    </body>
</html>
