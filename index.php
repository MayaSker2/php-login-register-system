<?php
session_start();
$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? '',
];
$activeForm = $_SESSION['active_form'] ?? 'login';
unset($_SESSION['login_error']);
unset($_SESSION['register_error']);
unset($_SESSION['active_form']);
function showError($error) {
    return !empty($error) ? "<P class='error-message'>$error</P>" : '';
}
function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_Register</title>
    <link rel="stylesheet" href="./assets/css/style.css?v=4">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lavishly+Yours&family=Parisienne&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container <?= $activeForm === 'register' ? 'active' : '' ?>" id="container">        
        <!-- Login -->
        <div class="form-container login <?= isActiveForm('login', $activeForm); ?>">       
            <form action="login_register.php" method="post" id="login-form">
                <?= showError($errors['login']); ?>
                <h2>Login</h2>
                <div class="conact-list">
                    <div class="circle"><i class="fa-brands fa-facebook"></i></div>
                    <div class="circle"><i class="fa-brands fa-twitter"></i></div>
                    <div class="circle"><i class="fa-brands fa-linkedin"></i></div>
                </div>
                <p>
                    <a href="#"> Or use your email address</a>
                </p>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <p>
                    <a href="forget-password.php">Forget password ?</a>
                </p>
                <button type="submit"  name="login">LOGIN</button>
                <p class="switch-text">
                   Dont't have an account? 
                   <a href="#" id="mobileSignup" onclick="showForm('register-form')">Sign Up</a>
                </p>
            </form>
        </div>
        <!-- Sign Up -->
        <div class="form-container signup <?= isActiveForm('register', $activeForm); ?>" >
            <form action="login_register.php" method="post" id="register-form">
                <?= showError($errors['register']); ?>
                <h2>Sign Up</h2>
                <div class="conact-list">
                    <div class="circle"><i class="fa-brands fa-facebook"></i></div>
                    <div class="circle"><i class="fa-brands fa-twitter"></i></div>
                    <div class="circle"><i class="fa-brands fa-linkedin"></i></div>
                </div>
                <p>
                <a href="#"> Or use your email address</a>
                </p>
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit"  name="register">SIGN UP</button>
                <p class="switch-text">
                    Already have an account? 
                    <a href="#" id="mobileLogin" onclick="showForm('login-form')">Login</a>
                </p>
            </form>
        </div>
        <!-- Panel -->
        <div class="overlay">
           <div>
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <button id="loginBtn">Login</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello there!</h1>
                <button id="signupBtn">Sign Up</button>
            </div>
           </div>
        </div>

    </div>
<script src="./assets/javascript/script.js"></script>
</body>
</html>