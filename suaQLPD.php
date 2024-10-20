<?php
include ("header.php");
include ("ketnoi.php");

$usern = $_REQUEST["user"]; //Nhận giá trị user từ link sửa của quantri.php

$sql = "SELECT * FROM phieu_dat WHERE ma_phieu_dat = '" . $usern . "'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa phiếu đặt" . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<link rel="stylesheet" href="css/chinhsua.css" type="text/css" />

<form enctype="multipart/form-data" action="xulysuaQLPD.php" name="xulysuaQLPD" method="post">
    <div class="text">
        <h2>
            <ion-icon name="add-circle"></ion-icon>
            SỬA PHIẾU ĐẶT
        </h2>
    </div>

    <div class="themmoi">
        <div class="them">
            <span>STT</span>
            <input type="text" name="ma_phieu_dat" readonly value="<?php echo $row["ma_phieu_dat"]; ?>" />
        </div>

        <div class="them">
            <span>Loại phòng</span>
            <select name="ma_loai">
                <?php
                $sql2 = "SELECT ma_loai, ten_loai FROM loai_phong";
                $result2 = mysqli_query($conn, $sql2) or die("Không thể lấy thông tin loại phòng: " . mysqli_error($conn));
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $ma_loai = $row2['ma_loai'];
                    $ten_loai = $row2['ten_loai'];
                    $selected = ($ma_loai == $row['ma_loai']) ? "selected" : ""; 
                    echo "<option value=\"$ma_loai\" $selected>$ten_loai</option>";
                }
                ?>
            </select>
        </div>

        <div class="them">
            <span>Nhân viên</span>
            <select name="ma_nv">
                <?php
                $sql2 = "SELECT ma_nv, ho_ten FROM nhan_vien";
                $result2 = mysqli_query($conn, $sql2) or die("Không thể lấy thông tin nhân viên: " . mysqli_error($conn));
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $ma_nv = $row2['ma_nv'];
                    $ho_ten = $row2['ho_ten'];
                    $selected = ($ma_nv == $row['ma_nv']) ? "selected" : ""; // 
                    echo "<option value=\"$ma_nv\" $selected>$ho_ten</option>";
                }
                ?>
            </select>
        </div>
        <div class="them">
            <span>Ngày đặt</span>
            <input type="text" name="ngay_dat" value="<?php echo $row["ngay_dat"]; ?>" />
        </div>

        <div class="them">
            <span>Ngày nhận</span>
            <input type="text" name="ngay_nhan" value="<?php echo $row["ngay_nhan"]; ?>" />
        </div>

        <div class="them">
            <span>Ngày trả</span>
            <input type="text" name="ngay_tra" value="<?php echo $row["ngay_tra"]; ?>" />
        </div>

        <div class="them">
            <span>Người lớn</span>
            <input type="text" name="so_luong_nguoi_lon" value="<?php echo $row["so_luong_nguoi_lon"]; ?>" />
        </div>

        <div class="them">
            <span>Trẻ em</span>
            <input type="text" name="so_luong_tre_em" value="<?php echo $row["so_luong_tre_em"]; ?>" />
        </div>

        <div class="them">
            <span>Số lượng phòng đặt</span>
            <input type="text" name="so_luong_phong_dat" value="<?php echo $row["so_luong_phong_dat"]; ?>" />
        </div>

        <div class="them">
            <span>Tiền cọc</span>
            <input type="text" name="tien_coc" value="<?php echo $row["tien_coc"]; ?>" />
        </div>

        <div class="them">
            <span>Tổng tiền</span>
            <input type="text" name="tong_tien" value="<?php echo $row["tong_tien"]; ?>" />
        </div>

        <div class="luulai">
            <input type="submit" name="luu" value="Lưu" />
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
include ("footer.php")
    ?>