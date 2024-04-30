<?php
session_start();
ini_set('display_errors', '0');
ini_set('error_log', '../e.log');
include_once('const.php');
include_once('scale.php');
include_once('percent.php');
include_once('range.php');
include_once('../server/template.php');

if(isset($_GET)){
    $countArray[] = $totalCount;
    $stringCount[] = $rangeCount();
    $sa = makeTable(saName, saColumns, saStyle, category, $porcents, $rangeAdaptability);
    $sj = makeTable(jsName, jsColumns, jsStyle, $countArray, $stringCount);
    $ans = printArray($_SESSION['answer'], columns, width);
    $html = $sa.$sj.$ans;
    echo $html;
}else{
    echo "Nice try :D";
}