<?php
$content = "admin";
session_start();
$target = $_POST['job'];
$_SESSION['target'] = $target;
?>
<!doctype html>
<html lang="en" class="h-100">

<head>
  <?php
  include '../components/meta-title.php';

  echo "<title>รายละเอียดของงานที่ : " . $target . "</title>";
  ?>
</head>

<body>
  <div class="container">
    <div class="wrap-form">
      <br>
      <form action="../app/printtest.php" target="_blank" method="post" name="F1">
        <fieldset>
          <div class="shadow-lg p-3 mb-5 bg-white rounded">
          <div class="shadow-lg p-3"><a href="<?php echo $_SESSION['lastpage'];?>">Back</a>
            <legend>
              <h1>แจ้งซ่อม</h1>
            </legend>
            <div class="mb-3 p-3" style="background-color: #F3F3F3;">
              <?php
              require '../DB/connect.php';
              $result = mysqli_query($con, "SELECT * FROM report inner join user on report.Username=user.Username Where Case_ID = '$target' ");
              if ($result) {
                if ($_SESSION['type'] == 'admin' or $_SESSION['type'] == 'superadmin'){
                  $result2 = mysqli_query($con,"UPDATE report SET engupdate = '0' where Case_ID = '$target' ");
              }
              while ($row = mysqli_fetch_array($result)) {
                  $date = date_create($row["Date"]);
              ?>
                  <table class='' style='width:100%'>
                    <thead>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style='width:25%'>
                          <p class='fw-bold'>งานที่ : </p>
                        </td>
                        <td style='width:25%'>
                          <p><?php echo $row["Case_ID"]; ?></p>
                        </td>
                        <td style='width:25%'>
                          <p class='fw-bold'>สถานที่ : </p>
                        </td>
                        <td style='width:25%'>
                          <p><?php echo $row["Location"]; ?></p>
                        </td>
                      </tr>
                      <tr>
                        <td style='width:25%'>
                          <p class='fw-bold'>รายงานโดย : </p>
                        </td>
                        <td style='width:25%'>
                          <p><?php echo $row["Username"]; ?></p>
                        </td>
                        <td style='width:25%'>
                          <p class='fw-bold'>เวลา : </p>
                        </td>
                        <td style='width:25%'>
                          <p><?php echo $row["Time"]; ?></p>
                        </td>
                      </tr>
                      <tr>
                        <td style='width:25%'>
                          <p class='fw-bold'>วันที่ : </p>
                        </td>
                        <td style='width:25%'>
                          <p><?php echo date_format($date, "d/m/Y"); ?></p>
                        </td>
                        <td style='width:25%'>
                          <p class='fw-bold'>สถานะ : </p>
                        </td>
                        <td style='width:25%'>
                          <p><?php echo $row["Stat"]; ?></p>
                        </td>
                      </tr>
                      <tr>
                        <td style='width:25%'>
                          <p class='fw-bold'>ปัญหา : </p>
                        </td>
                        <td style='width:25%'>
                          <p><?php echo $row["Problem"]; ?></p>
                        </td>
                      </tr>
                      <tr>
                        <td style='width:25%'>
                          <p class='fw-bold'>รายละเอียด : </p>
                        </td>
                        <td colspan='3' class='text-break' style='width:25%'>
                          <p><?php echo $row["Description"]; ?></p>
                        </td>
                      </tr>

                    </tbody>
                  </table>";
              <?php
                  $_SESSION['cid'] = $row["Case_ID"];
                  $_SESSION['loc'] = $row["Location"];
                  $_SESSION['pro'] = $row["Problem"];
                  $_SESSION['des'] = $row["Description"];
                  $_SESSION['user'] = $row["Username"];
                  $_SESSION['tim'] = $row["Time"];
                  $_SESSION['dat'] = date_format($date, "d/m/Y");
                  $_SESSION['fname'] = $row["firstname"];
                  $_SESSION['lname'] = $row["lastname"];
                }
              }
              ?>
            </div>
            <div>
              <p style="display: inline-block;">ปรับเปลี่ยนแบบฟอร์ม</p>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"  value="option1" onchange="toggledisable()">
                <label class="form-check-label" for="inlineRadio1">ใช่</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"  value="option2" onchange="toggledisable()" checked>
                <label class="form-check-label" for="inlineRadio2">ไม่ใช่</label>
              </div>
            </div>

            <!-- ปรับแก้ pdf -->
            <div>
              <p>ส่วนที่ 1</p>

              <p>มีความประสงค์ซ่อม</p>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="longcup1" value="ครุภัณฑ์การแพทย์" name="k1" disabled>
                <label class="form-check-label" for="longcup1">ครุภัณฑ์การแพทย์</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="longcup2" value="ครุภัณฑ์สำนักงาน" name="k2" disabled>
                <label class="form-check-label" for="longcup2">ครุภัณฑ์สำนักงาน</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="longcup3" value="ครุภัณฑ์คอมพิวเตอร์" name="k3" disabled> 
                <label class="form-check-label" for="longcup3">ครุภัณฑ์คอมพิวเตอร์</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="longcup4" value="ระบบปรับอากาศ" name="k4" disabled>
                <label class="form-check-label" for="longcup4">ระบบปรับอากาศ</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="longcup5" value="ระบบไฟฟ้า" name="k5" disabled>
                <label class="form-check-label" for="longcup5">ระบบไฟฟ้า</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="longcup6" value="ระบบสุขาภิบาล" name="k6" disabled>
                <label class="form-check-label" for="longcup6">ระบบสุขาภิบาล</label>
              </div>
              <br>
              <!-- Button trigger modal -->
              <!-- <form action="" method="POST">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  เพิ่มครุภัณฑ์
                </button> -->

              <!-- Modal -->
              <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ครุภัณฑ์</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="กรอกชื่อครุภัณฑ์" aria-label="Username">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-primary">บันทึก</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form> -->

              <p>ส่วนที่ 2</p>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="longcup7" value="ช่างระบบปรับอากาศ" name="k7" disabled>
                <label class="form-check-label" for="longcup7">ช่างระบบปรับอากาศ</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="longcup8" value="ช่างระบบไฟฟ้า" name="k8" disabled>
                <label class="form-check-label" for="longcup8">ช่างระบบไฟฟ้า</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="longcup9" value="ช่างระบบสุขาภิบาล" name="k9" disabled>
                <label class="form-check-label" for="longcup9">ช่างระบบสุขาภิบาล</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="longcup10" value="ช่างครุภัณฑ์การแพทย์" name="k10" disabled>
                <label class="form-check-label" for="longcup10">ช่างครุภัณฑ์การแพทย์</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="longcup11" value="ช่างครุภัณฑ์คอมพิวเตอร์" name="k11" disabled>
                <label class="form-check-label" for="longcup11">ช่างครุภัณฑ์คอมพิวเตอร์</label>
              </div>
              <br>
              <!-- <form action="" method="POST">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                  เพิ่มช่าง
                </button> -->

              <!-- Modal -->
              <!-- <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModal1Label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModal1Label">ช่าง</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="กรอกชื่อช่าง" aria-label="Username">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-primary">บันทึก</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form> -->
            </div>

            <!-- ปุ่มปริ้น -->
            <button type="print" class="btn btn-primary">print</button>
          </div>

        </fieldset>
      </form>
    </div>



    <form action="../admin/showdatahistory.php" method="post" name="F2">
      <fieldset>
        <?php
        require '../DB/connect.php';
        $data = mysqli_query($con, "SELECT * FROM note Where Case_ID = '$target' ");

        if ($data) {
          $count = 1;

          while ($zzz = mysqli_fetch_array($data)) {
            if ($count == 1) {
              echo "<div class='shadow-lg p-3 mb-5 bg-white rounded'>
                  <div class='mb-3 p-3' style='background-color: #F3F3F3;'>";
              echo "<h1>รายงานจากช่าง</h1>";
            }
            echo "หมายเหตุ : " . $count;
            echo "<br></br>";
            echo "<p class='text-break'> รายละเอียด " . $zzz["Note"] . "</p>";
            echo "<br>เขียนโดย  " . $zzz["Username"] . "</br>";
            echo "<br></br>";
            echo "<br></br>";
            $count = $count + 1;
          }
          echo "</div>
                </div>";
        }
        ?>

      </fieldset>
    </form>

  </div>
  <?php
  include '../components/footer.php'
  ?>
