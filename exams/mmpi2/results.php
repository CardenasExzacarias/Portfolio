<?php
session_start();
ini_set('display_errors', '0');
ini_set('error_log', '../e.log');
include_once('const.php');
include_once('scale.php');
include_once('scoreFemale.php');
include_once('scoreMale.php');
include_once('sug.php');
include_once('../server/template.php');

if(isset($_GET)){
    $b = makeParraf('ESCALAS BÁSICAS', basic, $sugB);
    $c = makeParraf('ESCALAS CONTENIDO', content, $sugC);
    $s = makeParraf('ESCALAS SUPLEMENTARIAS', sup, $sugS);
    $ans = printArray($_SESSION['answer'], columns, width);
    $html = $b.$c.$s.$ans;
    echo $html;
}else{
    echo "Nice try :D";
}