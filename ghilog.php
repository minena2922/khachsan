<?php
include 'ketnoi.php';

function ghi_log($ma_nv, $hanh_dong) {
    global $conn;

    // Kiểm tra kết nối
    if (!$conn) {
        echo "Kết nối cơ sở dữ liệu thất bại.";
        return;
    }

    // Đảm bảo đặt timezone
    if (!ini_get('date.timezone')) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    $ngay_gio = date('Y-m-d H:i:s');
    
    // Ép kiểu dữ liệu nếu cần thiết
    $ma_nv = (int)$ma_nv;

    // Câu lệnh SQL
    $sql = "INSERT INTO log (ma_nv, hanh_dong, ngay) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Lỗi chuẩn bị câu lệnh: " . $conn->error;
        return;
    }

    // Gán giá trị vào câu lệnh SQL
    $stmt->bind_param("iss", $ma_nv, $hanh_dong, $ngay_gio);

    // Thực thi câu lệnh và kiểm tra lỗi
    if ($stmt->execute()) {
        echo "Ghi log thành công";
    } else {
        echo "Lỗi ghi log: " . $stmt->error;
    }

    // Đóng statement
    $stmt->close();
}
?>
