'use strict';
const obj = JSON.parse(localStorage.getItem('data'));
const test = obj.test;

const grid = document.getElementById('content');
const btnPrint = document.getElementById('print');

fetch(`./${test}/results.php`)
.then(res => res.text())
.then(data => grid.innerHTML += data)
.catch(e => console.log(e));

btnPrint.addEventListener('click', printClick, false);
const tables = document.getElementsByClassName('table-container');

function printClick(){
    let pdf = new jsPDF('p', 'px', 'letter');
    for(let i = 0; i < tables.length; i++){
        html2canvas(tables[i], {scale: 1}).then((canvas)=>{
            let base64image = canvas.toDataURL("image/png");
            pdf.addImage(base64image, 'PNG', 20, 15);
            if(i == tables.length - 1){
                window.open(pdf.output('bloburl'));
            }else{
                pdf.addPage();
            }
        });
    }
}