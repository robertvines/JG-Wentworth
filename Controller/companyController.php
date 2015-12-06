<!DOCTYPE html>
<script>

function redirect(){ 
    window.location.replace("/JGWentworth/View/Company.php");
}//end redirect

</script>
<?php
/* 
 * @author John Cochran
 * Handles multiple forms that will be submitted from Company.php
 */
require_once ($_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/companyClass.php');
include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/validate.php';

            if (isset($_POST['edit-submit'])) {
                    
                    // retrieve posted data
                    $id = $_POST['editID'];
                    $name = valString($_POST['editName'], true);
                    $type = valString($_POST['editType'], true);
                    $dateBusiness = valDate($_POST['editDate'], true);
                    $compAdd = valString($_POST['editAddress'], true);

                    //send update to database
                    $com = new companyClass($name, $dateBusiness, $compAdd, $type, $id);
                    $com->updateCompany();
                    
                 echo '<script type="text/javascript">'
                    , 'redirect();'
                    , '</script>';   
            }// end first if
            if (isset($_POST['create-submit'])) {
   
                    $newName = valString($_POST['newCompName'], true);
                    $newType = valString($_POST['newBusiness'], true);
                    $newDate = valDate($_POST['newDateOfBusiness'], true);
                    $newAddress = valString($_POST['newAddress'], true);
                                
                    $newCom = new companyClass($newName, $newDate, $newAddress, $newType);
                    $newCom->createCompany();
                    
                 echo '<script type="text/javascript">'
                    , 'redirect();'
                    , '</script>';   
            }// end second if
            if (isset($_GET['delete'])) {

                $deleteID = urldecode(base64_decode($_GET['delete']));
                companyClass::deleteCompany($deleteID);
                
                echo '<script type="text/javascript">'
                    , 'redirect();'
                    , '</script>';           
            }?>