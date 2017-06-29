<?php
include_once('CarSubClass.php');
$myCar = new Car();
$myCarSubClass = new CarSubClass();

echo $myCar->getDetails()."<br />";
echo $myCarSubClass->getDetails();
