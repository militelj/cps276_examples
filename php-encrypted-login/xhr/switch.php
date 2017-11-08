<?php
$data = $_POST['data'];

/**DECODE THE JSON STRING TO AN OBJECT AND CHECK THE FLAG VIA A SWITCH CALL.  IF A MATCH IS FOUND THEN SEND THE DATA TO THAT FUNCTION. */
$data = json_decode($data);

switch($data->flag){
	case "login" : require_once '../controller/admin.php'; echo login($data); break;
	case "addAdmin" : require_once '../controller/admin.php'; echo addAdmin($data); break;
}

