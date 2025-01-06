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

$sql = "SELECT COUNT(*)as count FROM characters";
$result = $conn->query($sql);
$count = 0;

$test = "SELECT COUNT(*) FROM characters";
$rows = $conn->query($test);
$num_rows = $rows->fetchColumn();

if ($num_rows > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $count = $row['count'];
} else {
    echo "0 results";
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All characters</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
    <header>
        <h1>Alle <?php echo $count ?> characters uit de database.</h1>
    </header>
    <?php

    $sql = "SELECT * FROM characters ORDER BY name asc";
    $result = $conn->query($sql);
    ?>
    <div id=container>
        <?php if ($num_rows > 0){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)){?>
                <a class="item" href= "character.php?id=<?= $row["id"] ?>">
                    <div class="left">
                        <img class="avatar" src="resources/images/<?php echo $row["avatar"] ?>">
                    </div>
                    <div class="right">
                        <h2><?php echo $row["name"]?></h2>
                        <div class="stats">
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?php echo $row["health"] ?></li>
                                <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?php echo $row["attack"] ?></li>
                                <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?php echo $row["defense"] ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="detailButton"><i class="fas fa-search"></i> bekijk</div>
                </a>
            <?php }?>
        <?php }?>
    </div>
    <footer>&copy; [jenaam] 2023</footer>
</body>
</html>