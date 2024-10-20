<?php
include("ketnoi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ma_loai'])) {
    $ma_loai = $_POST['ma_loai'];
    
    $sql = "SELECT ma_phong, ten_phong FROM phong WHERE ma_loai = '$ma_loai'";
    
    $result = mysqli_query($conn, $sql) or die("Không thể truy vấn: " . mysqli_error($conn));
    
    $phongs = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $phongs[] = $row;
    }
    
    echo json_encode($phongs);
}
?>
