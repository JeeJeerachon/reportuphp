<?php
$content = "admin";
require "../auth/sessionpersist.php"
$_SESSION['lastpage'] = "../admin/createtool.php"
?>
<!DOCTYPE html>
<html>

<head>
  <?php
  include '../components/meta-title.php'
  ?>
  <title>เพิ่มห้อง</title>
</head>

<body>
  <?php
  include '../components/navbaradmin.php'
  ?>
  <div class="container">
    <br>
    <form action="../Function/addnewroom.php" method="post">
    <div  class="main-1">
        <div class="shadow-lg p-3">
        <h1>เพิ่มอุปกรณ์</h1>
        
        <hr>
        <table style=" width:100%">
          <tr>
            <td>
              <div class="mb-3">
                <label for="toolname" class="form-label"><b>ชื่ออุปกรณ์</b></label>
                <input type="text" class="form-control" placeholder="อุปกรณ์" name="toolname" id="toolname" required>
              </div>
            </td>
          </tr>
        </table>
        <div class="d-flex bd-highlight mb-3">
            <div class="p-2 bd-highlight"> <button type="submit" class="btn btn-primary">เพิ่ม</button></div>

            <div class="ms-auto p-2 bd-highlight"><button class="btn btn-danger" type="button" onclick="back()">กลับ</button></div>
          </div>
      </div>
    </div>
    </form>
  </div>
</body>

</html>
<script>
  function back() {
    user = '<?php echo $_SESSION['type']; ?>';
    if (user == "admin") {
      window.location.href = "tool.php"
    } else {
      window.location.href = "tool.php"
    }

  }
</script>