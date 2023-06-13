<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Get all note files
$noteFiles = glob('notes/*.txt');
?>

<style>
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
		a {
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
	


<ul>
    <?php foreach ($noteFiles as $noteFile): ?>
   <h1 class ="white-text" > <li>
            <a " href="#" class="edit-note" data-file="<?= urlencode(basename($noteFile)) ?>">
                <?= basename($noteFile) ?>
            </a>&nbsp;
            <a  href="#" class="delete-note" data-file="<?= urlencode(basename($noteFile)) ?>">
                    &nbsp;Delete
            </a>
        </li></h1>
    <?php endforeach; ?>
</ul>
<body>
    <!-- ... -->
    <a href="index.php">Back</a> <!-- Add back button -->
</body>
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
<br>
<h1 class="white-text"><?php include 'footer.php';?>