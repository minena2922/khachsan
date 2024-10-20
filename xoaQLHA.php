<?php
session_start();
include("ketnoi.php");
    $user_xoa=$_REQUEST["user"];
    $sql="delete from hinh_anh where ma_ha='".$user_xoa."'";
    $kq=mysqli_query($conn, $sql) or die ("Không thể xuất thông tin: " . mysqli_error($conn));
    echo ("<script language=javascript>
    {
    alert('Xóa hình ảnh thành công');
    window.location='QLHA.php';}
    </script> ");
?>