<?php
/*
 * PHP Exceptions:
 * 
 * Imagine you are writing a computer program, and sometimes things might go wrong.
 * For example, what if your program tries to divide a number by zero? That's impossible!
 * Or what if it tries to open a file that doesn't exist?
 * When something unexpected or problematic happens in a program, we call it an 'exception'.
 * Exceptions are like alarm bells that tell your program: "Hey, something went wrong here!"
 * Instead of the program just crashing, exceptions give us a way to 'catch' these problems
 * and handle them gracefully, so our program can keep running or tell the user what happened.
 */

// -------------------------------------------------------------------------------

// 1. What is an Exception?
// An exception is an event that disrupts the normal flow of a program.
// When an error occurs within a function, it can 'throw' an exception.
// This stops the function's normal execution and looks for a 'catcher'.

// Let's create a simple function that might cause a problem.
function divideNumbers($numerator, $denominator) {
  // If the denominator is zero, we can't divide!
  if ($denominator === 0) {
    // So, we 'throw' an Exception. We give it a message to explain the problem.
    throw new Exception("Oops! You cannot divide by zero.");
  }
  return $numerator / $denominator;
}

echo "<h3>Understanding Exceptions:</h3>";

// -------------------------------------------------------------------------------

// 2. The `try...catch` Block:
// We use a `try...catch` block to 'try' running some code that might throw an exception.
// If an exception is thrown, the `catch` block will 'catch' it and handle it.

// Example 1: Trying to divide by a non-zero number (this should work fine)
try {
  echo "<p>Trying to divide 10 by 2: " . divideNumbers(10, 2) . "</p>";
} catch (Exception $e) {
  // This part will only run if an exception is caught.
  echo "<p style='color: red;'>Caught an error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

// Example 2: Trying to divide by zero (this will throw an exception)
try {
  echo "<p>Trying to divide 10 by 0...</p>";
  echo "<p>Result: " . divideNumbers(10, 0) . "</p>"; // This line will throw an exception
} catch (Exception $e) {
  // The exception is caught here, and we can display its message.
  echo "<p style='color: red;'>Caught an error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

// -------------------------------------------------------------------------------

// 3. The `finally` Block (Optional but useful):
// A `finally` block will always run, whether an exception was thrown or not.
// It's useful for cleaning up things, like closing a file that was opened.

echo "<h3>Using the `finally` block:</h3>";

// Example 3: With `finally` when no exception is thrown
try {
  echo "<p>Attempting a safe division (15 by 3)...</p>";
  echo "<p>Result: " . divideNumbers(15, 3) . "</p>";
} catch (Exception $e) {
  echo "<p style='color: red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
} finally {
  echo "<p style='color: blue;'>This message always appears, whether there was an error or not (after safe division).</p>";
}

// -------------------------------------------------------------------------------

// Example 4: With `finally` when an exception IS thrown
try {
  echo "<p>Attempting an unsafe division (20 by 0)...</p>";
  echo "<p>Result: " . divideNumbers(20, 0) . "</p>";
} catch (Exception $e) {
  echo "<p style='color: red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
} finally {
  echo "<p style='color: blue;'>This message always appears, whether there was an error or not (after unsafe division).</p>";
}

/*
 * Important things to remember about Exceptions:
 * - They help your program deal with unexpected problems without crashing.
 * - Use `try` for code that might cause an exception.
 * - Use `catch` to handle the exception if it happens.
 * - Use `finally` for code that should always run, no matter what.
 * - Exceptions make your programs more robust and user-friendly!
 */

?>

