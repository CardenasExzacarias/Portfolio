<?php
include_once('../server/scaleCount.php');

$L = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[11]);
    $count += $a($answer[21]);
    $count += $a($answer[31]);
    $count += $a($answer[41]);
    $count += $a($answer[51]);
    $count += $a($answer[61]);
    $count += $a($answer[71]);
    $count += $a($answer[81]);
    $count += $b($answer[80]); 
    return $count;
};

$P = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[12]);
    $count += $a($answer[2]);
    $count += $b($answer[3]);
    $count += $b($answer[14]);
    $count += $b($answer[25]);
    $count += $b($answer[36]);
    $count += $b($answer[47]);
    $count += $b($answer[58]);
    $count += $b($answer[69]);
    return $count;
};

$I = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[22]);
    $count += $a($answer[32]);
    $count += $a($answer[42]);
    $count += $a($answer[52]);
    $count += $a($answer[62]);
    $count += $a($answer[72]);
    $count += $a($answer[82]);
    $count += $b($answer[81]);
    $count += $b($answer[70]);
    return $count;
};

$F = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[78]);
    $count += $a($answer[68]);
    $count += $a($answer[58]);
    $count += $a($answer[48]);
    $count += $a($answer[38]);
    $count += $a($answer[28]);
    $count += $a($answer[18]);
    $count += $a($answer[8]);
    $count += $b($answer[9]);
    return $count;
};

$W = function($answer) use($a){
    $count = 0;
    $count += $a($answer[89]);
    $count += $a($answer[20]);
    $count += $a($answer[79]);
    $count += $a($answer[69]);
    $count += $a($answer[59]);
    $count += $a($answer[49]);
    $count += $a($answer[39]);
    $count += $a($answer[29]);
    $count += $a($answer[19]);
    $count += $a($answer[9]);
    return $count;
};

$C = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[88]);
    $count += $b($answer[87]);
    $count += $b($answer[76]);
    $count += $b($answer[65]);
    $count += $b($answer[54]);
    $count += $b($answer[43]);
    $count += $b($answer[32]);
    $count += $b($answer[21]);
    $count += $b($answer[10]);
    return $count;
};

$D = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[77]);
    $count += $a($answer[87]);
    $count += $b($answer[86]);
    $count += $b($answer[75]);
    $count += $b($answer[64]);
    $count += $b($answer[53]);
    $count += $b($answer[42]);
    $count += $b($answer[31]);
    $count += $b($answer[20]);
    return $count;
};

$R = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[66]);
    $count += $a($answer[76]);
    $count += $a($answer[86]);
    $count += $b($answer[85]);
    $count += $b($answer[74]);
    $count += $b($answer[63]);
    $count += $b($answer[52]);
    $count += $b($answer[41]);
    $count += $b($answer[30]);
    return $count;
};

$T = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[33]);
    $count += $a($answer[43]);
    $count += $a($answer[53]);
    $count += $a($answer[63]);
    $count += $a($answer[73]);
    $count += $a($answer[83]);
    $count += $b($answer[82]);
    $count += $b($answer[71]);
    $count += $b($answer[60]);
    return $count;
};

$V = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[44]);
    $count += $a($answer[54]);
    $count += $a($answer[64]);
    $count += $a($answer[74]);
    $count += $a($answer[84]);
    $count += $b($answer[83]);
    $count += $b($answer[72]);
    $count += $b($answer[61]);
    $count += $b($answer[50]);
    return $count;
};

$N = function($answer) use($b){
    $count = 0;
    $count += $b($answer[1]);
    $count += $b($answer[12]);
    $count += $b($answer[23]);
    $count += $b($answer[34]);
    $count += $b($answer[45]);
    $count += $b($answer[56]);
    $count += $b($answer[67]);
    $count += $b($answer[78]);
    $count += $b($answer[89]);
    return $count;
};

