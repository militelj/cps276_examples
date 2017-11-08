<?php
require_once '../classes/Pdo_methods.php';
require_once '../classes/Page.php';
$page = new Page();
$pdo = new PdoMethods();
echo $page->head("Encrypted Login - Home Page");
echo $page->security();
$sql = "SELECT username, password FROM admin";
$records = $pdo->selectNotBinded($sql);
$result = '';
/* IF THERE WAS AN ERROR DISPLAY MESSAGE*/
if($records == 'error'){
    $result = 'There has been and error processing your request';
}

/** IF USERNAMES AND PASSWORDS ARE FOUND DISPLAY THEM OTHERWISE DISPLAY NO RECORDS FOUND MESSAGE */
else{
    if(count($records) != 0){
        $result = '<ul>';
        foreach($records as $row){
            $result .= "<li>" .$row['username'] . " -- " . $row['password'] . "</li>";
        }
        $result .= "</ul>";
    }
    else {
        $result =  'No records found';
    }
}

?>
  <body>
    <div id="wrapper" class="container">
      <?php echo $page->nav(); ?>
      <h1>Home Page</h1>
      <p>Below is a list of all usernames and encrypted passwords.</p>
        <div><?php echo $result; ?></div>

      
  </body>
</html>