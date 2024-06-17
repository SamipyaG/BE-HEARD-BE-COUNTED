<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
              <a class="nav-link" href="register.php">Register</a>
            </div>
          </div>
        </div>
      </nav>

    <!-- login -->
    <section class="vh-100 bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card">
                            <div class="card-body p-5 text-center">
                                <h1 class="mb-5 text-center">
                                    Login
                                </h1>

                                <?php 
                                    if(isset($_SESSION['message'])){
                                        echo "<div class='alert alert-success'>".$_SESSION['message']."</div>";
                                        unset($_SESSION['message']);
                                    }

                                ?>
                                <form action="./backend/useraction.php" method="POST">
                                    <div class="form-outline mb-4">
                                        <input type="email" id="form3Example1c" class="form-control form-control-lg" name="email" placeholder="email@example.com"/>
                                        <?php if(isset($_SESSION['validation']['email'])): ?>
                                            <span class="text-danger"><?php 
                                            echo $_SESSION['validation']['email']; 
                                            unset($_SESSION['validation']['email']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example3c" class="form-control form-control-lg" name="password" placeholder="*******" />
                                        <?php if(isset($_SESSION['validation']['password'])): ?>
                                            <span class="text-danger"><?php 
                                            echo $_SESSION['validation']['password']; 
                                            unset($_SESSION['validation']['password']);
                                            ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <a href="passwordreset.html">Forgot password?</a>
                                        </div>
                                    </div>
                                <button type="submit" class="login btn btn-primary w-50 mr-1 " name="login">Login</button>
                                
                                    <p class="mt-2">Not a member? <a href="register.php">Register</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>
</html>