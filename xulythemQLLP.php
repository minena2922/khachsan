<?php
session_start();
include("ketnoi.php");
include("ghilog.php");

// Kiểm tra session đã đăng nhập hay chưa
if (!isset($_SESSION['ma_nv'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST["ten_loai"], $_POST["dien_tich"], $_POST["chi_tiet_phong"], $_POST["so_luong"], $_POST["gia_phong"])) {
    $ten_loai = $_POST["ten_loai"];
    $dien_tich = $_POST["dien_tich"];
    $chi_tiet_phong = $_POST["chi_tiet_phong"];
    $so_luong = $_POST["so_luong"];
    $gia_phong = $_POST["gia_phong"];
    $ma_nv = $_SESSION['ma_nv'];

    $anh_loai_phong = ''; 

    if ($_FILES["anh_loai_phong"]["name"] != "") {
        $duongdan = "./anhtin/";
        $duongdan = $duongdan . basename($_FILES["anh_loai_phong"]["name"]);
        if (move_uploaded_file($_FILES["anh_loai_phong"]["tmp_name"], $duongdan)) {
            $anh_loai_phong = $duongdan;
        } else {
            die("Không thể tải lên hình ảnh.");
        }
    }

    // Thực hiện truy vấn SQL để thêm loại phòng mới
    $sql = "INSERT INTO loai_phong (ten_loai, anh_loai_phong, dien_tich, chi_tiet_phong, so_luong, gia_phong) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssss", $ten_loai, $anh_loai_phong, $dien_tich, $chi_tiet_phong, $so_luong, $gia_phong);

        if ($stmt->execute()) {
            // Lấy mã loại phòng vừa thêm vào
            $ma_loai_phong = $stmt->insert_id;

            // Ghi log hành động thêm loại phòng
            $hanh_dong = "Thêm loại phòng mới: Mã $ma_loai_phong, Tên $ten_loai, Diện tích $dien_tich, Chi tiết phòng $chi_tiet_phong, Số lượng $so_luong, Giá phòng $gia_phong";
            ghi_log($ma_nv, $hanh_dong);

            echo "<script language=javascript>
                    alert('Thêm loại phòng mới thành công!');
                    window.location.href = 'QLLP.php'; // Điều hướng sau khi thêm thành công
                  </script>";
        } else {
            echo "Không thể thêm loại phòng mới: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Lỗi chuẩn bị câu lệnh SQL: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Các trường dữ liệu không được gửi đầy đủ từ form.";
}
?>
