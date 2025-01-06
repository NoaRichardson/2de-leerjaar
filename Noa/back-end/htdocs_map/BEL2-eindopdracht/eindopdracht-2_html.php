<?php
$foutmelding = "test";
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    echo "POst gedaan";
    if(!empty($_POST["1answer"])){
        echo "alles is goed!";
        $foutmelding = "";
    }
    else{
        $foutmelding = "Vul het veld in!";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Er heerst paniek</title>
</head>
<body>
    <h1>Mad Libs</h1>
    <div>
        <a href="eindopdracht-2.html">Er heerst paniek...</a>
        <a href="eindopdracht-2-onkunde.html">Onkunde</a>
    </div>
    <h2>Er heerst paniek...</h2>
    <form action="eindopdracht-2_html.php" method="POST">
        <label for="1question">Welk dier zou je nooit als huisdier willen hebben?</label>
        <input type="text" name="1answer"><br>
        <p><?php echo $foutmelding ?></p>
        <label for="2question">Wie is de belangrijkste persoon in je leven?</label>
        <input type="text" name="2answer" required><br>
        <label for="3question">In welk land zou je graag willen wonen?</label>
        <input type="text" name="3answer" required><br>
        <label for="4question">Wat doe je als je je verveelt?</label>
        <input type="text" name="4answer" required><br>
        <label for="5question">Met welk speelgoed speelde je als kind het meest?</label>
        <input type="text" name="5answer" required><br>
        <label for="6question">Bij welk docent spijbel je het liefst?</label>
        <input type="text" name="6answer" required><br>
        <label for="7question">Als je $100.000- had, wat zou je dan kopen?</label>
        <input type="text" name="7answer" required><br>
        <label for="8question">Wat is je favoriete bezigheid?</label>
        <input type="text" name="8answer" required><br>
        <input type="submit" value="Versturen">
    </form>
</body>
</html>