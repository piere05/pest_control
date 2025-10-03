<?php

$connect = new PDO('mysql:host=localhost;dbname=pest_control', 'root', '');

$site_id = $_GET['site_id'];
$data = array();

$query = "SELECT * FROM job_order WHERE site_id='$site_id' ORDER BY job_date, id";
$statement = $connect->prepare($query);
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

    $bgColor = 'green';
    if ($row['status'] == 0) {
        $bgColor = 'red';
    } elseif ($row['status'] >= 1 && $row['status'] <= 2) {
        $bgColor = 'orange';
    } elseif ($row['status'] == 3) {
        $bgColor = 'green';
    }

    $data[] = array(
        'id' => $row['id'],
        'title' => $row['job_time'],     
        'start' => $row['job_date'],      
        'backgroundColor' => $bgColor
    );
}

echo json_encode($data);

?>
