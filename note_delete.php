<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Handle note deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = $_POST['note_filename'];
    unlink("notes/$filename");
    // Return a success message
    echo "Note deleted successfully";
    exit;
}
?>
