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
    <meta charset="utf-8" >
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
<h1>UserDetail</h1>
<nav class="navtop">
    <div>
        <h1>Status action: Ảnh cập nhật mới có cùng tên sẽ không được cập nhật. Không thông báo status action</h1>
        <a href="../HomeController"><i class="fas fa-home"></i>Home</a>
        <a href="../UserUpdateController/getInfoUser/<?php echo $_SESSION['id'] ?>"><i
                    class="fas fa-edit"></i>Update</a>
        <a href="../UserDetailController/exportUser"><i class="fas fa-file-export"></i>Export</a>
        <a href="../HomeController/Logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<div>
    <p>Your account details are below:</p>
    <table>
        <tr>
            <td>Username:</td>
            <td><?= $_SESSION['username'] ?></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><?php echo $_SESSION['password']; ?></td>

        </tr>
        <tr>
            <td>img:</td>
            <td><img src="../image/<?php echo $_SESSION['img']; ?>" alt="<?= $_SESSION['username'] ?>" width="200"
                     height="300"></td>
        </tr>
    </table>
    <?php
    if ($_SESSION['username'] == 'admin') {
        echo '<p>List user:<a href="../UserDetailController/exportList"><i class="fas fa-file-export"></i>Export</a></p>';
        echo '<table>';
        echo '<tr>';
        echo '<th>Username</th>';
        echo '<th>Password</th>';
        echo '<th>Image_name</th>';
        echo '</tr>';
        foreach (@$data['row'] as $value) {
            echo '<tr>';
            echo '<td>' . $value['username'] . '</td>';
            echo '<td>' . $value['password'] . '</td>';
            echo '<td>' . $value['img'] . '</td>';
            echo '<td><a href="./deleteUser/' . $value['id'] . '"><i class="fas fa-trash"></i>Delete this user</a></td>';
            echo '<td><a href="../UserUpdateController/getInfoUser/' . $value['id'] . '"><i class="fas fa-edit"></i>Update</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        exit;
    }
    ?>
</div>

</body>
</html>