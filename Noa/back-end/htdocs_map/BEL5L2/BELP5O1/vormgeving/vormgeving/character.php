<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "characters";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if (isset($_GET['id'])){
    $sql = $conn->prepare("SELECT * FROM characters WHERE id = :id");
    $id = $_GET['id'];
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    if ($row){?>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>All characters</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="resources/css/style.css" rel="stylesheet"/>
    </head>
    <body>

        <header><h1><?php echo $row["name"] ?></h1>
            <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a>
        </header>
        <div id=container>
            <div class=detail>
                <div class=left>
                    <img class=avatar src=resources/images/<?php echo $row["avatar"] ?>>
                    <div class="stats" style="background-color: <?php echo $row["color"] ?>">
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-heart"></i></span><?php echo $row["health"] ?></li>
                            <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span><?php echo $row["attack"] ?></li>
                            <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span><?php echo $row["defense"] ?></li>
                        </ul>
                        <ul class="gear">
                            <li><b>Weapon</b>: <?php echo $row["weapon"] ?></li>
                            <li><b>Armor</b>: <?php echo $row["armor"] ?></li>
                        </ul>
                    </div>
                </div>
                <div class=right>
                    <p><?php echo $row["bio"] ?></p>
                </div>
                <div style=clear: both></div>
            </div>
        </div>
        <footer>&copy; [jenaam] 2023</footer>
    </body>
    <?php } else { ?>
        echo "Geen resultaten gevonden voor ID $id";
    <?php } ?>
<?php } else {
    echo "Geen ID opgegeven";
}?>