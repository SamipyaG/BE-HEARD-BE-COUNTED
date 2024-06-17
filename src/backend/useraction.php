<?php

include_once './logic.php';
session_start();

$validation = [];

if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $id = $_POST['idnum'];

    if(empty($firstname)){
        $validation['firstname'] = "First name is required";
    }
    if(empty($lastname)){
        $validation['lastname'] = "Last name is required";
    }
    if(empty($email)){
        $validation['email'] = "Email is required";
    }
    if(empty($password)){
        $validation['password'] = "Password is required";
    }

    if(strlen($password) < 8){
        $validation['password'] = "Password must be at least 8 characters";
    }

    if(strlen($password) >= 12){
        $validation['password'] = "Password must be less than or equal to 12 characters";
    }
    if(empty($age)){
        $validation['age'] = "Age is required";
    }

    if($age < 18){
        $validation['age'] = "Age must be at least 18 years";
    }
    if(empty($id)){
        $validation['idnum'] = "ID number is required";
    }
    if(strlen($id) < 10){
        $validation['idnum'] = "ID number must be 10 digits";
    }
    if(strlen($id) > 10){
        $validation['idnum'] = "ID number must be 10 digits";
    }

    if(verifyEmail($email)){
        $validation['email'] = "Email already exists";
    }

    if(count($validation) == 0){
        // register the user
        if(register($id, $firstname, $lastname, $email, $password, $age)){
            $_SESSION['message'] = "Registration successful please login";
            header("Location: ../login.php");
        }
        else{
            $validation['register'] = "Registration failed";
            header("Location: ../register.php");
        }
    }
    else{
        $_SESSION['validation'] = $validation;
        header("Location: ../register.php");
    }

}

elseif(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)){
        $validation['email'] = "Email is required";
    }
    if(empty($password)){
        $validation['password'] = "Password is required";
    }

    if(strlen($password) < 8){
        $validation['password'] = "Password must be at least 8 characters";
    }

    if(strlen($password) >= 12){
        $validation['password'] = "Password must be less than or equal to 12 characters";
    }

    if(count($validation) == 0){
        // login the user
        if(login($email, $password)){
            if($_SESSION['role'] == 'admin'){
                header("Location: ../admin/dashboard.php");
            }else{
                header("Location: ../dashboard.php");
            }
        }
        else{
            $validation['login'] = "Login failed";
            $_SESSION['validation'] = $validation;
            header("Location: ../login.php");
        }
    }
    else{
        $_SESSION['validation'] = $validation;
        header("Location: ../login.php");
    }
    
}

elseif(isset($_POST['logout'])){
    logout();
}

elseif(isset($_POST['vote'])){
    $voteeId = $_POST['idnumber'];
    $voterId = $_POST['voterId'];
    if(vote($voteeId, $voterId)){
        $_SESSION['message'] = "Vote successful";
        header("Location: ../dashboard.php");
    }else{
        $_SESSION['message'] = "Sorry you have already voted";
        header("Location: ../dashboard.php");
    }
}


else{
    echo "You missed the form";
}