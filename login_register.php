<?php
    require_once 'confige.php';
    session_start();

    if(isset($_POST['register'])){
        $name  = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email' ");
        if( $checkEmail->num_rows > 0){
            $_SESSION['register_error'] = 'Email is already registered!';
        }else{
            $conn->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password' )");
        }
        header("Location: index.php");
        exit();
    }

    if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if($result->num_rows > 0){
        $user =  $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            exit();
        }
    }
    $_SESSION['login_error'] = 'Incorrect email or password';
    header("Location: index.php");
    exit();
    }   
?>