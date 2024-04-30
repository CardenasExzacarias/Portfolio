<?php
include_once('../server/scaleCount.php');

$scale_Evitation = function($answer) use($yes){
    $count = 0;
    $count += $yes($answer[0]);
    $count += $yes($answer[1]);
    $count += $yes($answer[2]);
    $count += $yes($answer[3]);
    $count += $yes($answer[4]);
    $count += $yes($answer[5]);
    $count += $yes($answer[6]);
    return $count;
};

$scale_Dependent = function($answer) use($yes){
    $count = 0;
    $count += $yes($answer[7]);
    $count += $yes($answer[8]);
    $count += $yes($answer[9]);
    $count += $yes($answer[10]);
    $count += $yes($answer[11]);
    $count += $yes($answer[12]);
    $count += $yes($answer[13]);
    $count += $yes($answer[14]);
    return $count;
};

$scale_Obsessive = function($answer) use($yes){
    $count = 0;
    $count += $yes($answer[15]);
    $count += $yes($answer[16]);
    $count += $yes($answer[17]);
    $count += $yes($answer[18]);
    $count += $yes($answer[19]);
    $count += $yes($answer[20]);
    $count += $yes($answer[21]);
    $count += $yes($answer[22]);
    $count += $yes($answer[23]);
    $count += $yes($answer[24]);
    $count += $yes($answer[25]);
    return $count;
};

$scale_Passive_Agressive = function($answer) use($yes){
    $count = 0;
    $count += $yes($answer[26]);
    $count += $yes($answer[27]);
    $count += $yes($answer[28]);
    $count += $yes($answer[29]);
    $count += $yes($answer[30]);
    $count += $yes($answer[31]);
    $count += $yes($answer[32]);
    $count += $yes($answer[33]);
    $count += $yes($answer[34]);
    return $count;
};

$scale_Passive_Dependant = function($answer) use($yes){
    $count = 0;
    $count += $yes($answer[35]);
    $count += $yes($answer[36]);
    $count += $yes($answer[37]);
    $count += $yes($answer[38]);
    $count += $yes($answer[39]);
    $count += $yes($answer[40]);
    $count += $yes($answer[41]);
    $count += $yes($answer[42]);
    $count += $yes($answer[43]);
    $count += $yes($answer[44]);
    $count += $yes($answer[45]);
    $count += $yes($answer[46]);
    $count += $yes($answer[47]);
    return $count;
};

$scale_Paranoid = function($answer) use($yes){
    $count = 0;
    $count += $yes($answer[48]);
    $count += $yes($answer[49]);
    $count += $yes($answer[50]);
    $count += $yes($answer[51]);
    $count += $yes($answer[52]);
    $count += $yes($answer[53]);
    $count += $yes($answer[54]);
    $count += $yes($answer[55]);
    return $count;
};

$scale_Schizotypal = function($answer) use($yes){
    $count = 0;
    $count += $yes($answer[56]);
    $count += $yes($answer[57]);
    $count += $yes($answer[58]);
    $count += $yes($answer[59]);
    $count += $yes($answer[60]);
    $count += $yes($answer[61]);
    $count += $yes($answer[62]);
    $count += $yes($answer[63]);
    return $count;
};

$scale_Schizoid = function($answer) use($yes){
    $count = 0;
    $count += $yes($answer[64]);
    $count += $yes($answer[65]);
    $count += $yes($answer[66]);
    $count += $yes($answer[67]);
    $count += $yes($answer[68]);
    return $count;
};

$scale_Histrionic = function($answer) use($yes){
    $count = 0;
    $count += $yes($answer[69]);
    $count += $yes($answer[70]);
    $count += $yes($answer[71]);
    $count += $yes($answer[72]);
    $count += $yes($answer[73]);
    $count += $yes($answer[74]);
    $count += $yes($answer[75]);
    $count += $yes($answer[76]);
    $count += $yes($answer[77]);
    $count += $yes($answer[78]);
    return $count;
};

$scale_Narcissistic = function($answer) use($yes){
    $count = 0;
    $count += $yes($answer[79]);
    $count += $yes($answer[80]);
    $count += $yes($answer[81]);
    $count += $yes($answer[82]);
    $count += $yes($answer[83]);
    $count += $yes($answer[84]);
    $count += $yes($answer[85]);
    $count += $yes($answer[86]);
    $count += $yes($answer[87]);
    $count += $yes($answer[88]);
    $count += $yes($answer[89]);
    return $count;
};

$scale_Limit = function($answer) use($yes){
    $count = 0;
    $count += $yes($answer[90]);
    $count += $yes($answer[91]);
    $count += $yes($answer[92]);
    $count += $yes($answer[93]);
    $count += $yes($answer[94]);
    $count += $yes($answer[95]);
    $count += $yes($answer[96]);
    $count += $yes($answer[97]);
    $count += $yes($answer[98]);
    $count += $yes($answer[99]);
    $count += $yes($answer[100]);
    $count += $yes($answer[101]);
    $count += $yes($answer[102]);
    $count += $yes($answer[103]);
    $count += $yes($answer[104]);
    $count += $yes($answer[105]);
    $count += $yes($answer[106]);
    $count += $yes($answer[107]);
    return $count;
};

$scale_Antisocial = function($answer) use($yes){
    $count = 0;
    $count += $yes($answer[108]);
    $count += $yes($answer[109]);
    $count += $yes($answer[110]);
    $count += $yes($answer[111]);
    $count += $yes($answer[112]);
    $count += $yes($answer[113]);
    $count += $yes($answer[114]);
    $count += $yes($answer[115]);
    $count += $yes($answer[116]);
    $count += $yes($answer[117]);
    $count += $yes($answer[118]);
    $count += $yes($answer[119]);
    return $count;
};

$count = [
    $scale_Evitation($_SESSION['answer']),
    $scale_Dependent($_SESSION['answer']),
    $scale_Obsessive($_SESSION['answer']),
    $scale_Passive_Agressive($_SESSION['answer']),
    $scale_Passive_Dependant($_SESSION['answer']),
    $scale_Paranoid($_SESSION['answer']),
    $scale_Schizotypal($_SESSION['answer']),
    $scale_Schizoid($_SESSION['answer']),
    $scale_Histrionic($_SESSION['answer']),
    $scale_Narcissistic($_SESSION['answer']),
    $scale_Limit($_SESSION['answer']),
    $scale_Antisocial($_SESSION['answer'])
];