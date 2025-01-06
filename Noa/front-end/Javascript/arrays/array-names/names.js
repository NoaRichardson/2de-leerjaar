let nameList = getNames();
let nameListR = [];
nameListR = nameList.slice().reverse();

const listName = document.getElementById("listName");
const listNameR = document.getElementById("listNameR");
listName.innerHTML = nameList;
listNameR.innerHTML = nameListR;

function getNames(){
    let names = [];
    const nameAmount = prompt("Hoeveel namen wilt u in de array stoppen? (minimaal 3)");
    if (nameAmount < 3){
        alert("You need to fill atleast 3 in");
    }
    else{
        for (let i = 0; i < nameAmount; i++){
            let name = prompt("Write a name");
            names.push(name);
        }
    }
    return names;
}