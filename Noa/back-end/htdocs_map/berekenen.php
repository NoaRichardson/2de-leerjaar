<?php
function tafel($number_list){
    $list_tafel = [];
    foreach ($number_list as $number){
        for ($x = 0; $x <= 10; $x ++){
            $result = $number * $x;
            $tafel = "{$number} x {$x} = {$result}";
            array_push($list_tafel, $tafel);
        }
    }
    return $list_tafel;   
}

$number_list = [3, 5, 8, 12];
$result_tafel = tafel($number_list);
foreach ($result_tafel as $tafel){
    print_r ($tafel);
    echo "<br>";
}
?>