/*alert("Hello, it is Ajla");*/

const person = {"first_name" : "John", "last_name" : "Doe" } //ovo smo radili i u postamnu
console.log(person.first_name);
console.log(person['last_name']); //two ways to access properties

const cars = ["Volvo", "BMW", "Audi"];
console.log(cars[0]);
cars[cars.length] = "Peugeot";
console.log(cars);
console.log(cars.sort());

function hello(){
    alert('hello from the functuon');
}

console.log(typeof 2);
console.log(typeof cars);
console.log(typeof person);
console.log(typeof "person");

function display(text){
    document.getElementById('demo').innerHTML = text;
}

function greeting(text){
    alert(text);
}

let list = '<ul>';
for(var i =0; i <cars.length; i++){
    list+='<li>' + cars[i] + '</li.' //ovo += znaci appends
}
list += '</ul>';
//console.log(list);  -> ovo je samo radi provjere 
document.getElementById("cars").innerHTML = list;
