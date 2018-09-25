<?php 
/*INCLUDE FILES*/
require_once('classes/Validation.php');
require_once('files/form_validation.php');

/* THE ISSET DETERMINES IF A VARIABLE IS SET AND IS NOT NULL IN THE CODE BELOW I AM CHECKING THAT THE SUBMIT BUTTON HAS BEEN CLICKED (SENT)*/
if (isset($_POST['submit'])){
	validate();
}

?>
<!DOCTYPE html>
<html lang="en" />
<head>
<title>Validating a Form with PHP</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="css/main.css" />
</head>

<body>

<!--PHP WAS INSERTED INTO THIS HTML FORM TO MAKE THE ENTRIES STICKY.  THIS MEANS THAT IF AN ERROR WAS MADE IT WILL DISPLAY THE ENTRIES IN
THE FORM ELEMENTS AND SHOW ANY ERROR MESSAGES.-->
	<form method="post" action="form_new.php">
		<div><label class="block" for="fname">First Name<?php if(isset($errorArray[0])){echo "<span class='error'>{$errorArray[0]}</span>";} ?></label>
		<input type="text" id="fname" name="fname" tabindex="10" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];} ?>" /></div>
		
		<div><label class="block" for="lname">Last Name<?php if(isset($errorArray[1])){echo "<span class='error'>{$errorArray[1]}</span>";} ?></label>
		<input type="text" id="lname" name="lname" tabindex="20" value="<?php if(isset($_POST['lname'])){echo $_POST['lname'];} ?>" /></div>
		
		<div><input type="checkbox" id="checkbox1" name="chkbox[]" value="chkbox1" tabindex="30" <?php if(isset($chkbox1)){echo $chkbox1;} ?>  /><label for="checkbox1">Check Box One</label>
		
		<input type="checkbox" id="checkbox2" name="chkbox[]" value="chkbox2" tabindex="40" <?php if(isset($chkbox2)){echo $chkbox2;} ?> /><label for="checkbox2">Check Box Two</label></div>
		
		<div><input type="radio" id="radio1" name="radio" value="radio1" tabindex="50" <?php if(isset($radio1)){echo $radio1;} ?>/><label for="radio1">Radio Button One</label>
		<input type="radio" id="radio2" name="radio" value="radio2" tabindex="60" <?php if(isset($radio2)){echo $radio2;} ?>/><label for="radio2">Radio Button Two</label></div>
		
		<div><input type="submit" name="submit" value="Submit" tabindex="70" /></div>
	</form>
</body>
</html>
