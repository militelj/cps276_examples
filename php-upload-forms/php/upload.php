<?php

$data = $_POST['filename'];

$file = $_FILES['file'];
echo "<p>The follow are associative arrays of the appended items.</p>";
echo "<p>Filename</p>";
echo "<pre>";
print_r($_POST);
echo "</pre>";
//var_dump($_FILES);

echo "<p>File</p>";
echo '<pre>';
print_r($file);
echo "</pre>";

echo "<p>Using the associative array names you can get the individual parts.  For example:</p>";

echo '<p>$file[\'size\'] will get the file size which is '.$file['size'].' bytes.</p>';

