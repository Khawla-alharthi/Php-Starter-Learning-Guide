<?php
/*
 * PHP Loops Tutorial:
 * This file introduces loops in PHP, which are control structures that allow
 * you to execute a block of code repeatedly. Loops are incredibly useful for
 * tasks that involve processing lists of data, repeating actions, or iterating
 * through collections.
 * - For loops => Used when you know exactly how many times you want to loop.
 * - While loops => Used when you want to loop as long as a condition is true.
 * - Do-while loops => Similar to `while`, but guarantees the loop body executes at least once.
 * - Foreach loops => Specifically designed for iterating over arrays and objects.
 * - Loop control statements (break, continue) => `break` (to exit a loop) and `continue` (to skip an iteration).
 * - Nested loops => Loops inside other loops.
 * 
 */

// -------------------------------------------------------------------------------

// The `for` loop is used when you know in advance how many times the script should run.
// It has three parts in its parentheses, separated by semicolons:
// 1. Initialization: `($i = 0)` - Sets up the counter variable (runs once at the start).
// 2. Condition: `($i < 10)` - The loop continues as long as this condition is true.
// 3. Increment/Decrement: `($i++)` - Changes the counter after each iteration.
for ($i = 0; $i < 5; $i++) {
    echo "The number is: " . $i . "<br>";
}

echo "<p>Example: Counting down from 5</p>";
for ($j = 5; $j > 0; $j--) {
    echo "Countdown: " . $j . "<br>";
}

// -------------------------------------------------------------------------------

// The `while` loop executes a block of code as long as a specified condition is true.
// The condition is checked *before* each iteration.
$counter = 0;
while ($counter < 5) {
    echo "While loop count: " . $counter . "<br>";
    $counter++; // Important: Don't forget to change the condition, or you'll have an infinite loop!
}

echo "<p>Example: Finding the first number divisible by 7</p>";
$num = 1;
while ($num % 7 !== 0) {
    $num++;
}
echo "The first number divisible by 7 is: " . $num . "<br>";

// -------------------------------------------------------------------------------

// The `do-while` loop is similar to the `while` loop, but it guarantees that the block of code will be executed at least once,
//  because the condition is checked *after* the first iteration.
$k = 0;
do {
    echo "Do-while loop count: " . $k . "<br>";
    $k++;
} while ($k < 5);

// Example where do-while runs once even if condition is false initially
$x = 10;
do {
    echo "This will run once, even though x is not less than 5. x = " . $x . "<br>";
    $x++;
} while ($x < 5);

// -------------------------------------------------------------------------------

// The `foreach` loop is specifically designed to iterate over elements in arrays and objects.
// It's the easiest and most readable way to loop through collections.

// Example 1: Iterating over an indexed array
$students = ["Alice", "Bob", "Charlie", "David"];
echo "<h3>Iterating over Indexed Array:</h3>";
foreach ($students as $student) {
    echo "Student Name: " . $student . "<br>";
}

// Example 2: Iterating over an associative array (key-value pairs)
$grades = [
    "Alice" => 95,
    "Bob" => 88,
    "Charlie" => 72,
    "David" => 91
];
echo "<h3>Iterating over Associative Array:</h3>";
foreach ($grades as $name => $score) {
    echo $name . " scored: " . $score . "<br>";
}

// Example 3: Getting both index and value in an indexed array
echo "<h3>Iterating with Index and Value:</h3>";
foreach ($students as $index => $studentName) {
    echo "Index " . $index . ": " . $studentName . "<br>";
}

// Example 4: Iterating over a multidimensional array
$products = [
    ["name" => "Laptop", "price" => 1200],
    ["name" => "Mouse", "price" => 25],
    ["name" => "Keyboard", "price" => 75]
];
echo "<h3>Iterating over Multidimensional Array:</h3>";
foreach ($products as $product) {
    echo "Product: " . $product["name"] . " - Price: $" . $product["price"] . "<br>";
}

// -------------------------------------------------------------------------------

// Loop Control Statements (`break` and `continue`)
// These statements allow you to control the flow of execution within a loop.

// `break`: Immediately exits the current loop.
echo "<h3>Using `break`:</h3>";
for ($i = 0; $i < 10; $i++) {
    if ($i == 5) {
        echo "Breaking loop at 5!<br>";
        break; // The loop stops here.
    }
    echo "Number: " . $i . "<br>";
}

// `continue`: Skips the rest of the current iteration and moves to the next one.
echo "<h3>Using `continue`:</h3>";
for ($i = 0; $i < 10; $i++) {
    if ($i % 2 == 0) {
        continue; // Skips even numbers, only odd numbers will be echoed.
    }
    echo "Odd Number: " . $i . "<br>";
}

// -------------------------------------------------------------------------------

// Nested Loops is a loop inside another loop. This is useful for tasks like working with grids, matrices, or combinations of items.
// Example: Creating a multiplication table (simplified)
echo "<h3>Multiplication Table (up to 3x3):</h3>";
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= 3; $j++) {
        echo $i . " x " . $j . " = " . ($i * $j) . "<br>";
    }
}

// Example: Displaying elements from a multidimensional array using nested foreach
echo "<h3>Displaying Class Data:</h3>";
$classData = [
    ["name" => "Student A", "score" => 85],
    ["name" => "Student B", "score" => 92],
    ["name" => "Student C", "score" => 78]
];

foreach ($classData as $studentRecord) {
    echo "Student: " . $studentRecord["name"] . ", Score: " . $studentRecord["score"] . "<br>";
}
?>
