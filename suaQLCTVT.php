<?php
include ("header.php");
include ("ketnoi.php");

$usern = $_REQUEST["user"]; //Nhận giá trị user từ link sửa của quantri.php

$sql = "SELECT * FROM chi_tiet_vat_tu WHERE ma_ctvt = '" . $usern . "'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa vật tư" . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<link rel="stylesheet" href="css/chinhsua.css" type="text/css" />

<form enctype="multipart/form-data" action="xulysuaQLCTVT.php" name="xulysuaQLCTVT" method="post">
    <div class="text">
        <h4>
            CHỈNH SỬA CHI TIẾT VẬT TƯ
        </h4>
    </div>

    <div class="themmoi">
        <div class="them">
            <div class="thema">
                <span>Mã chi tiết</span>
                <input type="text" name="ma_ctvt" readonly value="<?php echo $row["ma_ctvt"]; ?>" />
            </div>


            <div class="thema">
                <span>Tên phòng</span>
                <select name="ma_phong">
                    <?php
                    $sql2 = "SELECT ma_phong, ten_phong FROM phong";
                    $result2 = mysqli_query($conn, $sql2) or die("Không thể lấy thông tin phòng: " . mysqli_error($conn));
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $ma_phong = $row2['ma_phong'];
                        $ten_phong = $row2['ten_phong'];
                        $selected = ($ma_phong == $row['ma_phong']) ? "selected" : ""; // Đặt thuộc tính selected cho option phù hợp
                        echo "<option value=\"$ma_phong\" $selected>$ten_phong</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="thema">
                <span>Vật tư</span>
                <select name="ma_vat_tu">
                    <?php
                    $sql2 = "SELECT ma_vat_tu, ten_vat_tu FROM vat_tu";
                    $result2 = mysqli_query($conn, $sql2) or die("Không thể lấy thông tin vật tư: " . mysqli_error($conn));
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $ma_vat_tu = $row2['ma_vat_tu'];
                        $ten_vat_tu = $row2['ten_vat_tu'];
                        $selected = ($ma_vat_tu == $row['ma_vat_tu']) ? "selected" : ""; // Đặt thuộc tính selected cho option phù hợp
                        echo "<option value=\"$ma_vat_tu\" $selected>$ten_vat_tu</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="them">
            <div class="thema">
                <span>Số lượng</span>
                <input type="number" name="so_luong_trong_phong" value="<?php echo $row["so_luong_trong_phong"]; ?>" />
            </div>

            <div class="thema">
                <span>Tình trạng vật tư</span>
                <select name="tinh_trang">
                    <option value="Đang sử dụng">Đang sử dụng</option>
                    <option value="Đang sửa chữa">Đang sửa chữa</option>
                </select>
            </div>
        </div>
    </div>

    <div class="luulai">
        <input type="submit" name="luu" value="Lưu lại" />
        <button type="button" onclick="window.location.href='QLCTVT.php'">Trở về</button>
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