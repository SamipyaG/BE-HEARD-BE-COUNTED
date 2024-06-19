<?php session_start(); ?>
<!DOCTYPE html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="box-container">
                        <div class="card">
                                <h1>
                                    Login
                                </h1>
                                <form action="./backend/useraction.php" method="POST">
                                    <div class="email">
                                        <input type="email" id="Example" class="Form" name="email" placeholder="email@example.com"/>
                                        <?php if(isset($_SESSION['validation']['email'])): ?>
                                            <span class="validate"><?php 
                                            echo $_SESSION['validation']['email']; 
                                            unset($_SESSION['validation']['email']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" id="example" class="Form" name="password" placeholder="*******" />
                                        <?php if(isset($_SESSION['validation']['password'])): ?>
                                            <span class="validate"><?php 
                                            echo $_SESSION['validation']['password']; 
                                            unset($_SESSION['validation']['password']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>
                                   
                                    <button type="submit" class="Register " name="login">Login</button>
                                   
                                    <p class="Login"> <a href="../src/passwordreset.html" class="link">Forgot password?</a></p>
                                    <p class="Login">Not a member? <a href="../src/Register.php" class="link"><br>Register</a></p>
                                    
                                </form>
                           </div></div>
</body>
</html>