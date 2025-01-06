const array = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
const piramideAmount = prompt("Hoelang word de piramide(max 20)");
const piramideContainer = document.getElementById("piramide");
piramideContainer.innerHTML = makePiramide(array, piramideAmount).join("");

function makePiramide(array, piramideAmount){
    let piramide = [];
    let count = 0;
    for (let i = -1; i <= piramideAmount; i++){
        piramide.push(`${array.slice(0, count).join("")}<br/>`);
        count++;
    }
    return piramide;
}