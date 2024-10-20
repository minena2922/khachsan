<?php
include ("header.php");
include ("ketnoi.php");

$usern = $_REQUEST["user"]; //Nhận giá trị user từ link sửa của quantri.php

$sql = "SELECT * FROM phong WHERE ma_phong = '" . $usern . "'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa thông tin phòng" . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<link rel="stylesheet" href="css/chinhsua.css" type="text/css" />

<form enctype="multipart/form-data" action="xulysuaQLP.php" name="xulysuaQLP" method="post">
    <div class="text">
        <h4>
            CHỈNH SỬA THÔNG TIN PHÒNG
        </h4>
    </div>

    <div class="themmoi">
        <div class="them">
            <div class="thema">
            <span>Mã phòng</span>
                <input type="text" name="ma_phong" readonly value="<?php echo ($row["ma_phong"]); ?>" />
            </div>
            <div class="thema">
                <span>Loại phòng</span>
                <select name="ma_loai">
                    <?php
                    $sql2 = "SELECT ma_loai, ten_loai FROM loai_phong";
                    $result2 = mysqli_query($conn, $sql2);

                    if (!$result2) {
                        die("Không thể lấy loại phòng: " . mysqli_error($conn));
                    }

                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $ma_loai = $row2['ma_loai'];
                        $ten_loai = $row2['ten_loai'];
                        $selected = ($ma_loai == $row['ma_loai']) ? "selected" : ""; // Đặt thuộc tính selected cho option phù hợp
                        echo "<option value=\"$ma_loai\" $selected>$ten_loai</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="thema">
                <span>Tên phòng</span>
                <input type="text" name="ten_phong" value="<?php echo ($row["ten_phong"]); ?>" />
            </div>
        </div>

        <!-- <div class="them">
            <div class="thema">
                <span>Diện tích phòng</span>
                <select name="dien_tich">
                    <option value="31-32m2" <?php if ($row["dien_tich"] == "31-32m2") echo 'selected="selected"'; ?>>31-32m2</option>
                    <option value="35-36m2" <?php if ($row["dien_tich"] == "35-36m2") echo 'selected="selected"'; ?>>35-36m2</option>
                </select>
            </div>

            <div class="thema">
                <span>Thông tin phòng</span>
                <select name="chi_tiet_phong">
                    <option value="2 người lớn, 2 giường đơn" <?php if ($row["chi_tiet_phong"] == "phong_don") echo 'selected="selected"'; ?>>2 người lớn, 2 giường đơn</option>
                    <option value="2 người lớn, giường đôi" <?php if ($row["chi_tiet_phong"] == "phong_doi") echo 'selected="selected"'; ?>>2 người lớn, giường đôi</option>
                </select>
            </div>
        </div> -->
    </div>

    <div class="luulai">
        <input type="submit" name="luu" value="Lưu lại" />
        <button type="button" onclick="window.location.href='QLP.php'">Trở về</button>
    </div>
</form>

<?php
include("footer.php");
?>