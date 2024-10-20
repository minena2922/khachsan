<?php
session_start();
include("ketnoi.php");
include("ghilog.php");

// Kiểm tra session đã đăng nhập hay chưa
if (!isset($_SESSION['ma_nv'])) {
    header("Location: login.php");
    exit();
}

// Lấy thông tin từ form
$ho_ten = $_POST["ho_ten"];
$gioi_tinh = $_POST["gioi_tinh"];
$cccd = $_POST["cccd"];
$ngay_sinh = $_POST["ngay_sinh"];
$sdtnv = $_POST["sdtnv"];
$dia_chi = $_POST["dia_chi"];
$user = $_POST["user"];
$pass = $_POST["pass"];

$tinh_trang = $_POST["tinh_trang"];
$ma_nv = $_SESSION['ma_nv'];

// Thực hiện câu lệnh SQL để thêm nhân viên mới
$sql = "INSERT INTO nhan_vien ( ho_ten, gioi_tinh, cccd, ngay_sinh, sdtnv, dia_chi, user, pass, tinh_trang) 
        VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssssssss", $ho_ten, $gioi_tinh, $cccd, $ngay_sinh, $sdtnv, $dia_chi, $user, $pass, $tinh_trang);

    if ($stmt->execute()) {
        // Lấy mã nhân viên vừa thêm vào
        $ma_nv_them = $stmt->insert_id;

        // Ghi log hành động thêm nhân viên
        $hanh_dong = "Thêm nhân viên mới: Mã $ma_nv_them, Họ tên $ho_ten, Giới tính $gioi_tinh, CCCD $cccd, Ngày sinh $ngay_sinh, SĐT $sdtnv, Địa chỉ $dia_chi, Tài khoản $user, Tình trạng $tinh_trang";
        ghi_log($ma_nv, $hanh_dong);

        echo "<script language=javascript>
                alert('Thêm nhân viên mới thành công!');
                window.location='QLNV.php';
              </script>";
    } else {
        echo "Không thể thêm nhân viên mới: " . mysqli_error($conn);
    }

    $stmt->close();
} else {
    echo "Lỗi chuẩn bị câu lệnh SQL: " . $conn->error;
}

$conn->close();
?>
