<?php
session_start();
require '../DB/connect.php';
$page = $_SESSION["lastpage"];
if (isset($_POST['tempId'])) {
  $idupd = $_POST['tempId'];
  $sa = $_SESSION['Username'];
  $upd = " UPDATE report SET stat = 'กำลังดำเนินการ' , Worker = '$sa',newupdate = '1' WHERE Case_ID = '$idupd'";
  $result = mysqli_query($con, $upd);

  $token = "";
  $text = "";
  $ch = curl_init("https://api-line-for-big-01.herokuapp.com/send?token=".$token."&text=".$text);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, 0);

  $result = curl_exec($ch);
  curl_close($ch);
  // https://api-line-for-big-01.herokuapp.com/send?token=U8c1a7c37aadf9134235c8afd04122496&text=""
  if ($result) {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"รับงานแล้ว\");";
        echo "window.location.assign('$page')";
        echo "</script>";
  } else {
    echo 'แก้ไขข้อมูลไม่สำเร็จ';
  }
}
