<?php

$fileList = glob('baitap/*');
foreach($fileList as $filename){
    if(is_file($filename)){
	$target = basename("$filename",".pdf").PHP_EOL;
	$mypath="/var/www/html/web2/baitap/$target";
	mkdir($mypath, 0777, true);
        echo $target . '<a href="' . $filename . '"> Download </a>' . '<a href=submit.php> Nop bai </a>' . '<a href=submitted.php> Bai da nop </a>', '<br>';
    }   
}
?>