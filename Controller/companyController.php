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
            if (isset($_POST['edit-submit'])) {
                    
                    // retrieve posted data
                    $id = $_POST['editID'];
                    $name = $_POST['editName'];
                    $type = $_POST['editType'];
                    $dateBusiness = $_POST['editDate'];
                    $compAdd = $_POST['editAddress'];

                    //send update to database
                    $com = new companyClass($name, $dateBusiness, $compAdd, $type, $id);
                    $com->updateCompany();
                    
                 echo '<script type="text/javascript">'
                    , 'redirect();'
                    , '</script>';   
            }// end first if
            if (isset($_POST['create-submit'])) {
   
                    $newName = $_POST['newCompName'];
                    $newType = $_POST['newBusiness'];
                    $newDate = $_POST['newDateOfBusiness'];
                    $newAddress = $_POST['newAddress'];
                                
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