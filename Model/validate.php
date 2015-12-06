<?php

/**************************************************************************************************
 * PHP Page for data and input validation
 */


/**************************************************************************************************
 * Performs String validation
 */
function valString($str, $req = FALSE){
  
  if($req == TRUE && $str == NULL){
      echo "Error: required field is missing";
      exit;
  } 
  else {
    if(!is_string($str)){
        echo "Error: incorrect data type";
        exit;
    }
    else{
       $str = trim($str);
       $str = mysql_real_escape_string($str);
       return $str;
    }//end inner if
  }//end outer if
}// end function

/**************************************************************************************************
 * Performs Integer validation
 */
function valInt($int, $req = false){
    
  if($req == TRUE && $int == NULL){
      echo "Error: required field is missing";
      exit;
  } 
  else {
    if(!is_int($int)){
        echo "Error: incorrect data type";
        exit;
    }
    else{
       $int = trim($int);
       return $int;
    }//end inner if
  }//end outer if
}

/**************************************************************************************************
 * Performs phone number validation
 */
function valPhone($ph, $req = false){
    
  if($req == TRUE && $ph == NULL){
      echo "Error: phone number field is missing";
      exit;
  } 
  else {
    if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $ph)){
        echo "Error: incorrect format<br>All phone numbers should match ###-###-#### ";
        exit;
    }
    else{
       $ph = trim($ph);
       return $ph;
    }//end inner if
  }//end outer if
}// end function

/**************************************************************************************************
 * Performs email validation
 */
function valEmail($email, $req = false){
    if($req == TRUE && $email == NULL){
      echo "Error: phone number field is missing";
      exit;
  } 
  else {
    if(!filterEmail($email)){
        echo "Error: invalid email address";
        exit;
    }
    else{
       $email = trim($email);
       return $email;
    }//end inner if
  }//end outer if
}

function filterEmail($em){
    $x = filter_var($em, FILTER_VALIDATE_EMAIL);
    if($x != FALSE){
        return TRUE;
    }
    else{
        return FALSE;
    }// end if  
}// end function
/**************************************************************************************************
 * Performs validation on a date
 */
function valDate($date, $req = false){
  if($req == TRUE && $date == NULL){
      echo "Error: date field is missing";
      exit;
  } 
  else {
    //***************************************************************************
    // Checks format of date
    if(!checkFormat($date)){
        echo "Error: incorrect format<br>All dates should match YYYY-MM-DD";
        exit;
    }//end inner if
    //***************************************************************************
    // Checks for a valid date
    if(!isDate($date)){
        echo "Error: invalid date";
        exit;
    }//end inner if
    //***************************************************************************
    // Checks if date is either in the past or today
    if(!isBeforeTom($date)){  
        echo "Error: invalid date range";
        exit;
    }
    else{
       $date = trim($date);
       return $date;
    }//end inner if
  }//end outer if
}//end function

function isDate($date){
    
    $test_arr  = explode('-', $date);
    if (count($test_arr) == 3) {
        if (checkdate($test_arr[1], $test_arr[2], $test_arr[0])) {
            return TRUE;
        } else {
            return FALSE;
        }// end inner if
    } else {
          return FALSE;
    }// end outer if
}// end function


function checkFormat($date){
    
    if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date))
    {
        return TRUE;
    }
    else {
        return FALSE;
    }
}

function isBeforeTom($date){
    if(strtotime($date) < strtotime('tomorrow')) {
       return TRUE;
    }// end if
    else {
        return FALSE;
    }// end if
}// end function
    