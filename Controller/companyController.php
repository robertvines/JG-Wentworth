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
            if (isset($_POST['edit-submit'])) {
                    
              
                    // retrieve posted data
                    $id = $_POST['editID'];
                    $name = $_POST['editName'];
                    $type = $_POST['editType'];
                    $dateBusiness = $_POST['editDate'];
                    $compAdd = $_POST['editAddress'];

                    //send update to database
                    updateCompany($id, $name, $type, $dateBusiness, $compAdd);
                    
            }// end first if

            if (isset($_POST['create-submit'])) {
    echo 'made it inside the if statement';
                    $newName = $_POST['newCompName'];
                    $newType = $_POST['newBusiness'];
                    $newDate = $_POST['newDateOfBusiness'];
                    $newAddress = $_POST['newAddress'];
                     
                    createCompany($newName, $newType, $newDate, $newAddress);
            }// end second if
            
            if (isset($_GET['deleteCompany'])) {
                $deleteID = $_GET['deleteCompany'];
                
                deleteCompany($deleteID);
                
            }
            
    function updateCompany($id, $name, $type, $dateBusiness, $compAdd )
    {
     try{ echo'inside function'; 
         $user = 'sql591897';
         $password = 'hA5!kQ4%';  
         $conn ="mysql:host=sql5.freemysqlhosting.net;dbname=sql591897";
         
         $pdo = new PDO($conn, $user, $password);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
         $sql = "UPDATE sql591897.COMPANY SET Name='".$name."', DateFirstBusiness='".$dateBusiness."', BusinessType='".$type."', Address='".$compAdd."' WHERE CompanyID=".$id.";";        

            if ($pdo->query($sql) == TRUE) {
                echo "Record updated successfully";
            } else {
                echo "An error occurred while updating the record: " . $pdo->error;
            }
                                     
        } catch (Exception $ex) {
           echo $ex->getMessage();
     }//end try catch
        
    }// end function updafeCompany()
    
    function createCompany($newName, $newType, $newDate, $newAddress)
    {
        try{
            $user = 'sql591897';
            $password = 'hA5!kQ4%';  
            $conn ="mysql:host=sql5.freemysqlhosting.net;dbname=sql591897";
         
            $pdo = new PDO($conn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            $sql = "INSERT INTO sql591897.COMPANY (CompanyID, Name, DateFirstBusiness, BusinessType, Address)"
                            . " VALUES (NULL, '".$newName."', '".$newDate."', '".$newType."', '".$newAddress."');";
       
                    if ($pdo->query($sql) == TRUE) {
                        echo "Record inserted successfully";
                    } else {
                        echo "An error occurred while inserting the record : " . $pdo->error;
                    }
                } catch (Exception $ex) {
                }//end try catch
        
    }// end function createCompany()
    
    function deleteCompany($id){
      try{  
        $user = 'sql591897';
        $password = 'hA5!kQ4%';  
        $conn ="mysql:host=sql5.freemysqlhosting.net;dbname=sql591897";
         
        $pdo = new PDO($conn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "DELETE FROM sql591897.COMPANY
                    WHERE CompanyID = ". $id;
        
        if ($pdo->query($sql) == TRUE) {
                        echo "Company deleted successfully";
                    } else {
                        echo "An error occurred while deleting the record : " . $pdo->error;
                    }
                } catch (Exception $ex) {
                }//end try catch
        
    }// end function deleteCompany()
    
    function testData($data){
        $data = trim($data);
        return $data;
    }// end function 
            ?>
        </div>
    </body>
</html>