$G = function($answer) use($a){
    $count = 0;
    $count += $a($answer[0]);
    $count += $a($answer[10]);
    $count += $a($answer[20]);
    $count += $a($answer[30]);
    $count += $a($answer[40]);
    $count += $a($answer[50]);
    $count += $a($answer[60]);
    $count += $a($answer[70]);
    $count += $a($answer[80]);
    return $count;
};

$A = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[1]);
    $count += $b($answer[2]);
    $count += $b($answer[13]);
    $count += $b($answer[24]);
    $count += $b($answer[35]);
    $count += $b($answer[46]);
    $count += $b($answer[57]);
    $count += $b($answer[68]);
    $count += $b($answer[79]);
    return $count;
};

$X = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[23]);
    $count += $a($answer[13]);
    $count += $a($answer[3]);
    $count += $b($answer[4]);
    $count += $b($answer[15]);
    $count += $b($answer[26]);
    $count += $b($answer[37]);
    $count += $b($answer[48]);
    $count += $b($answer[59]);
    return $count;
};

$S = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[55]);
    $count += $a($answer[65]);
    $count += $a($answer[75]);
    $count += $a($answer[85]);
    $count += $b($answer[84]);
    $count += $b($answer[73]);
    $count += $b($answer[62]);
    $count += $b($answer[51]);
    $count += $b($answer[40]);
    return $count;
};

$O = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[45]);
    $count += $a($answer[35]);
    $count += $a($answer[25]);
    $count += $a($answer[15]);
    $count += $a($answer[5]);
    $count += $b($answer[6]);
    $count += $b($answer[17]);
    $count += $b($answer[28]);
    $count += $b($answer[39]);
    return $count;
};

$B = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[34]);
    $count += $a($answer[24]);
    $count += $a($answer[14]);
    $count += $a($answer[4]);
    $count += $b($answer[5]);
    $count += $b($answer[16]);
    $count += $b($answer[27]);
    $count += $b($answer[38]);
    $count += $b($answer[49]);
    return $count;
};

$K = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[67]);
    $count += $a($answer[57]);
    $count += $a($answer[47]);
    $count += $a($answer[37]);
    $count += $a($answer[27]);
    $count += $a($answer[17]);
    $count += $a($answer[7]);
    $count += $b($answer[8]);
    $count += $b($answer[19]);
    return $count;
};

$E = function($answer) use($b){
    $count = 0;
    $count += $b($answer[88]);
    $count += $b($answer[77]);
    $count += $b($answer[66]);
    $count += $b($answer[55]);
    $count += $b($answer[44]);
    $count += $b($answer[33]);
    $count += $b($answer[22]);
    $count += $b($answer[11]);
    $count += $b($answer[0]);
    return $count;
};

$Z = function($answer) use($a, $b){
    $count = 0;
    $count += $a($answer[56]);
    $count += $a($answer[46]);
    $count += $a($answer[36]);
    $count += $a($answer[26]);
    $count += $a($answer[16]);
    $count += $a($answer[6]);
    $count += $b($answer[7]);
    $count += $b($answer[18]);
    $count += $b($answer[29]);
    return $count;
};

/**
 * @var array $count Count of answers in all scales.
 */
$count = [
    $L($_SESSION['answer']),
    $P($_SESSION['answer']),
    $I($_SESSION['answer']),
    $F($_SESSION['answer']),
    $W($_SESSION['answer']),
    $C($_SESSION['answer']),
    $D($_SESSION['answer']),
    $R($_SESSION['answer']),
    $T($_SESSION['answer']),
    $V($_SESSION['answer']),
    $N($_SESSION['answer']),
    $G($_SESSION['answer']),
    $A($_SESSION['answer']),
    $X($_SESSION['answer']),
    $S($_SESSION['answer']),
    $B($_SESSION['answer']),
    $O($_SESSION['answer']),
    $K($_SESSION['answer']),
    $E($_SESSION['answer']),
    $Z($_SESSION['answer'])
];