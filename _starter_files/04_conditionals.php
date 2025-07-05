<?php
/*
 * PHP Conditionals:
 *
 * This file introduces conditional statements in PHP, which allow your program
 * to make decisions and execute different blocks of code based on whether
 * certain conditions are true or false. This is fundamental for creating
 * dynamic and interactive applications.
 *
 * - Comparison Operators: Used to compare values (e.g., equal to, greater than).
 * - Logical Operators: Used to combine multiple conditions (e.g., AND, OR, NOT).
 * - If Statements: The basic structure for conditional execution.
 * - If-Else Statements: Executing one block of code if a condition is true, another if false.
 * - If-Elseif-Else Statements: Handling multiple possible conditions.
 * - Ternary Operator: A shorthand for simple if-else statements.
 * - Switch Statements: A cleaner way to handle multiple conditions based on a single variable.
 * - Null Coalescing Operator: A convenient way to check if a variable is set and not null.
 * - Match Expression (PHP 8+): A more modern and powerful alternative to switch.
 */

// -------------------------------------------------------------------------------

// Comparison operators are used to compare two values.
// The result of a comparison is always a Boolean (true or false).

$a = 10;
$b = 5;
$c = "10";

// == (Equal to): Checks if two values are equal.
echo "10 == 5: "; var_dump($a == $b); echo "<br>"; // false
echo "10 == \"10\": "; var_dump($a == $c); echo "<br>"; // true (PHP converts '10' to a number for comparison)

// === (Identical to): Checks if two values are equal AND of the same data type.
echo "10 === \"10\": "; var_dump($a === $c); echo "<br>"; // false (10 is integer, '10' is string)

// != (Not equal to): Checks if two values are not equal.
echo "10 != 5: "; var_dump($a != $b); echo "<br>"; // true

// !== (Not identical to): Checks if two values are not equal OR not of the same data type.
echo "10 !== \"10\": "; var_dump($a !== $c); echo "<br>"; // true

// < (Less than), > (Greater than), <= (Less than or equal to), >= (Greater than or equal to)
echo "10 > 5: "; var_dump($a > $b); echo "<br>"; // true
echo "5 <= 5: "; var_dump($b <= $b); echo "<br>"; // true

// <=> (Spaceship operator - PHP 7+): Returns -1 if left is less, 0 if equal, 1 if left is greater.
echo "10 <=> 5: "; var_dump($a <=> $b); echo "<br>"; // 1
echo "5 <=> 10: "; var_dump($b <=> $a); echo "<br>"; // -1
echo "10 <=> 10: "; var_dump($a <=> $a); echo "<br>"; // 0
$age = 20;
$salary = 300000;

// -------------------------------------------------------------------------------

//  Logical operators combine conditional statements.

$age = 18;
$hasLicense = true;
$isStudent = false;

// && (AND): Both conditions must be true.
// Example: Can drive if age is 18 or more AND has a license.
echo "Age >= 18 AND Has License: "; var_dump($age >= 18 && $hasLicense); echo "<br>"; // true

// || (OR): At least one condition must be true.
// Example: Eligible for discount if student OR age is less than 12.
echo "Is Student OR Age < 12: "; var_dump($isStudent || $age < 12); echo "<br>"; // false

// ! (NOT): Reverses the state of a condition (true becomes false, false becomes true).
echo "NOT Is Student: "; var_dump(!$isStudent); echo "<br>"; // true

// -------------------------------------------------------------------------------

// If Statements => The most basic conditional statement. Code inside the `if` block. 
// Only executes if the condition is true.
$temperature = 25;

if ($temperature > 20) {
    echo "It's a warm day!<br>";
}

$isRaining = false;
if (!$isRaining) {
    echo "It's not raining, enjoy outside!<br>";
}

// If-else statement => Provides an alternative block of code to execute if the `if` condition is false.
$score = 75;

if ($score >= 60) {
    echo "You passed the exam!<br>
";
} else {
    echo "You need to study more.<br>";
}

// If-elseif-else statement => Used when you have multiple conditions to check in sequence.
// PHP checks conditions from top to bottom and executes the first one that is true.
$grade = 88;

