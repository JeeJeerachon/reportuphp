<?php
$content = "admin";
require "../auth/sessionpersist.php";
$_SESSION['lastpage'] = "../admin/showdata.php";
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>

  <?php
  include '../components/meta-title.php'
  ?>
  <title>แสดงคำร้องข้อมูลแจ้งซ่อม</title>
  <link rel="stylesheet" type="text/css" href="../css/wrap-form.css">

</head>

<body>
  <?php
  include '../components/navbaradmin.php'
  ?>
  <br>
  <div class="container">
  <div  class="main-1">
        <div class="shadow-lg p-3">
      <div class="p-3 ">
        <h1>รายการแจ้งซ่อม</h1>
      </div>
      <div class="table-responsive">
        <table id="myTable" class="table table-hover table-sm">
          <thead>
            <tr>
              <th scope="col">งานที่</th>
              <th scope="col">ห้อง</th>
              <!-- <th scope="col">ประเภทของปัญหา</th> -->
              <th scope="col">ปัญหา</th>
              <th scope="col">ชื่อ</th>
              <th scope="col">เวลา</th>
              <!-- <th scope="col">วันที่</th> -->
              <th scope="col">สถานะ</th>
              <th scope="col">ผู้รับงาน</th>
              <th scope="col">คำสั่ง</th>
            </tr>
          </thead>
          <tbody> 
            <?php
            require '../DB/connect.php';
            $result = mysqli_query($con, "SELECT * FROM report Where stat = 'รอช่าง'");

            if ($result) {
              while ($row = mysqli_fetch_array($result)) {

                if ($row["Stat"] == 'รอช่าง') {
                  $color = 'bg-primary text-white';
                } elseif ($row["Stat"] == 'กำลังดำเนินการ') {
                  $color = 'bg-warning text-dark';
                } else {
                  $color = 'bg-success text-white';
                }

                echo "<tr>";
                echo "<td>" . $row["Case_ID"] ;
                if ($row['newupdate'] == 1 ){
                  echo "<span class='badge bg-success'>New</span>";
                }
                      echo  "</td>";
                echo "<td>" . $row["Location"] . "</td>";
                echo "<td>" . "<p class='fw-bold'>" . $row["Problem"] . "</p>" . "<p class='text-break' style='text-decoration: none;
              text-overflow: ellipsis; /* เพิ่ม ... จุดจุดจุดท้ายสุด */ 
              display: block; overflow: hidden; 
              white-space: nowrap; 
              width: 150px; /* กำหนดความกว้าง */ '>" . $row["Description"]  . "</p>" . "</td>";
                // echo "<td>" . . "</td>";
                echo "<td>" . $row["Username"] . "</td>";
                $date = date_create($row["Date"]);
                echo "<td>" .  date_format($date, "d/m/Y") . "<br>" . $row["Time"] . "</td>";
                // echo "<td>" . "</td>";
                echo "<td><div class=' badge " . $color . "' style='width: 6rem;' >"  . $row["Stat"] . "</div></td>";
                //echo "<td><button id='" . $row['Case_ID'] . "' onclick = >Accept</button></td>" ;
                echo "<td>" . $row["Worker"] . "</td>";

                if ($row["Stat"] == 'กำลังดำเนินการ') {
                  // ปุ่มสำเร็จ
                  echo "<td> 
                <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                  <form action='../components/movetodone.php' method='POST'>
                    <input type='hidden' name='tempId2' value='" . $row["Case_ID"] . "'/>
                    <button type='submit' class='btn btn-success' name='submit-btn' value='สำเร็จ'>
                    <span class='material-icons'>
                    done
                    </span>
                    </button>
                  </form>";
                } else {
                  // ปุ่มรับงาน
                  echo "<td> 
                <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                <form action='../components/accept.php' method='POST'>
                  <input type='hidden' name='tempId' value='" . $row["Case_ID"] . "'/>
                  <button type='button' class='btn btn-primary' name='submit-btn' title='รับงานแจ้งซ่อม' value='รับงาน' data-bs-toggle='modal' data-bs-target='#Modelsuc" . $row["Case_ID"] . "'/>
                  <span class='material-icons'>
                  build
                  </span>
                  </button>
                  <div class='modal fade' id='Modelsuc" . $row["Case_ID"] . "' tabindex='-1' aria-labelledby='modelsuccess' aria-hidden='true'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <h5 class='modal-title' id=''" . $row["Case_ID"] . "''>ยืนยันการรับงาน</h5>
                          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                          โปรดยืนยันการรับงาน
                        </div>
                        <div class='modal-footer'>
                          <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>ยกเลิก</button>

                          <button type='submit' class='btn btn-success'>ยืนยัน</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>";
                }
                // ปุ่มรายละเอียด
                echo "<form  action='../admin/jobdetail.php' method='POST'>
                      <input type='hidden' name='job' value='" . $row["Case_ID"] . "'/>
                      <button type='submit' class='btn btn-warning' name='submit-btn' title='รายละเอียดแจ้งซ่อม'value='รายละเอียด'>
                      <span class='material-icons'>
                          assignment
                          </span>
                          </button>
                    </form>";
                // ปุ่มลบ 
                echo "<form action='../Function/Delete_report.php' method='POST'>
                      <input type='hidden' name='tempId' value='" . $row["Case_ID"] . "'/>
                      <button type='button' class='btn btn-danger' name='submit-btn' title='ลบรายการแจ้งซ่อม' data-bs-toggle='modal' data-bs-target='#Modeldel" . $row["Case_ID"] . "'/>
                      <span class='material-icons'>
                      delete
                      </span>
                      </button>
                      <div class='modal fade' id='Modeldel" . $row["Case_ID"] . "' tabindex='-1' aria-labelledby='modeldell' aria-hidden='true'>
                      <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='modeldell'>ยืนยันการลบ</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                              โปรดกรอกเหตุผลการลบรายงาน
                              <div class='input-group'>
                                <textarea class='form-control' aria-label='With textarea'></textarea>
                              </div>
                            </div>
                            <div class='modal-footer'>
                              <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>ยกเลิก</button>
                              <button type='submit' class='btn btn-success'>ยืนยัน</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form> 
                    </div>
              </td>";

                echo "</tr>";
              }
            }
            
            ?>
          </tbody>
        </table>
      </div>
    </div>
      </div>
    </div>
  <br>
  <?php
  include '../components/footer.php'
  ?>
<script> function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</body>

</html>