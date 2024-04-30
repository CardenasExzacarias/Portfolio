'use strict';
const obj = JSON.parse(localStorage.getItem('data'));
addEventListener('load', initEvents, false);
const area = document.getElementById('question-area');
const next = document.getElementsByTagName('form');
const previous = document.getElementById('btnPrevious');
const btnNext = document.getElementById("btnNext");
const test = obj.test;
const total = obj.total;
let remain = total;
let position = 0;
let change = 0;
let select;

function initEvents(){
    fetch('./server/init.php',{
        method: 'POST',
        headers: {
            'Content-type': 'application/json; charset=utf-8'
        },
        body: JSON.stringify(obj)
    })
    .then(res => res.text())
    .then(data => area.innerHTML += data)
    .catch(e => console.log(e));
    
    area.addEventListener('click', radioSelect, false);
    next[0].addEventListener('submit', clickNext, false);
    previous.addEventListener('click', clickPrevious, false);
}

function radioSelect(e){
    if(e.target.name == 'select'){
        select = e.target;
        enable();
    }
}

function clickNext(e){
    e.preventDefault();
    if(position + remain == total){
        remain--;
        change = 0;
    }else{
        change = 1;
    }
    position++;
    sendData();
}

function clickPrevious(e){
    e.preventDefault();
    position--;
    change = 2;
    sendData();
}

function sendData(){
    let number = document.querySelector('.span-number');
    let selected = select.value;
    select.checked = false;

    previous.disabled = (position != 0) ? false : true;

    let data = {
        'select' : `${selected}`,
        'position' : `${position}`,
        'change' : `${change}`,
        'test' : `${test}`
    }

    fetch('./server/verify.php',{
        method: 'POST',
        headers: {
            'Content-type': 'application/json; charset=utf-8'
        },
        body: JSON.stringify(data)
    })
    .then(res => res.text())
    .then(data => area.innerHTML = data)
    .catch(e => console.log(e));

    if(position == total) window.location.replace('./results.html');
    else{
        btnNext.disabled = true;
        number.innerText = 'Pregunta #' + (position + 1);
    }
}

function enable(){
    btnNext.disabled=false;
}