const person = {
    "voornaam": "Piet",
    "achternaam": "Heijn",
    "nationaliteit": "Nederlandse",
    "leeftijd": 47,
    "gewicht": 86
 };

const personInfo = document.getElementById("piet");
personInfo.innerHTML = person.voornaam + "," + person.achternaam + "," + person.nationaliteit + "," + person.leeftijd + "," + person.gewicht;