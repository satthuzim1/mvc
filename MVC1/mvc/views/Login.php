<?php
if (isset($_SESSION['loggedin'])) {
    header('Location: http://localhost/mvc1/UserDetailController/getUserList');
    exit;
}
?>
<!DOCTYPE html>
<!--https://codeshack.io/secure-login-system-php-mysql/-->
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
<div class="login">
    <h1>Login</h1>
    <form action="../UserController/loginSubmit" method="post">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" id="username" pattern="[A-Za-z0-9_]{3,20}" title="Not include special character!" required>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" id="password" pattern="[A-Za-z0-9_]{3,20}" title="Not include special character!" required>
        <input type="submit" value="Login">
    </form>
    <?php echo @$data['err']?>
</div>
</body>
</html>