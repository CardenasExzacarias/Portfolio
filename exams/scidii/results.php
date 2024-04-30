<?php
session_start();
ini_set('display_errors', '0');
ini_set('error_log', '../e.log');
include_once('const.php');
include_once('scale.php');
include_once('percent.php');
include_once('../server/template.php');

if(isset($_GET)){
    $res = makeTable(name, columns, style, scales, $percents);
    $ans = printArray($_SESSION['answer'], answerColumns, answersWidth);
    $html = $res.$ans;
    echo $html;
}else{
    echo "Nice try :D";
}