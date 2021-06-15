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
            <legend>
              <h1>แจ้งซ่อม</h1>
            </legend>
            <div class="mb-3 p-3" style="background-color: #F3F3F3;">
              <?php
              require '../DB/connect.php';
              $result = mysqli_query($con, "SELECT * FROM report inner join user on report.Username=user.Username Where Case_ID = '$target' ");
              if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                  $date = date_create($row["Date"]);
                  echo "<table class='' style='width:100%'>
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
                      <td style='width:25%'><p class='fw-bold'>งานที่  : </p></td>
                      <td style='width:25%'><p>" . $row["Case_ID"] . "</p></td>
                      <td style='width:25%'><p class='fw-bold'>สถานที่  : </p></td>
                      <td style='width:25%'><p>" .  $row["Location"] . "</p></td>
                    </tr>
                    <tr>
                      <td style='width:25%'><p class='fw-bold'>รายงานโดย  : </p></td>
                      <td style='width:25%'><p>" . $row["Username"] . "</p></td>
                      <td style='width:25%'><p class='fw-bold'>เวลา  : </p></td>
                      <td style='width:25%'><p>" .  $row["Time"] . "</p></td>
                    </tr>
                    <tr>
                      <td style='width:25%'><p class='fw-bold'>วันที่ : </p></td>
                      <td style='width:25%'><p>" . date_format($date, "d/m/Y") . "</p></td>
                      <td style='width:25%'><p class='fw-bold'>สถานะ  : </p></td>
                      <td style='width:25%'><p>" .  $row["Stat"] . "</p></td>
                    </tr>
                    <tr>
                      <td style='width:25%'><p class='fw-bold'>ปัญหา  : </p></td>
                      <td style='width:25%'><p>" . $row["Problem"] . "</p></td>
                    </tr>
                    <tr>
                      <td style='width:25%'><p class='fw-bold'>รายละเอียด  : </p></td>
                      <td colspan='3' class='text-break' style='width:25%'><p>" . $row["Description"] . "</p></td>
                    </tr>
                    
                  </tbody>
                </table>";
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

</html>