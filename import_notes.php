<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Handle import from zip
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $zip = new ZipArchive;
    $zipFile = $_FILES['import_zip']['tmp_name'];
    if ($zip->open($zipFile) === true) {
        $zip->extractTo('notes/');
        $zip->close();
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Import Notes</title>
	<style>
	    .my-button {
            color: blue; /* Change this to the desired color */
            background-color: green;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .my-button:hover {
            color: blue; /* Change this to the desired hover color */
            padding: 15px 25px;
            font-size: 18px;
        }
        .hover-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #f1f1f1;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .hover-button:hover {
            padding: 15px 25px;
            font-size: 18px;
        }
    </style>
	 <style>
        .red-text {
            color: red;
        }
		.green-text {
            color: green;
        }
		.white-text{
			color: white;
		}
    </style>
    <style>
        body {
            background-image: url('https://previews.123rf.com/images/kwanchai123rf/kwanchai123rf1506/kwanchai123rf150600983/41532123-red-coffee-cup-with-smoke-on-water-drops-glass-window-background-with-text-waiting-for-you.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        #note-text {
            background-color: transparent;
            border: 1px solid #ccc;
            color: #fff;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Import Notes</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="import_zip">
        <input type="submit" value="Import">
    </form>
</body>
</html>
<br>
<body>
    <!-- ... -->
    <button class= "hover-button" ><a href="index.php">Back</a> <!-- Add back button --></button>
</body>