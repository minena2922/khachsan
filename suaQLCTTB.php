<?php
include ("header.php");
include ("ketnoi.php");

$usern = $_REQUEST["user"]; 

$sql = "SELECT * FROM chi_tiet_thiet_bi WHERE ma_cttb = '" . $usern . "'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa thiết bị" . mysqli_error());
$row = mysqli_fetch_array($kq);
?>

<style>
    .themmoi {
        margin-top: 20px;
        background: #F5F5F5;
        display: flex;
        flex-direction: column;
        /* align-items: center; */
        justify-content: center;
        /* border: 2px solid #F5F5F5; */
        width: 90%;
        margin: 20px auto;
        gap: 40px;
        padding: 40px;
        border-radius: 5px;
    }

    .themm {
        display: flex;
    }

    .themaa {
        margin: 0 auto;
        gap: 5px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .themmm {
        gap: 96px;
        display: flex;
        justify-content: center;
    }

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

    .them {
        display: flex;
        gap: 40px;
        flex-direction: column;
    }

    .thema {
        display: flex;
        flex-direction: column;
        gap: 5px;

    }

    input[type="text" i] {
        height: 40px;
        border: 1px solid #40679E;
        border-radius: 3px;
        color: black;
        width: 350px;
        padding-left: 7px;
    }

    
    input[type="number" i] {
        height: 40px;
        border: 1px solid #40679E;
        border-radius: 3px;
        color: black;
        width: 350px;
        padding-left: 7px;
    }

    .thema>select {
        height: 40px;
        border: 1px solid #40679E;
        border-radius: 3px;
        color: black;
        width: 350px;
        padding-left: 7px;
    }

    .themaa>select {
        height: 40px;
        border: 1px solid #40679E;
        border-radius: 3px;
        color: black;
        width: 796px;
        padding-left: 7px;
    }

    .thema>span,
    .themaa>span {
        color: #40679E;
        font-weight: 600;
        font-size: large;
    }

    .luulai {
        margin-top: 10px;
        margin-bottom: 50px;
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
<form enctype="multipart/form-data" action="xulysuaQLCTTB.php" name="xulysuaQLCTTB" method="post">
    <div class="text">
        <h4>CHỈNH SỬA CHI TIẾT THIẾT BỊ</h4>
    </div>
    <div class="themmoi">
        <div class="themm">
            <div class="themaa">
                <span>Tên thiết bị</span>
                <select name="ma_thiet_bi">
                    <?php
                    $sql2 = "SELECT ma_thiet_bi, ten_thiet_bi FROM thiet_bi";
                    $result2 = mysqli_query($conn, $sql2) or die("Không thể lấy thông tin thiết bị: " . mysqli_error($conn));
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $ma_thiet_bi = $row2['ma_thiet_bi'];
                        $ten_thiet_bi = $row2['ten_thiet_bi'];
                        $selected = ($ma_thiet_bi == $row['ma_thiet_bi']) ? "selected" : "";
                        echo "<option value=\"$ma_thiet_bi\" $selected>$ten_thiet_bi</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="themmm">
            <div class="them">
                <div class="thema">
                    <span>Mã chi tiết thiết bị</span>
                    <input type="text" name="ma_cttb" readonly
                        value="<?php echo htmlspecialchars($row["ma_cttb"]); ?>" />
                </div>
                <div class="thema">
                    <span>Tên phòng</span>
                    <select name="ma_phong">
                        <?php
                        $sql2 = "SELECT ma_phong, ten_phong FROM phong";
                        $result2 = mysqli_query($conn, $sql2) or die("Không thể lấy thông tin phòng: " . mysqli_error($conn));
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $ma_phong = $row2['ma_phong'];
                            $ten_phong = $row2['ten_phong'];
                            $selected = ($ma_phong == $row['ma_phong']) ? "selected" : "";
                            echo "<option value=\"$ma_phong\" $selected>$ten_phong</option>";
                        }
                        ?>
                    </select>
                </div>

            </div>
            <div class="them">
                <div class="thema">
                    <span>Số lượng sử dụng</span>
                    <input type="number" name="so_luong_trong_phong"
                        value="<?php echo htmlspecialchars($row["so_luong_trong_phong"]); ?>" />
                </div>
                <div class="thema">
                    <span>Tình trạng thiết bị</span>
                    <select name="tinh_trang">
                        <option value="Đang sử dụng" <?php echo ($row["tinh_trang"] == "Đang sử dụng") ? "selected" : ""; ?>>
                            Đang sử dụng</option>
                        <option value="Đang sửa chữa" <?php echo ($row["tinh_trang"] == "Đang sửa chữa") ? "selected" : ""; ?>>Đang sửa chữa</option>
                    </select>
                </div>
            </div>
        </div>

    </div>
    <div class="luulai">
        <input type="submit" name="luu" value="Lưu lại" />
        <button type="button" onclick="window.location.href='QLCTTB.php'">Trở về</button>
    </div>
</form>
<?php
include ("footer.php");
?>