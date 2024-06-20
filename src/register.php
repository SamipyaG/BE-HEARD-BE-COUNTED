<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="box-container">
        <h1>Register</h1>
        <?php if(isset($_SESSION['validation']['register'])): ?>
            <span class="validate"><?php echo $_SESSION['validation']['register']; ?></span>
            <?php unset($_SESSION['validation']['register']); ?>
        <?php endif; ?>
        <form id="registrationForm" action="./backend/useraction.php" method="POST" onsubmit="return validateForm()">
            <div class="form">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" class="Form" placeholder="First Name" name="firstname" required />
                <?php if(isset($_SESSION['validation']['firstname'])): ?>
                    <span class="validate"><?php echo $_SESSION['validation']['firstname']; ?></span>
                    <?php unset($_SESSION['validation']['firstname']); ?>
                <?php endif; ?>
            </div>
            <div class="form">
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" class="Form" placeholder="Last Name" name="lastname" required />
                <?php if(isset($_SESSION['validation']['lastname'])): ?>
                    <span class="validate"><?php echo $_SESSION['validation']['lastname']; ?></span>
                    <?php unset($_SESSION['validation']['lastname']); ?>
                <?php endif; ?>
            </div>
            <div class="form">
                <label for="email">Email:</label>
                <input type="email" id="email" class="Form" placeholder="email@example.com" name="email" required />
                <?php if(isset($_SESSION['validation']['email'])): ?>
                    <span class="validate"><?php echo $_SESSION['validation']['email']; ?></span>
                    <?php unset($_SESSION['validation']['email']); ?>
                <?php endif; ?>
            </div>
            <div class="form">
                <label for="password">Password:</label>
                <input type="password" id="password" class="Form" placeholder="Password" name="password" required minlength="8" maxlength="12" />
                <?php if(isset($_SESSION['validation']['password'])): ?>
                    <span class="validate"><?php echo $_SESSION['validation']['password']; ?></span>
                    <?php unset($_SESSION['validation']['password']); ?>
                <?php endif; ?>
            </div>
            <div class="form">
                <label for="idnum">CRN Number:</label>
                <input type="text" id="idnum" class="Form" placeholder="CRN number" name="idnum" required />
                <?php if(isset($_SESSION['validation']['idnum'])): ?>
                    <span class="validate"><?php echo $_SESSION['validation']['idnum']; ?></span>
                    <?php unset($_SESSION['validation']['idnum']); ?>
                <?php endif; ?>
            </div>
            <div class="form">
                <label for="age">Age:</label>
                <input type="number" id="age" class="Form" placeholder="Age" name="age" min="18" />
                <?php if(isset($_SESSION['validation']['age'])): ?>
                    <span class="validate"><?php echo $_SESSION['validation']['age']; ?></span>
                    <?php unset($_SESSION['validation']['age']); ?>
                <?php endif; ?>
            </div>
            <div class="role">
                <label for="role">Select Role:</label>
                <select name="role" id="role">
                    <option value="user" selected>User</option>
                    <option value="admin">Admin</option>
                </select>
                <?php if(isset($_SESSION['validation']['role'])): ?>
                    <span class="validate"><?php echo $_SESSION['validation']['role']; ?></span>
                    <?php unset($_SESSION['validation']['role']); ?>
                <?php endif; ?>
            </div>
            <div class="content">
                <button type="submit" class="Register" name="register">Register</button>
            </div>
            <div class="text-center">
                <p class="Login">Already have an account? <a href="../src/login.php" class="link">Login</a></p>
            </div>
        </form>
    </div>
    <script>
        function validateForm() {
    var firstname = document.getElementById('firstname').value.trim();
    var lastname = document.getElementById('lastname').value.trim();
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();
    var idnum = document.getElementById('idnum').value.trim();
    var age = document.getElementById('age').value.trim();
    
    var isValid = true;

    // Validation for First Name
    if (firstname === "") {
        alert("Please enter your first name");
        isValid = false;
    } else if (!/^[A-Za-z]+$/.test(firstname)) {
        alert("First name should only contain alphabetic characters");
        isValid = false;
    }

    // Validation for Last Name
    if (lastname === "") {
        alert("Please enter your last name");
        isValid = false;
    } else if (!/^[A-Za-z]+$/.test(lastname)) {
        alert("Last name should only contain alphabetic characters");
        isValid = false;
    }

    // Validation for Email
    if (email === "") {
        alert("Please enter your email");
        isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(email)) {
        alert("Please enter a valid email address");
        isValid = false;
    }

    // Validation for Password
    if (password === "") {
        alert("Please enter a password");
        isValid = false;
    } else if (password.length < 8 || password.length > 12) {
        alert("Password must be between 8 to 12 characters");
        isValid = false;
    }

    // Validation for CRN Number
    if (idnum === "") {
        alert("Please enter your CRN number");
        isValid = false;
    }

    // Validation for Age
    if (age === "") {
        alert("Please enter your age");
        isValid = false;
    } else if (isNaN(age) || parseInt(age) < 18) {
        alert("Age must be a number greater than or equal to 18");
        isValid = false;
    }

    return isValid;
}

    </script>
</body>
</html>
