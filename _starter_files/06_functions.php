<?php
/*
 * PHP Functions Tutorial: 
 * 
 * This file introduces functions in PHP, which are blocks of code designed to perform a specific task.
 * Functions help organize your code, make it reusable, and easier to maintain. 
 * Instead of writing the same code multiple times, you can define a function once and call it whenever you need that task done.
 * 
 * - Function declaration and definition (The basic syntax).
 * - Function parameters and arguments => Passing information into functions.
 * - Return values => Getting results back from functions.
 * - Default parameters => Making parameters optional.
 * - Variable scope in functions =>  Understanding where variables are accessible.
 * - Anonymous functions => Functions without a name.
 * - Arrow functions (PHP 7.4+) => A concise way to write anonymous functions.
 * 
 */

// -------------------------------------------------------------------------------

// To define a function, you use the `function` keyword, followed by the function name, parentheses `()`, and curly braces `{}`.
// The code inside the curly braces is the function body.
function greeting() {
    echo "Hello. This is PHP document!<br>";
}

// To execute (call) a function, you simply write its name followed by parentheses.
greeting(); // This will run the code inside the sayHello() function.
greeting(); // You can call it multiple times.

// -------------------------------------------------------------------------------

// Function Parameters and Arguments => Functions can accept input values, called parameters.
// These parameters act like variables inside the function, allowing it to perform tasks based on the specific data you provide.

// When you call the function, the actual values you pass are called arguments.
// This function takes one parameter: $name.
function greet($name) {
    echo "Hello, " . $name . "!<br>";
}

greet("Khawla"); // "Alice" is the argument passed to the $name parameter.
greet("Alharthi");

// Functions can take multiple parameters.
function addNumbers($num1, $num2) {
    echo "The sum of " . $num1 . " and " . $num2 . " is: " . ($num1 + $num2) . "<br>";
}

addNumbers(10, 5); // Arguments: 10 and 5
addNumbers(2.5, 7.5);

// -------------------------------------------------------------------------------

// Return Values => Functions can not only perform actions but also calculate a value and send it back to the part of the code that called the function.
// This is done using the `return` statement.
// This function calculates a sum and returns the result.
function calculateSum($a, $b) {
    $sum = $a + $b;
    return $sum; // The value of $sum is sent back.
}

$result = calculateSum(100, 200); // The returned value (300) is stored in $result.
echo "The result of the calculation is: " . $result . "<br>";

echo "Double the sum of 7 and 3 is: " . (calculateSum(7, 3) * 2) . "<br>";

// A function stops execution as soon as a `return` statement is encountered.
function checkAge($age) {
    if ($age >= 18) {
        return "Adult";
    } else {
        return "Minor";
    }
    echo "This line will never be executed because of return statements above.";
}

echo "Status for age 20: " . checkAge(20) . "<br>";
echo "Status for age 15: " . checkAge(15) . "<br>";

// -------------------------------------------------------------------------------

// Default Parameter Values => You can assign default values to function parameters.
// If an argument is not provided for that parameter when the function is called, the default value will be used instead.
// $message has a default value of "Hello".
function sendMessage($user, $message = "Hello") {
    echo "To " . $user . ": " . $message . "<br>";
}

sendMessage("Emily"); // Uses default message: To Emily: Hello
sendMessage("David", "How are you?"); // Overrides default: To David: How are you?

// When using multiple parameters with defaults, optional parameters should be last.
function createGreeting($name, $timeOfDay = "morning", $punctuation = "!") {
    echo "Good " . $timeOfDay . ", " . $name . $punctuation . "<br>";
}

createGreeting("Khawla"); // Good morning, Sarah!
createGreeting("Fatima", "afternoon"); // Good afternoon, Tom!
createGreeting("Nama", "evening", "?"); // Good evening, Lisa?

// -------------------------------------------------------------------------------

// Variable Scope in Functions => Variables defined inside a function have local scope, meaning they are only accessible within that function.
// Variables defined outside functions have global scope.
$globalVar = "I am a global variable."; // Global scope

function testScope() {
    $localVar = "I am a local variable."; // Local scope
    echo $localVar . "<br>";
    // echo $globalVar; // This would cause an error: Undefined variable $globalVar

    // To access a global variable inside a function, use the `global` keyword
    // or the $GLOBALS superglobal array.
    global $globalVar;
    echo "Inside function, accessing global: " . $globalVar . "<br>";

    echo "Inside function, accessing global via \$GLOBALS: " . $GLOBALS["globalVar"] . "<br>";
}

testScope();

// -------------------------------------------------------------------------------

// Anonymous Functions (Closures) => functions without a specified name.
// They are often used as callback functions (passed as arguments to other functions) or assigned to variables.
// Assigning an anonymous function to a variable.
$sayGoodbye = function() {
    echo "Goodbye from an anonymous function!<br>";
};

$sayGoodbye(); // Call it like a regular function variable.

// Using an anonymous function as a callback (e.g., with array_map).
$numbers = [1, 2, 3, 4, 5];
$squaredNumbers = array_map(function($n) {
    return $n * $n;
}, $numbers);

echo "Original numbers: "; print_r($numbers); echo "<br>";
echo "Squared numbers: "; print_r($squaredNumbers); echo "<br>";

// Anonymous functions can inherit variables from the parent scope using `use`.
$multiplier = 10;
$multiplyByTen = function($num) use ($multiplier) {
    return $num * $multiplier;
};

echo "5 multiplied by 10: " . $multiplyByTen(5) . "<br>";

// -------------------------------------------------------------------------------

// Arrow Functions (PHP 7.4+) => provide a more concise syntax for anonymous functions that contain only a single expression.
// They implicitly capture variables from the parent scope by value.
// Syntax: `fn(parameters) => expression;`
$add = fn($a, $b) => $a + $b;
echo "Sum using arrow function: " . $add(8, 2) . "<br>";

// Implicitly captures variables from parent scope.
$factor = 2;
$double = fn($num) => $num * $factor;
echo "Double 7: " . $double(7) . "<br>";

// Using arrow function with array_filter.
$evenNumbers = array_filter($numbers, fn($n) => $n % 2 == 0);
echo "Even numbers: "; print_r($evenNumbers); echo "<br>";
?>