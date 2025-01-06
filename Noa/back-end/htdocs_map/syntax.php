<?php
function lijst_optellen($numbers) {
    $sum = 0;
    foreach ($numbers as $number) {
        if ($number % 2 == 0){
            $sum += $number;  
        }

    }
    return $sum."<br>";

}

$getallenLijst = [1, 2, 3, 4];
$result = lijst_optellen($getallenLijst);
echo $result;

function langste_woord($woorden){
    $woorden_list = [];
    foreach ($woorden as $woord) {
        array_push($woorden_list, strlen($woord));
    }
    $langste_woord = max($woorden_list);
    foreach ($woorden as $woord){
        if (strlen($woord) == $langste_woord){
            return $woord;
        }
    }

}
$woordenlijst = ['kat', 'hond', 'olifant'];
$result_woorden = langste_woord($woordenlijst);
echo $result_woorden. "<br>";


function l($text = ''){
    echo $text;
    echo '<br>';
}

function getallen_sorteren($random_getallen){
    $count = count($random_getallen);
    $gesorteerde_lijst = [];
    for ($x = 0; $x < $count; $x ++){
        $kleinste_getal = min($random_getallen);
        array_push($gesorteerde_lijst, $kleinste_getal);
        $key = array_search($kleinste_getal, $random_getallen); 
       array_splice($random_getallen, $key, 1);      
        
    }
    return $gesorteerde_lijst;
}

$random_getallen = [3, 1, 4, 2];
$result_orderen = getallen_sorteren($random_getallen);
print_r($result_orderen);
echo "<br>";

function gcd($num1, $num2){
    return ($num1 % $num2) ? gcd($num2,$num1 % $num2) : $num2;
}

$num1 = 8;
$num2 = 12;
$result_gcd = gcd($num1, $num2);
echo $result_gcd;
?>