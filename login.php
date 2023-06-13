<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: index.php");
    exit;
}

// Check login credentials
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password match (replace with your own logic)
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['loggedin'] = true;
        header("Location: index.php");
        exit;
    } else {
        $loginError = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Notepad App</title>
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
    </style>
    <style>
        body {
            background-image: url('https://previews.123rf.com/images/kwanchai123rf/kwanchai123rf1506/kwanchai123rf150600983/41532123-red-coffee-cup-with-smoke-on-water-drops-glass-window-background-with-text-waiting-for-you.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        #note-text {
            background-color: transparent;
            border: 2px solid #ccc;
            color: #fff;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
</head>
<body>
    <h1>Welcome to Notepad App!</h1>
    <h1>Login Area</h1>
    <?php if (isset($loginError)): ?>
        <p><?= $loginError ?></p>
    <?php endif; ?>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="note-text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="note-text" name="password" required><br>
        <input type="submit" value="Login" class ="hover-button" >
    </form>
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
<br>
<br>
<br>
<br>
<h1 class="white-text"><?php include 'footer.php';?>