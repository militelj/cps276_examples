<?php
require_once "../classes/Db_conn.php";
require_once "../classes/Pdo_methods.php";

function nameList(){
	
	/* CREATE AN INSTANCE OF THE PDOMETHODS CLASS*/
	$pdo = new PdoMethods();

	/* CREATE THE SQL */
	$sql = "SELECT * FROM short_names"
	$records = $pdo->selectNotBinded($sql);

	/* IF THERE WAS AN ERROR DISPLAY MESSAGE */
	if($records == 'error'){
		
		/* SINCE THIS METHOD IS CALLED DIRECTLY FROM THE PAGE AND NOT A AJAX REQUEST AS SIMPLE RETURN STATEMENT IS USED */
		return 'There has been and error processing your request';
	}
	
	/* IF THERE ARE SOME RECORDS RETURNED THEN DEPENDING ON THE TYPE CALL THE APPROPRIATE FUNCTION CREATELIST OR CREATE INPUT*/
	else{
		if(count($records) != 0){
			$list = '<ol>';
			foreach ($records as $row){
				$list .= "<li>Name: {$row['first_name']} {$row['last_name']} - Eye Color: {$row['eye_color']} - Gender: {$row['gender']} - State: {$row['state']}</li>";
			}
			$list .= '</ol>';
			return $list;
		}
		else {
			return 'no names found';
		}
	}
}

function addName($dataObj){

	/* CREATE THE PDO INSTANCE */
	$pdo = new PdoMethods();

	/* HERE I CREATE THE SQL STATEMENT BUT USE :FIELDNAME */
	$sql = "INSERT INTO short_names (first_name, last_name, eye_color, gender, state) VALUES (:fname, :lname, :eyecolor, :gender, :state)";
    
    /* THESE BINDINGS ARE LATER INJECTED INTO THE SQL STATEMENT THIS PREVENTS AGAIN SQL INJECTIONS */
    $bindings = array(
		array(':fname',$dataObj->fname,'str'),
		array(':lname',$dataObj->lname,'str'),
		array(':eyecolor',$dataObj->color,'str'),
		array(':gender',$dataObj->gender,'str'),
		array(':state',$dataObj->state,'str')
	);

	/* I AM CALLING THE OTHERBINDED METHOD FROM MY PDO CLASS */
	$result = $pdo->otherBinded($sql, $bindings);

	/* HERE I AM USING AN OBJECT TO RETURN WHETHER SUCCESSFUL FOR ERROR */
	if($result = 'error'){
		$response = (object) [
	    	'masterstatus' => 'error',
	    	'msg' => 'There was a problem adding the name',
		];
		return json_encode($response);
	}
	else {
		$response = (object) [
	    	'masterstatus' => 'success',
	    	'msg' => 'Name has been added',
	    	'list' => nameList()
		];
		return json_encode($response);
	}
}
