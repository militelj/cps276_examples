<?php
require_once '../controller/crud.php';
require_once '../classes/Page.php';
$page = new Page();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CRUD Example</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../public/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="wrapper" class="container">
      
      <header>
        <h1>Home Page</h1>
        <?php echo $page->nav(); ?>
      </header>
        <main>
        <p>This example (in addition to the pdo stuff) is a great example for showing how a MVC type structure can be used with a modular site using AJAX.  A modular site has content in which the main parts (in this case the nav) are added, instead of one page where all content is added.  Just a different way of doing it.</p>
      
        <div id="namesList"><?php echo getNames('list'); ?></div>
      </main>

    </div>
    

    <script src="../public/js/main.js"></script>
  </body>
</html>