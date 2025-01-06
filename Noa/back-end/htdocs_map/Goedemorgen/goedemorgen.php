<?php
$date = date("H:i");
$date = "06:00";
if ($date >= "18:00"){
    $image =  "evening";
    $goede = "avond";
}elseif ($date < "06:00"){
    $image = "night";
    $goede = "nacht";
}elseif ($date < "12:00"){
    $image = "morning";
    $goede = "morgen";
}elseif ($date < "18:00"){
    $image = "afternoon";
    $goede = "middag";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="goedemorgen.css">
    <title>Goedemorgen!</title>
</head>
<body class = "<?php echo $image ?>">
<h1 id="txt"><?php echo "Goede {$goede}!" ?></h1>
<h1 id="tijd"><?php echo "Het is nu {$date}" ?></h1>
</body>
</html>