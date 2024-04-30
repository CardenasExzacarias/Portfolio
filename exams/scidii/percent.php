<?php
include_once('scale.php');

$calculate25 = function($count = 0){
    $percent = $count*25;
    return $percent;
};

$calculate20 = function($count = 0){
    $percent = $count*20;
    return $percent;
};

$calculate16 = function($count = 0){
    $percent = $count*16;
    return $percent;
};

$calculate33 = function($count = 0){
    $percent = $count*33;
    return $percent;
};

$percents = [
    $calculate25($count[0]),
    $calculate20($count[1]),
    $calculate20($count[2]),
    $calculate20($count[3]),
    $calculate20($count[4]),
    $calculate25($count[5]),
    $calculate20($count[6]),
    $calculate25($count[7]),
    $calculate25($count[8]),
    $calculate16($count[9]),
    $calculate20($count[10]),
    $calculate33($count[11])
];