
<?php
session_start();
include("ketnoi.php");

    $user_xoa=$_REQUEST["user"];
    $sql="delete from nhan_vien where ma_nv='".$user_xoa."'";
    $kq=mysqli_query($conn, $sql) or die ("Không thể xuất thông tin".mysqli_error());
    echo ("<script language=javascript>
    {
    alert('Xóa nhân viên thành công');
    window.location='QLNV.php';}
    </script> ");
?>
