<?php
include_once 'connection.php';

if (isset($_POST['ma_loai'])) {
    $maLoai = $_POST['ma_loai'];

    // Truy vấn để lấy giá phòng dựa trên mã loại phòng
    $query = "SELECT gia_phong FROM loai_phong WHERE ma_loai = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $maLoai);
    $stmt->execute();
    $stmt->bind_result($giaPhong);
    $stmt->fetch();
    $stmt->close();

    // Trả về giá phòng
    echo $giaPhong;
} else {
    echo 'Không nhận được mã loại phòng.';
}
?>
