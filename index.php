<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Note Taking App</title>
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
	
    <script>
        $(document).ready(function() {
            // Create note
            $('#create-note-form').submit(function(e) {
                e.preventDefault();

                var noteText = $('#note-text').val();
                $.ajax({
                    url: 'note_create.php',
                    type: 'POST',
                    data: { note_text: noteText },
                    success: function(response) {
                        alert("Note created successfully");
                        loadNotes();
                        $('#note-text').val('');
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred while creating the note.");
                        console.log(xhr.responseText);
                    }
                });
            });

            // Delete note
            $(document).on('click', '.delete-note', function(e) {
                e.preventDefault();
                var noteFile = $(this).data('file');

                if (confirm("Are you sure you want to delete this note?")) {
                    $.ajax({
                        url: 'note_delete.php',
                        type: 'POST',
                        data: { note_filename: noteFile },
                        success: function(response) {
                            alert(response);
                            loadNotes();
                        },
                        error: function(xhr, status, error) {
                            alert("An error occurred while deleting the note.");
                            console.log(xhr.responseText);
                        }
                    });
                }
            });

            // Edit note
            $(document).on('click', '.edit-note', function(e) {
                e.preventDefault();
                var noteFile = $(this).data('file');
                window.location.href = 'note_edit.php?file=' + encodeURIComponent(noteFile);
            });

            // Load notes
            function loadNotes() {
                $.ajax({
                    url: 'view_notes.php',
                    type: 'GET',
                    success: function(response) {
                        $('#note-list').html(response);
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred while loading the notes.");
                        console.log(xhr.responseText);
                    }
                });
            }

            // Initial load of notes
            loadNotes();
        });
    </script>
</head>
<body>
     <h1 class="red-text">Welcome to Note Taking App</h1>

    <h2 class="green-text" >Create Note</h2>
    <form id="create-note-form" method="POST">
        <textarea id="note-text" rows="10" cols="50"></textarea><br>
        <input type="submit" value="Create Note" class="hover-button">
    </form>
	<br>
	<br>
	<button class="my-button" ><a href="export_notes.php">Export Notes</a> <!-- Add export link --></button>
	<br>
	<br>
    <button class="my-button"><a href="import_notes.php">Import Notes</a> <!-- Add import link --></button>
	<br>
    <h2 class="white-text">All Notes</h2>
	<h2 class="white-text">Click on a note name to edit it.</h2>
    <div id="note-list" class="white-text"></div>
	

</body>

</html>


<script>
        $(document).ready(function() {
            // Logout button
            $('#logout-button').click(function() {
                $.ajax({
                    url: 'logout.php',
                    type: 'POST',
                    success: function(response) {
                        window.location.href = 'login.php';
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</head>
<br>

<body>
    <button id="logout-button" class="hover-button">Logout</button>
	</body>