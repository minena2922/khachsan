<?php
include ("header.php");
include ("ketnoi.php");

$usern = $_REQUEST["user"]; //Nhận giá trị user từ link sửa của quantri.php

$sql = "SELECT * FROM hinh_anh WHERE ma_ha = '" . $usern . "'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa thông tin" . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<style>
    .text {
        height: 60px;
        font-size: medium;
        display: flex;
        /* flex-direction: column; */
        margin-top: 40px;
        gap: 15px;
        justify-content: center;
    }

    .text h4 {
        font-family: Tahoma;
        background-color: #F5F5F5;
        font-size: large;
        width: 90%;
        padding: 10px 30px;
        display: flex;
        align-items: center;
        color: #40679E;
        font-weight: bold;
    }

    .themmoi {
        margin-top: 20px;
        background: #F5F5F5;
        display: flex;
        flex-direction: column;
        align-items: center;
        /* border: 2px solid #F5F5F5; */
        width: 90%;
        margin: 20px auto;
        gap: 25px;
        padding: 40px;
        border-radius: 5px;
    }


    .them {
        width: 800px;
        display: flex;
        gap: 40px;
        color: #40679E;
        margin: 0 auto;
        justify-content: center;
    }

    .thema {
        display: flex;
        flex-direction: column;
        gap: 5px;
        font-size: large;
    }

    .thema>span {
        font-weight: 600;
        color: #40679E;
    }

    input[type="text" i] {
        height: 40px;
        border: 1px solid #40679E;
        border-radius: 3px;
        color: black;
        width: 350px;
    }


    input[type="date" i] {
        height: 40px;
        border: 1px solid #40679E;
        border-radius: 3px;
        color: black;
        width: 350px;
    }

    .thema>select {
        height: 40px;
        border: 1px solid #40679E;
        border-radius: 3px;
        width: 350px;
    }

    .luulai {
        display: flex;
        gap: 30px;
        justify-content: center;
        align-items: center;
        padding: 10px 20px;

    }

    .luulai input {
        margin-top: 5px;
        width: 80px;
        padding: 5px 10px;
        color: #fafafa;
        background-color: #65B741;
        border: 1px solid white;
        font-weight: bolder;
        border-radius: 3px;
        font-size: large;
    }

    .luulai button {
        margin-top: 5px;
        width: 80px;
        padding: 5px 10px;
        color: #fafafa;
        background-color: #FFC100;
        border: 1px solid white;
        font-weight: bolder;
        border-radius: 3px;
        font-size: large;
    }
</style>

<form enctype="multipart/form-data" action="xulysuaQLHA.php" name="xulysuaQLHA" method="post">
    <div class="text">
        <h4>
            CHỈNH SỬA HÌNH ẢNH
        </h4>
    </div>

    <div class="themmoi">
        <div class="them">
            <div class="thema">
                <span>Mã phòng</span>
                <input type="text" name="ma_ha" readonly value="<?php echo ($row["ma_ha"]); ?>" />
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
        </div>
        <div class="themm">
            <div class="thema">
                <span>Hình ảnh loại phòng</span>
                <input style="width:740px;" type="text" name="hinh_anh_hien_tai" id="hinh_anh_hien_tai"
                    value="<?php echo $row['hinh_anh']; ?>" readonly>
                <input type="file" name="hinh_anh" id="hinh_anh" style="display:none;" onchange="updateImagePath(this)">
                <img id="hinh_anh_preview" src="<?php echo $row['hinh_anh']; ?>"
                    style="max-width:740px; max-height: 400px;">
                <button
                    style="width:200px; margin: 10px auto; border-radius: 3px; height: 35px;background-color: #40679E; color:white; border:none;"
                    type="button" onclick="document.getElementById('hinh_anh').click();">Vui lòng chọn
                    ảnh!</button>
            </div>
        </div>

    </div>
    
    <div class="luulai">
        <input type="submit" name="luu" value="Lưu lại" />
        <button type="button" onclick="window.location.href='QLHA.php'">Trở về</button>
    </div>
</form>
<script>
    function updateImagePath(input) {
        var filePath = input.value.split('\\').pop(); // Lấy tên tệp từ đường dẫn đầy đủ
        document.getElementById('hinh_anh_hien_tai').value = "./anhtin/" + filePath; // Cập nhật đường dẫn hiển thị

        // Hiển thị hình ảnh mới
        var file = input.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('hinh_anh_preview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
</script>
<?php
include ("footer.php");
?>