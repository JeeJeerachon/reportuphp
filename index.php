<?php
session_start();
if (!isset($_SESSION['type'])) {
  $_SESSION['type'] = 'none';
}
if ($_SESSION['type'] == 'user') {
  header("location:app/home.php");
} elseif ($_SESSION['type'] == 'admin') {
  header("location:admin/showdata.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>ระบบแจ้งซ้อม</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="./bootstrap-5/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link href="./css/body.css" rel="stylesheet" crossorigin="anonymous">
 <!--  <link rel="icon" href="./img/1200px-UPHosLogo.svg.png" type="image/gif" sizes="16x16"> -->
</head>

<body>
  <form class="container" action="auth/checkLogin.php" method="post" style="margin-top: 5%;">
  
    
    <div class="main col-md-6 offset-md-3" >
      <div class="text-center" style="margin-top: 5%;">
        <img src="https://upload.wikimedia.org/wikipedia/th/thumb/a/a4/UPHosLogo.svg/1024px-UPHosLogo.svg.png"  class="img-fluid w-25 p-3" alt="Responsive image">
        <h2>ลงชื่อเข้าใช้</h2>
        <h6>ระบบ Maintenance Report โรงพยาบาลมหาวิทยาลัยพะเยา</h6>
      </div>
      <div class="p-5 row">
        <label for="uname" class="mb-2"><b>Username</b></label>
        <input class="form-control mb-2" type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw" class="mb-2"><b>Password</b></label>
        <input class="form-control mb-2" type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit" class="btn btn-primary mt-2">Login</button>
      </div>
    
  </form>

  <script src="./bootstrap-5/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>

</html>