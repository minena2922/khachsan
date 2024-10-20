<?php
include("header.php");

include("ketnoi.php");

$usern=$_REQUEST["user"]; //Nhận giá trị user từ link sửa của quantri.php

$sql = "SELECT * FROM nhan_vien WHERE ma_nv = '".$usern."'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa thông tin nhân viên" . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<link rel="stylesheet" href="css/chinhsua.css" type="text/css"/>

<form enctype="multipart/form-data" action="xulysuaQLNV.php" name="xulysuaQLNV" method="post">
    <div class="text">
        <h4>
        CHỈNH SỬA THÔNG TIN NHÂN VIÊN
        </h4>
    </div>

    <div class="themmoi">
        <div class="them">
            <div class="thema">
                <span>Mã nhân viên</span>
                <input type="text" name="ma_nv" readonly value="<?php echo $row["ma_nv"]; ?>" />
            </div>

            <div class="thema">
                <span>Họ tên nhân viên</span>
                <input type="text" name="ho_ten" value="<?php echo $row["ho_ten"]; ?>" />
            </div>

            <div class="thema">
                <span>Giới tính</span>
                <select name="gioi_tinh">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>

            <div class="thema">
                <span>Căn cước công dân</span>
                <input type="text" name="cccd" value="<?php echo $row["cccd"]; ?>" />
            </div>

            <div class="thema">
                <span>Ngày sinh</span>
                <input type="text" name="ngay_sinh" value="<?php echo $row["ngay_sinh"]; ?>" />
            </div>
        </div>

        <div class="them">
            <div class="thema">
                <span>Số điện thoại</span>
                <input type="text" name="sdtnv" value="<?php echo $row["sdtnv"]; ?>" />
            </div>
            <div class="thema">
                <span>Địa chỉ</span>
                <input type="text" name="dia_chi" value="<?php echo $row["dia_chi"]; ?>" />
            </div>
            <div class="thema">
                <span>Tài khoản</span>
                <input type="text" name="user" value="<?php echo $row["user"]; ?>" />
            </div>
            
            <div class="thema">
                <span>Mật khẩu</span>
                <input type="text" name="pass" value="<?php echo $row["pass"]; ?>" />
            </div>
            <div class="thema">
                <span>Tình trạng</span>
                <select name="tinh_trang">
                    <option value="Hoạt động">Hoạt động</option>
                    <option value="Ngưng">Ngưng</option>
                </select>
            </div>
        </div>
    </div>
    <div class="luulai">
        <input type="submit" name="luu" value="Lưu lại" />
        <button type="button" onclick="window.location.href='QLNV.php'">Trở về</button>
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