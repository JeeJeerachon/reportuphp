<?php
$content = "admin";
require "../auth/sessionpersist.php";
$_SESSION['lastpage'] = "../app/showdatauser.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <title>อุปกรณ์</title>
    <?php
    include '../components/meta-title.php'
    ?>
</head>

<body>
    <?php
    include '../components/navbaradmin.php';
    $uname = $_SESSION["Username"];
    ?>
    <br>
    <div class="container">
        <div class="main-1">
            <div class="shadow-lg p-3">



                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight">
                    <h1>รายการอุปกรณ์</h1>
                    </div>

                    <div class="p-2 bd-highlight"> <a  class="link-success" href="../admin/createtool.php">เพิ่มอุปกรณ์</a></div>
                </div>


                <div class="table-responsive">
                    <table id="myTable" class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col">รหัสอุปกรณ</th>
                                <th scope="col">ชื่ออุปกรณ์</th>
                                <th scope="col">คำสั่งจัดการ</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            require '../DB/connect.php';
                            $result = mysqli_query($con, "SELECT * FROM tool");

                            if ($result) {
                                $x = 1;
                                while ($row = mysqli_fetch_array($result)) {

                                    echo "<tr>";
                                    echo "<td>" . $x . "</td>";
                                    echo "<td>" . $row["toolname"] . "</td>";

                                    echo "<td><div class='btn-group' role='group' aria-label='Basic mixed styles example'>


                <form action='../Function/delete_del.php' method='POST'>
                <input  type='hidden' name='delete' value='" . $row['toolid'] . "'/>
                <input type='hidden' name='target' value='tool'/>
                <button type='button'class=' btn btn-danger'name='submit-btn' title='ลบห้อง'  value='ลบ' data-bs-toggle='modal' data-bs-target='#Modeldel" . $row['toolid'] . "'>
                <span class='material-icons'>
              delete
              </span>
                </button>
          <div class='modal fade' id='Modeldel" . $row['toolid'] .
                                        "' tabindex='-1' aria-labelledby='modeldell' aria-hidden='true'>
          <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                  <h5 class='modal-title' id='modeldell'>ยืนยันการลบ</h5>
                  <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                  โปรดยืนยันการลบรายงาน
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>ยกเลิก</button>
                  <button type='submit' class='btn btn-success'>ยืนยัน</button>
                </div>
              </div>
            </div>
          </div>
          </form>

          
          
          
          </td>";
                                    echo "</tr>";
                                    $x = $x+1;
                                }
                            }
                            ?></tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <br><br>
    <?php
    include '../components/footer.php'
    ?>
</body>

</html>