if ($grade >= 90) {
    echo "Grade: A<br>";
} elseif ($grade >= 80) {
    echo "Grade: B<br>"; // This will be executed because 88 is >= 80
} elseif ($grade >= 70) {
    echo "Grade: C<br>";
} else {
    echo "Grade: F<br>";
}

// -------------------------------------------------------------------------------

// Ternary operator => A shorthand way to write simple if-else statements. It's useful for assigning value to a variable based on a condition.
// Syntax: (condition) ? value_if_true : value_if_false;
$isLoggedIn = true;
$status = $isLoggedIn ? "Online" : "Offline";
echo "User Status: " . $status . "<br>"; // Outputs: User Status: Online

$ageForDriving = 17;
$message = ($ageForDriving >= 18) ? "Can drive" : "Cannot drive yet";
echo "Driving eligibility: " . $message . "<br>"; // Outputs: Driving eligibility: Cannot drive yet

// -------------------------------------------------------------------------------

// Switch statement => Used to perform different actions based on different conditions of a single variable.
// It's often cleaner than a long if-elseif-else chain when checking a variable against many possible values.
$dayOfWeek = "Wednesday";

switch ($dayOfWeek) {
    case "Monday":
        echo "Start of the week!<br>";
        break; // `break` is crucial to exit the switch after a match is found.
    case "Wednesday":
        echo "Mid-week!<br>";
        break;
    case "Friday":
        echo "Almost weekend!<br>";
        break;
    default:
        echo "Just another day.<br>"; // Executed if no other case matches.
        break;
}

$fruitColor = "red";
switch ($fruitColor) {
    case "red":
    case "green": // Multiple cases can lead to the same action if no break is used.
        echo "This fruit is either red or green.<br>";
        break;
    case "yellow":
        echo "This fruit is yellow.<br>";
        break;
}

// -------------------------------------------------------------------------------

// Null Coalescing Operator (?? - PHP 7+) => This operator is a convenient way to check if a variable is set and is not NULL.
// If it is, it returns that variable; otherwise, it returns a default value.
// It's a shorthand for `isset($var) ? $var : 'default_value';`
$username = $_GET["user"] ?? "Guest"; // If $_GET["user"] is not set or is null, $username becomes "Guest".
echo "Welcome, " . $username . "!<br>";

// Example with a variable that might not be defined
$favoriteColor = null;
$displayColor = $favoriteColor ?? "blue";
echo "Your favorite color is: " . $displayColor . "<br>"; // Outputs: Your favorite color is: blue

$favoriteColor = "green";
$displayColor = $favoriteColor ?? "blue";
echo "Your favorite color is: " . $displayColor . "<br>"; // Outputs: Your favorite color is: green

// -------------------------------------------------------------------------------

// Match Expression (PHP 8+) => The `match` expression is a newer, more powerful, and often cleaner alternative to `switch` statements.
// especially when you want to return a value based on a condition.
// It supports multiple conditions per arm, strict comparisons (===), and is an expression (returns a value).
$httpStatus = 200;

$statusMessage = match ($httpStatus) {
    200 => "OK",
    301, 302 => "Redirect", // Multiple values for one arm
    404 => "Not Found",
    500 => "Internal Server Error",
    default => "Unknown Status Code", // Required for match, handles all other cases
};

echo "HTTP Status " . $httpStatus . ": " . $statusMessage . "<br>";

$httpStatus = 404;
$statusMessage = match ($httpStatus) {
    200 => "OK",
    301, 302 => "Redirect",
    404 => "Not Found",
    500 => "Internal Server Error",
    default => "Unknown Status Code",
};

echo "HTTP Status " . $httpStatus . ": " . $statusMessage . "<br>";

// Match expression uses strict comparison (===) automatically.
$value = "10";
$typeDescription = match ($value) {
    10 => "Integer 10", // This will NOT match because $value is a string, not an integer
    "10" => "String \"10\"", // This will match
    default => "Other type or value",
};

echo "Value \"" . $value . "\" is: " . $typeDescription . "<br>";
?>