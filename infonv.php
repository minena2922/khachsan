<?php
include("ketnoi.php");

if (isset($_GET['user'])) {
    $user = $_GET['user'];
    
    $sql = "SELECT * FROM nhan_vien WHERE ma_nv = '$user'";
    $result = mysqli_query($conn, $sql);
    
    if ($row = mysqli_fetch_assoc($result)) {
        echo "<p>Họ tên nhân viên: " . $row['ho_ten'] . "</p>";
        echo "<p>Giới tính: " . $row['gioi_tinh'] . "</p>";
        echo "<p>Căn cước công dân: " . $row['cccd'] . "</p>";
        echo "<p>Ngày sinh: " . $row['ngay_sinh'] . "</p>";
        echo "<p>Số điện thoại: " . $row['sdtnv'] . "</p>";
        echo "<p>Địa chỉ: " . $row['dia_chi'] . "</p>";
        echo "<p>Tài khoản: " . $row['user'] . "</p>";
        echo "<p>Mật khẩu: " . str_repeat('*', strlen($row['pass'])) . "</p>";
        echo "<p>Tình trạng: " . $row['tinh_trang'] . "</p>";
    } else {
        echo "Không tìm thấy thông tin nhân viên.";
    }
    
    mysqli_close($conn);
}
?>
