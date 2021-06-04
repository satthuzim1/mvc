<?php
if (!isset($_SESSION['loggedin'])) {
//    header('Location: ../index.php');
    echo "Please log in first to see this page.";
    exit;
}else{
    session_destroy();
    header('Location: http://localhost/mvc1/');
}
