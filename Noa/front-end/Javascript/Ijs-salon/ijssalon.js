const icecream = {"bakje" : 0, "hoorntje" : 0, "liter": 0, "bollentjes": 0};
const icecreamFlavor = {"aardbei" : 0, "chocolade" : 0, "vanilla" : 0};
const toppings = {"topping" : 0};
const price = {"bolletjes" : 0.95, "bakje" : 0.75, "hoorntje" : 1.25, "liter" : 9.80};

var order = "y";
while (order == "y"){
    const clientKind = checkClient();
    if (clientKind == "1"){
        var icecreamAmount = askIcecreamAmount();
        var holder = askHolder(icecreamAmount);
        whichFlavor(icecreamAmount);
        whichTopping();
        order = continueOrder();
    }else if (clientKind == "2"){
        var icecreamLiters = askIcecreamLiters();
        whichFlavor(icecreamLiters);
        order = continueOrder();
    }
}
calcBon();

//FUNCTIONS
function checkClient(){
    while (true){
        var clientKind = prompt("Bent u 1) een particuliere klant of 2) een zakelijke klant?");
        if (clientKind == "1" || clientKind == "2"){
            return clientKind;
        }
        else{
            alert("sorry deze optie bestaat niet");
        }
    }
}

//Vraagt hoeveel bollentjes de klant wilt
function askIcecreamAmount(){
    while (true){
        var askAmount = prompt("Hoeveel bollentjes wilt u bestellen?");
        var icecreamAmount = parseInt(askAmount);
        if (icecreamAmount > 8){
            alert("Sorry we hebben geen bakjes zo groot")
        }else {
            icecream["bollentjes"] += icecreamAmount;
            return icecreamAmount;
        }
    }
}

//Vraagt hoeveel liters ijs de klant wilt
function askIcecreamLiters(){
    var askAmount = prompt("Hoeveel liters ijs wilt u bestelen?");
    askAmount = parseInt(askAmount);
    icecream["liter"] += askAmount;
    return askAmount;
}

//Vraagt of de klant een hoorntje of een bakje wilt
function askHolder(icecreamAmount){
    while (true){
        if (icecreamAmount < 4){
            var holder = prompt("Wilt u een hoorntje of een bakje?");
            if (holder == "hoorntje"){
                icecream["hoorntje"] += 1;
                return holder;
            } else if (holder == "bakje"){
                icecream["bakje"] += 1;
                return holder;
            } else {
                alert("Sorry dat is geen optie")
            }
        } else{
            var holder = "bakje";
            icecream["bakje"] += 1;
            return holder;
        }
    }
}

//Vraagt welke smaken de klant wilt
function whichFlavor(icecreamAmount){
    for (var i = 0; i < icecreamAmount; i++){
        var flavor = prompt("Welke smaak wilt u? A)aardbei C)chocola V)vanilla").toUpperCase();
        if (flavor == "A"){
            icecreamFlavor["aardbei"] += 1;
        } else if (flavor == "C"){
            icecreamFlavor["chocolade"] += 1;
        }else if (flavor == "V"){
            icecreamFlavor["vanilla"] += 1;
        }else {
            alert("Sorry we hebben dat niet")
            i--;
        }
    }
}

//Vraagt naar de topping
function whichTopping(){
    while (true){
        var topping = prompt("Wat voor topping wilt u? A)geen B)slagroom C)sprinkels D)caramel saus").toLocaleUpperCase();
        if (topping == "B") {
            toppings["topping"] += 1;
            break;
        } else if (topping == "C"){
            toppings["topping"] += 1;
            break;
        } else if (topping == "D"){
            toppings["topping"] += 1;
            break;
        } else if (topping == "A"){
            break;
        } else {
            alert("Sorry we hebben die optie niet")
        }
    }
}

//Vraagt of de klant meer wilt bestelen
function continueOrder(){
    while (true){
        var order = prompt("Wilt u nog iets bestelen y/n").toLowerCase();
        if (order == "y"){
            return order;
        } else if (order == "n"){
            return order;
        } else {
            alert("Sorry we hebben die optie niet");
        }
    }
}

//Bereken de bon
function calcBon(){
    //Totaal berekenen
    var bollentjesPrice = (icecream["bollentjes"] * price["bolletjes"]);
    var literPrice = (icecream["liter"] * price["liter"]);
    var bakjesPrice = (icecream["bakje"] * price["bakje"]);
    var hoorntjesPrice = (icecream["hoorntje"] * price["hoorntje"]);
    var toppingPrice = (toppings["topping"] * 0.50);
    //Bon
    document.write("Papi Galato Bon-------------<br>");
    document.write("bollentjes: " + icecream["bollentjes"] + " x " + price["bolletjes"] + " = " + bollentjesPrice + "<br>");
    document.write("Liters: " + icecream["liter"] + " x " + price["liter"] + " = " + literPrice + "<br>");
    document.write("Bakjes: " + icecream["bakje"] + " x " + price["bakje"] + " = " + bakjesPrice + "<br>");
    document.write("Hoorntjes: " + icecream["hoorntje"] + " x " + price["hoorntje"] + " = " + hoorntjesPrice + "<br>");
    document.write("Toppings: " + toppings["topping"] + " x  0,50  = " + toppingPrice + "<br>");
}