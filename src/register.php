<?php session_start() ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Voting System</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse offset-8" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" href="login.php">Login</a>
              <!-- <a class="nav-link" href="src/register.php">Register</a> -->
            </div>
          </div>
        </div>
      </nav>

      <section class="vh-100 bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card">
                            <div class="card-body p-5 text-center">
                                <h1 class="mb-5 text-center text-uppercase">
                                    Register 
                                    <?php if(isset($_SESSION['validation']['firstname'])): ?>
                                            <span class="text-danger"><?php 
                                            echo $_SESSION['validation']['registser']; 
                                            unset($_SESSION['validation']['register']);
                                            ?></span>
                                            
                                        <?php endif; ?>
                                </h1>
                                <form action="./backend/useraction.php" method="POST">
                                    <div class="form-outline form-white mb-2">
                                        <input type="text" id="typeEmailX" class="form-control form-control-lg"  placeholder="First Names" name="firstname" required />
                                        <?php if(isset($_SESSION['validation']['firstname'])): ?>
                                            <span class="text-danger"><?php 
                                            echo $_SESSION['validation']['firstname']; 
                                            unset($_SESSION['validation']['firstname']);
                                            ?></span>
                                            
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-outline form-white mb-2">
                                        <input type="text" id="typeEmailX" class="form-control form-control-lg"  placeholder="Last Names" name="lastname" required />
                                        <?php if(isset($_SESSION['validation']['lastname'])): ?>
                                            <span class="text-danger"><?php 
                                            echo $_SESSION['validation']['lastname']; 
                                            unset($_SESSION['validation']['lastname']);
                                            ?></span>
                                            
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-outline form-white mb-2">
                                        <input type="email" id="typeEmailX" class="form-control form-control-lg"  placeholder="email@example.com" name="email" required />
                                        <?php if(isset($_SESSION['validation']['email'])): ?>
                                            <span class="text-danger"><?php 
                                            echo $_SESSION['validation']['email']; 
                                            unset($_SESSION['validation']['email']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-outline form-white mb-2">
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg"  placeholder="Password" name="password" required minlength="8" maxlength="12"/>
                                        <?php if(isset($_SESSION['validation']['password'])): ?>
                                            <span class="text-danger"><?php 
                                            echo $_SESSION['validation']['password']; 
                                            unset($_SESSION['validation']['password']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-outline form-white mb-2">
                                        <input type="text" id="idnum" class="form-control form-control-lg"  placeholder="ID NUMBER" name="idnum" required />
                                        <?php if(isset($_SESSION['validation']['idnum'])): ?>
                                            <span class="text-danger"><?php 
                                            echo $_SESSION['validation']['idnum']; 
                                            unset($_SESSION['validation']['idnum']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-outline form-white mb-2">
                                        <input type="number" id="age" class="form-control form-control-lg"  placeholder="Age" name="age" min="18"/>
                                        <?php if(isset($_SESSION['validation']['age'])): ?>
                                            <span class="text-danger"><?php 
                                            echo $_SESSION['validation']['age']; 
                                            unset($_SESSION['validation']['age']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-secondary w-50" name="register">Register</button>
                                    </div>

                                    <div class="text-center">
                                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="../src/login.php" class="link-danger">Login</a></p>
                                    </div>
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>


</body>
</html>