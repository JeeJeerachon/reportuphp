<?php
session_start();
require '../DB/connect.php';
$aa = $_POST['loo'];
$insert = "UPDATE token_line SET api = '$aa'";
$x = mysqli_query($con, $aa);
$page = $_SESSION["lastpage"];
if ($x) {

    echo "<script type=\"text/javascript\">";
    echo "alert(\"แล้วละ\");";
    echo "window.location.assign('$page')";
    echo "</script>";
}
