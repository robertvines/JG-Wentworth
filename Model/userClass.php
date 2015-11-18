<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userClass
 *
 * @author johncochran
 */
class userClass {
    
    private $userID;
    private $fName;
    private $lName;
    private $role;
    private $phone;
    private $email;
    private $department;
    
    private $username;
    private $password;


    public function __construct($first, $last, $rle, $phne, $emal, $dep, $un = NULL, $pass = NULL, $id = NULL)                       
    {
        $this->setUserID($id);
        $this->setFName($first);
        $this->setLName($last);
        $this->setRole($rle);
        $this->setPhone($phne);
        $this->setEmail($emal);
        $this->setDepartment($dep);
        
        $this->setUserName($un);
        $this->setPassword($pass);

    }// end constructor
    
    // get functions
    public function getUserID(){return $this->userID;}
    public function getFName(){return $this->fName;}
    public function getLName(){return $this->lName;}
    public function getRole(){return $this->role;}  
    public function getPhone(){return $this->phone;}
    public function getEmail(){return $this->email;}
    public function getDepartment(){return $this->department;}
    
    public function getUserName(){return $this->username;}
    public function getPassword(){return $this->password;}

    //set functions
    public function setUserID($id){$this->userID=$id;}
    public function setFName($first){$this->fName=$first;}
    public function setLName($last){$this->lName=$last;}
    public function setRole($rol){$this->role=$rol;}
    public function setPhone($pho){$this->phone=$pho;}
    public function setEmail($ema){$this->email=$ema;}
    public function setDepartment($dep){$this->department=$dep;}
    
    public function setUserName($un){$this->username=$un;}
    public function setPassword($pass){$this->password=$pass;}
    
    function createUser()
    {       
        try{
            $user = 'sql591897';
            $password = 'hA5!kQ4%';  
            $conn ="mysql:host=sql5.freemysqlhosting.net;dbname=sql591897";
            $pdo = new PDO($conn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sqlLog = "INSERT INTO sql591897.LOGIN (LoginID, UserName, Password)"
                            . " VALUES (NULL, '".$this->getUserName()."', '".$this->getPassword()."');";
            $pdo->exec($sqlLog);
            
            $sqlGetLog = "SELECT * FROM LOGIN WHERE LoginID = (SELECT MAX(LoginID) FROM LOGIN);";
            $result = $pdo->query($sqlGetLog);
            $value = $result->fetch();
            $logID = $value['LoginID'];
            $sql = "INSERT INTO sql591897.USER (UserID, LoginID, FirstName, LastName, Role, Phone, Email, Department)"
                            . " VALUES (NULL, '".$logID."', '".$this->getFName()."', '".$this->getLName()."', '".$this->getRole()."',"
                    . "'".$this->getPhone()."', '".$this->getEmail()."', '".$this->getDepartment()."' );";
       
                    if ($pdo->query($sql) == TRUE) {
                        
                    } else {
                     //   echo "An error occurred while inserting the record : " . $pdo->error;
                    }
                } catch (Exception $ex) {
                   echo $ex->getMessage();
                }//end try catch
        
    }// end function createUser()
      
}
