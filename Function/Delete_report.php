<?php
session_start();
require '../DB/connect.php';
$page = $_SESSION["lastpage"];
if (isset($_POST['tempId'])) {
  $idupd = $_POST['tempId'];
  $cause = $_POST['cause'];
  $sa = $_SESSION['Username'];
  $upd = " UPDATE report SET stat = 'ยกเลิก' , Worker = '$sa' ,why = '$cause' WHERE Case_ID = '$idupd'";
  $result = mysqli_query($con, $upd);
  if ($result) {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"ยกเลิกงานแล้ว\");";
        echo "window.location.assign('$page')";
        echo "</script>";
  } else {
    echo 'แก้ไขข้อมูลไม่สำเร็จ';
  }
}