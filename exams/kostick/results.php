<?php
session_start();
ini_set('display_errors', '0');
ini_set('error_log', '../e.log');
include_once('const.php');
include_once('scale.php');
include_once('suggestions.php');
include_once('../server/template.php');

if(isset($_GET)){
    $daa = makeTable(
        daaTable,
        columns,
        style,
        daaCategory,
        daaNames,
        daaScales,
        array_slice($count, 0, 8)
    );
    $dv = makeTable(
        dvTable,
        columns,
        style,
        dvCategory,
        dvNames,
        dvScales,
        array_slice($count, 8, 5)
    );
    $ese = makeTable(
        eseTable,
        columns,
        style,
        eseCategory,
        eseNames,
        eseScales,
        array_slice($count, 13)
    );
    $lds = makeTable(
        'LIDERAZGO',
        factorColumns,
        style,
        array_slice(daaNames, 0, 3),
        array_slice(daaScales, 0, 3),
        array_slice($positive, 0, 3),
        array_slice($negative, 0, 3)
    );
    $soc = makeTable(
        'SUBORDINACIÓN',
        factorColumns,
        style,
        array_slice(daaNames, 3, 2),
        array_slice(daaScales, 3, 2),
        array_slice($positive, 3, 2),
        array_slice($negative, 3, 2)
    );
    $at = makeTable(
        'ADAPTACIÓN AL TRABAJO',
        factorColumns,
        style,
        array_slice(daaNames, 5),
        array_slice(daaScales, 5),
        array_slice($positive, 5, 3),
        array_slice($negative, 5, 3)
    );
    $mv = makeTable(
        'MODO DE VIDA',
        factorColumns,
        style,
        array_slice(dvNames, 0, 2),
        array_slice(dvScales, 0, 2),
        array_slice($positive, 8, 2),
        array_slice($negative, 8, 2)
    );
    $ge = makeTable(
        'GRADO DE ENERGÍA',
        factorColumns,
        style,
        array_slice(dvNames, 2),
        array_slice(dvScales, 2),
        array_slice($positive, 10, 3),
        array_slice($negative, 10, 3)
    );
    $ns = makeTable(
        'NATURALEZA SOCIAL',
        factorColumns,
        style,
        array_slice(eseNames, 0, 4),
        array_slice(eseScales, 0, 4),
        array_slice($positive, 13, 4),
        array_slice($negative, 13, 4)
    );
    $ne = makeTable(
        'NATURALEZA SOCIAL',
        factorColumns,
        style,
        array_slice(eseNames, 4),
        array_slice(eseScales, 4),
        array_slice($positive, 17),
        array_slice($negative, 17)
    );

    $ans = printArray($_SESSION['answer'], answerColumns, answersWidth);
    
    $html = $daa.$dv.$ese.$lds.$soc.$at.$mv.$ge.$ns.$ne.$ans;
    echo $html;
}else{
    echo "Nice try :D";
}