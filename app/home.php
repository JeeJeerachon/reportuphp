<?php
$content = "user";
require "../auth/sessionpersist.php";
$_SESSION['lastpage'] = "../app/home.php"
?>
<!doctype html>
<html lang="en" class="h-100">

<head>
  <title> หน้าหลัก</title>
  <?php
  include '../components/meta-title.php'
  ?>
</head>

<body class="d-flex flex-column h-100">
  <?php
  include '../components/navbar.php'
  ?>
  <div class="container">
    <br>
    <form action="../components/forminsert.php" method="post">
      <div class="main-1">
        <div class="shadow-lg p-3 ">
          <h1>แจ้งซ่อม</h1>
          <div class="form-group" class="mb-3">
            <div class="mb-3">
              <label class="p-3">อุปกรณ์ที่เสีย</label>
              <select name="type" class="form-select" aria-label="Default select example" required>
                <option value="">เลือกอุปกรณ์</option>
                <?php
                require "../DB/connect.php";
                $Squery = "SELECT * FROM tool";
                if ($result = mysqli_query($con, $Squery)) {
                  $x = 1;
                  while ($tool = mysqli_fetch_array($result)) {
                ?> <option value="<?php echo $tool['toolname']; ?>"><?php echo $x . ' : ' . $tool['toolname']; ?></option>
                <?php $x = $x + 1;
                  }
                }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label class="p-3">ระบุปัญหา</label>
              <textarea class="form-control" aria-label="With textarea" rows="3" type="text" name="desc" maxlength="170" title="กรุณาระบุปัญหา" required></textarea>
            </div>
            <label class="p-3">ห้อง</label>
            <select name="room" class="form-select" aria-label="Default select example" required>
              <option selected value="">โปรดเลือก...</option>
              <?php
              require "../DB/connect.php";
              $Squery = "SELECT * FROM room";
              if ($result = mysqli_query($con, $Squery)) {
                $y = 1;
                while ($room = mysqli_fetch_array($result)) {
              ?> <option value="<?php echo $room['roomid']; ?>"><?php echo $y . ' : ' . $room['roomname']; ?></option>
              <?php $y = $y + 1;
                }
              }
              ?>
            </select>
          </div>
          <br>
          <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">ยืนยัน</button>
          <button type="reset" class="btn btn-warning">รีเซ็ต</button>

        </div>
      </div>
    </form>
  </div>
  <br>
  <?php
  include '../components/footer.php'
  ?>
</body>

</html>
