<?php
include ("header.php");
include ("ketnoi.php");

$usern = $_REQUEST["user"]; //Nhận giá trị user từ link sửa của quantri.php

$sql = "SELECT * FROM tin_tuc WHERE ma_tin_tuc = '" . $usern . "'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa tin tức: " . mysqli_error($conn));
$row = mysqli_fetch_array($kq);
?>
<!-- <link rel="stylesheet" href="css/chinhsua.css" type="text/css"/> -->
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

    .text h2{
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
        gap: 20px;
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
        flex-direction: column;
        gap: 20px;

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
        color: black;
        width: 350px;
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

<form enctype="multipart/form-data" action="xulysuaQLTT.php" name="xulysuaQLTT" method="post">
    <div class="text">
        <h2>
            CHỈNH SỬA THÔNG TIN BÀI ĐĂNG
        </h2>
    </div>
    <div class="themtong">
        <div class="themmoi">
            <div class="themm">
                <div class="thema">
                    <span>Mã tin tức</span>
                    <input type="text" name="ma_tin_tuc" readonly value="<?php echo $row["ma_tin_tuc"]; ?>" />
                </div>
            </div>
            <div class="themm">
                <div class="thema">
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
            </div>
        </div>
        <div class="themmoi">
            <div class="themm">
                <div class="thema">
                    <span>Tiêu đề</span>
                    <input style="width:800px;" type="text" name="ten_tin_tuc" 
                        value="<?php echo $row["ten_tin_tuc"]; ?>" />
                </div>

                <div class="thema">
                    <span>Nội dung bài</span>
                    <textarea name="noi_dung" id="editor1"><?php echo $row["noi_dung"]; ?></textarea>
                </div>
            </div>
        </div>
        <div class="themmoi">
            <div class="themm">
                <div class="thema">
                    <span>Ngày đăng</span>
                    <input type="date" name="ngay_dang" value="<?php echo $row["ngay_dang"]; ?>" />
                </div>
            </div>
            <div class="themm">
                <div class="thema">
                <span>Trạng thái</span>
                <select name="trang_thai">
                        <option value="Công khai" <?php echo ($row["trang_thai"] == "Công khai") ? 'selected' : ''; ?>>Công khai
                        </option>
                        <option value="Ẩn bài" <?php echo ($row["trang_thai"] == "Ẩn bài") ? 'selected' : ''; ?>>Ẩn bài
                        </option>
                    </select>
                </div>
            </div>
        </div>


        <div class="themmoi">
    <div class="thema">
        <span>Hình ảnh tin tức</span>
        <input style="width:800px;" type="text" name="hinh_anh_hien_tai" id="hinh_anh_hien_tai"
            value="<?php echo $row['hinh_anh']; ?>" readonly>
        <input type="file" name="hinh_anh" id="hinh_anh" style="display:none;" onchange="updateImagePath(this)">
        <img id="hinh_anh_preview" src="<?php echo $row['hinh_anh']; ?>" style="max-width:800px;height: 600px;">
        <button style="width:200px; margin: 10px auto; border-radius: 3px; height: 35px;background-color: #40679E; color:white; border:none;" type="button" onclick="document.getElementById('hinh_anh').click();">Vui lòng chọn ảnh!</button>
    </div>
</div>

    </div>

    <div class="luulai">
    <input type="submit" name="luu" value="Lưu lại" />
    <button type="button" onclick="window.location.href='QLTT.php'">Trở về</button>
    </div>
</form>

<script>
    function updateImagePath(input) {
        var filePath = input.value.split('\\').pop(); 
        document.getElementById('hinh_anh_hien_tai').value = "./anhtin/" + filePath; 

        // Hiển thị hình ảnh mới
        var file = input.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('hinh_anh_preview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
</script>

<script src="editor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1', {
        filebrowserUploadUrl: 'upload.php?type=Files',
        filebrowserImageUploadUrl: 'upload.php?type=Images',
        filebrowserBrowseUrl: 'editor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl: 'editor/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
        height: 200,
        width: 800,
        toolbar: [
            ['NewPage', '-', 'Undo', 'Redo', 'PageBreak'],
            ['Cut', '-', 'Copy', 'Paste', 'PasteFromWord'],
            ['Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
            ['Link', 'Unlink', 'Image', 'Flash', 'Table', 'Smiley', 'SpecialChar'],
            '/',
            ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript'],
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyFull', 'JustifyBlock'],
            ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'],
            ['Maximize', 'ckeditor_wiris_formulaEditor']
        ]
    });
</script>
<?php
include ("footer.php")
    ?>