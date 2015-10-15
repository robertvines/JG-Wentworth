<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of companyClass
 *
 * @author johncochran
 */
class companyClass {
    
//        private $companyID;
//        private $name;
//        private $dateOfBusiness;
//        private $address;
//        private $typeOfBusiness;
//
//    public function __construct($compID, $nm, $dateBus, $addr, $type)                       
//    {
//        $this->setFirstName($compID);
//        $this->setLastNAme($nm);
//        $this->setDOB($dateBus);
//        $this->setAddress($addr);
//        $this->setGender($type);
//
//    }// end constructor
//    
//    // get functions
//    public function getFirstName(){return $this->companyID;}
//    public function getLastName(){return $this->name;}
//    public function getDOB(){return $this->dateOfBusiness;}
//    public function getAddress(){return $this->address;}
//    public function getGender(){return $this->typeOfBusiness;}
//
//    //set functions
//    public function setFirstName($compID){$this->companyID=$compID;}
//    public function setLastNAme($nm){$this->name=$nm;}
//    public function setDOB($dateBus){$this->dateOfBusiness=$dateBus;}
//    public function setAddress($addr){$this->address=$addr;}
//    public function setGender($type){$this->typeOfBusiness=$type;}
//    
//    
   
    function updateCompany($id, $name, $type, $dateBusiness, $compAdd )
    {
     try{
        include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php'; 
        $sql = "UPDATE sql591897.COMPANY SET Name='".$name."', DateFirstBusiness='".$dateBusiness."', BusinessType='".$type."', Address='".$compAdd."' WHERE id=".$id.";";
                    echo '<br/>'.$sql;
                       echo '<br/>made it past the sql statement';
                       $pdo->exec($sql);
                       echo '<br/>made it past the query';
//                    if ($pdo->query($sql) == TRUE) {
//                        echo "Record updated successfully";
//                    } else {
//                        echo "An error occurred while updating the record: " . $pdo->error;
//                    }
                    
                    
                } catch (Exception $ex) {
                }//end try catch
        
    }// end function apply()
    
  
    function createCompany()
    {
        try{
            include $_SERVER["DOCUMENT_ROOT"].'/JGWentworth/Model/database.php';
            $sql = "INSERT INTO sql591897.COMPANY (CompanyID, Name, DateFirstBusiness, BusinessType, Address)"
                            . " VALUES (NULL, '".$newName."', '".$newDate."', '".$newBusiness."', '".$newAddress."');";
       
                    if ($pdo->query($sql) == TRUE) {
                        echo "Record inserted successfully";
                    } else {
                        echo "An error occurred while inserting the record : " . $pdo->error;
                    }
        
                } catch (Exception $ex) {
                }//end try catch
        
    }// end function createUser()
    
}//end companyClass
