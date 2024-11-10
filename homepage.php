<?php
session_start();
include("connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>CondoMeAndYou</title>
</head>
<body>


    <div class="container" id="container">
        <div class="form-container sign-up" id="Look">
            <form method="post" action="look.php">
        <label for="room">Room Number:</label>
        <input type="number" name="room" id="room" required>
        <input type="submit" class="btn" value="Search" name="Look">

            </form>
        </div>
        <div class="form-container sign-in" id="signIn" >
            <form method="post" action="register.php">
                <h1>CondoMeAndYou</h1>
				<form method="post" action="register.php">
                <span></span>

            </form>
        </div>

       <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>CondoMeAndYou!</h1>
                    <p>Enter The Room That You Want To See The Bill Information Of</p>
                    <button class="hidden" id="login">Return</button>
                </div>
                <div class="toggle-panel toggle-right">

                <label for="room">Welcome To CondoMeAndYou</label>
                    <h1>Enter The Room Number You Want To See The Bills With:</h1>
                    <p>This is still in development website for helping you in your bills.</p>
                    <button class="hidden" id="register">Search Bills</button>
            
        </div>
    </div>
</div>
</div>

    <script src="script.js"></script>
	        <div class="footer">
            <p>&copy; 2024 CondoMeAndYou - All rights reserved.</p>
        </div>
        <!-- Logout button -->
        <a href="logout.php">Logout</a>
</body>
</html>