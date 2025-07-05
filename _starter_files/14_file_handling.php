<?php
/*
 * PHP File Handling:
 * 
 * Imagine your computer has many folders and files. Sometimes, your PHP program
 * might need to read information from a file or write new information into a file.
 * This is called 'file handling'. It's like your program having hands to pick up
 * and put down papers in a filing cabinet!
 */

// -------------------------------------------------------------------------------

// 1. Checking if a file exists:
// Before we try to read or write a file, it's a good idea to check if it's already there.
// We use `file_exists()` for this.
$student_list_file = 'students.txt';

echo "<h3>Checking for our student list file...</h3>";
if (file_exists($student_list_file)) {
  echo "<p>Good news! The file '" . htmlspecialchars($student_list_file) . "' already exists.</p>";
} else {
  echo "<p>Oops! The file '" . htmlspecialchars($student_list_file) . "' does not exist yet. Let's create it!</p>";
}

// -------------------------------------------------------------------------------

// 2. Writing to a file (creating or overwriting):
// To put new information into a file, we use `fopen()` to 'open' the file and `fwrite()` to 'write' to it.
// The 'w' mode means 'write'. If the file doesn't exist, it creates it. If it does, it clears everything inside and writes new content.

echo "<h3>Writing to our student list file...</h3>";
$handle = fopen($student_list_file, 'w'); // Open the file in 'write' mode
$first_students = "Alice\nBob\nCharlie"; // \n means a new line
fwrite($handle, $first_students); // Write the names into the file
fclose($handle); // Always close the file when you're done!
echo "<p>We've created/overwritten '" . htmlspecialchars($student_list_file) . "' with some student names.</p>";

// -------------------------------------------------------------------------------

// 3. Reading from a file:
// To get information out of a file, we open it in 'r' (read) mode.
// `fread()` reads the content, and `filesize()` tells us how big the file is.

echo "<h3>Reading from our student list file...</h3>";
if (file_exists($student_list_file)) {
  $handle = fopen($student_list_file, 'r'); // Open the file in 'read' mode
  $contents = fread($handle, filesize($student_list_file)); // Read all contents
  fclose($handle); // Close the file
  echo "<p>Here are the students in our list:</p><pre>" . htmlspecialchars($contents) . "</pre>";
} else {
  echo "<p>Cannot read, the file '" . htmlspecialchars($student_list_file) . "' does not exist.</p>";
}

// -------------------------------------------------------------------------------

// 4. Appending to a file (adding without overwriting):
// If you want to add new information to the end of a file without deleting the old, use 'a' (append) mode.

echo "<h3>Appending to our student list file...</h3>";
$handle = fopen($student_list_file, 'a'); // Open the file in 'append' mode
$new_student = "\nDavid"; // Add David on a new line
fwrite($handle, $new_student);
fclose($handle);
echo "<p>We've added David to the student list.</p>";

// Let's read it again to see the change
echo "<h3>Reading the updated student list file...</h3>";
if (file_exists($student_list_file)) {
  $handle = fopen($student_list_file, 'r');
  $contents = fread($handle, filesize($student_list_file));
  fclose($handle);
  echo "<p>Here's the updated list:</p><pre>" . htmlspecialchars($contents) . "</pre>";
}

// -------------------------------------------------------------------------------

// 5. Deleting a file:
// If you no longer need a file, you can delete it using `unlink()`.

echo "<h3>Deleting our student list file...</h3>";
if (file_exists($student_list_file)) {
  unlink($student_list_file); // Delete the file
  echo "<p>The file '" . htmlspecialchars($student_list_file) . "' has been deleted.</p>";
} else {
  echo "<p>The file '" . htmlspecialchars($student_list_file) . "' is already gone.</p>";
}

/*
 * Important things to remember about file handling:
 * - Always close files with `fclose()` after you're done with them.
 * - Be careful with 'w' mode, as it overwrites existing files.
 * - Make sure your PHP program has permission to read and write files on the server.
 */

?>

