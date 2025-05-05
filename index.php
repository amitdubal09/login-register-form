<?php
session_start();

$error = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm){
    return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <div class="container">
        
        <div class="form-box <?= isActiveForm('login', $activeForm); ?> " id="login-form">
            <form class="form" action="login_register.php" method="post">
                <h2 class="heading">Login</h2>
                <?= showError($error['login']); ?>
                <input type="text" name="Username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit" name="login">Submit</button>
                <p>don't have an account? <a href="#" onclick="showForm('Register-form')">Register</a></p>
            </form>
        </div>


        <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="Register-form">
            <form class="form" action="login_register.php" method="post">
                <h2 class="heading">Registration</h2>
                <?= showError($error['register']); ?>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="text" name="name" placeholder="Name" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <select name="role" required>
                    <option value="">--select role--</option>
                    <option value="user">User</option>
                    <option value="Admin">Admin</option>
                </select>
                <button type="submit" name="register">Submit</button>
                <p>already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
            </form>
        </div>

    </div>
</body>

</html>