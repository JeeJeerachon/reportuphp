<?php
$content = "admin";
require "../auth/sessionpersist.php";
$_SESSION['lastpage'] = "../admin/showchart.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <?php
    include '../components/meta-title.php'
    ?>
    <title>สถิติการแจ้งซ่อม</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js"></script>

</head>

<body>
    <?php
    include '../components/navbaradmin.php';
    require("../DB/connect.php");
    $query = "Select count(Location) as sum_location, Location from report group by location order by sum_location DESC LIMIT 1";
    $result = mysqli_query($con, $query);
    while ($rowq = mysqli_fetch_array($result)) {
        $toplocsum = $rowq['sum_location'];
        $toploc = $rowq['Location'];
    }
    $query = "select count(problem) as sum_problem, Problem from report group by problem order by sum_problem DESC LIMIT 1";
    $result = mysqli_query($con, $query);
    while ($rowqq = mysqli_fetch_array($result)) {
        $topprosum = $rowqq['sum_problem'];
        $toppro = $rowqq['Problem'];
    }

    ?>
    <br>
    <div class="container">
        <div class="main-1">
            <div class="shadow p-3  bg-white rounded">
                <div class="card-body p-5">
                    <h4 class="my-4">สถิติการแจ้งซ่อม</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h3>รายละเอียด</h3>
                                <ul>
                                    <?php
                                    require '../DB/connect.php';
                                    $result = mysqli_query($con, "SELECT * FROM tool");
                                    if ($result) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<li>" . $row["toolname"] . "</li>";
                                        }
                                    }
                                    ?>
                                </ul>
                            </h4>
                        </div>
                        <div class="col-md-2">
                            <h3>สรุป</h3>
                                <p>รายการที่แจ้งมากที่สุด: <?php echo $toppro .' : '. $topprosum . ' ครั้ง'; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- chart สถิตห้องที่แจ้งซ่อม -->
    <div class="container">
        <div class="main-1">
            <div class="shadow p-3  bg-white rounded">
                <div class="card-body p-5">
                    <h4 class="my-4">สถิตห้องที่แจ้งซ่อม</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="myChart2" width="400" height="400"></canvas>
                        </div>
                        <div class="col-md-2">
                            <h3>รายละเอียด</h3>
                            <?php
                            require '../DB/connect.php';
                            $result = mysqli_query($con, "SELECT * FROM room");
                            if ($result) {
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<li>" . $row["roomname"] . "</li>";
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-2">
                        <h3>สรุป</h3>
                                <p>รายการที่แจ้งมากที่สุด: <?php echo $toploc .' : '. $toplocsum . ' ครั้ง'; ?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php
    include '../components/footer.php';
    ?>
    <?php
    require("../DB/connect.php");
    $data = $con->query("select count(problem) as sum_problem, problem from report group by problem order by sum_problem DESC");
    $data2 = $con->query("select count(Location) as sum_location, Location from report group by location order by sum_location DESC");
    $label = [];
    $datax = [];
    $loc = [];
    $locc = [];
    // print_r($data);
    while ($result = $data->fetch_object()) {
        $label[] = $result->problem;
        $datax[] = $result->sum_problem;
    }
    while ($result = $data2->fetch_object()) {
        $loc[] = $result->Location;
        $locc[] = $result->sum_location;
    }
    ?>

    <!-- chart1 สถิติการแจ้งซ่อม -->
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($label) ?>,
                datasets: [{
                    label: 'สถิติการแจ้งซ่อม',
                    data: <?= json_encode($datax) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- chart2 สถิตห้องที่แจ้งซ่อม -->
    <script>
        var cty = document.getElementById('myChart2').getContext('2d');
        var myChart2 = new Chart(cty, {
            type: 'bar',
            data: {
                labels: <?= json_encode($loc) ?>,
                datasets: [{
                    label: 'สถิตห้องที่แจ้งซ่อม',
                    data: <?= json_encode($locc) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


</body>

</html>