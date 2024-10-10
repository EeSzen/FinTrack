
/**************************************************************/

// calculator
// define
let text1 = document.getElementById("num1");
let text2 = document.getElementById("num2");

let plus = document.getElementById("add");
let minus = document.getElementById("subtract");
let times = document.getElementById("multiply");
let bahagi = document.getElementById("divide");

let answer = document.getElementById("result");

// add
plus.addEventListener("click", function (event) {
    let text1value = parseInt(num1.value);
    let text2value = parseInt(num2.value);
    let total = text1value + text2value;
    answer.innerText = total
});

// subtract
minus.addEventListener("click", function (event) {
    let text1value = parseInt(num1.value);
    let text2value = parseInt(num2.value);
    let total = text1value - text2value;
    answer.innerText = total
});

// multiply
times.addEventListener("click", function (event) {
    let text1value = parseInt(num1.value);
    let text2value = parseInt(num2.value);
    let total = text1value * text2value;
    answer.innerText = total
});

// divide
bahagi.addEventListener("click", function (event) {
    let text1value = parseInt(num1.value);
    let text2value = parseInt(num2.value);
    let total = text1value / text2value;
    answer.innerText = total
});

/**************************************************************/