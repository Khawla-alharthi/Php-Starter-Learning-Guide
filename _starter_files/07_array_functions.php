<?php
/*
 * PHP Array Functions Tutorial:
 * 
 * This file explores various built-in PHP functions specifically designed to work with arrays.
 * These functions make it easy to manipulate, search, sort, and transform arrays, saving you a lot of coding effort.
 * 
 * - Basic Array Information => Getting size, checking existence.
 * - Adding/Removing Elements => Modifying arrays at the beginning or end.
 * - Merging and Combining Arrays => Joining multiple arrays.
 * - Key and Value Manipulation => Extracting keys or values.
 * - Sorting Arrays => Arranging elements in a specific order.
 * - Transforming Arrays => Applying functions to each element (map, filter, reduce).
 * 
 */

// -------------------------------------------------------------------------------

// Basic Array Information
$fruits = ["apple", "banana", "cherry", "date"];
$numbers = [10, 20, 30, 40, 50];

// `count()`: Returns the number of elements in an array.
echo "Number of fruits: " . count($fruits) . "<br>"; // Outputs: 4

// `sizeof()`: Alias of `count()`, works the same way.
echo "Number of numbers: " . sizeof($numbers) . "<br>"; // Outputs: 5

// `in_array(value, array)`: Checks if a specific value exists in an array.
// Returns `true` if found, `false` otherwise.
echo "Is \"banana\" in fruits? "; var_dump(in_array("banana", $fruits)); echo "<br>"; // Outputs: bool(true)
echo "Is \"grape\" in fruits? "; var_dump(in_array("grape", $fruits)); echo "<br>"; // Outputs: bool(false)

// `array_key_exists(key, array)`: Checks if a specific key (index or name) exists in an array.
$student = ["name" => "Alice", "age" => 16];
echo "Does key \"name\" exist? "; var_dump(array_key_exists("name", $student)); echo "<br>"; // Outputs: bool(true)
echo "Does key \"grade\" exist? "; var_dump(array_key_exists("grade", $student)); echo "<br>"; // Outputs: bool(false)

// -------------------------------------------------------------------------------

// Adding/Removing Elements => These functions allow you to dynamically change the size and content of your arrays.
$vegetables = ["carrot", "broccoli"];
print_r($vegetables); echo " (Original)<br>";

// `array_push(array, value1, value2, ...)`: Adds one or more elements to the end of an array.
array_push($vegetables, "spinach", "potato");
print_r($vegetables); echo " (After array_push)<br>"; // Outputs: Array ( [0] => carrot [1] => broccoli [2] => spinach [3] => potato )

// `array_pop(array)`: Removes and returns the last element of an array.
$lastVeg = array_pop($vegetables);
echo "Removed: " . $lastVeg . ", Remaining: "; print_r($vegetables); echo " (After array_pop)<br>"; // Outputs: Removed: potato, Remaining: Array ( [0] => carrot [1] => broccoli [2] => spinach )

// `array_unshift(array, value1, value2, ...)`: Adds one or more elements to the beginning of an array.
array_unshift($vegetables, "cucumber", "tomato");
print_r($vegetables); echo " (After array_unshift)<br>"; // Outputs: Array ( [0] => cucumber [1] => tomato [2] => carrot [3] => broccoli [4] => spinach )

// `array_shift(array)`: Removes and returns the first element of an array.
$firstVeg = array_shift($vegetables);
echo "Removed: " . $firstVeg . ", Remaining: "; print_r($vegetables); echo " (After array_shift)<br>"; // Outputs: Removed: cucumber, Remaining: Array ( [0] => tomato [1] => carrot [2] => broccoli [3] => spinach )

// `unset(array[key])`: Removes a specific element by its key. Note: This does not re-index numeric arrays.
$colors = ["red", "green", "blue", "yellow"];
unset($colors[1]); // Removes "green"
print_r($colors); echo " (After unset)<br>"; // Outputs: Array ( [0] => red [2] => blue [3] => yellow ) - Notice index 1 is missing.

