<?php
require_once("../DB/connect.php");
?>


<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6f42c1;">
  <div class="container-fluid">
    <a class="navbar-brand">
      <img src="..\img\1200px-UPHosLogo.svg.png" class="rounded-circle" width="36" height="36">
    </a>
    <a class="navbar-brand" href="home.php">ระบบแจ้งซ่อมออนไลน์</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " href="home.php" title="กรอกข้อมูลเข้าไปในการแจ้ง">แบบฟอร์มแจ้งซ่อม</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../app/showdatauser.php">แสดงคำร้องข้อมูลแจ้ง
          <?php
          require '../DB/connect.php';
          $x =$_SESSION['Username'];
          $result = mysqli_query($con, "SELECT count(*) as total from report where Username = '$x' and newupdate = '1'");
          $data = mysqli_fetch_assoc($result);
          $sum = $data['total'];
          if ($sum > 0) { ?>
            <span class="badge badge-light" style="display: inline-block; background-color: red; color: white;">
            <?php echo $sum;
            } ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="userdatahistory.php" title="ประวัติการแจ้ง">ประวัติการแจ้ง</a>
        </li>
      </ul>

      <span class="dropdown" class="navbar-text ">
        <a class="nav-link dropdown-toggle" style="color: #FFFFFF;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="../img/profile.png" alt="Avatar" class="avatar">
          <?php

          echo 'ผู้ใช้ ';
          echo "  : <tr class='fs-4' >" . $_SESSION['Username'] . "</tr>"; ?>
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="../auth/logout.php">ออกจากระบบ</a></li>
        </ul>
      </span>
      &emsp;
    </div>
  </div>
</nav>

<style>
  .avatar {
    vertical-align: middle;
    width: 35px;
    height: 35px;
    border-radius: 50%;
  }
</style>