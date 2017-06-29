<?php
require_once '../classes/Pdo_methods.php';
$pdo = new PdoMethods();
$i = 1;
while($i < 10){
	$sql = "UPDATE short_names SET eye_color = :ec WHERE id=".$i;
	$bindings = array(
		array(':ec', randomEyes(), 'str')
	);

	$result = $pdo->otherBinded($sql, $bindings);
	if($result = 'noerror'){
		echo 'success<br>';
	}
	else {
		echo 'error<br>';
	}
	$i += 1;
}







function randomEyes(){
	$arr = array('Brown', 'Blue','Green','Hazel','Silver','Amber');
	$k = array_rand($arr);
	return $arr[$k];
}

/*$sql = "UPDATE account SET name=:name, address=:address, state=:state, city=:city, zip=:zip, folder=:folder WHERE id=:id";
    $bindings = array(
		array(':id',$dataObj->id,'int'),
		array(':name',$dataObj->name,'str'),
		array(':address',$dataObj->address,'str'),
		array(':state',$dataObj->state,'str'),
		array(':city',$dataObj->city,'str'),
		array(':zip',$dataObj->zip,'str'),
		array(':folder',$dataObj->folder,'str')
	);
	$result = $pdo->otherBinded($sql, $bindings);
*/



