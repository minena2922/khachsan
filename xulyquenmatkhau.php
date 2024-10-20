<?php
include("ketnoi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    
    if ($new_password !== $confirm_password) {
        header("Location: quenmatkhau.php?error=1");
        exit();
    }
    
    // Kiểm tra xem email có tồn tại trong bảng khách hàng không
    $sql_kh = "SELECT * FROM khach_hang WHERE emailkh = '$email'";
    $result_kh = mysqli_query($conn, $sql_kh);
    
    if (mysqli_num_rows($result_kh) == 1) {
        // Email tồn tại trong bảng khách hàng, cập nhật mật khẩu mới
        $update_sql = "UPDATE khach_hang SET matkhaukh = '$new_password' WHERE emailkh = '$email'";
        
        if (mysqli_query($conn, $update_sql)) {
            // Mật khẩu đã được cập nhật thành công
            header("Location: dangnhap.php?success=1");
            exit();
        } else {
            // Lỗi khi cập nhật mật khẩu
            header("Location: quenmatkhau.php?error=2");
            exit();
        }
    } else {
        // Email không tồn tại trong bảng khách hàng
        header("Location: quenmatkhau.php?error=3");
        exit();
    }
}

mysqli_close($conn);
?>
