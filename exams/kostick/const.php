<?php
const daaTable = 'DOMINIO-APEGO-ADAPTACIÓN';
const style = "auto auto auto auto";
const columns = [
    'Categoría',
    'Nombre',
    'Clave',
    'Puntuación'
];
const daaCategory = [
    'LIDERAZGO',
    '',
    '',
    'SUBORDINACIÓN',
    '',
    'ADAPTACIÓN AL TRABAJO',
    '',
    ''
];
const daaNames = [
    'ACTV. DE LÍDER',
    'CONTROL DE OTROS',
    'TOMA DE DECISIONES',
    'APOYO SUPERVICIÓN',
    'APEGO A REGLAS',
    'ORGANIZACIÓN',
    'TRAB. DETALLES',
    'TEÓRICO'
];
const daaScales = [
    'L',
    'P',
    'I',
    'F',
    'W',
    'C',
    'D',
    'R'
];

const dvTable = 'DINAMISMO-VIGOROSIDAD';
const dvCategory = [
    'MODO DE VIDA',
    '',
    'GRADO DE ENERGÍA',
    '',
    ''
];
const dvNames = [
    'ACTIVO',
    'VIGOROSO',
    'TERMINA TAREAS',
    'ACTV. INTENSA',
    'LOGROS'
];
const dvScales = [
    'T',
    'V',
    'N',
    'G',
    'A'
];

const eseTable = 'ESTABILIDAD SOCIO-EMOCIONAL';
const eseCategory = [
    'NATURALEZA SOCIAL',
    '',
    '',
    '',
    'NATURALEZA EMOCIONAL',
    '',
    ''
];
const eseNames = [
    'SER NOTIFICADO',
    'APERTURA SOCIAL',
    'AFILIATIVO',
    'AFECTO',
    'PASIVO-AGRESIVO',
    'RESTRINGIDO',
    'RESITENTE AL CAMBIO'
];
const eseScales = [
    'X',
    'S',
    'B',
    'O',
    'K',
    'E',
    'Z'
];

const factorColumns = [
    'NOMBRE',
    'CLAVE',
    'POSITIVO',
    'NEGATIVO'
];

const answerColumns = 10;
const answersWidth = '3.5em';