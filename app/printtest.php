<?php
// Require composer autoload
session_start();
$target = $_SESSION['target'];
require_once 'vendor/autoload.php';
require '../DB/connect.php';
// เพิ่ม Font ให้กับ mPDF
$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf([
    'tempDir' => __DIR__ . '/tmp',
    'fontdata' => $fontData + [
        'niramit' => [ // ส่วนที่ต้องเป็น lower case ครับ
            'R' => 'Niramit-Light.ttf',
            'I' => 'Niramit-Italic.ttf',
            'B' =>  'Niramit-SemiBold.ttf',
            'BI' => "Niramit-SemiBoldItalic.ttf",
        ]
    ],
]);
$pagecount = $mpdf->SetSourceFile("Realform.pdf");
$import_page = $mpdf->ImportPage(1);
$mpdf->UseTemplate($import_page);


ob_start(); // Start get HTML code

// รับค่า
if (isset($_POST['k1'])) {
    $x = $_POST['k1'];
}
if (isset($_POST['k2'])) {
}
if (isset($_POST['k3'])) {
}
if (isset($_POST['k4'])) {
}
if (isset($_POST['k5'])) {
}
if (isset($_POST['k6'])) {
}
if (isset($_POST['k7'])) {
}
if (isset($_POST['k8'])) {
}
if (isset($_POST['k9'])) {
}
if (isset($_POST['k10'])) {
}
if (isset($_POST['k11'])) {
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>PDF</title>
    <style>
        .sa {
            position: absolute;
            text-align: center;
            top: 150px;
            right: 635px;
        }

        body {
            font-family: niramit;
            font-size: 14px;
        }

        .cas {
            position: absolute;
            text-align: center;
            top: 10px;
            right: 100px;
        }

        .dat {
            position: absolute;
            text-align: center;
            top: 35px;
            right: 100px;
        }

        .loc {
            position: absolute;
            text-align: center;
            top: 120px;
            right: 550px;
        }

        .num {
            position: absolute;
            text-align: center;
            top: 120px;
            right: 245px;
        }

        .tim {
            position: absolute;
            text-align: center;
            top: 120px;
            right: 90px;
        }

        .des {
            position: absolute;
            top: 235px;
            left: 59px;
        }

        .dess {
            position: absolute;
            top: 235px;
            left: 190px;
        }

        .user {
            position: absolute;
            text-align: center;
            top: 320px;
            right: 535px;
        }

        .userM {
            position: absolute;
            text-align: center;
            top: 297px;
            right: 220px;
        }

        .bg {
            background-color: white;
            position: absolute;
            width: 65%;
            height: 40px;
            top: 169px;
            left: 220px;
        }

        .bg2 {
            background-color: white;
            position: absolute;
            width: 65%;
            height: 20px;
            top: 190px;
            left: 55px;
        }

        .bg3 {
            background-color: white;
            position: absolute;
            width: 88%;
            height: 40px;
            top: 255px;
            left: 55px;
        }

        .bg4 {
            background-color: white;
            position: absolute;
            width: 30%;
            height: 129px;
            top: 485px;
            left: 50px;
        }
    </style>

</head>

<body>


    <div class="cas">
        <p> <?php echo "0" . $_SESSION['cid']; ?></p>
    </div>
    <div class="dat">
        <p> <?php echo $_SESSION['dat']; ?></p>
    </div>
    <div class="loc">
        <p> <?php echo $_SESSION['loc']; ?></p>
    </div>
    <div class="num">
        <p>055555555</p>
    </div>
    <div class="tim">
        <p><?php echo $_SESSION['tim']; ?></p>
    </div>

    <!-- ส่วนเปลี่ยนแปลง -->
    <?php
    while ($a <= 10) {
        # code...
    }
    ?>
    <?php
    if ($_POST['inlineRadioOptions'] == "option1") {
    ?>
        <div class="bg">
            <p> <?php echo $x; ?></p>
        </div>
        <div class="bg2"></div>
        <div class="bg3"></div>
        <div class="bg4"></div>
    <?php
    } else {
    ?>
        <div class="dess">
            <p><?php echo $_SESSION['des']; ?></p>
        </div>
    <?php
    }
    ?>

    <div class="des">
        <p><?php echo "อาการเสีย/เหตุผล   " . $_SESSION['des']; ?></p>
    </div>
    <!-- ชื่อผู้แจ้ง -->
    <div class="user">
        <p><?php echo $_SESSION['fname'] . "  " . $_SESSION['lname']; ?></p>

    </div>


</body>

</html>



<?php
$html = ob_get_contents();
$mpdf->WriteHTML($html);
$mpdf->AddPage();
$import_page = $mpdf->ImportPage(2);
$mpdf->UseTemplate($import_page);
$mpdf->Output("ใบแจ้งซ่อมที่" . $_SESSION['cid'] . ".pdf");
ob_end_flush();
header("location:ใบแจ้งซ่อมที่" . $_SESSION['cid'] . ".pdf");
?>

<!-- ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF.pdf">คลิกที่นี้</a> -->