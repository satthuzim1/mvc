<?php
if (!isset($_SESSION['loggedin'])) {
    echo 'You must login first!';
    exit;
}


$data = '';
$data = '<h1>Export User</h1>' . '<br>';
$data .= "<img src='./image/$_SESSION[img]'" . "alt=$_SESSION[username]" . " width='200' height='300'>" . '<br>';
$data .= '<strong>Username: </strong>' . $_SESSION['username'] . '<br>';
$data .= '<strong>Password: </strong>' . $_SESSION['password'] . '<br>';
require_once  './vendor/autoload.php';
ob_end_clean();
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML("$data");
$mpdf->setProtection(array(), $_SESSION['username'], $_SESSION['username']);
$mpdf->Output();