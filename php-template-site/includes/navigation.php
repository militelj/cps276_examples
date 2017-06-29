<?php
/*DEPENDING ON THE VALUE OF $data['nav'] THE CORRECT NAVIGATION WILL BE LOADED.  IN THIS EXAMPLE I JUST HAVE ONE.*/
require 'settings.php';
	if($data['nav'] == 'user'){
		$nav = '<nav>
				<ul>
					<li><a href="'.$base.'home/">Home</a></li>
					<li><a href="'.$base.'page1/">Page 1</a></li>
					<li><a href="'.$base.'page2/">Page 2</a></li>
				</ul>
			</nav>';
		return $nav;
	}
?>

