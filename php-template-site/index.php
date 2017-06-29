<?php
  
  /* REQUIRE IN THE SETTINGS FILE.  THIS FILES CONTAINS ANY SETTINGS THAT I WOULD NEED FOR THE WEBSITE.  THE ONLY SETTING I HAVE IS THE BASE URL FOR THE SITE SO I CAN USE ABSOLUTE LINKS AS WITH SITES LIKE THIS RELATIVE SOMETIMES DON'T WORK WELL.*/
  require_once 'includes/settings.php';
  
  /* GETS THE PAGE=? FROM THE URL*/
  $page = $_GET['page'];

  /* INCLUDES THE ROUTES PAGE (ROUTES IS EXPLAINED ON THE ROUTES PAGE) THE DATA VARIABLE CONTIAINS AN ASSOCIATIVE ARRAY THAT HAVE VARIOUS VALUES USED TO DISPLAY PARTS OF THE PAGE.  THOSE VALUES ARE ASSIGNED IN THE CONTROLLER FILES (THIS ONE IS NAMED MAIN.PHP) */
  $data = require_once 'includes/routes.php';

  /* THIS INCLUDES THE NAVIGATON FILE THAT INCLUDES THE MAIN NAVIGATION.  THE PURPOSE IS WE CAN HAVE MULTIPLE NAVIGATION LINKS EACH SET DEPENDENT UPON WHAT PAGE IS LOADED.  DECIDING WHICH NAVIGATION TO USE IS DONE ON TEH CONTROLLER PAGE. */
  $data['nav'] = require_once 'includes/navigation.php';

  /*THE REST OF THE PHP IN THE HTML BELOW IS DISPLAYING THE SETTINGS.  THIS IS THE ONLY PAGE THAT IS LOADED.*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link href="<?php echo $base.'public/css/main.css'; ?>" rel="stylesheet">
  </head>
  <body>
    <div id="wrapper">
        <header><h1><?php echo $data['heading'] ?></h1></header>
        <?php echo $data['nav'] ?>
        <?php echo $data['main']; ?>
     </div><!-- end wrapper -->
     <footer><p>Scott Shaper &copy; <?php echo date('Y'); ?></p></footer>
    </body>
</html>