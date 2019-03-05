<?php
$handle = fopen("../files/data.txt", "r");

echo fread($handle, 2)."\n";
echo fread($handle, 2)."\n";
echo fread($handle, 2)."\n";

?>