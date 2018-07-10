<?php
/* THE PURPOSE OF THE SWITCH FILE IS TO ROUTE EACH AJAX REQUEST TO ITS APPROPRIATE PHP BACKEND*/
$data = $_POST['data'];

$dataObj = json_decode($data);


switch($dataObj->flag){
	case "addNam" : require_once '../controller/home.php'; echo addName($dataObj); break;
}