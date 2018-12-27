<?php
require_once('classes/StickyForm.php');

$stickyForm = new StickyForm();

if(isset($_POST['submit'])){
	$form =  $stickyForm->validateForm('files/form.php');
	if($form === "noerror"){
		//DO SOMETHING WITH DATA
	}
}
else {
	$form = $stickyForm->displayForm('files/form.php');
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
		<?php echo $form; ?>
	</body>
</html>

