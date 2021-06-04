<?php
if (!isset($_SESSION['loggedin'])) {
    echo 'You must login first!';
    exit;
}


//$datas = '';
//$datas .= '<table>';
//$datas .= '<tr>';
//$datas .= '<th>Username</th>';
//$datas .= '<th>Password</th>';
//$datas .= '<th>Image Name</th>';
//$datas .= '</tr>';
//$value = null;
//$datas .= "<?php foreach (@$data[row] as $value) {
//    echo '<tr>';
//    echo '<td>'  $value[username] '</td>';
//    echo '<td>'  $value[password]  '</td>';
//    echo '<td>' $value[img]  '</td>';
//    echo '</tr>';
//
/*}?>";*/
//
//$datas .= '</table>';


$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage('P','A4','0');
//$mpdf->WriteHTML("$datas");
//$mpdf->setProtection(array(), "pass1", "pass");
$mpdf->Output();
