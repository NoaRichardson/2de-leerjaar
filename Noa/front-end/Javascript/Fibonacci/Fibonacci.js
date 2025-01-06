let fibonacci = document.createElement("p");
const fibonacciAmount = 18;
const fibonacciNumbers = getFibonacci(fibonacciAmount);
fibonacci.innerHTML = fibonacciNumbers;
const container = document.getElementById("container");
container.appendChild(fibonacci);

function getFibonacci(fibonacciAmount){
    const fibonacciList = [0, 1];
    let i = 0;
    for (let x = 0; x < fibonacciAmount; x++){
        const number = fibonacciList[i] + fibonacciList[i + 1];
        fibonacciList.push(number);
        i = i + 1;
    }
    return fibonacciList;

}