// To re-index an array after `unset`, you can use `array_values()`.
$colors = array_values($colors);
print_r($colors); echo " (After array_values)<br>"; // Outputs: Array ( [0] => red [1] => blue [2] => yellow )

// -------------------------------------------------------------------------------

// Merging and Combining Arrays => These functions are used to create new arrays from existing ones.
$array1 = ["a", "b", "c"];
$array2 = ["d", "e", "f"];
$array3 = ["g", "h"];

// `array_merge(array1, array2, ...)`: Merges two or more arrays.
// If keys are numeric, values are appended. If keys are strings, later values overwrite earlier ones.
$mergedArray = array_merge($array1, $array2, $array3);
print_r($mergedArray); echo " (Merged)<br>"; // Outputs: Array ( [0] => a [1] => b [2] => c [3] => d [4] => e [5] => f [6] => g [7] => h )

$assoc1 = ["name" => "Alice", "age" => 16];
$assoc2 = ["age" => 17, "city" => "New York"];
$mergedAssoc = array_merge($assoc1, $assoc2);
print_r($mergedAssoc); echo " (Merged Associative)<br>"; // Outputs: Array ( [name] => Alice [age] => 17 [city] => New York ) - age is overwritten.

// Spread operator (`...` - PHP 7.4+): A concise way to merge arrays.
$spreadArray = [...$array1, ...$array2, "x", "y"];
print_r($spreadArray); echo " (Spread Operator)<br>"; // Outputs: Array ( [0] => a [1] => b [2] => c [3] => d [4] => e [5] => f [6] => x [7] => y )

// `array_combine(keys, values)`: Creates an associative array by using one array for keys and another for values.
$keys = ["brand", "model", "year"];
$values = ["Toyota", "Camry", 2023];
$car = array_combine($keys, $values);
print_r($car); echo " (Combined)<br>"; // Outputs: Array ( [brand] => Toyota [model] => Camry [year] => 2023 )

// -------------------------------------------------------------------------------

// Key and Value Manipulation => Functions to extract or manipulate the keys and values within an array.
$inventory = ["apple" => 10, "banana" => 5, "orange" => 12];

// `array_keys(array)`: Returns all the keys from an array.
$itemNames = array_keys($inventory);
print_r($itemNames); echo " (Keys)<br>"; // Outputs: Array ( [0] => apple [1] => banana [2] => orange )

// `array_values(array)`: Returns all the values from an array.
$itemQuantities = array_values($inventory);
print_r($itemQuantities); echo " (Values)<br>"; // Outputs: Array ( [0] => 10 [1] => 5 [2] => 12 )

// `array_flip(array)`: Exchanges all keys with their associated values in an array.
$flippedInventory = array_flip($inventory);
print_r($flippedInventory); echo " (Flipped)<br>"; // Outputs: Array ( [10] => apple [5] => banana [12] => orange )

// -------------------------------------------------------------------------------

// Sorting Arrays => PHP offers various functions to sort arrays based on values or keys, in ascending or descending order.
$unsortedNumbers = [5, 2, 8, 1, 9];
$unsortedNames = ["Charlie", "Alice", "Bob"];
$studentScores = ["Alice" => 85, "Bob" => 92, "Charlie" => 78];

// `sort(array)`: Sorts an indexed array in ascending order (A-Z, 0-9).
// Re-indexes the array.
sort($unsortedNumbers);
echo "Sorted Numbers: "; print_r($unsortedNumbers); echo "<br>"; // Outputs: Array ( [0] => 1 [1] => 2 [2] => 5 [3] => 8 [4] => 9 )

sort($unsortedNames);
echo "Sorted Names: "; print_r($unsortedNames); echo "<br>"; // Outputs: Array ( [0] => Alice [1] => Bob [2] => Charlie )

