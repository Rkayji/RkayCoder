
function diffArray(arr1, arr2) {
    return arr1
        .concat(arr2)
        .filter(item => !arr1.includes(item) || !arr2.includes(item));
}
let array = diffArray([1, 2, 5], [1, 2, 3, 4, 5]);

function spinalCase(str) {
    return str.split(/\s|_|(?=[A-Z])/).join("-").toLowerCase();
}
let string = spinalCase("This is a Spinal String Algorithams");
console.log(array, string);
(() => console.log(`hello IIFE(Immediately Invoked Function Expression)`))();
const sayHelloTo = name => {
    let message = `Hello ` + name;
    return () => console.log(message);
}

let sayHelloToRkay = sayHelloTo(`Rkay`);
sayHelloToRkay();