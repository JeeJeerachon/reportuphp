<?php
session_start();
$ref = $_SESSION['ref'];
$nameq = $_SESSION['Username'];
require '../DB/connect.php';
$input = $_POST['desc'];
$upd = " INSERT INTO note (Case_ID,Username,Note) Value ('$ref','$nameq','$input')";
if (isset($ref)) {
  $result = mysqli_query($con, $upd);
  if ($result) {
    echo "<script>window.close();</script>";
  } else {
    echo 'แก้ไขข้อมูลไม่สำเร็จ';
  }
}
