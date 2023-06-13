<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Handle export to zip
$noteFiles = glob('notes/*.txt');
$zip = new ZipArchive;
$zipName = 'notes.zip';
if ($zip->open($zipName, ZipArchive::CREATE) === true) {
    foreach ($noteFiles as $noteFile) {
        $zip->addFile($noteFile);
    }
    $zip->close();
    header("Content-Type: application/zip");
    header("Content-Disposition: attachment; filename=\"$zipName\"");
    readfile($zipName);
    unlink($zipName);
    exit;
}
?>
