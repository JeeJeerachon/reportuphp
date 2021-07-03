<?php
session_start();
require '../DB/connect.php';
$page = $_SESSION["lastpage"];
if (isset($_POST['tempId'])) {
  $idupd = $_POST['tempId'];
  $cause = $_POST['cause'];
  $sa = $_SESSION['Username'];
  $upd = " UPDATE report SET stat = 'ยกเลิก' , Worker = '$sa' , finish = NOW() ,why = '$cause' WHERE Case_ID = '$idupd'";
  $result = mysqli_query($con, $upd);

  $res = mysqli_query($con,"select * from report where Case_ID = '$idupd'");
  while ($row = mysqli_fetch_array($res)) {
    echo $uname = $row['Username'] ;
    $hum = $row['why'];
     
  }

  $result2 = mysqli_query($con,"Select token from line where Username = '$uname'");
    while ($row = mysqli_fetch_array($result2)) {
        $token = $row['token'] ;
        echo $token; 
      }
  
  /* $token = ""; */
  /* $gee = "งานหมายเลขที่ ".$idupd."ได้เริ่มดำเนินการโดย".$sa."แล้ว"; */
  echo $zzz ="https://api-line-for-big-01.herokuapp.com/send?token=".$token."&text=งานหมายเลขที่%20".$idupd."%20ลบโดย%20".$sa."%20หมายเหตุ%20".$hum;
  $ch = curl_init($zzz);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, 0);

  
  if ($result) {
    $result = curl_exec($ch);
    curl_close($ch);
        echo "<script type=\"text/javascript\">";
        echo "alert(\"ยกเลิกงานแล้ว\");";
        echo "window.location.assign('$page')";
        echo "</script>";
  } else {
    echo 'แก้ไขข้อมูลไม่สำเร็จ';
  }
}