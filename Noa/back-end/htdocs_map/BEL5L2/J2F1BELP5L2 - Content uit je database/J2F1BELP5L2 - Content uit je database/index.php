<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamische Content</title>
    <link rel="stylesheet" href="style/style.css">

</head>
<body>
    <?php
        include('./includes/header.php');
    ?>

    <div class="content">
        <?php
        // Connectie met de database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "databank_php";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if(isset($_GET['view'])) {
            $pagina = $_GET['view'];
            // Voer een query uit om de inhoud van de database op te halen op basis van de URL-parameter
            $sql = "SELECT * FROM onderwerpen WHERE name='$pagina'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<h2>" . $row["name"]. "</h2>";
                    echo "<p>" . $row["description"]. "</p>";
                    echo "<img src='images/" . $row["image"]. "' alt='" . $row["name"]. "'>";
                }
            } else {
                echo "Geen resultaten gevonden voor $pagina";
                echo "Geen resultaten gevonden voor $pagina";
            }
        }


        $conn->close();
        ?>
    </div>

    <?php
        include('./includes/footer.php');
    ?>
</body>
</html>