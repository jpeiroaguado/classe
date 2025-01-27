var colors=require('colors/index.js');
const operacions=require('./operacions.js');
const Persona=require('./persona.js');


console.log("Hola mundo".rainbow);

console.log("Sumar: ", operacions.sum(2,3));
console.log("Restar: ", operacions.rest(2,3));
console.log("Multiplicar: ", operacions.mult(2,3));

const persExemple=new Persona('Javi', 38)

console.log(persExemple.mostrar().red);