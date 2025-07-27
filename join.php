<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/join.css">
</head>
<body>
    <div class="container" id="signup">
        <h1 class="form-title">Register</h1>
        <form action="register.php" method="POST">
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" id="fname" name="fname" placeholder="First Name" required>
                <label for="fname">First Name</label>
            </div>
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" id="lname" name="lname" placeholder="Last Name" required>
                <label for="lname">Last Name</label>
            </div>
            <div class="input-group">
                <i class="fa fa-envelope"></i>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>
        <p class="or">------- OR -------</p>
        <div class="icons">
            <i class="fa fa-google"></i>
            <i class="fa fa-facebook"></i>
        </div>
        <div class="links">
            <p>Already have an account? </p>
            <button id="signinButton">Sign In</button>
        </div>
    </div>

    <div class="container" id="signin" style="display:none;">
        <h1 class="form-title">Sign In</h1>
        <form action="register.php" method="POST">
            <div class="input-group">
                <i class="fa fa-envelope"></i>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <p class="recover">
                <a href="#">Recover password</a>
            </p>
            <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <p class="or">------- OR -------</p>
        <div class="icons">
            <i class="fa fa-google"></i>
            <i class="fa fa-facebook"></i>
        </div>
        <div class="links">
            <p>Don't have an account? </p>
            <button id="signupButton">Sign Up</button>
        </div>
    </div>

    <script src="js/join.js"></script>
</body>
</html>