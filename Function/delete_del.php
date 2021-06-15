<?php
session_start();
require '../DB/connect.php';
$page = $_SESSION["lastpage"];
$target = $_POST['target'];
$targetid = $target .'id';
if (isset($_POST['delete'])) {
  $idd = $_POST['delete'];
  $del = " DELETE FROM $target WHERE $targetid = '$idd'";
  echo $del;
  $result = mysqli_query($con, $del);
  if ($result) {
      if ($target == 'room'){
        echo "<script type=\"text/javascript\">";
        echo "alert(\"ลบเรียบร้อยแล้ว\");";
        echo "window.location.assign('../admin/room.php')";
        echo "</script>";
        }else{
            echo "<script type=\"text/javascript\">";
            echo "alert(\"ลบเรียบร้อยแล้ว\");";
            echo "window.location.assign('../admin/tool.php')";
            echo "</script>";
        }
  } else {
    echo 'แก้ไขข้อมูลไม่สำเร็จ';
  }
}
