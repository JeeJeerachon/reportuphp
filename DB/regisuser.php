<?php
require 'connect.php';
$name = $_POST['uname'];
$pass = $_POST['psw'];
$pass2 = $_POST['psw-repeat'];
$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$tel = $_POST['telnum'];
$access = $_POST['acc'];

if ($pass == $pass2) {
    $adddata = "INSERT INTO user (Username,Password,firstname,lastname,Tel,Access) VALUE ('$name','$pass','$Fname','$Lname','$tel','$access')";
    $result = mysqli_query($con, $adddata);
    if ($result) {
        echo "<script type=\"text/javascript\">";
            echo "alert(\"สมัครสมาชิกสำเร็จ\");";
            echo "window.location.assign('../index.php')";
            echo "</script>";
    } else {
        echo "<script type=\"text/javascript\">";
            echo "alert(\"ผู้ใช้นี้มีอยู่แล้ว\");";
            echo "window.location.assign('../index.php')";
            echo "</script>";
    }
} else {
    echo "<script type=\"text/javascript\">";
            echo "alert(\"รหัสผ่านไม่ถูกต้อง\");";
            echo "window.location.assign('../index.php')";
            echo "</script>";
}
