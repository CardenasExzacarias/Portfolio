<?php
include_once('../server/scaleCount.php');

$answerCount = function($answer) use($a, $b, $c, $d, $e, $f, $g, $h, $l, $m, $t, $o, $q, $three, $four, $five, $eight, $ten, $sixteen, $forty, $seven, $thirteen, $seventeen){
    $count = 0;
    $count += $d($answer[0]);
    $count += $c($answer[1]);
    $count += $d($answer[2]);
    $count += $d($answer[3]);
    $count += $forty($answer[4]);
    $count += $a($answer[5]);
    $count += $e($answer[6]);
    $count += $e($answer[7]);
    $count += $a($answer[8]);
    $count += $c($answer[9]);
    $count += $h($answer[10]);
    $count += $b($answer[11]);
    $count += $e($answer[12]);
    $count += $b($answer[13]);
    $count += $d($answer[14]);
    $count += $d($answer[15]);
    $count += $a($answer[16]);
    $count += $e($answer[17]);
    $count += $b($answer[18]);
    $count += $c($answer[19]);
    $count += $l($answer[20]);
    $count += $c($answer[21]);
    $count += $c($answer[22]);
    $count += $d($answer[23]);
    $count += $e($answer[24]);
    $count += $c($answer[25]);
    $count += $e($answer[26]);
    $count += $b($answer[27]);
    $count += $e($answer[28]);
    $count += $e($answer[29]);
    $count += $seven($answer[30]);
    $count += $c($answer[31]);
    $count += $b($answer[32]);
    $count += $d($answer[33]);
    $count += $o($answer[34]);
    $count += $ten($answer[35]);
    $count += $b($answer[36]);
    $count += $b($answer[37]);
    $count += $d($answer[38]);
    $count += $a($answer[39]);
    $count += $c($answer[40]);
    $count += $q($answer[41]);
    $count += $a($answer[42]);
    $count += $e($answer[43]);
    $count += $t($answer[44]);
    $count += $c($answer[45]);
    $count += $b($answer[46]);
    $count += $t($answer[47]);
    $count += $thirteen($answer[48]);
    $count += $b($answer[49]);
    $count += $g($answer[50]);
    $count += $a($answer[51]);
    $count += $a($answer[52]);
    $count += $c($answer[53]);
    $count += $c($answer[54]);
    $count += $d($answer[55]);
    $count += $c($answer[56]);
    $count += $three($answer[57]);
    $count += $e($answer[58]);
    $count += $e($answer[59]);
    $count += $four($answer[60]);
    $count += $d($answer[61]);
    $count += $a($answer[62]);
    $count += $sixteen($answer[63]);
    $count += $d($answer[64]);
    $count += $c($answer[65]);
    $count += $a($answer[66]);
    $count += $d($answer[67]);
    $count += $m($answer[68]);
    $count += $f($answer[69]);
    $count += $a($answer[70]);
    $count += $seventeen($answer[71]);
    $count += $five($answer[72]);
    $count += $eight($answer[73]);
    return $count;
};

$count = $answerCount($_SESSION['answer']);