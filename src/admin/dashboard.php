<?php session_start(); 
include_once '../backend/logic.php';

$contestants = getContestants();
$winner = getWinner();
?>
<!DOCTYPE html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
              <a class="Link" href="/">Logout</a>
    <section class="bg-image">
        <div class="align-items-center">
            <!-- show icon to print results-->

            <div class="container">
                <!-- voting page displaying all users and a button to vote-->

                <div class="Row">
                    <div class="Col">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-center">
                                    General Election
                                </h1>
                                <!-- display a table of contestants and a button to vote -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            
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
                                    <button type="button" name="vote" class="button"><?php echo $contestant['vote_count'] ?></button>
                                </form>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr class="" style="background-color: gray;">
                                <td>WINNER</td>
                                <td><?php echo $winner['first_name'] ?></td>
                                <td><?php echo $winner['vote_count']  ?></td>
                            </tr>
                            
                        </tbody>
                                </table>

                                <div class="row">
                                    <a href="dashboard.html" class="col">Logout</a>
                                    <a href="print.html" class="print">Print</a>
                                </div>
                        
                            </div>
                        </div>
                        </div>
                    </div>

            </div>
        </div>
</body>
</html>