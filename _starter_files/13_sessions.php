<?php
/*
 * PHP Sessions:
 * 
 * Imagine you're visiting a website, and you log in. The website needs to remember
 * that you are logged in as you move from one page to another. This is where sessions come in!
 * A session is like a special temporary storage space on the website's server
 * that keeps track of information about your visit.
 * Unlike cookies, which are stored on your computer, sessions are stored on the server,
 * making them safer for sensitive information like your login status.
 */

// -------------------------------------------------------------------------------

// 1. Starting a Session:
// Before you can use sessions, you need to tell PHP to start one.
// This is done with the `session_start()` function.
// It must be the very first thing in your PHP file, before any HTML or other output.
session_start();

echo "<p>Session has started!</p>";

// -------------------------------------------------------------------------------

// 2. Setting Session Variables:
// You can store information in session variables using the `$_SESSION` superglobal array.
// It works just like a regular array.
$_SESSION["favorite_color"] = "blue";
$_SESSION["student_id"] = 12345;

echo "<p>We've stored your favorite color as '" . htmlspecialchars($_SESSION["favorite_color"]) . "' and your student ID as '" . htmlspecialchars($_SESSION["student_id"]) . "' in the session.</p>";

// -------------------------------------------------------------------------------

// 3. Reading Session Variables:
// To get the information back, you just access the `$_SESSION` array.
if (isset($_SESSION["favorite_color"])) {
  echo "<p>From the session, we know your favorite color is: " . htmlspecialchars($_SESSION["favorite_color"]) . "</p>";
}

// -------------------------------------------------------------------------------

// 4. Using Sessions for Login (Simplified Example):
// Let's imagine a simple login form. When a student logs in, we can store their username in a session.
// This way, other pages can check if the student is logged in.

// This part would usually be on a separate login page.
if (isset($_POST["login_submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  // In a real application, you would check this against a database.
  // For this example, let's say the correct username is 'student' and password is 'pass123'.
  if ($username === "student" && $password === "pass123") {
    $_SESSION["logged_in_user"] = $username;
    echo "<p style='color: green;'>Welcome, " . htmlspecialchars($username) . "! You are now logged in.</p>";
  } else {
    echo "<p style='color: red;'>Login failed. Incorrect username or password.</p>";
  }
}

// Display a simple login form
?>

<h3>Try Logging In:</h3>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" value="student"><br><br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" value="pass123"><br><br>
  <input type="submit" name="login_submit" value="Login">
</form>

<?php
// Check if a user is logged in on this or any other page after login
if (isset($_SESSION["logged_in_user"])) {
  echo "<p>Currently logged in as: " . htmlspecialchars($_SESSION["logged_in_user"]) . "</p>";
} else {
  echo "<p>No one is logged in yet.</p>";
}

// -------------------------------------------------------------------------------

// 5. Destroying a Session:
// When a user logs out, or after a certain period of inactivity, you might want to end the session.
// This removes all the session variables and clears the session data from the server.
// To destroy all session data, use `session_unset()` and `session_destroy()`.

// Let's add a logout button for demonstration
if (isset($_POST["logout_submit"])) {
  session_unset();     // Remove all session variables
  session_destroy();   // Destroy the session
  echo "<p style='color: blue;'>You have been logged out and the session has ended.</p>";
}
?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <input type="submit" name="logout_submit" value="Logout">
</form>

<?php
/*
 * Important things to remember about sessions:
 * 1. Sessions are stored on the server, which makes them more secure for sensitive data.
 * 2. `session_start()` must be called at the beginning of every page that uses sessions.
 * 3. Sessions are temporary and usually end when the user closes their browser or logs out.
 */
?>