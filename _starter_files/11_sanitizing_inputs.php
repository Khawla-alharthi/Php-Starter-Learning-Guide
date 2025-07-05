<?php
/**
 * PHP Input Sanitization:
 *
 * This file explains the critical importance of sanitizing user input in PHP.
 * When users submit data (e.g., through forms), that data can contain malicious
 * code or unexpected formats. Sanitization is the process of cleaning or filtering
 * this input to remove anything that could be harmful or problematic.
 *
 * Why is sanitization important?
 * - Security: Prevents attacks like Cross-Site Scripting (XSS) and SQL Injection.
 * - Data Integrity: Ensures data stored in your database is in the correct format.
 * - Application Stability: Prevents unexpected errors caused by malformed input.
 *
 * We will cover:
 * 1. `htmlspecialchars()`: A basic but essential function for preventing XSS.
 * 2. PHP Filter Functions (`filter_var()` and `filter_input()`):
 *    - `FILTER_SANITIZE_STRING` (deprecated in PHP 8.1, but concept is useful)
 *    - `FILTER_SANITIZE_EMAIL`
 *    - `FILTER_SANITIZE_URL`
 *    - `FILTER_SANITIZE_NUMBER_INT`
 *    - `FILTER_SANITIZE_NUMBER_FLOAT`
 *    - `FILTER_SANITIZE_FULL_SPECIAL_CHARS`
 * 3. Best Practices for Input Handling.
 */

// -------------------------------------------------------------------------------

echo "<h2>1. `htmlspecialchars()` for XSS Prevention</h2>";

// Cross-Site Scripting (XSS) is a type of security vulnerability where attackers
// inject malicious scripts (usually JavaScript) into web pages viewed by other users.
// `htmlspecialchars()` converts special characters like <, >, ", ", & into their
// HTML entity equivalents (`&lt;`, `&gt;`, `&quot;`, `&#039;`, `&amp;`).
// This makes the browser display the malicious script as plain text instead of executing it.

$unsafe_input = "<script>alert(\'You are hacked!\');</script><b>Hello</b>";
echo "<p><b>Unsafe Output:</b> " . $unsafe_input . "</p>"; // This would execute the alert if not sanitized
echo "<p><b>Safe Output (using htmlspecialchars):</b> " . htmlspecialchars($unsafe_input) . "</p>";

// Example with user input from a form (simulated)
$user_comment = "<p>Great post! <a href=\"javascript:alert(\'Malicious Link!\')\">Click me</a></p>";

if (isset($_POST["submit_comment"])) {
    $comment = $_POST["comment_text"];
    echo "<h3>Your Comment (Unsanitized):</h3>";
    echo $comment; // DANGEROUS! Could execute scripts
    echo "<h3>Your Comment (Sanitized with htmlspecialchars):</h3>";
    echo htmlspecialchars($comment); // SAFE!
} else {
    echo "<p>Submit the form below to see sanitization in action.</p>";
}

// -------------------------------------------------------------------------------

/*
 * Section 2: PHP Filter Functions (`filter_var()` and `filter_input()`)
 *
 * PHP provides a powerful set of filter functions that can be used to validate
 * and sanitize various types of input. They are generally more robust than
 * simple string functions for specific data types.
 *
 * `filter_var(variable, filter_type)`: Filters a single variable.
 * `filter_input(input_type, variable_name, filter_type)`: Filters input from
 *   superglobals (`INPUT_GET`, `INPUT_POST`, `INPUT_COOKIE`, `INPUT_SERVER`, `INPUT_ENV`).
 *   This is often preferred as it directly accesses the superglobal and handles missing keys.
 */

echo "<h2>2. PHP Filter Functions</h2>";

// --- FILTER_SANITIZE_EMAIL ---
// Removes all characters except letters, digits, and !#$%&'*+-/=?^_`{|}~.@[]
$email_raw = "test@example.com<script>alert(\'xss\')</script>";
$email_sanitized = filter_var($email_raw, FILTER_SANITIZE_EMAIL);
echo "<p>Raw Email: " . htmlspecialchars($email_raw) . "<br>";
echo "Sanitized Email: " . htmlspecialchars($email_sanitized) . "</p>";

