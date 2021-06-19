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
    <link rel="stylesheet" href="../css/Chart.css">

</head>

<body>
    <?php
    include '../components/navbaradmin.php';
    require("../DB/connect.php");
    $query = "Select count(Location) as sum_location, Location from report group by location order by sum_location DESC LIMIT 1";
    $result = mysqli_query($con,$query);
    while ($rowq = mysqli_fetch_array($result)) {
        $toplocsum = $rowq['sum_location'] ;
        $toploc = $rowq['Location'];
    }
    


    ?>
    <br>
    <div class="container">
    <div  class="main-1">
        <div class="shadow p-3  bg-white rounded">
            <div class="card-body p-5">
                <h4 class="my-4">สถิติการแจ้งซ่อม</h4>
                <div class="row">
                    <div class="col-md-4">
                        <canvas id="myChart" width="400" height="00"></canvas>
                    </div>
                    <div class="col-md-4">
                        <h4 class="my-4">
                            </h3>
                            <p></p>
                            <h4 class="my-3">รายละเอียด</h3>
                                <ul>
                                    <li><?php echo $toplocsum; ?></li>
                                    <li><?php echo $toploc; ?></li>
                                    <li>อื่นๆ</li>
                                </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
    <div  class="main-1">
        <div class="shadow p-3  bg-white rounded">
            <div class="card-body p-5">
                <h4 class="my-4">สถิตห้องที่แจ้งซ่อม</h4>
                <div class="row">
                    <div class="col-md-8">

                        <canvas id="myChart2" width="200" height="200"></canvas>
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
    <script src="../js/Chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($label) ?>,
                datasets: [{
                    label: 'อุปกรณ์ที่แจ้งเสีย',
                    data: <?= json_encode($datax) ?>,
                    backgroundColor: [
                        '#FF99FF', '#FF99CC', '#FF9999', '#FF9966',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',

                    ],
                    borderWidth: 1,
                    borderColor: '#777',
                    hoverBorderWidth: 3,
                    hoverBorderColor: '#000'


                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var cty = document.getElementById('myChart2').getContext('2d');
        Chart.defaults.global.defaultFontFamily = '';
        Chart.defaults.global.defaultFontSize = 12;
        Chart.defaults.global.defaultFontColor = '#000000';
        var myChart2 = new Chart(cty, {
            type: 'horizontalBar',
            data: {
                labels: <?= json_encode($loc) ?>,
                datasets: [{
                    label: 'ห้องที่แจ้งเสีย',
                    data: <?= json_encode($locc) ?>,
                    backgroundColor: [
                        '#FF99FF', '#FF99CC', '#FF9999', '#FF9966', '#FF9933', '#FF9900', '#CCCCFF', '#CCCCCC', '#CCCC99', '#CCCC66', '#CCCC33', '#CCCC00', '#9999FF', '#9999CC', '#999999',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    borderColor: '#000000',
                    hoverBorderWidth: 3,
                    hoverBorderColor: '#000000'

                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: '',
                    fontSzize: 25
                },
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        fontColor: '#000000'
                    }
                },
                layout: {
                    padding: {
                        lefi: 50,
                        right: 0,
                        bottom: 0,
                        top: 0
                    }
                },
                tooltips: {
                    endbled: false
                }
            }
        });
    </script>


</body>

</html>