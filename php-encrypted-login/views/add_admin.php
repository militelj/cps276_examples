<?php
require_once '../classes/Page.php';
$page = new Page();
echo $page->security();
echo $page->head("Encrypted Login - Add Admin");
?>
  <body>
    <div id="wrapper" class="container">
    <?php echo $page->nav(); ?>  
    <h1>Add Admin</h1>
      <p>Enter a username and password to create a new administrator.</p>
      <p id="message"></p>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input type="button" class="btn btn-primary" value="Add Admin" id="addAdminBtn">
          </div>
        </div>
      </div>
  
    </div>
    <script src="../public/js/main.js"></script>
  </body>
</html>