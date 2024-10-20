<?php
include('ketnoi.php');

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['ma_loai']) || !isset($_POST['ma_kh']) || !isset($_POST['noi_dung'])) {
        echo json_encode(['status' => 'error', 'message' => 'Thiếu thông tin cần thiết để gửi đánh giá.']);
        exit;
    }
    
    $ma_loai = $_POST['ma_loai'];
    $ma_kh = $_POST['ma_kh'];
    $noi_dung = $_POST['noi_dung'];
    
    // Đặt múi giờ cho Việt Nam
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngay_danh_gia = date('Y-m-d H:i:s'); // Sử dụng thời gian hiện tại theo múi giờ Việt Nam

    $sql = "INSERT INTO danh_gia (ma_loai, ma_kh, noi_dung, ngay_danh_gia) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Lỗi chuẩn bị truy vấn: ' . $conn->error]);
        exit;
    }
    $stmt->bind_param("iiss", $ma_loai, $ma_kh, $noi_dung, $ngay_danh_gia);

    if ($stmt->execute()) {
        // Lấy tên loại phòng từ ma_loai
        $sql_get_loai = "SELECT ten_loai FROM loai_phong WHERE ma_loai = ?";
        $stmt_get_loai = $conn->prepare($sql_get_loai);
        if (!$stmt_get_loai) {
            echo json_encode(['status' => 'error', 'message' => 'Lỗi chuẩn bị truy vấn lấy tên loại: ' . $conn->error]);
            exit;
        }
        $stmt_get_loai->bind_param("i", $ma_loai);
        if (!$stmt_get_loai->execute()) {
            echo json_encode(['status' => 'error', 'message' => 'Lỗi thực thi truy vấn lấy tên loại: ' . $stmt_get_loai->error]);
            exit;
        }
        $result = $stmt_get_loai->get_result();
        if ($result->num_rows == 0) {
            echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy loại phòng với mã: ' . $ma_loai]);
            exit;
        }
        $row = $result->fetch_assoc();
        $ten_loai = $row['ten_loai'];

        echo json_encode(['status' => 'success', 'ten_loai' => $ten_loai]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Lỗi khi thêm đánh giá: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Phương thức không được hỗ trợ.']);
}

$conn->close();
?>
