<?php session_start(); 
include_once '../backend/logic.php';

$contestants = getContestants();
$winner = getWinner();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Election</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/style1.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #45a049;
        }
        .winner-row {
            background-color: gray;
            font-weight: bold;
        }
    </style>
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
<form action="../../index.html" method="post">
    <button type="submit" class="button" name="logout">Logout</button>
</form><br><br>

<section class="bg-image">
    <div class="align-items-center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">
                                General Election
                            </h1>
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
                                        <td><?php echo $contestant['first_name'] . ' ' . $contestant['last_name']; ?></td>
                                        <td>
                                            <form action="./backend/useraction.php" method="POST">
                                                <input type="hidden" value="<?php echo $contestant['idcard_number'] ?>" name="idnumber">
                                                <button type="submit" name="vote" class="button"><?php echo $contestant['vote_count'] ?></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <tr class="winner-row">
                                        <td>WINNER</td>
                                        <td><?php echo $winner['first_name'] . ' ' . $winner['last_name']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer id="main-footer">
    <p>&copy; 2024 Himalaya Darsan College. All rights reserved.</p>
</footer>
</body>
</html>
