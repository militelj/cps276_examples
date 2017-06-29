<?php
/* THE ROUTES PAGE IS WHERE WE CAN DIRECT EVERY LINK TO IS PROPER CONTROLLER.  THE ROUTES LOOKS AT THE VALUE OF PAGE AND BASED UPON THAT VALUE REQUIRES THE CORRECT CONTROLLER FILE AND CALL THE APPROPRIATE FUNCTION 

IN THIS CASE I HAVE ONE CONTROLLER FILE "MAIN.PHP" AND WITHIN THAT FILE I HAVE ONE FUNCTION THAT TAKES THREE PARAMETERS.

1. PAGE (HTML THAT WILL BE DISPLAYED--VIEW)
2. THE TEXT THAT GOES INTO THE TITLE ELEMENT AND HEADING1 (H1)
3. (NOT USED AS WE ARE USING THE DEFAULT) WOULD BE THE NAVIGATION LIST WE WANTED TO USE.

*/
switch($page){
	case "home": require_once 'controller/main.php'; return general($page, 'Home Page'); break;
	case "page1": require_once 'controller/main.php'; return general($page, 'Page 1'); break;
	case "page2": require_once 'controller/main.php'; return general($page, 'Page 2'); break;
	default: $title="404 Error"; $heading="404 Error"; $nav="user"; $main='<p>Page not found</p>'; break;
}