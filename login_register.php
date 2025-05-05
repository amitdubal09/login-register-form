<?php
session_start();
require_once 'config.php';

if (isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $checkEmail = $conn->query("SELECT email FROM user WHERE email = '$email'");
    if ($checkEmail->num_rows > 0){
        $_SESSION['register_error'] = 'Email is already registerd';
        $_SESSION['active_form'] = 'register';
        header("Location: index.php");
    } 
    else{
        $conn->query("INSERT INTO `user` (`name`, `email`, `password`, `role`)VALUES ('$name', '$email', '$password', '$role')");
        if($conn->error){
            echo($conn->error);
        }else{
            header("Location: site.php");
        }
    }
   
    exit();
}

if (isset($_POST['login'])){
    $email = $_POST['Username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM `user` WHERE `email` = '$email'");
    if ($result-> num_rows>0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            if ($user['role'] === 'admin'){
                header("Location: admin_page.php");
            } else {
                header("Location: user_page.php");
            }
            exit();
        }
    }

    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_from'] = 'login';
    header("Location: index.php");
    exit();
}


?>