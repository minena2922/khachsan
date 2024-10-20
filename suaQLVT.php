<?php
include ("header.php");

include ("ketnoi.php");

$usern = $_REQUEST["user"]; //Nhận giá trị user từ link sửa của quantri.php

$sql = "SELECT * FROM vat_tu WHERE ma_vat_tu = '" . $usern . "'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa thông tin vật tư" . mysqli_error());
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

    .themtong {
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

    .themmoi {
        gap: 100px;
        display: flex;
        justify-content: center;
    }

    .themm {
        display: flex;
        /* flex-direction: column; */
        gap: 98px;

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

    .thema>span {
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

<form enctype="multipart/form-data" action="xulysuaQLVT.php" name="xulysuaQLVT" method="post">
    <div class="text">
        <h4>
            CHỈNH SỬA THÔNG TIN VẬT TƯ
        </h4>
    </div>
    <div class="themtong">
        <div class="themmoi">
            <div class="thema">
                <span>Tên vật tư</span>
                <input style="width: 800px;" type="text" name="ten_vat_tu" value="<?php echo $row["ten_vat_tu"]; ?>" />
            </div>
        </div>
        <div class="themmoi">

            <div class="themm">
                <div class="thema">
                    <span>Mã vật tư</span>
                    <input type="text" name="ma_vat_tu" readonly value="<?php echo $row["ma_vat_tu"]; ?>" />
                </div>


                <div class="thema">
                    <span>Tổng số lượng vật tư</span>
                    <input type="number" name="so_luong_tong" value="<?php echo $row["so_luong_tong"]; ?>" />
                </div>

            </div>

            <div class="themm" style="display:none;">
                <div class="thema">
                    <span>Số lượng sử dụng</span>
                    <input type="number" name="so_luong_su_dung" value="<?php echo $row["so_luong_su_dung"]; ?>" />
                </div>


                <div class="thema">
                    <span>Số lượng còn lại</span>
                    <input type="text" name="so_luong_ton" value="<?php echo $row["so_luong_ton"]; ?>" />
                </div>

            </div>
        </div>

    </div>
    <div class="luulai">
        <input type="submit" name="luu" value="Lưu lại" />
        <button type="button" onclick="window.location.href='QLVT.php'">Trở về</button>
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