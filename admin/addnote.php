<?php
$content = "admin";
require "../auth/sessionpersist.php";
$_SESSION['ref'] = $_POST['ref'];
?>
<!doctype html>
<html lang="en" class="h-100">
<title>Admin-addnote</title>
<head>

  <?php
  include '../components/meta-title.php'
  ?>
</head>

<body class="d-flex flex-column h-100">

  <?php
  include '../components/navbaradmin.php'
  ?>
  <div class="container">
    <div class="wrap-form">
      <br>
      <form action="../components/note.php" method="post" name="F1">
        <fieldset>
          <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <legend>
              <h1>แจ้งซ่อม</h1>
            </legend>
            <div class="mb-3">
              <label class="p-3">กรอกบันทึก</label>
              <textarea class="form-control" aria-label="With textarea" rows="3" type="text" name="desc" title="กรุณาระบุปัญหา" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">ยืนยัน</button>
            <button type="reset" class="btn btn-warning">รีเซ็ต</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
  <?php
  include '../components/footer.php'
  ?>
</body>

</html>