// --- FILTER_SANITIZE_URL ---
// Removes all illegal URL characters from a string.
$url_raw = "http://example.com/path?query=<script>alert(\'xss\')</script>";
$url_sanitized = filter_var($url_raw, FILTER_SANITIZE_URL);
echo "<p>Raw URL: " . htmlspecialchars($url_raw) . "<br>";
echo "Sanitized URL: " . htmlspecialchars($url_sanitized) . "</p>";

// --- FILTER_SANITIZE_NUMBER_INT ---
// Removes all characters except digits, plus and minus signs.
$int_raw = "123abc456def";
$int_sanitized = filter_var($int_raw, FILTER_SANITIZE_NUMBER_INT);
echo "<p>Raw Int: " . htmlspecialchars($int_raw) . "<br>";
echo "Sanitized Int: " . htmlspecialchars($int_sanitized) . "</p>";

// --- FILTER_SANITIZE_NUMBER_FLOAT ---
// Removes all characters except digits, plus/minus signs, and optionally . or ,
$float_raw = "123.45,67";
$float_sanitized = filter_var($float_raw, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
echo "<p>Raw Float: " . htmlspecialchars($float_raw) . "<br>";
echo "Sanitized Float: " . htmlspecialchars($float_sanitized) . "</p>";

// --- FILTER_SANITIZE_FULL_SPECIAL_CHARS ---
// HTML-encodes special characters, keeps spaces and most other characters.
// Similar to htmlspecialchars, but also encodes all non-alphanumeric characters.
$text_raw = "Hello <World>! This is a test with 'quotes'.";
$text_sanitized = filter_var($text_raw, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
echo "<p>Raw Text: " . htmlspecialchars($text_raw) . "<br>";
echo "Sanitized Text: " . htmlspecialchars($text_sanitized) . "</p>";

// --- Using `filter_input()` for POST data ---
// This is generally the recommended way to sanitize superglobal input.
if (isset($_POST["submit_form_filters"])) {
    $name_input = filter_input(INPUT_POST, "name_field", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $age_input = filter_input(INPUT_POST, "age_field", FILTER_SANITIZE_NUMBER_INT);
    $email_input = filter_input(INPUT_POST, "email_field", FILTER_SANITIZE_EMAIL);

    echo "<h3>Form Data (Sanitized with Filters):</h3>";
    echo "Name: " . htmlspecialchars($name_input) . "<br>";
    echo "Age: " . htmlspecialchars($age_input) . "<br>";
    echo "Email: " . htmlspecialchars($email_input) . "<br>";
} else {
    echo "<p>Fill out the form below to test filter functions.</p>";
}


// -------------------------------------------------------------------------------


/*
 * Section 3: Best Practices for Input Handling
 *
 * 1. Sanitize ALL user input: Never trust data coming from the user or external sources.
 * 2. Validate input: Beyond sanitization, ensure the input meets your application's rules
 *    (e.g., an email address is actually an email, a number is within a certain range).
 *    PHP also has `FILTER_VALIDATE_*` filters for this.
 * 3. Use Prepared Statements for Database Queries: This is the most effective way to prevent
 *    SQL Injection attacks. Learn about PDO or MySQLi prepared statements.
 * 4. Use `htmlspecialchars()` when displaying user input on a web page.
 * 5. Be specific: Use the most appropriate sanitization filter for the data type you expect.
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Input Sanitization</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { background-color: #f2f2f2; padding: 20px; border-radius: 8px; max-width: 500px; margin-top: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="number"], textarea { width: calc(100% - 22px); padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px; }
        input[type="submit"] { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        input[type="submit"]:hover { background-color: #0056b3; }
        h2, h3 { color: #333; }
        p { line-height: 1.5; }
    </style>
</head>
<body>
    <h2>Example Form for Sanitization</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="comment_text">Your Comment (try entering HTML or script tags):</label>
        <textarea id="comment_text" name="comment_text" rows="4" required></textarea><br><br>
        <input type="submit" name="submit_comment" value="Submit Comment">
    </form>

    <h2>Example Form for Filter Functions</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="name_field">Name (e.g., John Doe <script>):</label>
        <input type="text" id="name_field" name="name_field"><br><br>

        <label for="age_field">Age (e.g., 25abc):</label>
        <input type="text" id="age_field" name="age_field"><br><br>

        <label for="email_field">Email (e.g., test@example.com<script>):</label>
        <input type="text" id="email_field" name="email_field"><br><br>

        <input type="submit" name="submit_form_filters" value="Submit with Filters">
    </form>
</body>
</html>