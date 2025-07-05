<?php
/*
 * PHP Superglobals Tutorial:
 * 
 * This file introduces PHP Superglobals, which are special built-in variables that are always available in all scopes 
 * (meaning you can access them from anywhere in your script, whether inside or outside functions, without needing `global` keyword).
 * 
 * Superglobals are used to collect information from various sources, such as
 * user input (forms, URL parameters), server information, cookies, and sessions.
 * 
 * - $_GET - Information from URL parameters.
 * - $_POST - Information from HTML form submissions (POST method).
 * - $_REQUEST - Contains both `$_GET` and `$_POST` data.
 * - $_SERVER - Information about the server and execution environment.
 * - $_SESSION - Information about session variables.
 * - $_COOKIE - Information about HTTP cookies.
 * - $_FILES - Information about uploaded files.
 * - $_ENV - Information about environment variables.
 * - $GLOBALS - A superglobal that holds references to all global variables.
 * 
 */

// -------------------------------------------------------------------------------

// `$_GET` Superglobal
// `$_GET` is an associative array of variables passed to the current script
// via the URL parameters (query string).
// Example URL: `http://localhost/09_superglobals.php?name=Alice&age=16`

// Check if the 'name' parameter is set in the URL.
if (isset($_GET["name"])) {
    $name = htmlspecialchars($_GET["name"]); // Always sanitize user input!
    echo "Hello, " . $name . "!<br>";
} else {
    echo "No 'name' parameter found in the URL.<br>";
}

// Check if the 'age' parameter is set.
if (isset($_GET["age"])) {
    $age = (int)$_GET["age"]; // Cast to integer for numeric operations.
    echo "Your age is: " . $age . "<br>";
} else {
    echo "No 'age' parameter found in the URL.<br>";
}

echo "<p>Try adding `?name=Bob&age=17` to the URL in your browser to see this in action!</p>";

// -------------------------------------------------------------------------------

// `$_POST` Superglobal
//`$_POST` is an associative array of variables passed to the current script via the HTTP POST method when an HTML form is submitted.
// Data sent via POST is not visible in the URL.

// We will create a simple HTML form below this PHP block.
// When the form is submitted, the data will be available in `$_POST`.

if (isset($_POST["submit_form"])) {
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    echo "<p>Form Submitted!</p>";
    echo "Username: " . $username . "<br>";
    echo "Email: " . $email . "<br>";
} else {
    echo "<p>Please submit the form below.</p>";
}

// -------------------------------------------------------------------------------

// `$_REQUEST` Superglobal
// `$_REQUEST` is an associative array that by default contains the contents of `$_GET`, `$_POST`, and `$_COOKIE`.
// It can be convenient but is generally less recommended for security reasons, as it makes it harder to know where the data originated from.

// If you submit the form above, or add URL parameters, they will appear here.
if (isset($_REQUEST["username"])) {
    echo "Username from \$_REQUEST: " . htmlspecialchars($_REQUEST["username"]) . "<br>";
}

// -------------------------------------------------------------------------------

// `$_SERVER` Superglobal
// `$_SERVER` is an associative array containing information created by the web server, about the execution environment, headers, and paths.
// It provides a lot of useful details about the current request.

echo "<ul>";
echo "<li><b>Server Name:</b> " . $_SERVER["SERVER_NAME"] . "</li>"; // The name of the host server
echo "<li><b>Server Address:</b> " . $_SERVER["SERVER_ADDR"] . "</li>"; // The IP address of the host server
echo "<li><b>Server Port:</b> " . $_SERVER["SERVER_PORT"] . "</li>"; // The port on the server machine being used for the web server
echo "<li><b>Document Root:</b> " . $_SERVER["DOCUMENT_ROOT"] . "</li>"; // The document root directory under which the current script is executing
echo "<li><b>Script Filename:</b> " . $_SERVER["SCRIPT_FILENAME"] . "</li>"; // The absolute pathname of the currently executing script
echo "<li><b>Request Method:</b> " . $_SERVER["REQUEST_METHOD"] . "</li>"; // The request method used to access the page (e.g., GET, POST)
echo "<li><b>Request URI:</b> " . $_SERVER["REQUEST_URI"] . "</li>"; // The URI which was given in order to access this page
echo "<li><b>PHP Self:</b> " . $_SERVER["PHP_SELF"] . "</li>"; // The filename of the currently executing script, relative to the document root
echo "<li><b>Remote Address:</b> " . $_SERVER["REMOTE_ADDR"] . "</li>"; // The IP address from which the user is viewing the current page
echo "<li><b>User Agent:</b> " . $_SERVER["HTTP_USER_AGENT"] . "</li>"; // The contents of the `User-Agent` header from the current request
echo "</ul>";

// -------------------------------------------------------------------------------

// `$_FILES` Superglobal
// `$_FILES` is an associative array of items uploaded to the current script via the HTTP POST method.
// It contains information like the original filename, file type, size, and a temporary location where the file is stored on the server.
// File uploads are covered in more detail in `15_file_upload.php`.

echo "<p>This superglobal is used when handling file uploads. It contains details about the uploaded file, such as its name, type, size, and temporary location. We will explore this in detail in the file upload tutorial.</p>";

// -------------------------------------------------------------------------------

// `$_COOKIE` Superglobal
// `$_COOKIE` is an associative array of variables passed to the current script via HTTP Cookies.
// Cookies are small pieces of data stored on the user's browser by the website. They are often used to remember user preferences or login status.
// Cookies are covered in more detail in `12_cookies.php`.

echo "<p>This superglobal holds data sent from the user's browser in the form of cookies. Cookies are used to store small bits of information on the user's computer. We will explore this in detail in the cookies tutorial.</p>";

// -------------------------------------------------------------------------------

// `$_SESSION` Superglobal
// `$_SESSION` is an associative array containing session variables available to the current script.
// Sessions are a way to store information (in variables) to be used across multiple pages. Unlike cookies, session data is stored on the server.
// Sessions are covered in more detail in `13_sessions.php`.

echo "<p>This superglobal is used to manage session data, which allows you to store user-specific information across multiple page requests. Session data is stored on the server. We will explore this in detail in the sessions tutorial.</p>";

// -------------------------------------------------------------------------------

// `$_ENV` Superglobal
// `$_ENV` is an associative array of variables passed to the current script via the environment method.
// These are environment variables set by the server operating system, not directly by PHP or the web server configuration.
// Its availability depends on the server setup.

echo "<h2>8. `$_ENV` Superglobal (Brief)</h2>";

if (isset($_ENV["PATH"])) {
    echo "Environment PATH variable: " . htmlspecialchars($_ENV["PATH"]) . "<br>";
} else {
    echo "Environment PATH variable not set or accessible.<br>";
}

// -------------------------------------------------------------------------------

// `$GLOBALS` Superglobal
// `$GLOBALS` is a superglobal associative array that contains references to all variables that are currently defined in the global scope of the script.
// The variable names are the keys of the array.

$globalExampleVar = "I am a variable in the global scope.";

function accessGlobal() {
    // You can access $globalExampleVar directly using $GLOBALS array.
    echo "Accessing \$globalExampleVar via \$GLOBALS: " . $GLOBALS["globalExampleVar"] . "<br>";
}

accessGlobal();

// -------------------------------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Superglobals</title>
</head>
<body>
    <h3>Submit this form to see `$_POST` in action:</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <input type="submit" name="submit_form" value="Submit">
    </form>
</body>
</html>
