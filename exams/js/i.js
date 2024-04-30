'use strict';
history.pushState({}, '', window.location.href);
const h = document.getElementById('title');
const d = document.getElementById('des');
const s = document.querySelector('summary');
const p = document.getElementById('parraf');
const t = document.getElementById('test');
const body = document.querySelector('body');
const submit = document.querySelector('form');
const lg = document.getElementsByClassName('label-genre');
const r = document.getElementsByName('genre');

submit.addEventListener('submit', e=>{
    e.preventDefault();
    let total;
    const data = Object.fromEntries(
        new FormData(e.target)
    )
    if(data.test != 'mmpi2' || (data.test == 'mmpi2' && data.genre)){
        switch(data.test){
            case 'mmpi2': total = 567; break;
            case 'kostick': total = 90; break;
            case 'moss': total = 30; break;
            case 'otis': total = 74; break;
            case 'scidii': total = 120; break;
            default: console.log('Nice Try ☆*: .｡. o(≧▽≦)o .｡.:*☆');
        }
        let obj = data;
        obj.total = total;
        localStorage.setItem('data', JSON.stringify(obj));
        window.location.replace('./form.html');
    }else alert('Seleccione un género');
});

s.addEventListener('click', ()=>{
    if(!d.open){
        h.classList.add('fade');
        p.classList.add('fade');
    }
    setTimeout(()=>{
        h.classList.remove('fade');
        p.classList.remove('fade');
    }, 1000);
});

t.addEventListener('change', ()=>{
    h.classList.add('fade');
    p.classList.add('fade');
    switch(t.value){
        case 'mmpi2': 
            h.innerText = 'Inventario Multifasetico de la Personalidad (MMPI-2)';
            p.innerText = 'El Minnesota Multiphasic Personality Inventory (MMPI) fue desarrollado a finales de la década de 1930 por Hathaway y MacKinley con el fin de obtener información clínica y diagnostica sobre pacientes psiquiátricos y médicos de manera general.';
        break;
        case 'kostick': 
            h.innerText = 'Inventario de Percepción y Preferencias de Kostick (PAPI)';
            p.innerText = 'El Personality and Preference Inventory (PAPI) es un inventario cuyo análisis recae principalmente en la auto-percepción y preferencias personales. Se trata de un test proyectivo que busca predecir el comportamiento de un individuo en un ambiente laboral mediante la medición de algunos aspectos, como lo podrían ser estilos administrativos y desempeño.';
        break;
        case 'moss': 
            h.innerText = 'Inventario Moss';
            p.innerText = 'La prueba Moss fue creada por Rudolf y Berenice Moss en el año 1979. El objetivo de la prueba es ayudar a los gerentes, supervisores, coordinadores, entre otras personas con cargos que conlleven a la supervisión de un personal, a definir la adaptabilidad en un puesto y el establecimiento de estándares para un correcto funcionamiento dentro de las organizaciones.'; 
        break;
        case 'otis': 
            h.innerText = 'Prueba Otis Sencillo';
            p.innerText = 'Las pruebas Otis fueron creadas por Arthur S. Otis. Alrededor del año de 1918 se da a conocer la primera versión cuyo nombre era “OTIS Group Intelligence Scale, Primary & Advanced”. Las pruebas Otis son utilizadas para evaluar personas adultas en el ámbito laboral. Suelen ser aplicadas con el fin de ayudar en la selección de empleados o contratación de postulantes y para identificar posibles ascensos y transferencias. Es por ello que son aplicadas como instrumentos de selección y asesoramiento en ámbito laboral e incluso a nivel educativo universitario.';
        break;
        case 'scidii': 
            h.innerText = 'Entrevista Clínica Estructurada para el DSM-IV (SCID-II)';
            p.innerText = 'El Structured Clinical Interview for DSM o mejor conocido por sus siglas en inglés SCID-II, es un inventario creado por M.B. First, R.L. Spitzer y M. Gibbon en el año de 1986. Este inventario busca generar un diagnostico psiquiátrico sobre trastornos de personalidad consistente con los criterios del DSM correspondientes a la American Psichiatric Association.';
        break;
        default: console.log('Nice Try >:D'); break;
    }
    setTimeout(()=>{
        h.classList.remove('fade');
        p.classList.remove('fade');
    }, 1000);
});

lg[0].addEventListener('click', ()=>{
    r[0].checked = true;
});

lg[0].addEventListener('mouseenter', ()=>{
    r[0].style.opacity = "0.65";
});

lg[0].addEventListener('mouseleave', ()=>{
    r[0].style.opacity = "1";
});

lg[1].addEventListener('click', ()=>{
    r[1].checked = true;
});

lg[1].addEventListener('mouseenter', ()=>{
    r[1].style.opacity = "0.65";
});

lg[1].addEventListener('mouseleave', ()=>{
    r[1].style.opacity = "1";
});