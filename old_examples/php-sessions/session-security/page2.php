<?php//include filesinclude_once('classes/Security.php');//initiate object of the class$Security = new Security();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="Author" content="Your name" /><meta name="description" content="Learning PHP and MySQL" /><meta name="keywords" content="PHP, MySQL" /><meta name="Language" content="english" /><title>Page Two</title></head><body>    <?php    echo $Security->getNav();    echo '<p>This is page 2</p>';    echo '<p>The session id is '.$Security->getSid().'</p>';    ?></body></html>