<?php
/*
 * PHP Variables:
 *
 * This file introduces the concept of variables in PHP, which are essential
 * for storing and manipulating data in your programs. Think of a variable
 * as a named container that holds a piece of information.
 *
 * - Variable Declaration: How to create variables in PHP.
 * - Data Types: The different kinds of data PHP variables can hold (e.g., text, numbers).
 * - Variable Naming Rules: Important rules for naming your variables.
 * - Constants: Special variables whose values cannot change.
 * - String Concatenation: Combining text strings.
 * - Variable Scope: Where a variable can be accessed in your code.
*/

/* ---------- Variables & Data Types ---------- */

/*
 * In PHP, all variable names must start with a dollar sign ($).
 * This is how PHP distinguishes variables from other elements in your code.
*/

// -------------------------------------------------------------------------------
// Declaring a variable named 'greeting' and assigning it a text value (string).
$greeting = "Hello, This is PHP document!";
echo $greeting; // Outputs: Hello, Class!


/* ---- Data Types ---- */

/*
 * PHP is a loosely typed language, meaning you don't have to explicitly
 * declare the data type of a variable. PHP automatically determines it
 * based on the value you assign. Here are some common data types:
 *
 * - String: Text (e.g., "Hello", 'World')
 * - Integer: Whole numbers (e.g., 10, -5, 0)
 * - Float (or Double): Numbers with decimal points (e.g., 3.14, 0.5)
 * - Boolean: True or False values
 * - Array: A collection of multiple values
 * - Object: An instance of a class (more on this in OOP)
 * - NULL: A variable with no value assigned
*/

// String - Can be enclosed in single or double quotes.
$studentName = "Khawla"; // Double quotes
$courseName = 'Introduction to PHP'; // Single quotes
// String Concatenation (.) => used to connect the strings.
echo "Student Name: " . $studentName . "</br>" . "Course: " . $courseName . "</br>";

// Integer - Whole numbers
$age = 35;
$negative = -3;
echo "Age: " . $age . "<br>";

// Float - Decimal numbers
$gpa = 3.86;
echo "GPA: " . $gpa . "<br>";

// Boolean (true or false)
$isEnrolled = true; // Represents true
// When echoed, true often appears as '1' and false as '' (nothing).
echo "Is Enrolled: " . ($isEnrolled ? 'Yes' : 'No') . "<br>";

// NULL (no value)
$emptyVariable = null;
echo "Empty Variable (should show nothing): " . $emptyVariable . "<br>";

// Array (collection of values) - We'll cover arrays in more detail later.
$fruits = ["apple", "berry", "orange"];
echo "First fruit: " . $fruits[0] . "<br>"; // Arrays are zero-indexed

// You can check the type of a variable using `gettype()` or `var_dump()`.
echo "<p>Checking data types:</p>";
var_dump($studentName); echo "<br>";
var_dump($age); echo "<br>";
var_dump($gpa); echo "<br>";
var_dump($isEnrolled); echo "<br>";
var_dump($fruits); echo "<br>";
var_dump($emptyVariable); echo "<br>";

// Object - Instance of a class
$person = new stdClass();
$person->first = 'Khawla';
$person->email = 'Khawla@gmail.com';
$person->age = 23;

// Resource - Special variable that holds a reference to an external resource
$file = fopen('sample.txt', 'r');

// -------------------------------------------------------------------------------
/*
 * Variable Naming Rules
 * Good variable names make your code easier to read and understand.
 * Follow these rules:
 * - Must start with a letter (a-z, A-Z) or an underscore (_).
 * - Cannot start with a number.
 * - Can contain letters, numbers, and underscores.
 * - Are case-sensitive ($name is different from $Name).
 * - Avoid using reserved keywords (like `echo`, `if`, `for`) as variable names.
 */

$validName = "This is valid";
$_anotherValidName = "Also valid";
$name123 = "Contains numbers, valid";
echo "Valid Name: " . $validName . "<br>";
// $1invalidName = "Cannot start with a number"; // This would cause a PHP error!
// $my-name = "Hyphens are not allowed"; // This would cause a PHP error!

// -------------------------------------------------------------------------------

/*
 * Constants
 * Constants are like variables, but once they are defined, their value
 * cannot be changed during the script's execution. They are often used for
 * values that remain fixed, like a website's name or a mathematical constant.
 *
 * - Defined using `define()` function or `const` keyword.
 * - By convention, constant names are usually in UPPERCASE.
 */

// Defining a constant using define()
define("SCHOOL_NAME", "My Awesome School");
define("MAX_STUDENTS", 100);

echo "School Name: " . SCHOOL_NAME . "<br>";
echo "Maximum Students: " . MAX_STUDENTS . "<br>";

// Defining a constant using const (available from PHP 5.3, preferred for class constants)
const PI_VALUE = 3.14159;
echo "Value of Pi: " . PI_VALUE . "<br>";

// Trying to change a constant will result in an error.
// define("SCHOOL_NAME", "New School Name"); // This would cause a PHP error!

// -------------------------------------------------------------------------------

/*
 * String Concatenation
 * Concatenation means joining two or more strings together to form a single string.
 * In PHP, the dot (`.`) operator is used for string concatenation.
 */

$firstName = "Khawla";
$lastName = "Alharthi";

// Using the dot operator to combine strings.
$fullName = $firstName . " " . $lastName; // Adds a space between first and last name
echo "Full Name: " . $fullName . "<br>";

// You can also concatenate directly in an echo statement.
echo "Hello, " . $firstName . "!" . "<br>";

// Another way: String interpolation (using variables directly inside double-quoted strings).
// This is often cleaner for simple cases.
$welcomeMessage = "Welcome, $firstName $lastName!";
echo $welcomeMessage . "<br>";

// Using curly braces for complex variable names or to clearly separate variables.
$item = "book";
$price = 25;
echo "The {$item} costs ".$price." dollars." . "<br>";

// The .= operator appends a string to an existing string variable.
$sentence = "PHP is ";
$sentence .= "powerful.";
echo $sentence . "<br>";

// -------------------------------------------------------------------------------

/*
 * Variable Scope
 * Variable scope refers to the context within which a variable is defined
 * and can be accessed. In PHP, there are mainly three types of scope:
 * - Global: Variables declared outside any function.
 * - Local: Variables declared inside a function.
 * - Static: Variables declared inside a function that retain their value.
 */

// Global Scope: $globalVar is accessible anywhere outside functions.
$globalVar = "I am a global variable.";
echo $globalVar . "<br>";

function showScope() {
    // Local Scope: $localVar is only accessible inside this function.
    $localVar = "I am a local variable.";
    echo $localVar . "<br>";

    // To access a global variable inside a function, you need to use the `global` keyword.
    global $globalVar;
    echo "Accessing global from inside function: " . $globalVar . "<br>";

    // Alternatively, you can use the $GLOBALS superglobal array.
    // $GLOBALS is an associative array that contains references to all variables
    // currently defined in the global scope.
    echo "Accessing global via \$GLOBALS: " . $GLOBALS['globalVar'] . "<br>";
}

showScope();

// Trying to access $localVar outside the function will result in an error.
// echo $localVar; // This would cause an Undefined variable error!

function staticExample() {
    static $count = 0; // Static variable retains its value between function calls.
    $count++;
    echo "Static count: " . $count . "<br>";
}

staticExample(); // Outputs: Static count: 1
staticExample(); // Outputs: Static count: 2
staticExample(); // Outputs: Static count: 3
?>