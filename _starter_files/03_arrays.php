<?php
/*
 * PHP Arrays:
 *
 * This file introduces arrays in PHP, which are special variables that can
 * hold more than one value at a time. Think of an array as a list or a collection
 * where you can store multiple pieces of related information under a single name.
 *
 * We will cover:
 * - Indexed Arrays: Arrays where each item has a numeric index (starting from 0).
 * - Associative Arrays: Arrays where each item has a named key instead of a number.
 * - Multidimensional Arrays: Arrays that contain other arrays, useful for complex data.
 * - Array Creation: Different ways to create arrays.
 * - Accessing and Modifying Elements: How to get and change values in an array.
 * - Common Array Functions: Built-in PHP functions to manipulate arrays.
 */


// -------------------------------------------------------------------------------

// Indexed Array => Store values in a numbered, sequential order. 
// The first element is at index 0, the second at index 1, and so on.
// Method 1: Using `array()` constructor (older way)
$fruits = array("apple", "banana", "cherry");

// Method 2: Using square brackets `[]` (preferred, modern way)
$colors = ["red", "green", "blue"];

echo "My favorite fruit is: " . $fruits[0] . "<br>"; // Accessing the first element
echo "The second color is: " . $colors[1] . "<br>"; // Accessing the second element

// Adding elements to an indexed array:
// You can add an element to the end of the array without specifying an index.
$fruits[] = "grape"; // Adds 'grape' to the end
print_r($fruits); // Outputs: Array ( [0] => apple [1] => banana [2] => cherry [3] => grape )
echo "<br>";

// You can also assign a value to a specific index.
$colors[3] = "yellow";
print_r($colors); // Outputs: Array ( [0] => red [1] => green [2] => blue [3] => yellow )
echo "<br>";

// -------------------------------------------------------------------------------

// Associative Array => Use named keys (strings) instead of numeric indexes.
// This makes the array elements more descriptive and easier to understand.
// Method 1: Using `array()` constructor
$student = array(
    "name" => "Alice",
    "age" => 16,
    "grade" => "10th"
);

// Method 2: Using square brackets `[]` (preferred)
$book = [
    "title" => "The Great Adventure",
    "author" => "J. Doe",
    "year" => 2023
];

echo "Student Name: " . $student["name"] . "<br>";
echo "Book Title: " . $book["title"] . "<br>";

// Adding or modifying elements in an associative array:
$student["city"] = "New York"; // Adds a new key-value pair
$book["year"] = 2024; // Modifies an existing value
print_r($student); echo "<br>";
print_r($book); echo "<br>";

// -------------------------------------------------------------------------------

// Multi-dimensional Associative Array => is an array containing one or more arrays.
// This is useful for storing complex, structured data, like a table or a list of records.
// Example: A list of students, where each student is an associative array.
$class = [
    [
        "name" => "Alice",
        "age" => 16,
        "grade" => "10th"
    ],
    [
        "name" => "Bob",
        "age" => 15,
        "grade" => "9th"
    ],
    [
        "name" => "Charlie",
        "age" => 17,
        "grade" => "11th"
    ]
];

// Accessing elements in a multidimensional array:
// First, specify the index of the inner array, then the key/index within that inner array.
echo "Second student's name: " . $class[1]["name"] . "<br>"; // Accesses Bob's name
echo "Third student's grade: " . $class[2]["grade"] . "<br>"; // Accesses Charlie's grade

// -------------------------------------------------------------------------------

// Common Array Functions => PHP provides many built-in functions to work with arrays. Here are a few useful ones:
$numbers = [10, 20, 30, 40, 50];
$moreFruits = ["apple", "banana", "orange", "grape"];

// `count()`: Returns the number of elements in an array.
echo "Number of fruits: " . count($moreFruits) . "<br>";

// `in_array()`: Checks if a value exists in an array.
// Returns true (1) or false (empty string).
echo "Is 'banana' in fruits? " . (in_array("banana", $moreFruits) ? "Yes" : "No") . "<br>";
echo "Is 'kiwi' in fruits? " . (in_array("kiwi", $moreFruits) ? "Yes" : "No") . "<br>";

// `array_push()`: Adds one or more elements to the end of an array.
array_push($moreFruits, "mango", "pineapple");
echo "Fruits after push: "; print_r($moreFruits); echo "<br>";

// `array_pop()`: Removes the last element from an array.
$lastFruit = array_pop($moreFruits);
echo "Removed fruit: " . $lastFruit . ", Remaining fruits: "; print_r($moreFruits); echo "<br>";

// `array_unshift()`: Adds one or more elements to the beginning of an array.
array_unshift($moreFruits, "strawberry");
echo "Fruits after unshift: "; print_r($moreFruits); echo "<br>";

// `array_shift()`: Removes the first element from an array.
$firstFruit = array_shift($moreFruits);
echo "Removed fruit: " . $firstFruit . ", Remaining fruits: "; print_r($moreFruits); echo "<br>";

// `array_merge()`: Merges two or more arrays into one.
$vegetables = ["carrot", "potato"];
$food = array_merge($moreFruits, $vegetables);
echo "Merged food array: "; print_r($food); echo "<br>";

// `array_keys()`: Returns all the keys of an array.
$person = ["name" => "David", "age" => 20, "city" => "London"];
$keys = array_keys($person);
echo "Person keys: "; print_r($keys); echo "<br>";

// `array_values()`: Returns all the values of an array.
$values = array_values($person);
echo "Person values: "; print_r($values); echo "<br>";

// `sort()`: Sorts an indexed array in ascending order.
$unsortedNumbers = [5, 2, 8, 1, 9];
sort($unsortedNumbers);
echo "Sorted numbers: "; print_r($unsortedNumbers); echo "<br>";

// `asort()`: Sorts an associative array by value in ascending order, maintaining key-value association.
$grades = ["Alice" => 85, "Bob" => 92, "Charlie" => 78];
asort($grades);
echo "Sorted grades by value: "; print_r($grades); echo "<br>";

// `ksort()`: Sorts an associative array by key in ascending order.
ksort($grades);
echo "Sorted grades by key: "; print_r($grades); echo "<br>";

// `json_encode()`: Converts a PHP array (or other value) into a JSON string.
// JSON (JavaScript Object Notation) is a common format for data exchange.
$jsonStudent = json_encode($student);
echo "Student as JSON: " . $jsonStudent . "<br>";

// `json_decode()`: Converts a JSON string into a PHP variable (usually an object or array).
$jsonString = '{"product":"Laptop","price":1200,"inStock":true}';
$product = json_decode($jsonString); // By default, decodes to an object
echo "Product name from JSON object: " . $product->product . "<br>";

$productArray = json_decode($jsonString, true); // Pass true to decode to an associative array
echo "Product price from JSON array: " . $productArray["price"] . "<br>";
?>