<?php session_start() ; ?>
<!DOCTYPE html>
<head>
    
    <title>login</title>
   
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

                                <h1>
                                    Register 
                                    <?php if(isset($_SESSION['validation']['firstname'])): ?>
                                            <span class="validate"><?php 
                                            echo $_SESSION['validation']['registser']; 
                                            unset($_SESSION['validation']['register']);
                                            ?></span>
                                            
                                        <?php endif; ?>
                                </h1>
                                <form action="./backend/useraction.php" method="POST">
                                    <div class="form">
                                        <input type="text" id="Email" class="Form"  placeholder="First Names" name="firstname" required />
                                        <?php if(isset($_SESSION['validation']['firstname'])): ?>
                                            <span class="validate"><?php 
                                            echo $_SESSION['validation']['firstname']; 
                                            unset($_SESSION['validation']['firstname']);
                                            ?></span>
                                            
                                        <?php endif; ?>
                                    </div>
                                    <div class="form">
                                        <input type="text" id="Email" class="Form"  placeholder="Last Names" name="lastname" required />
                                        <?php if(isset($_SESSION['validation']['lastname'])): ?>
                                            <span class="validate"><?php 
                                            echo $_SESSION['validation']['lastname']; 
                                            unset($_SESSION['validation']['lastname']);
                                            ?></span>
                                            
                                        <?php endif; ?>
                                    </div>
                                    <div class="form">
                                        <input type="email" id="Email" class="Form"  placeholder="email@example.com" name="email" required />
                                        <?php if(isset($_SESSION['validation']['email'])): ?>
                                            <span class="validate"><?php 
                                            echo $_SESSION['validation']['email']; 
                                            unset($_SESSION['validation']['email']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form">
                                        <input type="password" id="Password" class="Form"  placeholder="Password" name="password" required minlength="8" maxlength="12"/>
                                        <?php if(isset($_SESSION['validation']['password'])): ?>
                                            <span class="validate"><?php 
                                            echo $_SESSION['validation']['password']; 
                                            unset($_SESSION['validation']['password']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form">
                                        <input type="text" id="id" class="Form"  placeholder="ID NUMBER" name="idnum" required />
                                        <?php if(isset($_SESSION['validation']['idnum'])): ?>
                                            <span class="validate"><?php 
                                            echo $_SESSION['validation']['idnum']; 
                                            unset($_SESSION['validation']['idnum']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form">
                                        <input type="number" id="age" class="Form"  placeholder="Age" name="age" min="18"/>
                                        <?php if(isset($_SESSION['validation']['age'])): ?>
                                            <span class="validate"><?php 
                                            echo $_SESSION['validation']['age']; 
                                            unset($_SESSION['validation']['age']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="content">
                                        <button type="submit" class="Register" name="register">Register</button>
                                    </div>

                                    <div class="text-center">
                                        <p class="Login">Already have an account? <a href="../src/login.php" class="link">Login</a></p>
                                    </div>
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                        </div>

</body>
</html>