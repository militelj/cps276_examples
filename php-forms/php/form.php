<?php

/* IT IS ASSUMED THE THE DEVLOPER USING THE StickyForm CLASS WOULD SET UP THEIR FORM AND $ELEMENTS ARRAY AS SHOWN.  IF THIS CLASS WAS PUBLIC AND ON GITHUB THE README.md FILE WOULD HAVE INSTRUCTIONS.*/
$post = [
	"fnameError"=>"",
	"lnameError"=>"",
	"fname"=>"",
	"lname"=>"",
	"chkbox1"=>"",
	"chkbox2"=>"",
	"radio1"=>"",
	"radio2"=>""
];


$elementsArr = [
	"errors"=>["fnameError","lnameError"],
	"text_elements"=>["fname","lname"],
	"checkboxes"=>["chkbox1","chkbox2"],
	"radios"=>["radio1","radio2"]
];


function getForm($post){
$form = <<<HTML
<form method="post" action="form_new.php">
	<div><label class="block" for="fname">First Name $post[fnameError]</label>
	<input type="text" id="fname" name="fname" value="$post[fname]" /></div>
	
	<div><label class="block" for="lname">Last Name $post[lnameError]</label>
	<input type="text" id="lname" name="lname" value="$post[lname]" /></div>
	
	<div><input type="checkbox" id="checkbox1" name="chkbox[]" value="chkbox1" $post[chkbox1]  ><label for="checkbox1">Check Box One</label>
	
	<input type="checkbox" id="checkbox2" name="chkbox[]" value="chkbox2" $post[chkbox2]  ><label for="checkbox2">Check Box Two</label></div>
	
	<div><input type="radio" id="radio1" name="radio" value="radio1" $post[radio1] ><label for="radio1">Radio Button One</label>
	<input type="radio" id="radio2" name="radio" value="radio2" $post[radio2] ><label for="radio2">Radio Button Two</label></div>
	
	<div><input type="submit" name="submit" value="Submit" ></div>
</form>
HTML;

	return $form;
}
?>