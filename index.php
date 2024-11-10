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
        <div class="form-container sign-up" id="signUp">
            <form method="post" action="register.php">
                <h1>Create Account</h1>
				<form method="post" action="register.php">
				<input type="text" name="fName" id="fName" placeholder="First Name">
                <input type="text" name="lName" id="lName" placeholder="Last Name">
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="password" name="password" id="password" placeholder="Password">
				<input type="submit" class="btn" value="Sign Up" name="signUp">
            </form>
        </div>
        <div class="form-container sign-in" id="signIn" >
            <form method="post" action="register.php">
                <h1>CondoMeAndYou</h1>
				<form method="post" action="register.php">
                <span>Enter your Email and Password</span>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="password" name="password" id="password" placeholder="Password" required>

                <input type="submit" class="btn" value="Sign In" name="signIn">
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome To CondoMeAndYou!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Neighbor!</h1>
                    <p>This is still in development website for helping you to check in your bills. Click SIGN UP to see more</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
        <div class="footer">
            <p>&copy; 2024 CondoMeAndYou - All rights reserved.</p>
        </div>
    <script src="script.js"></script>
</body>

</html>