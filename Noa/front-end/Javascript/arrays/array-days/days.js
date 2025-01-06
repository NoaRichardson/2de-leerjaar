const allDays = ["maandag", "dinsdag", "woensdag", "donderdag", "vrijdag", "zaterdag", "zondag"];
//All days
const weekDays = document.getElementById("line1");
weekDays.innerHTML = allDays;
const weekDaysR = document.getElementById("line4");
weekDaysR.innerHTML = allDays.slice().reverse();
//Work days
const workDays = document.getElementById("line2");
workDays.innerHTML = allDays.slice(0,5);
const workDaysR = document.getElementById("line5");
workDaysR.innerHTML = allDays.slice(0,5).reverse();
//Weekend
const weekend = document.getElementById("line3");
weekend.innerHTML = allDays.slice(5);
const weekendR = document.getElementById("line6");
weekendR.innerHTML= allDays.slice(5).reverse();