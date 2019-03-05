<?php
$row = 1;
if (($handle = fopen("../files/csv.txt", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        //print_r($data);
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "\n";
        }
    }
    fclose($handle);
}

?>