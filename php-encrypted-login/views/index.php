<?php
require_once '../classes/Page.php';
$page = new Page();
echo $page->head("Encrypted Login - Login Page");
?>
  <body>
    <div id="wrapper" class="container">
      <h1>Login Page</h1>
      <p>Enter username and password</p>
      <p>For test purposes the username is "sshaper" the password is "password"</p>
      <p id="message"></p>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" value="sshaper">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" value="password">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input type="button" class="btn btn-primary" value="Login" id="loginBtn">
          </div>
        </div>
      </div>
  
    </div>
    <script src="../public/js/main.js"></script>
  </body>
</html>