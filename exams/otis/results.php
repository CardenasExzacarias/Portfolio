<?php
session_start();
ini_set('display_errors', '0');
ini_set('error_log', '../e.log');
include_once('scale.php');
include_once('const.php');
include_once('calculate.php');
include_once('../server/template.php');

if(isset($_GET)){
    $table = makeTable(name, columns, style, [$count], [iq()], [rang()], [dx()]);
    $array = printArray($_SESSION['answer'], column, width);
    echo $table.$array;
}else{
    echo "Nice Try :P";
}