<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "file_upload_db";

// Check if the form was submitted
if (isset($_POST['upload'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $uploadOk = true;
    $maxFileSize = 2 * 1024 * 1024; // 2MB limit

    // Check if the uploads directory exists; if not, create it
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    // Check file size
    if ($_FILES["file"]["size"] > $maxFileSize) {
        $uploadOk = false;
        $message = "File is too large. Max file size is 2MB.";
    }

    // Allow certain file formats (e.g., JPG, PNG, PDF)
    $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    if (!in_array($_FILES["file"]["type"], $allowedTypes)) {
        $uploadOk = false;
        $message = "Only JPG, PNG, and PDF files are allowed.";
    }

    // If the file passes validation checks, proceed with upload
    if ($uploadOk) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Connect to the database
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check for a connection error
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO uploads (file_name, file_type, file_size) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $fileName, $fileType, $fileSize);

            // Set the parameters
            $fileType = $_FILES["file"]["type"];
            $fileSize = $_FILES["file"]["size"];

            // Execute the statement
            if ($stmt->execute()) {
                $message = "The file " . htmlspecialchars($fileName) . " has been uploaded and recorded in the database.";
            } else {
                $message = "File uploaded, but failed to record in the database.";
            }

            // Close the statement and connection
            $stmt->close();
            $conn->close();
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }

    header("Location: index.php?message=" . urlencode($message));
    exit();
}
?>
