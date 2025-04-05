<?php

$str1 = 'a1b2c3';
$result = preg_replace_callback('/\d+/', function($matches) {
    return $matches[0] *2;
    }, $str1);
echo $result;

?>