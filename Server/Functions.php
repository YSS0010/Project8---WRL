<?php

require_once 'DBOperations.php';

class Functions{

private $db;

public function __construct() {

      $this -> db = new DBOperations();

}

public function registerUser($first_name, $surname, $email, $password) {

   $db = $this -> db;

   if (!empty($first_name) && !empty($surname) && !empty($email) && !empty($password)) {

      if ($db -> checkUserExist($email)) {

         $response["result"] = "failure";
         $response["message"] = "User has already registered using this e-mail!";
         return json_encode($response);

      }
	  else {

         $result = $db -> insertData($first_name, $surname, $email, $password);

         if ($result) {

            $response["result"] = "success";
            $response["message"] = "User has been successfully registered !";
            return json_encode($response);

         } else {

            $response["result"] = "failure";
            $response["message"] = "Registration Failed";
            return json_encode($response);

         }
      }
   } else {

      return $this -> getMsgParamNotEmpty();

   }
}

public function loginUser($email, $password) {

  $db = $this -> db;

  if (!empty($email) && !empty($password)) {

    if ($db -> checkUserExist($email)) {

       $result =  $db -> checkLogin($email, $password);

       if(!$result) {

        $response["result"] = "failure";
        $response["message"] = "Invaild login credentials";
        return json_encode($response);

       } else {

        $response["result"] = "success";
        $response["message"] = "Login sucessful";
        $response["user"] = $result;
        return json_encode($response);

       }
    } else {

      $response["result"] = "failure";
      $response["message"] = "Invaild login credentials";
      return json_encode($response);

    }
  } else {

      return $this -> getMsgParamNotEmpty();
    }
}

public function changePassword($email, $old_password, $new_password) {

  $db = $this -> db;

  if (!empty($email) && !empty($old_password) && !empty($new_password)) {

    if(!$db -> checkLogin($email, $old_password)){

      $response["result"] = "failure";
      $response["message"] = 'Invalid old Password';
      return json_encode($response);

    } else {

    $result = $db -> changePassword($email, $new_password);

      if($result) {

        $response["result"] = "success";
        $response["message"] = "Password changed successfully";
        return json_encode($response);

      } else {

        $response["result"] = "failure";
        $response["message"] = 'Error updating password';
        return json_encode($response);

      }
    }
  } else {

      return $this -> getMsgParamNotEmpty();
  }
}

public function isEmailValid($email){

  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

public function getMsgParamNotEmpty(){

  $response["result"] = "failure";
  $response["message"] = "Parameters should not be empty !";
  return json_encode($response);

}

public function getMsgInvalidParam(){

  $response["result"] = "failure";
  $response["message"] = "Invalid parameters1";
  return json_encode($response);

}

public function getMsgInvalidEmail(){

  $response["result"] = "failure";
  $response["message"] = "Invalid Email";
  return json_encode($response);

}
}