<?php
session_start();
ini_set('display_errors', '0');
ini_set('error_log', '../e.log');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = file_get_contents('php://input');
    $request = json_decode($data, true);

    ($request['change'] == 0)
    ? $_SESSION['answer'][] = $request['select']
    : $_SESSION['answer'][$request['position'] - 1] = $request['select'];

    if ($request['position'] == $_SESSION['total']) echo 'Cargando...';
    else{
        switch($request['test']){
            case 'mmpi2': mmpi2($request['position']); break;
            case 'moss': moss($request['position']); break;
            case 'kostick': kostick($request['position']); break;
            case 'otis': otis($request['position']); break;
            case 'scidii': scidii($request['position']); break;
            default: echo 'Nice try'; break;
        }
    }
}else{
    echo 'Nice Try ( •̀ ω •́ )y';
}

function mmpi2($position){
    echo '<p class="question">'.$_SESSION['question'][$position].'</p>'.$_SESSION['format'];
}

function moss($position){
    echo '<p class="question">'.$_SESSION['question'][$position].'</p>'.$_SESSION['format'][$position];
}

function kostick($position){
    echo $_SESSION['format'][$position];
}

function otis($position){
    echo '<p class="question">'.$_SESSION['question'][$position].'</p>'.$_SESSION['format'][$position];
}

function scidii($position){
    echo '<p class="question">'.$_SESSION['question'][$position].'</p>'.$_SESSION['format'];
}