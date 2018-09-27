<?php
require_once('Validation.php');

/* THIS CLASS WILL RETURN ALL INPUT, CHECKBOX, AND RADIO BUTTON VALUES ALONG WITH ERROR MESSAGES ON THE INPUT BOXES.  THIS CLASS WOULD NEED TO BE EXTENDED (ADDED TO) TO UTILIZE ALL FORM ELEMENTS.*/
class StickyForm extends Validation {

	/* I CALL THIS FUNCTION WHEN I WANT TO DISPLAY A STICKY FORM WITH ERRORS. */
	public function validateForm($path){
		require_once($path);

			
		/* THIS LOOP GOES THROUGH ALL THE TEXT BOXES ON THE PAGE AND CHECKS FOR ERRORS.  IF AN ERROR IS FOUND IT ADDS THE ERROR IF NOT IT ADDS A EMPTY STRING */
		foreach($elementsArr['text_elements'] as $v){
			$error = $this->checkForBlanks($_POST[$v]);
			if($error !== ""){
				$post[$v.'Error'] = '<span class="error">' .$error. '</span>';
			}
			else {
				$post[$v.'Error'] = $error;
			}
		}

		
		/* MAKE THE TEXT INPUT BOXES AND RADIO BUTTONS STICKY*/
		foreach($_POST as $Pk=>$Pv){
			foreach($post as $pk=>$pv){
				if($pk === $Pk){
					$post[$pk] = $Pv;
					break;
				}
				else if($pk === $Pv){
					$post[$pk] = "checked";
					break;
				}

			}
		}


		/* MAKES THE CHECKBOXES STICKY */
		if (isset($_POST['chkbox'])){
		    foreach ($_POST['chkbox'] as $chk){
		    	foreach($post as $k=>$v){
		    		if($k === $chk){
		    			$post[$k] = "checked";
		    			break;
		    		}
		    	}
			}
		}

		if (!$this->checkErrors()){
			return "noerrors";
		}
		else {
			return getForm($post);
		}
		

	}

	/* I CALL THIS FUNCTION WHEN I JUST WANT TO DISPLAY THE FORM FOR THE FIRST TIME.*/
	public function displayForm($path){
		
		require_once($path);

		return getForm($post);
	}

}

?>