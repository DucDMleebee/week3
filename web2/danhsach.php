<?php

$fileList = glob('baitap/*');
foreach($fileList as $filename){
    if(is_file($filename)){
        echo $filename . '<a href="' . $filename . '"> Download </a>', '<br>'; 
    }   
}
?>