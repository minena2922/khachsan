<?php
session_start();
include("ketnoi.php");

// Lấy thông tin đăng nhập từ form
$user = $_POST['user'];
$pass = $_POST['pass'];

// Tránh SQL Injection
$user = mysqli_real_escape_string($conn, $user);
$pass = mysqli_real_escape_string($conn, $pass);

// Tìm kiếm tài khoản nhân viên trong CSDL
$sql_nv = "SELECT * FROM nhan_vien WHERE user='$user' AND pass='$pass'";
$result_nv = mysqli_query($conn, $sql_nv);

if (mysqli_num_rows($result_nv) == 1) {
    $row_nv = mysqli_fetch_assoc($result_nv);
    $quyen_nv = $row_nv['quyen'];
    $ho_ten_nv = $row_nv['ho_ten'];
    $ma_nv = $row_nv['ma_nv'];

    $_SESSION['ho_ten'] = $ho_ten_nv;
    $_SESSION['user'] = $user;
    $_SESSION['ma_nv'] = $ma_nv;
    $_SESSION['quyen'] = $quyen_nv;

    mysqli_close($conn);
    
    if ($quyen_nv == 0) {
        header("Location: QLLP.php");
        exit();
    } elseif ($quyen_nv == 1) {
        header("Location: thongkeloaiphong.php");
        exit();
    }
}

// Tìm kiếm tài khoản khách hàng trong CSDL
$sql_kh = "SELECT * FROM khach_hang WHERE emailkh='$user' AND matkhaukh='$pass'";
$result_kh = mysqli_query($conn, $sql_kh);

if (mysqli_num_rows($result_kh) == 1) {
    $row_kh = mysqli_fetch_assoc($result_kh);
    $ho_ten_kh = $row_kh['ho_ten'];
    
    $_SESSION['ma_kh'] = $row_kh['ma_kh'];
    $_SESSION['ho_ten'] = $ho_ten_kh;
    $_SESSION['user'] = $user;

    mysqli_close($conn);
    
    header("Location: trangchu.php");
    exit();
}

// Đóng kết nối CSDL
mysqli_close($conn);

// Đăng nhập không thành công, chuyển hướng về trang đăng nhập với thông báo lỗi
header("Location: dangnhap.php?error=1");
exit();

?>
