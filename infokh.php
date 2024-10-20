<?php
include("ketnoi.php");

if (isset($_GET['user'])) {
    $user = $_GET['user'];
    
    $sql = "SELECT * FROM khach_hang WHERE ma_kh = '$user'";
    $result = mysqli_query($conn, $sql);
    
    if ($row = mysqli_fetch_assoc($result)) {
        echo "<p>Họ tên: " . $row['ho_ten'] . "</p>";
        echo "<p>Giới tính: " . $row['gioi_tinh'] . "</p>";
        echo "<p>CCCD/CMND: " . $row['cccd'] . "</p>";
        echo "<p>Số điện thoại: " . $row['sdtkh'] . "</p>";
        echo "<p>Email: " . $row['emailkh'] . "</p>";
        echo "<p>Mật khẩu: " . str_repeat('*', strlen($row['matkhaukh'])) . "</p>";
        echo "<p>Địa chỉ: " . $row['dia_chi'] . "</p>";
    } else {
        echo "Không tìm thấy thông tin khách hàng.";
    }
    
    mysqli_close($conn);
}
?>
