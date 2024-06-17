<?php  
include_once './backend/logic.php';

$contestants = getContestants();

?>
<!DOCTYPE html>
<head>
    <title>login</title>
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
                <form action="./backend/useraction.php" method="post">
                    <button type="submit" class="button" name="logout">Logout</button>
                </form>

      <?php
        if(isset($_SESSION['message'])): ?>
        <div class="alert">
        <span class="auto">
            <?php echo $_SESSION['message']; ?>
            <?php unset($_SESSION['message']) ?>
        </span>
    </div>
    <?php endif; ?>

    <section class="bg-image">
        <div class="align-items-center">
    <div class="container">
        <!-- voting page displaying all users and a button to vote-->
                    <?php
                        if(isset($_SESSION['email'])): ?>
                        <div class="Alert">
                        <span class="Auto">
                            <?php echo "HI ". $_SESSION['email']; ?>
                        </span>
                    </div>
                    <?php endif; ?>
    <div class="Row">
        <div class="Col">
            <div class="Card">
                
                <div class="card-body">
                    <h1 class="text-center">
                        Welcome to the voting page
                    </h1>
                    <!-- display a table of contestants and a button to vote -->
                    <table class="table">
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
                                    <img src="../assets/images/<?php echo '$image'?>" class="image" alt="image" style="height: 100px; width: 100px; border-radius: 50%" />
                                </td>
                                <td><?php echo $contestant['first_name'] . ' ' . $contestant['last_name']; ?></td>
                                <td>
                                <form action="./backend/useraction.php" method="POST">
                                    <input type="hidden" value="<?php echo $contestant['idcard_number'] ?>" name="idnumber">
                                    <input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="voterId">
                                    <button type="submit" name="vote" class="button">Vote</button>
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

</body>
</html>