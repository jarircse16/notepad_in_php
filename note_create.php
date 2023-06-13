<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Handle note creation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $noteText = $_POST['note_text'];
    $fileName = date('s-i-H-d-m-Y') . '.txt';
    file_put_contents("notes/$fileName", $noteText);
    echo "Note created successfully";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Note</title>
</head>
<body>
    <h1>Create Note</h1>
    <form id="create-note-form" method="POST">
        <textarea id="note-text" rows="10" cols="50"></textarea><br>
        <input type="submit" value="Create Note">
    </form>

    <a href="view_notes.php">View Notes</a>
</body>
</html>
