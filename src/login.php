<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/style1.css">
    <script>
        function validateForm() {
            var email = document.getElementById("Example").value;
            var password = document.getElementById("example").value;
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

            // Validate email
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Validate password
            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            }

            // If all validations pass, allow form submission
            return true;
        }
    </script>
</head>
<body>
<header id="main-header">
        <nav class="navbar">
            <ul class="nav-list">
                <li class="nav-item"><a href="../index.html" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="../src/register.php" class="nav-link">Register</a></li>
                <li class="nav-item"><a href="../src/login.php" class="nav-link">Login</a></li>
            </ul>
        </nav>
    </header>
<div class="box-container">
    <div class="card">
        <h1>Login</h1>
        <form action="./backend/useraction.php" method="POST" onsubmit="return validateForm()">
            <div class="email">
                <input type="email" id="Example" class="Form" name="email" placeholder="email@example.com" required />
                <?php if(isset($_SESSION['validation']['email'])): ?>
                    <span class="validate"><?php 
                    echo $_SESSION['validation']['email']; 
                    unset($_SESSION['validation']['email']);
                    ?></span>
                <?php endif; ?>
            </div>
            <div class="form-outline mb-4">
                <input type="password" id="example" class="Form" name="password" placeholder="*******" required />
                <?php if(isset($_SESSION['validation']['password'])): ?>
                    <span class="validate"><?php 
                    echo $_SESSION['validation']['password']; 
                    unset($_SESSION['validation']['password']);
                    ?></span>
                <?php endif; ?>
            </div>
            <button type="submit" class="Register" name="login">Login</button>
            <p class="Login"> <a href="../src/passwordreset.html" class="link">Forgot password?</a></p>
            <p class="Login">Not a member? <a href="../src/Register.php" class="link"><br>Register</a></p>
        </form>
    </div>
</div>
<footer id="main-footer">
    <p>&copy; 2024 Himalaya Darsan College. All rights reserved.</p>
</footer>
</body>
</html>
