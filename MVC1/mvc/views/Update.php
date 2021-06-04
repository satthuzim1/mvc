<?php
if (!isset($_SESSION['loggedin'])) {
    echo 'You must login first!';
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
<h1>Update page</h1>
<a href="../backToDetail"><i class="fas fa-person-booth"></i>Back</a>


<form action="../updateUser" method="post" enctype="multipart/form-data">
    <input type="hidden" id="id" name="id" value="<?php echo @$data['id'] ?>">
    <label for="username">
        <i class="fas fa-user"></i>
    </label>
    <input type="text" name="username" id="username" value="<?php echo @$data['username'] ?>" readonly>
    <label for="password">
        <i class="fas fa-lock"></i>
    </label>
    <input type="password" name="password" id="password" pattern="[A-Za-z0-9_]{3,20}"
           title="This field must be between 3 to 20 character and not include special character!" required>
    <input type="file" id="uploadFile" name="avatar" accept="image/png, image/jpeg, image/jpg"/>
    <input type="submit" value="Update">
</form>

*You just can change password

</body>
</html>