</body>
<script>
  function toggledisable() {
    if (document.getElementById("longcup1").hasAttribute("disabled")) {
      document.getElementById("longcup1").removeAttribute("disabled")
      document.getElementById("longcup2").removeAttribute("disabled")
      document.getElementById("longcup3").removeAttribute("disabled")
      document.getElementById("longcup4").removeAttribute("disabled")
      document.getElementById("longcup5").removeAttribute("disabled")
      document.getElementById("longcup6").removeAttribute("disabled")
      document.getElementById("longcup7").removeAttribute("disabled")
      document.getElementById("longcup8").removeAttribute("disabled")
      document.getElementById("longcup9").removeAttribute("disabled")
      document.getElementById("longcup10").removeAttribute("disabled")
      document.getElementById("longcup11").removeAttribute("disabled")
      console.log("i did it")
    } else {
      document.getElementById("longcup1").setAttribute("disabled", "true")
      document.getElementById("longcup2").setAttribute("disabled", "true")
      document.getElementById("longcup3").setAttribute("disabled", "true")
      document.getElementById("longcup4").setAttribute("disabled", "true")
      document.getElementById("longcup5").setAttribute("disabled", "true")
      document.getElementById("longcup6").setAttribute("disabled", "true")
      document.getElementById("longcup7").setAttribute("disabled", "true")
      document.getElementById("longcup8").setAttribute("disabled", "true")
      document.getElementById("longcup9").setAttribute("disabled", "true")
      document.getElementById("longcup10").setAttribute("disabled", "true")
      document.getElementById("longcup11").setAttribute("disabled", "true")
      console.log("nani")
    }

  }
</script>

</html>