<?php
/*
 * PHP String Functions Tutorial:
 * 
 * This file introduces various built-in PHP functions that are used to manipulate and work with strings (text).
 * Strings are fundamental in programming for handling names, messages, user input, and much more.
 * 
 * - Getting String Information => Length, character position.
 * - Case Conversion => Changing text to uppercase or lowercase.
 * - Searching and Replacing => Finding and modifying parts of a string.
 * - Substrings => Extracting portions of a string.
 * - Checking String Start/End => Determining if a string begins or ends with specific text.
 * - HTML Entities => Handling special characters in HTML context.
 * - Formatting Strings => Creating formatted output.
 * 
 */

// -------------------------------------------------------------------------------

// Getting String Information
$text = "Hello World, this is a PHP string.";

// `strlen(string)`: Returns the length of a string (number of characters).
echo "Length of \"" . $text . "\": " . strlen($text) . "<br>"; // Outputs: 32

// `strpos(haystack, needle)`: Finds the position of the first occurrence of a substring.
// Returns the starting position (0-indexed) or `false` if not found.
echo "Position of \"World\": " . strpos($text, "World") . "<br>"; // Outputs: 6 (W is at index 6)
echo "Position of \"PHP\": " . strpos($text, "PHP") . "<br>"; // Outputs: 20
echo "Position of \"xyz\": "; var_dump(strpos($text, "xyz")); echo "<br>"; // Outputs: bool(false)

// `strrpos(haystack, needle)`: Finds the position of the last occurrence of a substring.
echo "Position of last \"i\": " . strrpos($text, "i") . "<br>"; // Outputs: 23

// -------------------------------------------------------------------------------

// Case Conversion => These functions change the casing of characters within a string.
$sentence = "Learn PHP Programming";

// `strtolower(string)`: Converts all characters in a string to lowercase.
echo "Lowercase: " . strtolower($sentence) . "<br>"; // Outputs: learn php programming

// `strtoupper(string)`: Converts all characters in a string to uppercase.
echo "Uppercase: " . strtoupper($sentence) . "<br>"; // Outputs: LEARN PHP PROGRAMMING

// `ucfirst(string)`: Converts the first character of a string to uppercase.
echo "First char uppercase: " . ucfirst(strtolower($sentence)) . "<br>"; // Outputs: Learn php programming

// `ucwords(string)`: Converts the first character of each word in a string to uppercase.
echo "Words uppercase: " . ucwords(strtolower($sentence)) . "<br>"; // Outputs: Learn Php Programming

// -------------------------------------------------------------------------------

// Searching and Replacing => These functions help you find specific parts of a string and replace them with other text.
$originalString = "I love PHP, PHP is great!";

// `str_replace(search, replace, subject)`: Replaces all occurrences of a substring.
echo "Replaced: " . str_replace("PHP", "JavaScript", $originalString) . "<br>"; // Outputs: I love JavaScript, JavaScript is great!

// You can also pass arrays to replace multiple things.
$vowels = ["a", "e", "i", "o", "u"];
$noVowels = str_replace($vowels, "*", "Hello World");
echo "No vowels: " . $noVowels . "<br>"; // Outputs: H*ll* W*rld

// -------------------------------------------------------------------------------

// Substrings => Extracting a portion of a string.
$longText = "The quick brown fox jumps over the lazy dog.";

// `substr(string, start, length)`: Returns a part of a string.
// `start`: The starting position (0-indexed).
// `length`: The length of the substring to return.
echo "First 3 chars: " . substr($longText, 0, 3) . "<br>"; // Outputs: The
echo "From index 4 to end: " . substr($longText, 4) . "<br>"; // Outputs: quick brown fox jumps over the lazy dog.
echo "Last 3 chars: " . substr($longText, -3) . "<br>"; // Outputs: dog

// -------------------------------------------------------------------------------

// Checking String Start/End (PHP 8+) => check if a string begins or ends with a specific substring.
$filename = "document.pdf";

// `str_starts_with(haystack, needle)`: Checks if a string starts with a given substring.
echo "Does \"" . $filename . "\" start with \"doc\"? "; var_dump(str_starts_with($filename, "doc")); echo "<br>"; // Outputs: bool(true)

// `str_ends_with(haystack, needle)`: Checks if a string ends with a given substring.
echo "Does \"" . $filename . "\" end with \"pdf\"? "; var_dump(str_ends_with($filename, "pdf")); echo "<br>"; // Outputs: bool(true)

// -------------------------------------------------------------------------------

// HTML Entities => When displaying user-generated content or text that might contain HTML tags in a web page, 
// it's crucial to convert special characters into HTML entities. 
// This prevents issues like Cross-Site Scripting (XSS) attacks and ensures your HTML is rendered correctly.
$htmlString = "<script>alert(\'Hello!\');</script> <b>Bold Text</b> & More";

// `htmlspecialchars(string)`: Converts special characters to HTML entities.
// e.g., `<` becomes `&lt;`, `>` becomes `&gt;`, `&` becomes `&amp;`, `"` becomes `&quot;`.
echo "Original: " . $htmlString . "<br>";
echo "HTML Safe: " . htmlspecialchars($htmlString) . "<br>";

// This is especially important when displaying user input on a webpage.
$userInput = "<p>User input with <i>italics</i> and <a href=\"malicious.com\">link</a></p>";
echo "<p>Unsafe User Input: " . $userInput . "</p>"; // This could execute malicious scripts!
echo "<p>Safe User Input: " . htmlspecialchars($userInput) . "</p>"; // This displays the tags as text.

// -------------------------------------------------------------------------------

// Formatting Strings => Functions to create formatted output, often used for displaying numbers, dates, or other data in a specific way.
// `printf(format, arg1, arg2, ...)`: Outputs a formatted string.
// `%s` is a placeholder for a string.
// `%d` is a placeholder for a decimal (integer) number.
// `%f` is a placeholder for a floating-point number.

$productName = "Laptop";
$productPrice = 999.99;
$quantity = 2;

printf("Product: %s, Price: $%.2f, Quantity: %d<br>", $productName, $productPrice, $quantity);
// Outputs: Product: Laptop, Price: $999.99, Quantity: 2

$num1 = 10;
$num2 = 3;
printf("Division: %d / %d = %.2f<br>", $num1, $num2, $num1 / $num2);
// Outputs: Division: 10 / 3 = 3.33

// `number_format(number, decimals, decimal_separator, thousands_separator)`: Formats a number with grouped thousands.
$largeNumber = 1234567.8912;
echo "Formatted Number: " . number_format($largeNumber, 2, ".", ",") . "<br>"; // Outputs: 1,234,567.89
?>

