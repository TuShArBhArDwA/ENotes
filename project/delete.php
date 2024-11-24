<?php
if (isset($_POST['file_name'])) {
    $fileName = basename($_POST['file_name']);
    $filePath = "uploads/" . $fileName;

    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            $message = "File '$fileName' deleted successfully.";
        } else {
            $message = "Error deleting the file.";
        }
    } else {
        $message = "File does not exist.";
    }

    header("Location: index.php?message=" . urlencode($message));
    exit();
} else {
    header("Location: index.php");
    exit();
}
