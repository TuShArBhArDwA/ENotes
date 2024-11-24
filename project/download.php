<?php
if (isset($_GET['file'])) {
    $fileName = basename($_GET['file']); // Sanitize file name
    $filePath = "uploads/" . $fileName;

    // Check if the file exists
    if (!file_exists($filePath)) {
        die("Error: File not found.");
    }

    // Set headers for downloading the file
    header("Content-Description: File Transfer");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"" . $fileName . "\"");
    header("Expires: 0");
    header("Cache-Control: must-revalidate");
    header("Pragma: public");
    header("Content-Length: " . filesize($filePath));

    // Clear the output buffer
    ob_clean();
    flush();

    // Read the file and send it to the user
    readfile($filePath);
    exit();
} else {
    echo "No file specified.";
}
