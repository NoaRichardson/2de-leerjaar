<?php 
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=webshop", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOExpection $e){
    echo "connection failed:" . $e ->getMessage();
    exit();
}

$merk = $_GET['merk'];
$kleur = $_GET['kleur'];
$naam = $_GET['naam'];
$kenteken = $_GET['kenteken'];


$stmt = $conn->prepare("INSERT INTO cars (id, merk, kleur, naam, kenteken) VALUES (NULL, '$merk', '$kleur', '$naam', '$kenteken')");
$stmt->execute();

echo 'succes!'
?>