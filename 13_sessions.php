<?php
/*
 * PHP Sessions Tutorial
 * This file demonstrates session management in PHP including:
 * - Starting sessions
 * - Setting session variables
 * - Reading session data
 * - Destroying sessions
 * - Session security
 * - Session configuration
 * - Session timeout handling
 * - User authentication with sessions
 * 
 * Joonguini Programming in the Kitchen
 */

/* ---------- Sessions ---------- */

/*
  Sessions are a way to store information (in variables) to be used across multiple pages.
  Unlike cookies, sessions are stored on the server.
*/

session_start(); // Must be called before accessing any session data

if (isset($_POST['submit'])) {
  $username = filter_input(
    INPUT_POST,
    'username',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
  );
  $password = $_POST['password'];

  if ($username == 'joe' && $password == 'password') {
    // Set Session variable
    $_SESSION['username'] = $username;
    // Redirect user to another page
    header('Location: /extras/dashboard.php');
  } else {
    echo 'Incorrect username or password';
  }
}
?>

  <form action="<?php echo htmlspecialchars(
    $_SERVER['PHP_SELF']
  ); ?>" method="POST">
    <div>
      <label>Username: </label>
      <input type="text" name="username">
    </div>
    <br>
    <div>
      <label>Password: </label>
      <input type="password" name="password">
    </div>
    <br>
    <input type="submit" name="submit" value="Submit">
  </form>
