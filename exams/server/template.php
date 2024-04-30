<?php
/**
* Function to create tables
* @param string $name Table name.
* @param string[] $columns Columns name.
* @param string $style Columns width template in css grid-template-column (only values no attributes).
* @param array ...$args Table content, one array for every column. Order args based in column.
* @return string Table html.
*/
function makeTable($name, $columns, $style, ...$args){
    $container = '<div class="table-container">';
    $title = '<h2 class="table-title">';
    $endTitle = '</h2>';
    $shadow = '<div class="table-shadow" style="grid-template-columns: ';
    $endShadow = ';">';
    $header = '<div class="table-header">';
    $headerTopLeft = '<div class="table-header table-header_top-left">';
    $headerTopRight = '<div class="table-header table-header_top-right">';
    $item = '<div class="table-item';
    $itemOdd = ' table-item_odd';
    $itemFooter = ' table-footer';
    $endItem = '">';
    $end = '</div>';
    
    $count = count($columns);
    $html = $container.$title.$name.$endTitle;
    $html .= $shadow.$style.$endShadow;

    for($i = 0; $i < $count; $i++){
        if($i == 0) $html .= $headerTopLeft.$columns[$i].$end;
        else if($i != $count - 1) $html .= $header.$columns[$i].$end;
        else $html .= $headerTopRight.$columns[$i].$end;
    }

    for($i = 0; $i < count($args[0]); $i++){
        for($j = 0; $j < $count; $j++){
            if($i%2 == 0){
                $html .= ($i != count($args[0]) - 1)
                ? $item.$endItem.$args[$j][$i].$end
                : $item.$itemFooter.$endItem.$args[$j][$i].$end;
            }else{
                $html .= ($i != count($args[0]) - 1)
                ? $item.$itemOdd.$endItem.$args[$j][$i].$end
                : $item.$itemOdd.$itemFooter.$endItem.$args[$j][$i].$end;
            }
        }
    }

    return $html.$end.$end;
}

/**
* Function that create a table based in one array without style
* @param array $array Array to print.
* @param int $columns Columns number.
* @param string $width Columns width but detail units (px, em, %...).
* @return string Table html.
*/
function printArray($array, $columns, $width){
    $title = '<div class="table-container"><h2 class="table-title">RESPUESTAS</h2><div class="answer-container" style="grid-template-columns: repeat(';
    $endTitle = ');">';
    $item = '<div class="answer-item"><b>';
    $itemEnd = '</b>';
    $end = '</div>';
    $html = $title.$columns.','.$width.$endTitle;

    for($i = 0; $i < count($array); $i++){
        $html .= $item.($i + 1).'. '.$itemEnd.$array[$i].$end;
    }

    return $html.$end.$end;
}

/**
* Function to create text with parraf and titles
* @param string $theme Principal title.
* @param array $title Sub-titles.
* @param array $parraf Parrafs for every title.
* @return string html text.
*/
function makeParraf($theme, $title, $parraf) {
    $html = '<h2 class="theme-title">'.$theme.'</h2>';
    for ($i = 0; $i < count($title); $i++) {
        $html .= '<h3 class="parraf-title">'.$title[$i].'</h3>';
        $html .= '<p class="parraf">'.$parraf[$i].'</p>';
    }
    return $html;
}