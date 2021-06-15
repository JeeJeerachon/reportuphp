<?php
session_start();
require '../DB/connect.php';
$roomname = $_POST['roomname'];
$sql = "INSERT INTO room (roomname) Value ('$roomname')";
$result=mysqli_query($con,$sql);
if ($result){
    echo '<script>alert("New data inserted")
                window.location.href ="../app/createroom.php"</script>';
    }
?>