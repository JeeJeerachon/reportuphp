<?php
session_start();
require '../DB/connect.php';
$header = 'แจ้งซ่อม';
$page = $_SESSION["lastpage"];
$unamesss = $_SESSION['Username'];
if (isset($_POST['tempId2'])) {
  $idupd2 = $_POST['tempId2'];
  $upd = " UPDATE Report SET stat = 'สำเร็จ',worker = '$unamesss',newupdate = '1',finish=NOW() WHERE Case_ID = '$idupd2' ";
  $result = mysqli_query($con, $upd);
  if ($result) {
    $result2 = mysqli_query($con, "SELECT * FROM report  Where Case_ID = '$idupd2' ");
    if ($result2) {
      while ($row = mysqli_fetch_array($result2)) {
        $type = $row["Problem"];
        $desc = $row["Description"];
        $room = $row["Location"];
        $uname = $row["Username"];
        $worker = $row["Worker"];
        $finish = $row["finish"];  }
        $tokena = "SELECT api FROM token_line";
        $result3 = mysqli_query($con,$tokena);
      while ($row2 = mysqli_fetch_array($result3)) {
        $token = $row2['api'] ; 
        echo $token;
      }
        
    //line notify
    define('LINE_API',"https://notify-api.line.me/api/notify");
    //ใส่Token ที่copy เอาไว้
    /* $token = "mWLUxFiNjmdgXKZu8oqef6H00OGi6ktec0ftBvhpTs7";  */
    //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
    $str = $message = $header.
          "\n".'งานซ่อมเสร็จสิ้น'.
          "\n".'ประเภท  : '.$type.
          "\n".'รายละเอียด  : '.$desc.
          "\n".'ห้อง  : '.$room.
          "\n".'แจ้งโดย  : '.$uname.
          "\n".'ดำเนินงานโดย: '.$worker.
          "\n".'สำเร็จเมื่อ'.$finish; 
    function notify_message($message,$token){
    $queryData = array('message' => $message);
    $queryData = http_build_query($queryData,'','&');
    $headerOptions = array( 
            'http'=>array(
              'method'=>'POST',
              'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                        ."Authorization: Bearer ".$token."\r\n"
                        ."Content-Length: ".strlen($queryData)."\r\n",
              'content' => $queryData
            ),
    );
    $context = stream_context_create($headerOptions);
    $result = file_get_contents(LINE_API,FALSE,$context);
    $res = json_decode($result);
    return $res;
    
  }
  $res = notify_message($str,$token);
        print_r($res);
    echo "<script type=\"text/javascript\">";
    echo "alert(\"เรียบร้อยแล้ว\");";
    echo "window.location.assign('$page')";
    echo "</script>";
  } else {
    echo 'แก้ไขข้อมูลไม่สำเร็จ';
  }
}
}