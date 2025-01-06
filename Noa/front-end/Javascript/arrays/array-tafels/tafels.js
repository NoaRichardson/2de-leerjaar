tables = [2, 4, 6, 8];
const firstTable = document.getElementById("tafel1");
firstTable.innerHTML = `Tafel van ${tables[0]}`;
const firstTableList = document.getElementById("tafel1List");
firstTableList.innerHTML = calcTable(tables[0]).join("");

const secondTable = document.getElementById("tafel2");
secondTable.innerHTML = `Tafel van ${tables[1]}`;
const secondTableList = document.getElementById("tafel2List");
secondTableList.innerHTML = calcTable(tables[1]).join("");

const thirdTable = document.getElementById("tafel3");
thirdTable.innerHTML = `Tafel van ${tables[2]}`;
const thirdTableList = document.getElementById("tafel3List");
thirdTableList.innerHTML = calcTable(tables[2]).join("");

const fourthTable = document.getElementById("tafel4");
fourthTable.innerHTML = `Tafel van ${tables[3]}`;
const fourthTableList = document.getElementById("tafel4List");
fourthTableList.innerHTML = calcTable(tables[3]).join("");

function calcTable(table){
    tableList = []
    for (let i = 0; i < 11; i++){
        let answer = i * table;
        tableList.push(`${i} x ${table} = ${answer}<br/>`);
    }
    return tableList;
}