// `rsort(array)`: Sorts an indexed array in descending order (Z-A, 9-0).
$revNumbers = [5, 2, 8, 1, 9];
rsort($revNumbers);
echo "Reverse Sorted Numbers: "; print_r($revNumbers); echo "<br>"; // Outputs: Array ( [0] => 9 [1] => 8 [2] => 5 [3] => 2 [4] => 1 )

// `asort(array)`: Sorts an associative array by value in ascending order.
// Maintains key-value associations.
asort($studentScores);
echo "Scores (sorted by value, ascending): "; print_r($studentScores); echo "<br>"; // Outputs: Array ( [Charlie] => 78 [Alice] => 85 [Bob] => 92 )

// `arsort(array)`: Sorts an associative array by value in descending order.
// Maintains key-value associations.
$studentScores2 = ["Alice" => 85, "Bob" => 92, "Charlie" => 78];
arsort($studentScores2);
echo "Scores (sorted by value, descending): "; print_r($studentScores2); echo "<br>"; // Outputs: Array ( [Bob] => 92 [Alice] => 85 [Charlie] => 78 )

// `ksort(array)`: Sorts an associative array by key in ascending order.
ksort($studentScores);
echo "Scores (sorted by key, ascending): "; print_r($studentScores); echo "<br>"; // Outputs: Array ( [Alice] => 85 [Bob] => 92 [Charlie] => 78 )

// `krsort(array)`: Sorts an associative array by key in descending order.
$studentScores3 = ["Alice" => 85, "Bob" => 92, "Charlie" => 78];
krsort($studentScores3);
echo "Scores (sorted by key, descending): "; print_r($studentScores3); echo "<br>"; // Outputs: Array ( [Charlie] => 78 [Bob] => 92 [Alice] => 85 )

// -------------------------------------------------------------------------------

// Transforming Arrays (Map, Filter, Reduce) => These are powerful functional programming concepts that allow you to transform
// arrays in various ways without writing explicit loops.
$originalNumbers = [1, 2, 3, 4, 5];

// `array_map(callback, array)`: Applies a callback function to each element of an array
// and returns a new array containing the results.
$doubledNumbers = array_map(function($n) {
    return $n * 2;
}, $originalNumbers);
print_r($doubledNumbers); echo " (Doubled Numbers)<br>"; // Outputs: Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 [4] => 10 )

// Using an arrow function (PHP 7.4+)
$squaredNumbers = array_map(fn($n) => $n * $n, $originalNumbers);
print_r($squaredNumbers); echo " (Squared Numbers)<br>"; // Outputs: Array ( [0] => 1 [1] => 4 [2] => 9 [3] => 16 [4] => 25 )

// `array_filter(array, callback)`: Filters elements of an array using a callback function.
// Only elements for which the callback returns `true` are kept.
$evenNumbers = array_filter($originalNumbers, function($n) {
    return $n % 2 == 0;
});
print_r($evenNumbers); echo " (Even Numbers)<br>"; // Outputs: Array ( [1] => 2 [3] => 4 ) - Note: Keys are preserved.

// To re-index after filtering, use `array_values()`.
$evenNumbersReindexed = array_values($evenNumbers);
print_r($evenNumbersReindexed); echo " (Even Numbers Re-indexed)<br>"; // Outputs: Array ( [0] => 2 [1] => 4 )

// `array_reduce(array, callback, initial)`: Iteratively reduces the array to a single value
// using a callback function. The callback receives an accumulator and the current item.
$sumOfNumbers = array_reduce($originalNumbers, function($carry, $item) {
    return $carry + $item;
}, 0); // 0 is the initial value of $carry
echo "Sum of numbers: " . $sumOfNumbers . "<br>"; // Outputs: 15

$sentence = ["PHP", "is", "awesome"];
$combinedSentence = array_reduce($sentence, function($carry, $item) {
    return $carry . " " . $item;
}, "Start:"); // Initial value is "Start:"
echo "Combined sentence: " . $combinedSentence . "<br>"; // Outputs: Start: PHP is awesome
?>

