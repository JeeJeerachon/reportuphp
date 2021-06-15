<?php
session_start();
require("../DB/connect.php");
$data = $con->query("select count(problem) as sum_problem, problem from report group by problem");
$label = [];
$datax = [];
// print_r($data);
while($result = $data->fetch_object()){
    $label[] = $result->problem;
    $datax[] = $result->sum_problem;
}
$xx = [
    'label' => $label,
    'data' => $datax
];
echo json_encode($xx);
