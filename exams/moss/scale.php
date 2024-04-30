<?php
include_once('../server/scaleCount.php');

$scale_CS = function($answer) use($b, $d, $a, $c){
    $count = 0;
    $count += $b($answer[4]);
    $count += $b($answer[7]);
    $count += $d($answer[14]);
    $count += $b($answer[16]);
    $count += $a($answer[21]);
    $count += $c($answer[27]);
    return $count;
};

$scale_DM = function($answer) use($b, $a){
    $count = 0;
    $count += $b($answer[3]);
    $count += $b($answer[5]);
    $count += $b($answer[19]);
    $count += $a($answer[22]);
    $count += $a($answer[28]);
    return $count;
};

$scale_IP = function($answer) use($b, $a, $c, $d){
    $count = 0;
    $count += $b($answer[6]);
    $count += $c($answer[8]);
    $count += $c($answer[11]);
    $count += $d($answer[13]);
    $count += $c($answer[18]);
    $count += $a($answer[20]);
    $count += $c($answer[25]);
    $count += $a($answer[26]);
    return $count;
};

$scale_IR = function($answer) use($b, $a, $c, $d){
    $count = 0;
    $count += $c($answer[0]);
    $count += $c($answer[9]);
    $count += $a($answer[10]);
    $count += $d($answer[12]);
    $count += $b($answer[24]);
    return $count;
};

$scale_SF = function($answer) use($b, $d){
    $count = 0;
    $count += $b($answer[1]);
    $count += $d($answer[2]);
    $count += $d($answer[15]);
    $count += $d($answer[17]);
    $count += $d($answer[23]);
    $count += $d($answer[29]);
    return $count;
};

$count = [
    $scale_CS($_SESSION['answer']),
    $scale_DM($_SESSION['answer']),
    $scale_IP($_SESSION['answer']),
    $scale_IR($_SESSION['answer']),
    $scale_SF($_SESSION['answer'])
];

$totalCount = 0;
foreach ($count as $value) {
    $totalCount += $value;
}