var games = [
    {
        "title": "Counter-Strike: Global Offensive",
        "price": 0.00,
        "genre": "FPS",
        "rating": 4
    },
    {
        "title": "Dota 2",
        "price": 0.00,
        "genre": "MOBA",
        "rating": 3
    },
    {
        "title": "Goose Goose Duck",
        "price": 4.99,
        "genre": "Action",
        "rating": 2
    },
    {
        "title": "Apex Legends",
        "price": 0.00,
        "genre": "FPS",
        "rating": 4
    },
    {
        "title": "PUBG: BATTLEGROUNDS",
        "price": 29.99,
        "genre": "FPS",
        "rating": 5
    },
    {
        "title": "Lost Ark",
        "price": 49.99,
        "genre": "Action",
        "rating": 1
    },
    {
        "title": "Grand Theft Auto V",
        "price": 29.99,
        "genre": "FPS",
        "rating": 3
    },
    {
        "title": "Call of Duty®: Modern Warfare® II | Warzone™ 2.0",
        "price": 19.99,
        "genre": "FPS",
        "rating": 3
    },
    {
        "title": "Team Fortress 2",
        "price": 0.00,
        "genre": "FPS",
        "rating": 5
    },
    {
        "title": "Rust",
        "price": 39.99,
        "genre": "Action",
        "rating": 5
    },
    {
        "title": "Unturned",
        "price": 0.00,
        "genre": "RPG",
        "rating": 1
    },
    {
        "title": "ELDEN RING",
        "price": 59.99,
        "genre": "RPG",
        "rating": 5
    },
    {
        "title": "ARK: Survival Evolved",
        "price": 10.00,
        "genre": "RPG",
        "rating": 1
    },
    {
        "title": "War Thunder",
        "price": 0.00,
        "genre": "Simulation",
        "rating": 2
    },
    {
        "title": "Sid Meier's Civilization VI",
        "price": 29.99,
        "genre": "Simulation",
        "rating": 3
    },
    {
        "title": "Football Manager 2023",
        "price": 59.99,
        "genre": "Simulation",
        "rating": 3
    },
    {
        "title": "Warframe",
        "price": 0.00,
        "genre": "Looter-shooter",
        "rating": 3
    },
    {
        "title": "EA SPORTS™ FIFA 23",
        "price": 59.99,
        "genre": "Sport",
        "rating": 1
    },
    {
        "title": "Destiny 2",
        "price": 0.00,
        "genre": "FPS",
        "rating": 5
    },
    {
        "title": "Red Dead Redemption 2",
        "price": 59.99,
        "genre": "RPG",
        "rating": 4
    },
    {
        "title": "Tom Clancy's Rainbow Six Siege",
        "price": 19.99,
        "genre": "Simulation",
        "rating": 3
    },
    {
        "title": "The Witcher 3: Wild Hunt",
        "price": 39.99,
        "genre": "RPG",
        "rating": 4
    },
    {
        "title": "Terraria",
        "price": 9.99,
        "genre": "Sandbox",
        "rating": 2
    },
    {
        "title": "Stardew Valley",
        "price": 14.99,
        "genre": "Sandbox",
        "rating": 1
    },
    {
        "title": "Left 4 Dead 2",
        "price": 9.99,
        "genre": "FPS",
        "rating": 4
    },
    {
        "title": "Don't Starve Together",
        "price": 5.09,
        "genre": "RPG",
        "rating": 3
    },
    {
        "title": "MIR4",
        "price": 19.99,
        "genre": "RPG",
        "rating": 3
    },
    {
        "title": "PAYDAY 2",
        "price": 9.99,
        "genre": "Action",
        "rating": 2
    },
    {
        "title": "Path of Exile",
        "price": 0.00,
        "genre": "RPG",
        "rating": 4
    },
    {
        "title": "Project Zomboid",
        "price": 14.99,
        "genre": "Simulation",
        "rating": 4
    },
    {
        "title": "Valheim",
        "price": 19.99,
        "genre": "Sandbox",
        "rating": 5
    },
    {
        "title": "DayZ",
        "price": 44.99,
        "genre": "Simulation",
        "rating": 3
    }
]

var prijs = ['0.00','4.99','29.99','49.99','19.99','39.99','59.99','10.00','19.99','9.99','14.99','5.09','44.99']
var genre = ['FPS','MOBA','action','rpg','simulation','looter-shooter','sport','sandbox']
var rating = ['1','2','3','4','5']
var lijst_winkelmand = []
lijst_geschikte_games = []
var berekenknop;
var container = document.getElementById("container")
container.style.textAlign = "center"

