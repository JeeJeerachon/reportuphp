<?php
session_start();
require '../DB/connect.php';
$page = $_SESSION["lastpage"];
if (isset($_POST['tempId'])) {
  $idupd = $_POST['tempId'];
  $sa = $_SESSION['Username'];
  $upd = " UPDATE report SET stat = 'กำลังดำเนินการ' , Worker = '$sa' WHERE Case_ID = '$idupd'";
  $result = mysqli_query($con, $upd);
  if ($result) {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"รับงานแล้ว\");";
        echo "window.location.assign('$page')";
        echo "</script>";
  } else {
    echo 'แก้ไขข้อมูลไม่สำเร็จ';
  }
}
