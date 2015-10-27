<!DOCTYPE html>
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
                    
                   // header("Location:/JGWentworth/View/Company.php");
                  //  exit;
            }// end first if

            if (isset($_POST['create-submit'])) {
   
                    $newName = $_POST['newCompName'];
                    $newType = $_POST['newBusiness'];
                    $newDate = $_POST['newDateOfBusiness'];
                    $newAddress = $_POST['newAddress'];
                                
                    $newCom = new companyClass($newName, $newDate, $newAddress, $newType);
                    $newCom->createCompany();
                    
                //    header("Location: /JGWentworth/View/Company.php");
            }// end second if
            
            
            if (isset($_GET['deleteCompany'])) {
                $deleteID = $_GET['deleteCompany'];
                companyClass::deleteCompany($deleteID);
                
                
            }
            header("Location:/JGWentworth/View/Company.php"); exit;?>