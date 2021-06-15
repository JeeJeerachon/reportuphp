<?php
session_start();
require '../DB/connect.php';
$page = $_SESSION["lastpage"];
$unamesss = $_SESSION['Username'];
if (isset($_POST['tempId2'])) {
  $idupd2 = $_POST['tempId2'];
  $upd = " UPDATE Report SET stat = 'สำเร็จ',worker = '$unamesss',newupdate = '1' WHERE Case_ID = '$idupd2' ";
  $result = mysqli_query($con, $upd);
  if ($result) {
    echo "<script type=\"text/javascript\">";
    echo "alert(\"เรียบร้อยแล้ว\");";
    echo "window.location.assign('$page')";
    echo "</script>";
  } else {
    echo 'แก้ไขข้อมูลไม่สำเร็จ';
  }
}
