<?php
session_start();
include("ketnoi.php");

error_log("xoaQLDG.php được gọi");

if(isset($_GET["user"])) {
    $user_xoa = $_GET["user"];
    error_log("Đang xóa đánh giá với mã: " . $user_xoa);
    
    $sql = "DELETE FROM danh_gia WHERE ma_danh_gia = '" . mysqli_real_escape_string($conn, $user_xoa) . "'";
    $kq = mysqli_query($conn, $sql);
    
    if ($kq) {
        error_log("Xóa đánh giá thành công");
        echo "<script>
        alert('Xóa đánh giá thành công');
        window.location.href='QLDG.php';
        </script>";
    } else {
        error_log("Không thể xóa đánh giá: " . mysqli_error($conn));
        echo "<script>
        alert('Không thể xóa đánh giá: " . mysqli_error($conn) . "');
        window.location.href='QLDG.php';
        </script>";
    }
} else {
    error_log("Không tìm thấy mã đánh giá");
    echo "<script>
    alert('Không tìm thấy mã đánh giá');
    window.location.href='QLDG.php';
    </script>";
}
?>