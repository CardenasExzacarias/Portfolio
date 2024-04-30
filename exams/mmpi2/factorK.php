<?php
function sumK($count, $countK){
    $count += $countK;
    
    return $count;
}

function sum5K($count, $countK){
    $factorK = 0;
    if($countK%2 == 0){
        $factorK = $countK*0.5;
    }else{
        $factorK = (($countK+1)*(0.5));
    }
    $count += $factorK;
    
    return $count;
}

function sum4K($count, $countK){
    $factorK = $countK*0.4;
    
    if($countK%2.5 >= 1.5){
        $factorK = round($factorK);
    }
    else{
        $factorK = intval($factorK);
    }
    $count += $factorK;
    
    return $count;
}

function sum2K($count, $countK){
    $factorK = $countK*0.2;
    if($countK%5 >= 3){
        $factorK = round($factorK);
    }
    else{
        $factorK = intval($factorK);
    }
    
    $count += $factorK;
    return $count;
}