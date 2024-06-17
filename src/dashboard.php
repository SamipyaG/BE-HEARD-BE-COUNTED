<?php  
include_once './backend/logic.php';

$contestants = getContestants();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
         #contestantImage{
            width: 100px;
            height: 100px;
            border-radius: 50%;
         }
    </style>
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
                <form action="./backend/useraction.php" method="post">
                    <button type="submit" class="btn btn-primary" name="logout">Logout</button>
                </form>
            </div>
          </div>
        </div>
      </nav>

      <?php
        if(isset($_SESSION['message'])): ?>
        <div class="alert alert-success mt-5">
        <span class="m-auto">
            <?php echo $_SESSION['message']; ?>
            <?php unset($_SESSION['message']) ?>
        </span>
    </div>
    <?php endif; ?>

    <section class="vh-100 bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
        <!-- voting page displaying all users and a button to vote-->
                    <?php
                        if(isset($_SESSION['email'])): ?>
                        <div class="alert alert-success mt-5">
                        <span class="m-auto">
                            <?php echo "HI ". $_SESSION['email']; ?>
                        </span>
                    </div>
                    <?php endif; ?>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card mt-5">
                
                <div class="card-body p-5 text-center">
                    <h1 class="mb-5 text-center">
                        Welcome to the voting page
                    </h1>
                    <!-- display a table of contestants and a button to vote -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">PHOTO</th>
                                <th scope="col">Name</th>
                                <th scope="col">Vote</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($contestants as $contestant){ ?>
                            <tr>
                                <td>
                                    <?php $image = $contestant['image_url'] ?>
                                    <img src="../assets/images/<?php echo '$image'?>" class="image rounded-circle" alt="image" style="height: 100px; width: 100px; border-radius: 50%" />
                                </td>
                                <td><?php echo $contestant['first_name'] . ' ' . $contestant['last_name']; ?></td>
                                <td>
                                <form action="./backend/useraction.php" method="POST">
                                    <input type="hidden" value="<?php echo $contestant['idcard_number'] ?>" name="idnumber">
                                    <input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="voterId">
                                    <button type="submit" name="vote" class="btn btn-primary">Vote</button>
                                </form>
                                </td>
                            </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>

            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>


</body>
</html>