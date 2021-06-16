<?php
session_start();
require '../DB/connect.php';
$toolname = $_POST['toolname'];
$sql = "INSERT INTO tool (toolname) Value ('$toolname')";
$result=mysqli_query($con,$sql);
if ($result){
    echo '<script>alert("New data inserted")
                window.location.href ="../admin/tool.php"</script>';
    }
?>