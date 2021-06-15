<?php
session_start();
$target = $_SESSION['target'];
require_once 'vendor/autoload.php';
require '../DB/connect.php';
$mpdf = new \Mpdf\Mpdf();
$pagecount = $mpdf->SetSourceFile('Realform.pdf');
for ($i = 1; $i <= $pagecount; $i++) {
    $import_page = $mpdf->ImportPage($i);
    $mpdf->UseTemplate($import_page);

    if ($i < $pagecount)
        $mpdf->AddPage();
}
ob_start();
?>

<!-- HTML -->

<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Niramit&display=swap" rel="stylesheet">
    <title></title>
    <style>
        body {
            font-family: 'Niramit', sans-serif;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div align="center">
        <p>ผู้แจ้ง <?php echo $_SESSION['user']; ?></p>
        <p>ห้อง <?php echo $_SESSION['loc']; ?></p>
    </div>
</body>

</html>










































<!-- HTML -->

<?php
$html = ob_get_contents();
$mpdf->WriteHTML($html);

$mpdf->Output("Newpdf.pdf");
ob_end_flush();
header('location:Newpdf.pdf');

?>