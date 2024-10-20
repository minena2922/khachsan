<?php
include 'ketnoi.php';

$selectedDay = $_GET['day'];

$sql = "SELECT DATE_FORMAT(ngay_lap_hoa_don, '%d-%m-%Y') AS day, SUM(thanh_tien) AS revenue 
        FROM hoa_don 
        WHERE DATE_FORMAT(ngay_lap_hoa_don, '%d') = '$selectedDay' 
        GROUP BY DAY(ngay_lap_hoa_don)";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
