<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Get the note file to edit
if (isset($_GET['file'])) {
    $noteFile = $_GET['file'];
    $noteFilePath = "notes/" . urlencode($noteFile);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $noteText = $_POST['note_text'];
        file_put_contents($noteFilePath, $noteText);
        echo "Note updated successfully";
        exit;
    }

    $noteContent = file_get_contents($noteFilePath);
} else {
    header("Location: view_notes.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Note</title>
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
        .red-text {
            color: red;
        }
		.green-text {
            color: green;
        }
		.white-text{
			color: white;
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
           
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Update note
            $('#edit-note-form').submit(function(e) {
                e.preventDefault();

                var noteText = $('#note-text').val();
                $.ajax({
                    url: 'note_edit.php?file=<?= urlencode($noteFile) ?>',
                    type: 'POST',
                    data: { note_text: noteText },
                    success: function(response) {
                        alert("Note updated successfully");
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred while updating the note.");
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h1>Edit Note</h1>
    <form id="edit-note-form" method="POST">
        <textarea id="note-text" name="note_text" rows="10" cols="50"><?= htmlspecialchars($noteContent) ?></textarea><br>
        <input type="submit" value="Update Note">
    </form>
	<br>
    <button><a href="view_notes.php" class="red-text" class="hover-button">Back to Notes</a></button>
</body>
</html>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<h1 class="white-text"><?php include 'footer.php';?>