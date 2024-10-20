<?php
include("header.php");
include("ketnoi.php");

$usern=$_REQUEST["user"]; //Nhận giá trị user từ link sửa của quantri.php

$sql = "SELECT * FROM hoa_don WHERE ma_hoa_don = '".$usern."'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa hoá đơn" . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<link rel="stylesheet" href="css/chinhsua.css" type="text/css"/>

<form enctype="multipart/form-data" action="xulysuaQLHD.php" name="xulysuaQLHD" method="post">
    <div class="text">
        <h2>
        <ion-icon name="add-circle"></ion-icon>
        SỬA THÔNG TIN HOÁ ĐƠN
        </h2>
    </div>

    <div class="themmoi">
        <div class="them">
            <span>STT</span>
            <input type="text" name="ma_hoa_don" readonly value="<?php echo $row["ma_hoa_don"]; ?>"/>
        </div>

        <div class="them">
    <span>Phân phòng</span>
    <select name="ma_o">
        <?php
        $sql2 = "SELECT ma_loai, ten_loai FROM loai_phong";
        $result2 = mysqli_query($conn, $sql2) or die("Không thể lấy loại phòng: " . mysqli_error($conn));
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $ma_loai = $row2['ma_loai'];
            $ten_loai = $row2['ten_loai'];
            $selected = ($ma_loai == $row['ma_loai']) ? "selected" : ""; // Đặt thuộc tính selected cho option phù hợp
            echo "<option value=\"$ma_loai\" $selected>$ten_loai</option>";
        }
        ?>
    </select>
</div>
<div class="them">
    <span>Khách hàng</span>
    <select name="ma_kh">
        <?php
        $sql2 = "SELECT ma_kh, ho_ten FROM khach_hang";
        $result2 = mysqli_query($conn, $sql2) or die("Không thể lấy thông tin khách hàng: " . mysqli_error($conn));
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $ma_kh = $row2['ma_kh'];
            $ho_ten = $row2['ho_ten'];
            $selected = ($ma_kh == $row['ma_kh']) ? "selected" : ""; 
            echo "<option value=\"$ma_kh\" $selected>$ho_ten</option>";
        }
        ?>
    </select>
</div>

<div class="them">
    <span>Nhân viên</span>
    <select name="ma_nv">
        <?php
        $sql2 = "SELECT ma_nv, ho_ten FROM nhan_vien";
        $result2 = mysqli_query($conn, $sql2) or die("Không thể lấy thông tin nhân viên " . mysqli_error($conn));
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $ma_nv = $row2['ma_nv'];
            $ho_ten = $row2['ho_ten'];
            $selected = ($ma_nv == $row['ma_nv']) ? "selected" : ""; 
            echo "<option value=\"$ma_nv\" $selected>$ho_ten</option>";
        }
        ?>
    </select>
</div>
        <div class="them">
            <span>Ngày lập</span>
            <input type="text" name="ngay_lap_hoa_don" value="<?php echo $row["ngay_lap_hoa_don"]; ?>"/>
        </div>

        <div class="them">
            <span>Thành tiền</span>
            <input type="text" name="thanh_tien" value="<?php echo $row["thanh_tien"]; ?>"/>
        </div>

        <div class="luulai">
            <input type="submit" name="luu" value="Lưu"/>
        </div>
    </div>
</form>
    
<!-- <style>
            .admin_tab >:nth-child(8){
                background-color: #3593D8;
                color: white;
            }
            </style> -->


<?php
include("footer.php")
?>