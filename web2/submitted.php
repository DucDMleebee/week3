<?php
include 'danhsach.php';
$fileList = glob("$mypath/*");
foreach($fileList as $filename){
    if(is_file($filename)){
	$target = basename("$filename").PHP_EOL;
        echo $target . '<a href="' . $filename . '"> Download </a>','<br>';
    }   
}
?>