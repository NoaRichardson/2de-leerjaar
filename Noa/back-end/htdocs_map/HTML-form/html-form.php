<!DOCTYPE html>
<html>
<head>
    <title>PHP Form</title>
</head>
<body>

<?php
    $nameErr = $emailErr = "";
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if name and email fields are not empty
        if (!empty($_POST['name']) && !empty($_POST['email'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            echo "<p>Thank you, $name! Your email ($email) has been received.</p>";
        } elseif (empty($_POST["name"]) && empty($_POST["email"])){
            $nameErr = "Name is required";
            $emailErr = "Email is required";
        } elseif (empty($_POST["email"])){
            $emailErr = "Email is required";
        } elseif (empty($_POST["name"])){
            $nameErr = "Name is required";
        }
    }
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name">
    <span class="error">* <?php echo $nameErr;?></span><br><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email">
    <span class="error">* <?php echo $emailErr;?></span><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>

