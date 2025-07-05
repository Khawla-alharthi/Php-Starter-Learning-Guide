<?php
/*
 * PHP File Upload:
 * 
 * Have you ever uploaded a picture to a website, like a social media profile or a school project submission?
 * That's 'file uploading'! It's how websites let you send files from your computer to their server.
 * In PHP, we can create forms that allow users to select a file, and then write code to handle that file
 * when it arrives at the server.
 */

// -------------------------------------------------------------------------------

// First, we define what kind of files we will allow to be uploaded.
// This is important for security and to make sure users upload the correct type of files.
$allowed_image_types = array('png', 'jpg', 'jpeg', 'gif');

$message = ''; // A variable to store messages for the user

// This code runs when the user clicks the 'Submit' button on the form.
if (isset($_POST['submit'])) {
  // Check if a file was actually selected for upload.
  // `$_FILES` is a special PHP variable that holds information about uploaded files.
  if (!empty($_FILES['upload']['name'])) {
    $file_name = $_FILES['upload']['name']; // The original name of the file
    $file_size = $_FILES['upload']['size']; // The size of the file in bytes
    $file_tmp_path = $_FILES['upload']['tmp_name']; // A temporary path where the file is stored on the server

    // We need to figure out the file's extension (like .png, .jpg).
    // `explode` splits the file name by the dot, and `end` gets the last part.
    $file_extension = strtolower(end(explode('.', $file_name)));

    // Define where the uploaded file will be saved permanently on the server.
    // We'll create a folder named 'uploads' for this.
    $target_directory = 'uploads/' . basename($file_name); // `basename` helps prevent path traversal attacks

    // 1. Validate File Type:
    // Check if the uploaded file's extension is in our list of allowed types.
    if (in_array($file_extension, $allowed_image_types)) {
      // 2. Validate File Size:
      // Check if the file is not too big. Here, we allow files up to 1MB (1,000,000 bytes).
      if ($file_size <= 1000000) {
        // 3. Move the Uploaded File:
        // If everything is okay, we move the file from its temporary location
        // to our permanent 'uploads' folder.
        if (move_uploaded_file($file_tmp_path, $target_directory)) {
          $message = '<p style="color: green;">Success! Your file has been uploaded.</p>';
        } else {
          $message = '<p style="color: red;">Error uploading your file. Please try again.</p>';
        }
      } else {
        $message = '<p style="color: red;">Oops! Your file is too large. Max size is 1MB.</p>';
      }
    } else {
      $message = '<p style="color: red;">Sorry, only PNG, JPG, JPEG, and GIF images are allowed.</p>';
    }
  } else {
    $message = '<p style="color: red;">Please choose a file to upload first!</p>';
  }
}

// It's a good practice to ensure the 'uploads' directory exists.
// If it doesn't, we try to create it.
if (!is_dir('uploads')) {
    mkdir('uploads', 0777, true); // 0777 gives full permissions, `true` allows recursive creation
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Your Files!</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    form { background-color: #f2f2f2; padding: 20px; border-radius: 8px; }
    input[type="file"] { margin-bottom: 10px; }
    input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
    input[type="submit"]:hover { background-color: #45a049; }
    .message { margin-top: 15px; padding: 10px; border-radius: 4px; }
    .message p { margin: 0; }
  </style>
</head>
<body>
  <h1>Upload Your Favorite Picture!</h1>

  <?php if (!empty($message)): ?>
    <div class="message">
      <?php echo $message; // Display any messages to the user ?>
    </div>
  <?php endif; ?>

  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
    <label for="fileToUpload">Select an image to upload:</label><br>
    <input type="file" name="upload" id="fileToUpload"><br><br>
    <input type="submit" value="Upload Image" name="submit">
  </form>

  <p><strong>Remember:</strong> Only PNG, JPG, JPEG, and GIF images are allowed, and they must be smaller than 1MB.</p>

  <h3>How it works (for curious minds):</h3>
  <ul>
    <li>When you click 'Upload Image', your browser sends the file to the web server.</li>
    <li>Our PHP code on the server checks the file's type and size to make sure it's safe and allowed.</li>
    <li>If everything is good, the file is moved from a temporary spot to a special 'uploads' folder on the server.</li>
    <li>Then, you see a success message!</li>
  </ul>

</body>
</html>