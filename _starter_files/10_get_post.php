<?php
/*
 * PHP GET and POST Tutorial:
 * 
 * This file explains how PHP handles data submitted through web forms and URL parameters.
 * Understanding `$_GET` and `$_POST` is crucial for building interactive web applications
 * where users can send information to the server.
 * 
 * - `$_GET` Method => How data is sent and received via URL parameters.
 * - `$_POST` Method => How data is sent and received via form submissions (hidden in the URL).
 * - HTML Forms => Creating forms that send data using GET or POST.
 * - Security Considerations => Why sanitizing input is important.
 *
 */

// -------------------------------------------------------------------------------
 
// The `$_GET` superglobal is an associative array that contains all the data sent to the script through the URL query string.
// The query string starts with a `?` and parameters are separated by `&`.
// Example URL: `http://localhost/10_get_post.php?name=Alice&age=16`

// To access data sent via GET, you use `$_GET["parameter_name"]`.
// It's good practice to check if the parameter exists using `isset()` before using it.

if (isset($_GET["name"])) {
    $name = htmlspecialchars($_GET["name"]); // Always sanitize input!
    echo "Hello, " . $name . "! (from GET)<br>";
} else {
    echo "No 'name' parameter found in the URL.<br>";
}

if (isset($_GET["age"])) {
    $age = (int)$_GET["age"]; // Cast to integer if you expect a number.
    echo "Your age is: " . $age . " (from GET)<br>";
} else {
    echo "No 'age' parameter found in the URL.<br>";
}

echo "<p><b>How to test `$_GET`:</b> Add `?name=Bob&age=17` to the end of the URL in your browser's address bar and press Enter.</p>";

// You can also create links that pass GET parameters.
echo "<p><a href=\"" . htmlspecialchars($_SERVER["PHP_SELF"]) . "?product=Laptop&price=1200\">Click to see product details (GET)</a></p>";

// -------------------------------------------------------------------------------

// The `$_POST` superglobal is an associative array that contains all the data sent to the script through an HTTP POST request, typically from an HTML form.
// Data sent via POST is not visible in the URL, making it more suitable for sensitive information like passwords or large amounts of data.

// To access data sent via POST, you use `$_POST["input_field_name"]`.
// We will process the form submission below.

if (isset($_POST["submit_form"])) {
    // It's crucial to sanitize and validate all user input to prevent security vulnerabilities.
    // htmlspecialchars() converts special characters to HTML entities, preventing XSS attacks.
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    echo "<p><b>Form Submitted via POST!</b></p>";
    echo "Username: " . $username . "<br>";
    echo "Password: " . $password . "<br>";

    // Example: Simple validation (for demonstration, real apps need stronger validation)
    if (empty($username) || empty($password)) {
        echo "<p style=\"color: red;\">Username and Password cannot be empty!</p>";
    } else if ($username === "student" && $password === "pass123") {
        echo "<p style=\"color: green;\">Login successful!</p>";
    } else {
        echo "<p style=\"color: red;\">Invalid username or password.</p>";
    }
} else {
    echo "<p>Please fill out and submit the form below.</p>";
}

// -------------------------------------------------------------------------------

// HTML forms are used to collect user input. The `method` attribute of the `<form>` tag determines whether the data is sent via GET or POST.
// The `action` attribute specifies where the form data should be sent (usually the same page).

// -------------------------------------------------------------------------------
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP GET and POST</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { background-color: #f2f2f2; padding: 20px; border-radius: 8px; max-width: 400px; margin-top: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="password"], input[type="email"] { width: calc(100% - 22px); padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        input[type="submit"]:hover { background-color: #45a049; }
        h2 { color: #333; }
        p { line-height: 1.5; }
    </style>
</head>
<body>
    <h2>3. HTML Form Example (POST Method)</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <p>This form uses the <b>POST</b> method. Data will not be visible in the URL.</p>
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <input type="submit" name="submit_form" value="Login">
    </form>

    <h2>Example of a GET Form (for comparison)</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
        <p>This form uses the <b>GET</b> method. Data <b>will be visible</b> in the URL.</p>
        <div>
            <label for="search_query">Search:</label>
            <input type="text" id="search_query" name="query">
        </div>
        <input type="submit" value="Search">
    </form>

    <p><b>Important:</b> Always sanitize and validate user input, regardless of whether it comes from GET or POST. The `htmlspecialchars()` function used above is a basic step. For more robust security, especially with databases, learn about prepared statements and input filtering.</p>

</body>
</html>