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
    
        private $companyID;
        private $name;
        private $dateOfBusiness;
        private $address;
        private $typeOfBusiness;

    public function __construct($nm, $dateBus, $addr, $type, $compID = NULL)                       
    {
        $this->setID($compID);
        $this->setName($nm);
        $this->setDate($dateBus);
        $this->setAddress($addr);
        $this->setType($type);

    }// end constructor
    
    // get functions
    public function getID(){return $this->companyID;}
    public function getName(){return $this->name;}
    public function getDate(){return $this->dateOfBusiness;}
    public function getAddress(){return $this->address;}
    public function getType(){return $this->typeOfBusiness;}

    //set functions
    public function setID($compID){$this->companyID=$compID;}
    public function setName($nm){$this->name=$nm;}
    public function setDate($dateBus){$this->dateOfBusiness=$dateBus;}
    public function setAddress($addr){$this->address=$addr;}
    public function setType($type){$this->typeOfBusiness=$type;}
    
    
    
    function createCompany()
    {        
        try{
            $user = 'sql591897';
            $password = 'hA5!kQ4%';  
            $conn ="mysql:host=sql5.freemysqlhosting.net;dbname=sql591897";
         
            $pdo = new PDO($conn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            $sql = "INSERT INTO sql591897.COMPANY (CompanyID, Name, DateFirstBusiness, BusinessType, Address)"
                            . " VALUES (NULL, '".$this->getName()."', '".$this->getDate()."', '".$this->getType()."', '".$this->getAddress()."');";
       
                    if ($pdo->query($sql) == TRUE) {
                        
                    } else {
                     //   echo "An error occurred while inserting the record : " . $pdo->error;
                    }
                } catch (Exception $ex) {
                   echo $ex->getMessage();
                }//end try catch
        
    }// end function createCompany()
    
    static function deleteCompany($id){
      try{  
        $user = 'sql591897';
        $password = 'hA5!kQ4%';  
        $conn ="mysql:host=sql5.freemysqlhosting.net;dbname=sql591897";
         
        $pdo = new PDO($conn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "DELETE FROM sql591897.COMPANY
                    WHERE CompanyID = ". $id;
        
        if ($pdo->query($sql) == TRUE) {
                        
                    } else {
                      //  echo "An error occurred while deleting the record : " . $pdo->error;
                    }
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                }//end try catch
        
    }// end function deleteCompany()
    
    function updateCompany()
    {        
     try{ 
         $user = 'sql591897';
         $password = 'hA5!kQ4%';  
         $conn ="mysql:host=sql5.freemysqlhosting.net;dbname=sql591897";
         
         $pdo = new PDO($conn, $user, $password);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
         $sql = "UPDATE sql591897.COMPANY SET Name='".$this->getName()."', DateFirstBusiness='".$this->getDate()."', BusinessType='".$this->getType()."', Address='".$this->getAddress()."' WHERE CompanyID=".$this->getID().";";        

            if ($pdo->query($sql) == TRUE) {
                
            } else {
              //  echo "An error occurred while updating the record: " . $pdo->error;
            }
                                     
        } catch (Exception $ex) {
          // echo $ex->getMessage();
     }//end try catch
    }// end function updateCompany()
    
    function validate($data){
        $data = trim($data);
        return $data;
    }// end function 
}//end companyClass ?>