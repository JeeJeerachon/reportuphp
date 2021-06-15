<!DOCTYPE html>
<html>

<head>
    <?php
    include './components/meta-title.php'
    ?>
    <title>เพิ่มสมาชิก</title>
    <link href="./bootstrap-5/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="./css/body.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <br>
        <form action="../DB/dbregister.php" method="post">
            <div class="main-1">
                <div class="shadow-lg p-3">
                    <h1>ลงทะเบียน</h1>
                    <p>กรอกข้อมูลเพื่อสร้างบัญชีใหม่</p>
                    <hr>
                    <table style=" width:100%">
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <label for="Uname" class="form-label"><b>ชื่อผู้ใช้</b></label>
                                    <input type="text" class="form-control" placeholder="ระบุชื่อผู้ใช้" name="uname" id="uname" required>
                                </div>
                                <div class="mb-3">
                                    <label for="psw" class="form-label"><b>รหัสผ่าน</b></label>
                                    <input type="password" class="form-control" placeholder="ระบุรหัสผ่าน" name="psw" id="psw" required>
                                </div>
                                <div class="mb-3">
                                    <label for="psw-repeat" class="form-label"><b>รหัสผ่านอีกครั้ง</b></label>
                                    <input type="password" class="form-control" placeholder="ระบุรหัสผ่านอีกครั้ง" name="psw-repeat" id="psw-repeat" required>
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <label for="Fname" class="form-label"><b>ชื่อ</b></label>
                                    <input type="text" class="form-control" placeholder="ระบุชื่อ" name="Fname" id="Fname" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Lname" class="form-label"><b>นามสกุล</b></label>
                                    <input type="text" class="form-control" placeholder="ระบุนามสกุล" name="Lname" id="Lname" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Telnum" class="form-label"><b>เบอร์โทรศัพท์</b></label>
                                    <input type="text" class="form-control" placeholder="ระบุเบอร์โทรศัพท์" name="telnum" id="telnum" required>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">สมัคร</button>
                    <a href="./index.php">login</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>