<?php
include 'ketnoi.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma_phieu = $_POST['ma_phieu_dat'];
   
    $sql = "UPDATE phieu_dat SET trang_thai ='Đã hủy phòng' WHERE ma_phieu_dat='".$ma_phieu."'";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Lỗi chuẩn bị truy vấn: " . $conn->error;
        exit;
    }
    if ($stmt->execute()) {
        // header("Location: xemphong.php?loai_phong=" . urlencode($ma_loai));
        exit();
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

?>
