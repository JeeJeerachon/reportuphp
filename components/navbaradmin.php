<?php
require_once("../DB/connect.php");
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6f42c1;">
  <div class="container-fluid">
    <a class="navbar-brand">
      <img src="..\img\1200px-UPHosLogo.svg.png" class="rounded-circle" width="36" height="36">
    </a>
    <a class="navbar-brand" href="#">ระบบแจ้งซ่อมออนไลน์</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../admin/showdata.php">แสดงคำร้องข้อมูลแจ้งซ่อม</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/showdatahistory.php">แสดงประวัติการแจ้งซ่อม</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/showchart.php">สถิติ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/register.php">เพิ่มสมาชิก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/room.php">ห้อง</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/tool.php">อุปกรณ์</a>
        </li>
      </ul>

      <span class="dropdown" class="navbar-text ">
        <a class="nav-link dropdown-toggle" style="color: #FFFFFF;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="../img/profile.png" alt="Avatar" class="avatar">
          <?php

          echo $_SESSION["type"];
          echo "  : <tr class='fs-4' >" . $_SESSION['Username'] . "</tr>"; ?>
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#Modelsuc">เปลี่ยน Token Line</a></li>
          <li><a class="dropdown-item" href="../auth/logout.php">ออกจากระบบ</a></li>
        </ul>
      </span>
      &emsp;
    </div>
  </div>
</nav>
<div class="modal fade" id="Modelsuc" tabindex="-1" aria-labelledby="modelsuccess" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Line API</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>เดิม : <?php
                  $tokena = "SELECT api FROM token_line";
                  $result = mysqli_query($con, $tokena);
                  while ($row = mysqli_fetch_array($result)) {
                    $token = $row['api'];
                  }
                  echo "$token";
                  ?>
        </p>
        <form action="../components/tokenline.php" method="post">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Line API :</label>
            <input type="text" name="loo" class="form-control" id="recipient-name">
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
          <button type="button" class="btn btn-success">ยืนยัน</button>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .avatar {
    vertical-align: middle;
    width: 35px;
    height: 35px;
    border-radius: 50%;
  }
</style>