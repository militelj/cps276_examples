<?php 

/*ARRAY THAT WILL STORE THE ERROR MESSAGES */
$errorArray = array();

function validate()
{

    /*INITIATE OBJECT OF THE VALIDATION CLASS*/
    $Validation = new Validation();

    /*ANY VARIABLE CREATED OUTSIDE THE FUNCTION MUST BE GLOBAL TO BE USED INSIDE A FUNCTION.
    OR PASSED VIA THE PARAMETER. ALSO ANY VARIABLES CREATED INSIDE THE FUNCTION THAT ARE
    SET AS GLOBAL CAN BE USED OUTSIDE THE FUNCTION.*/
    global $errorArray,$chkbox1,$chkbox2,$radio1,$radio2;
    

    /*THIS CHECKS THE ENTRY AND IF THERE IS AN ERROR PUTS THE MESSAGE INTO THE ERRORARRAY
    SINCE WE ARE JUST CHECKING FOR BLANKS WE DO NOT NEED A SECOND CLASS. BUT THIS CLASS
    CAN BE EXPANDED TO CHECK FOR FORMATTING USING REGULAR EXPRESSIONS.  SO I AM USING IT
    HERE.*/
    $errorArray[0] = $Validation->checkForBlanks($_POST['fname']);
	$errorArray[1] = $Validation->checkForBlanks($_POST['lname']); 

    /*THIS CHECKS THE CHECKBOXES, IF A CHECKBOX HAS BEEN CHECKED, THEN IT WILL DISPLAY AS CHECKED. */    
    if (isset($_POST['chkbox'])){
	    foreach ($_POST['chkbox'] as $v){

	    	/*CHKBOX1 AND CHECKBOX2 ARE THE VALUES ASSIGNED TO THE CHECKBOX.*/
	    	switch ($v) {
	    		case "chkbox1": $chkbox1="checked=checked"; break;
	    		case "chkbox2": $chkbox2="checked=checked"; break;
	 		}
	    }
	}
	
	/*THIS CHECKS THE RADIO BUTTONS FOR A SELECTION, IF A RADIO BUTTON WAS SELECTED SHOWS IT ON THE FORM.*/
	if (isset($_POST['radio'])){
       	switch ($_POST['radio']) {
    		case "radio1": $radio1="checked=checked"; break;
    		case "radio2": $radio2="checked=checked"; break;
 		}
	}
	
	
	/*THIS DOES A FINAL CHECK FOR ERRORS IF NONE ARE FOUND IT SAYS "NO ERRORS FOUND" IN AN ACTUAL APPLICATION IT WOULD 
	DO SOMETHING WITH THE INFORMATION.*/
	if (!$Validation->checkErrors()){
		echo "No Errors Found";
	}
}