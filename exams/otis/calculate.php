<?php
include_once('scale.php');

$iq = 0;

function iq(){
    global $count, $iq;
    switch($count){
        case 0: $iq = 65; break;
        case $count < 17: $iq = 65; break;
        case $count < 32: $iq = $count + 49; break;
        case $count < 49: $iq = $count + 50; break;
        case $count < 66: $iq = $count + 51; break;
        default: $iq = $count + 52; break;
    }
    return $iq;
}

function dx(){
    global $iq;
    $res = "";
    switch($iq){
        case 0: $res = "Deficiente"; break;
        case $iq < 79: $res = "Deficiente"; break;
        case $iq < 89: $res = "Inferior al termino medio"; break;
        case $iq < 109: $res = "Termino medio"; break;
        case $iq < 119: $res = "Superior al termino medio"; break;
        default: $res = "Superior"; break;
    }
    return $res;
}

function rang(){
    global $iq;
    $res = "";
    switch ($iq){
        case 0: $res = "V-"; break;
        case $iq < 71: $res = "V-"; break;
        case $iq < 79: $res = "V+"; break;
        case $iq < 83: $res = "IV-"; break;
        case $iq < 89: $res = "IV+"; break;
        case $iq < 99: $res = "III-"; break;
        case 100: $res = "III"; break;
        case $iq < 109: $res = "III+"; break;
        case $iq < 115: $res = "II-"; break;
        case $iq < 119: $res = "II+"; break;
        case $iq < 125: $res = "I-"; break;
        default: $res = "I+"; break;
    }
    return $res;
}