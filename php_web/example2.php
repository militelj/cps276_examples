<?php
require_once('php/parse_xml.');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Parsing SimpleXML</title>
	<style>
		body{font: 100%/1.5 sans-serif;}
		h1 em{font-size: .5em; font-weight: normal}
		h1, p {margin: 0;}
		div{border: 4px double blue; padding: 5px; margin: 10px;}
	</style>
  </head>
  <body>
	<?php echo $bookList; ?>
  </body>
</html>