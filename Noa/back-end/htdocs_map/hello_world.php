<?php
    echo "<h1>Hello World</h1>";
    define("test", "<h1>Hello World</h1>");
    echo test;
    $txt = "Learning PHP";
    $txt = test;
    echo $txt;
    $txt1 = "Hello";
    $txt2 = "World";
    echo "<h1>{$txt1} {$txt2}</h1>";
    $text_list = ["Hello", "World"];
    echo "<h1>{$text_list[0]} {$text_list[1]}</h1>"
?>