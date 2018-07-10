<?php
require_once "home.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>diagnostics walk-through</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      .row{margin: 10px 0;}
    </style>
  </head>
  <body>
    <div class="container">
    <h1>Diagnostics Walk-through</h1>
    <p>This application allows you to add names to the names database.  When the button is clicked the name will be added to the list of names.  The list of names is loaded when the page is first loaded.</p>
    <div class="row">
          <div class="col-md-3" id="msg">&nbsp;</div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" value="Scott">
          </div>
          <div class="col-md-3">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" name="lname" value="Shaper">
          </div> 
        </div>
        <div class="row">
          <div class="col-md-2">
            <label for="color">Eye Color</label>
            <input type="text" class="form-control" placeholder="eye color" name="color" value="blue">
          </div>
          <div class="col-md-2">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" name="gender" value="male">
          </div>
          <div class="col-md-2">
            <label for="state">State</label>
            <input type="text" class="form-control" name="state" value="mi">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <input type="button" class="btn btn-primary" id="addName" value="Add Name">
          </div>
        </div>

        <div id="namelist"><?php echo namelist() ?></div>
      </div>
      <script src="../js/main.js"></script>
  </body>
</html>

