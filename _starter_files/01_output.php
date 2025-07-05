<?php
/*
 * PHP Output Functions Tutorial:
 * 
 * This file demonstrates various ways to display (output) information in PHP.
 * Understanding how to output data is fundamental for any programming language,
 * as it allows you to see results, debug your code, and present information to users.
 * 
 * - echo statement => The most common way to output strings, numbers, and HTML.
 * - print statement => Similar to `echo`, but with some minor differences.
 * - print_r function => Useful for displaying human-readable information about variables, especially arrays.
 * - var_dump function => Provides detailed information about a variable, including its type and value.
 * - Escaping characters => How to display special characters that PHP might otherwise interpret.
 * - HTML integration with PHP => How to mix PHP code within your HTML structure.
 * - Comments in PHP => How to add notes to your code that PHP ignores.
 */

/* ------- Outputting Content ------- */

// Echo - used to display content and it is faster than 'print'.
// You can output strings, numbers, html, etc
echo 'Hello'; // Outputs a simple text string
echo 123; // Outputs a number
echo '<h1>Hello. This is PHP document</h1>'; // Outputs an HTML heading

// print - Works almost identically to echo for basic output. But a bit slower
print 'Hello';

// print_r - Gives a bit more information.  Shows a human-readable representation of a variable.
// It's great for quickly inspecting arrays and objects.
print_r('Hello');
print_r([1, 2, 3]);

// var_dump - Provides even more detailed information than print_r().
// It shows the data type, length (for strings), and value of a variable.
// This is very powerful for understanding exactly what's stored in a variable.
var_dump('Hello');
var_dump([1, 2, 3]);

// Sometimes you need to display characters that have special meaning in PHP strings, like double quotes inside a double-quoted string.
// Escaping characters with a backslas (/).
echo "Is your name O\'reilly?";

// -------------------------------------------------------------------------------\

/* ------------ Comments ------------ */

// This is a single line comment

/*
      * This is a multi-line comment
      *
      * It can be used to comment out a block of code
      */

// If there is more content after the PHP, such as this file, you do need the ending tag. Otherwise you do not.
?>

<!-- You can output any HTML that you want within a .php file -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My PHP Website</title>
</head>
<body>
  <!-- You can output PHP including variables, etc -->
  <h1>Hello <?php echo 'joe'; ?></h1>
  <!-- You may only drop the semi-colon after a statement when the statement is followed immediately by a closing PHP tag ?>. -->
  <h1>Hello <?= 'joe' ?></h1>
</body>
</html>