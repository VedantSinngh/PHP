<?php
    // variable = a reusable container that  holds data 
    // String, integer , float , boolean , array , object , null
    $name = "John"; // String
    // $ to declare a variable
    echo $name;
    echo "<br>";
    $age = 25; // Integer
    echo $age;
    echo "<br>";
    $height = 5.9; // Float
    echo $height;
    echo "<br>";
    $is_student = true; // Boolean
    echo $is_student; // 1 for true and nothing for false
    echo "<br>";
    $fruits = array("Apple", "Banana", "Orange"); // Array
    echo $fruits[0]; // Accessing array element
    echo "<br>";
    $person = array("name" => "Alice", "age" => 30); // Associative Array
    echo $person["name"]; // Accessing associative array element
    echo "<br>";
    $car = null; // Null
    echo $car; // Nothing will be printed
    echo "<br>";
    
?>