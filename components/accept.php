<?php
session_start();
require '../DB/connect.php';
$page = $_SESSION["lastpage"];
if (isset($_POST['tempId'])) {
  $idupd = $_POST['tempId'];
  $sa = $_SESSION['Username'];
  $upd = " UPDATE report SET stat = 'กำลังดำเนินการ' , Worker = '$sa' ,newupdate = '1' WHERE Case_ID = '$idupd'";
  $result4 = mysqli_query($con, $upd);
  
  $res = mysqli_query($con,"select Username from report where Case_ID = '$idupd'");
  while ($row = mysqli_fetch_array($res)) {
    echo $uname = $row['Username'] ;
     
  }

  $result2 = mysqli_query($con,"Select token from line where Username = '$uname'");
    while ($row = mysqli_fetch_array($result2)) {
        $token = $row['token'] ;
        echo $token; 
      }
  
  /* $token = ""; */
  /* $gee = "งานหมายเลขที่ ".$idupd."ได้เริ่มดำเนินการโดย".$sa."แล้ว"; */
  echo $zzz ="https://api-line-for-big-01.herokuapp.com/send?token=".$token."&text=งานหมายเลขที่%20".$idupd."%20ได้เริ่มดำเนินการโดย%20".$sa."%20แล้ว";
  $ch = curl_init($zzz);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, 0);

  
  // https://api-line-for-big-01.herokuapp.com/send?token=U8c1a7c37aadf9134235c8afd04122496&text=""
  if ($result4) {
  $result = curl_exec($ch);
  curl_close($ch);
        echo "<script type=\"text/javascript\">";
        echo "alert(\"รับงานแล้ว\");";
        echo "window.location.assign('$page')";
        echo "</script>";
  } else {
    echo 'แก้ไขข้อมูลไม่สำเร็จ';
  }
}
