<?php
/*
 * PHP Cookies:
 * 
 * What are cookies? Imagine a small note that a website can leave on your computer.
 * This note helps the website remember things about you for your next visit.
 * For example, if you log into a website, a cookie can remember that you're logged in,
 * so you don't have to type your username and password every time you visit.
 */

// -------------------------------------------------------------------------------

// Setting a cookie:
// To set a cookie, we use the 'setcookie()' function.
// It needs a name for the cookie, a value for the cookie, and how long it should last.
// Let's set a cookie called 'student_name' with the value 'Alice' that lasts for 30 days.
// 86400 seconds is one day (60 seconds * 60 minutes * 24 hours).
setcookie('student_name', 'Alice', time() + (86400 * 30)); // Cookie lasts for 30 days

echo "<p>A cookie named 'student_name' has been set!</p>";

// -------------------------------------------------------------------------------

// Reading a cookie:
// To read a cookie, we look inside a special PHP variable called '$_COOKIE'.
// It's like a box where all the cookies are stored.
if (isset($_COOKIE['student_name'])) {
  echo "<p>Hello, " . htmlspecialchars($_COOKIE['student_name']) . "! Welcome back!</p>";
} else {
  echo "<p>It seems like this is your first time here, or your cookie has expired.</p>";
}

// -------------------------------------------------------------------------------

// Deleting a cookie:
// To delete a cookie, we set its expiration time to a time in the past.
// This tells the browser to remove the cookie immediately.
// Let's delete the 'student_name' cookie.
setcookie('student_name', '', time() - 3600); // Set expiration to 1 hour ago

echo "<p>The 'student_name' cookie has been deleted.</p>";

/*
 * Important things to remember about cookies:
 * 1. Cookies are stored on the user's computer, not on the server.
 * 2. Don't store very secret information in cookies, because users can see them.
 * 3. Cookies have an expiration date. After that date, they are automatically removed.
 */

?>

