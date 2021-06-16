<?php
session_start();
require '../DB/connect.php';
    $header = "แจ้งซ่อม";
    $desc = $_POST['desc'];
    $room = $_POST['room'];
    $type = $_POST['type'];
    $uname =$_SESSION["Username"];
    $adddat = "INSERT INTO report (Location,Problem,Description,Time,Date,Stat,Username,Worker) VALUE ('$room','$type','$desc',CURRENT_TIME(),CURRENT_DATE(),'รอช่าง','$uname','ไม่มี')";
    $tokena = "SELECT api FROM token_line";
    $result = mysqli_query($con,$tokena);
    while ($row = mysqli_fetch_array($result)) {
        $token = $row['api'] ; }
    $result = mysqli_query($con,$adddat);
//line notify
define('LINE_API',"https://notify-api.line.me/api/notify");
 //ใส่Token ที่copy เอาไว้
/* $token = "mWLUxFiNjmdgXKZu8oqef6H00OGi6ktec0ftBvhpTs7";  */
 //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
$str = $message = $header.
        "\n".'งานใหม่!!!'.
        "\n".'ประเภท  : '.$type.
        "\n".'รายละเอียด  : '.$desc.
        "\n".'ห้อง  : '.$room.
        "\n".'แจ้งโดย  : '.$uname;
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
    
    if ($result)
    {
        $res = notify_message($str,$token);
        print_r($res);
        
        echo "<script type=\"text/javascript\">";
        echo "alert(\"เพิ่มข้อมูลสำเร็จ\");";
        echo "window.location.assign('../app/home.php')";
        echo "</script>";
        
    }
    else
    {
        
        echo "<script type=\"text/javascript\">";
        echo "alert(\"เพิ่มข้อมูลไม่สำเร็จ\");";
        echo "window.location.assign('../app/home.php')";
        echo "</script>";
        
    }
