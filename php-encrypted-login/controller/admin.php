<?php
require_once '../classes/Pdo_methods.php';

function login($dataObj){
    $pdo = new PdoMethods();
    $sql = "SELECT username, password FROM admin WHERE username = :username";
	$bindings = array(
		array(':username', $dataObj->username, 'str')
	);

    $records = $pdo->selectBinded($sql, $bindings);

	/** IF THERE WAS AN RETURN ERROR STRING */
	if($records == 'error'){
		return 'error';
	}
	
	/** */
	else{
		if(count($records) != 0){
            /** IF THE PASSWORD IS NOT VERIFIED USING PASSWORD_VERIFY THEN RETURN FAILED, OTHERWISE RETURN SUCCESS, IF NO RECORDS ARE FOUND RETURN NO RECORDS FOUND. */
            if(password_verify($dataObj->password, $records[0]['password'])){
                session_start();
                $_SESSION['access'] = "accessGranted";
                return "success";
            }
            else {
                return "failed";
            }
		}
		else {
			return "not found";
		}
	}
}

function addAdmin($dataObj){
    $pdo = new PdoMethods();
    $sql = "SELECT username FROM admin WHERE username = :username";
	$bindings = array(
		array(':username', $dataObj->username, 'str')
	);

    $records = $pdo->selectBinded($sql, $bindings);

	/** IF THERE WAS AN RETURN ERROR STRING */
	if($records == 'error'){
		return 'error';
	}
	
	/** CHECK FOR A DUPLICATE USERNAME IF FOUND THEN RETURN DUPLICATE OTHERWISE ADD USERNAME AND PASSWORD TO DATABASE */
	else{
		if(count($records) != 0){
            return "duplicate";
		}
		else {
			/** ENCRYPT THE PASSWORD USING PASSWORD_HASH */
			$dataObj->password = password_hash($dataObj->password, PASSWORD_DEFAULT);
			$sql = "INSERT INTO admin (username, password) VALUES (:username, :password)";
			$bindings = array(
				array(':username',$dataObj->username,'str'),
				array(':password',$dataObj->password,'str')
			);
			$result = $pdo->otherBinded($sql, $bindings);
			if($result = 'noerror'){
				return 'added';
			}
			else {
				return 'error';
			}
		}
	}
}