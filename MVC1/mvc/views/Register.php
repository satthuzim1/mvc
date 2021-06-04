
<!DOCTYPE html>
<!--https://codeshack.io/secure-login-system-php-mysql/-->
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
    <h1>Register</h1>
    <a href="../"><i class="fas fa-home"></i>Home</a>
    <form action="../UserController/signupSubmit" method="post">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" id="username" pattern="[A-Za-z0-9_]{3,20}" title="This field must be between 3 to 20 character and not include special character!" required>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" id="password" pattern="[A-Za-z0-9_]{3,20}" title="This field must be between 3 to 20 character and not include special character!" required>
        <input type="submit"  value="Sign up">
    </form>
    <?php echo @$data['inform']?>
</body>
</html>