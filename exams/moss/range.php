<?php
include_once('scale.php');
include_once('range.php');

$rangeCount = function () use($totalCount){
    $range = '';
    switch($totalCount){
        case 0: $range = 'Deficiente'; break;
        case $totalCount < 8: $range = 'Deficiente'; break;
        case $totalCount < 12: $range = 'Pobre'; break;
        case $totalCount < 19: $range = 'Medio'; break;
        case $totalCount < 24: $range = 'Bueno'; break;
        default: $range = 'Superior'; break;
    }
    return $range;
};

$adaptability = function($percent = 0){
    $range = '';
    switch($percent){
        case 0: $range = 'Deficiente'; break;
        case $percent < 7: $range = 'Deficiente'; break;
        case $percent < 27: $range = 'Inferior'; break;
        case $percent < 42: $range = 'Medio Inferior'; break;
        case $percent < 64: $range = 'Promedio'; break;
        case $percent < 83: $range = 'Medio Superior'; break;
        case $percent < 98: $range = 'Superior'; break;
        default: $range = 'Muy Superior'; break;
    }

    return $range;
};


$rangeAdaptability = [
    $adaptability($porcents[0]),
    $adaptability($porcents[1]),
    $adaptability($porcents[2]),
    $adaptability($porcents[3]),
    $adaptability($porcents[4])
];