function displaygame(lijst, show_buttons,verwijder_button){
    container.innerHTML = ""
    lijst.forEach(function(lijst, index){
        var line = document.createElement("p")
        for (var key in lijst){
            line.textContent += key + " : " + lijst[key] + " ";
            container.appendChild(line);
        }
        if(show_buttons == true){
            var btn = document.createElement("button")
            btn.setAttribute("class", "btn")
            btn.setAttribute("id", "winkelmand_" + index)
            btn.setAttribute("data-index", index)
            btn.textContent = "Winkelmandje"
            container.appendChild(btn)
        }
        else if(verwijder_button == true){
            console.log("ik maak de verwijder knop")
            var verwijderbtn = document.createElement("button")
            verwijderbtn.setAttribute("class", "btn")
            verwijderbtn.setAttribute("id", "verwijder_" + index)
            verwijderbtn.setAttribute("data-index", index)
            verwijderbtn.textContent = "verwijder"
            container.appendChild(verwijderbtn)
        }
        container.style.border = "3px solid black"
    })
}

displaygame(games, true, false)
container.addEventListener("click", function(e){
    if(e.target && e.target.id.startsWith("winkelmand_")){
        var gameIndex = parseInt(e.target.getAttribute("data-index"))
        var add_to_cart = prompt("wil je de game aan je winkelmandje toevoegen")
        if (add_to_cart && add_to_cart.toLowerCase() === "ja"){
            if(lijst_geschikte_games.length >= 1){
                lijst_winkelmand.push(lijst_geschikte_games[gameIndex])
            }
            else{
                lijst_winkelmand.push(games[gameIndex])
            }
            console.log(lijst_winkelmand)
        }
    }
    else if(e.target && e.target.id.startsWith("verwijder_")){
        console.log("ik ben in de verwijder button")
        var gameIndex = parseInt(e.target.getAttribute("data-index"))
        var verwijder_cart = prompt("wil je de game van je winkelmandje verwijderen?")
        console.log(gameIndex)
        if(verwijder_cart && verwijder_cart.toLowerCase() === "ja"){
            lijst_winkelmand.splice(gameIndex,1)
        }
        console.log(lijst_winkelmand)
    }
})

function handle_click(e){
    if(e.target.id == 'prijsknop'){
        gevraagde_prijs = prompt("vul de prijs in waarvan je games wil zien die goedkoper zijn")
        games.forEach(function(games){
            console.log("Clicked element ID: " + e.target.id);
            if(games['price'] <= gevraagde_prijs){
                lijst_geschikte_games.push(games)
            }
            console.log(lijst_geschikte_games)
            displaygame(lijst_geschikte_games,true,false)
        })
    }
    else if(e.target.id == 'genreknop'){
        lijst_geschikte_games = []
        console.log("Clicked element ID: " + e.target.id);
        gevraagde_genre = document.getElementById("genreknop")
        console.log(gevraagde_genre)
        genre_value = gevraagde_genre.value
        console.log(genre_value)
        lijst_geschikte_games = [];
        games.forEach(function(games){
            if(games['genre'].toLowerCase() == genre_value.toLowerCase()){
                lijst_geschikte_games.push(games)
            }
            console.log(lijst_geschikte_games)
            displaygame(lijst_geschikte_games,true,false)
        })
    }
    else if(e.target.id == 'ratingknop'){
        console.log("Clicked element ID: " + e.target.id);
        gevraagde_rating = prompt("vul de rating in waar je de games van wil zien die een lagere rating hebben")
        games.forEach(function(games){
            if(games['rating'] <= gevraagde_rating){
                lijst_geschikte_games.push(games)
            }
            console.log(lijst_geschikte_games)
            displaygame(lijst_geschikte_games,true,false)
        })
    }
    else if(e.target.id == 'show_winkelmand'){
        displaygame(lijst_winkelmand, false,true);
        console.log("Clicked element ID: " + e.target.id);
        berekenknop = document.createElement("button")
        berekenknop.textContent = "bereken de totale prijs"
        berekenknop.setAttribute("id", "berekenknop")
        berekenknop.onclick = handle_click;
        container.appendChild(berekenknop)
    }
    else if(e.target.id == 'berekenknop'){
        console.log("Clicked element ID: " + e.target.id);
        uiteindelijke_prijs = 0
        console.log(lijst_winkelmand)
        lijst_winkelmand.forEach(function(lijst_winkelmand){
            uiteindelijke_prijs += parseFloat(lijst_winkelmand["price"])
            console.log(lijst_winkelmand["price"])
        })
        console.log(uiteindelijke_prijs + "uiteindelijke prijs")
        var prijslijn = document.createElement("p")
        prijslijn.textContent = "de uiteindelijke prijs: " + uiteindelijke_prijs
        container.appendChild(prijslijn)
    }
}

prijsknop.onclick = handle_click;
genreknop.onclick = handle_click;
ratingknop.onclick = handle_click;
show_winkelmand.onclick = handle_click;