<?php
include_once('scale.php');

$calculateTwo = function($count = 0){
    $op = ($count*0.2)*100;
    $percent = round($op);
    return $percent;
};

$calculateSix = function($count = 0){
    $op = ($count*0.1666)*100;
    $percent = round($op);
    return $percent;
};

$calculateEight = function($count = 0){
    $op = ($count*0.125)*100;
    $percent = round($op);
    return $percent;
};

$porcents = [
    $calculateSix($count[0]),
    $calculateTwo($count[1]),
    $calculateEight($count[2]),
    $calculateTwo($count[3]),
    $calculateSix($count[4])
];