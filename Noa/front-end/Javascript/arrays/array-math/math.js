var arrayEen = [1,2,3,4,5,6,7,8,9,10];
var arrayTwee = [2,4,6,8,10,12,14,16,18,20];
const optellenContainer = document.getElementById("optellen");
optellenContainer.innerHTML = optellen(arrayEen, arrayTwee).join("");
const aftrekkenContainer = document.getElementById("aftrekken");
aftrekkenContainer.innerHTML = aftrekken(arrayEen, arrayTwee).join("");
const vermedigvuldigenContainer = document.getElementById("vermedigvuldigen");
vermedigvuldigenContainer.innerHTML = vermedigvuldigen(arrayEen, arrayTwee).join("");
const delenContainer = document.getElementById("delen");
delenContainer.innerHTML = delen(arrayEen, arrayTwee).join("");


function optellen(arrayEen, arrayTwee){
    let optellenList = [];
    for (let i = 0; i < arrayEen.length; i++){
        let answer = arrayEen[i] + arrayTwee[i];
        optellenList.push(`${arrayEen[i]} + ${arrayTwee[i]} = ${answer}<br/>`);
    }
    return optellenList
}

function aftrekken(arrayEen, arrayTwee){
    let aftrekkenList = [];
    for (let i = 0; i < arrayEen.length; i++){
        let answer = arrayTwee[i] - arrayEen[i];
        aftrekkenList.push(`${arrayEen[i]} - ${arrayTwee[i]} = ${answer}<br/>`);
    }
    return aftrekkenList
}

function vermedigvuldigen(arrayEen, arrayTwee){
    let vermedigvuldigenList = [];
    for (let i = 0; i < arrayEen.length; i++){
        let answer = arrayEen[i] * arrayTwee[i];
        vermedigvuldigenList.push(`${arrayEen[i]} * ${arrayTwee[i]} = ${answer}<br/>`);
    }
    return vermedigvuldigenList
}

function delen(arrayEen, arrayTwee){
    let delenList = [];
    for (let i = 0; i < arrayEen.length; i++){
        let answer = arrayTwee[i] / arrayEen[i];
        delenList.push(`${arrayEen[i]} / ${arrayTwee[i]} = ${answer}<br/>`);
    }
    return delenList
}