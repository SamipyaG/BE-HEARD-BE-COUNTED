<?php
session_start();

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

function register($id, $firstname, $lastname, $email, $password, $age){
    $conn = connect();
    $sql = "INSERT INTO tbl_users ( id, first_name, last_name, email, password, age, role) VALUES ('$id','$firstname', '$lastname', '$email', '$password', '$age', 'user')";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }
    else{
       return false;
    }
}


function login($email, $password){
    $conn = connect();
    $sql = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        return true;
    }
    else{
        return false;
    }
    
}

function logout(){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['role']);
    header("Location: ../login.php");
}

function vote($voteeId, $voterId){
    if(hasVoted($voterId)){
        $_SESSION['message'] = "You have already voted";
        return false;
    }
    else{
        $conn = connect();
        $sql = "SELECT * FROM tbl_constestants WHERE idcard_number = '$voteeId'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $votee = mysqli_fetch_assoc($result);
            $voteeId = $votee['idcard_number'];
            $sql = "UPDATE tbl_constestants SET vote_count = vote_count + 1 WHERE idcard_number = '$voteeId'";
            $result = mysqli_query($conn, $sql);
            if($result){
                $updateuserSql = "UPDATE tbl_users SET hasVoted='1' WHERE id='$voterId'";
                $query = mysqli_query($conn, $updateuserSql);
                if($query){
                    $_SESSION['message'] = "Vote successful";
                    return true;
                }
                else{
                    $_SESSION['message'] = "Sorry Could not update user Table";
                    return true;
                }
                
            }
            else{
                $_SESSION['message'] = "Vote failed";
                return false;
            }
        }
        else{
            $_SESSION['message'] = "Votee not found";
            return false;
        }
    }
}

function connect(){
   $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Voting";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        return $conn;
    }
}


    function verifyEmail($email){
        $conn = connect();
        $sql = "SELECT * FROM tbl_users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function getContestants(){
        $conn = connect();
        $sql = "SELECT * FROM tbl_constestants";
        $result = mysqli_query($conn, $sql);
        $contestants = [];
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $contestants[] = $row;
            }
            return $contestants;
        }
        else{
            return [];
        }
    }

    // check if voter has voted
    function hasVoted($idnumber){
        $conn = connect();
        $sql = "SELECT * FROM tbl_users WHERE id = '$idnumber'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);
            if($user['hasVoted'] == '1'){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    function getWinner(){
        $conn = connect();
        $sql = "SELECT * FROM tbl_constestants WHERE vote_count=(SELECT MAX(vote_count) FROM tbl_constestants)";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            return mysqli_fetch_assoc($result);
        }
        else{
            return null;
        }

    }
    