<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include ("headertc.php");
include ('ketnoi.php');

// if (!isset($_SESSION['ma_kh'])) {
//     header('Location: login.php');
//     exit;
// }

// $ma_kh = $_SESSION['ma_kh'];
$ten_loai = '';
$gia_phong = 0;
$tien_coc = 0;
$tong_tien = 0;
$so_luong = 0;

if (isset($_GET['id'])) {
    $ma_loai = $_GET['id'];
    $sql = "SELECT * FROM loai_phong WHERE ma_loai = '" . $conn->real_escape_string($ma_loai) . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ten_loai = $row["ten_loai"];
        $gia_phong = $row["gia_phong"];
        $so_luong = $row["so_luong"];
    } else {
        echo 'Không có thông tin phòng.';
    }
} else {
    echo 'Thiếu thông tin phòng.';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ngay_dat = date("Y-m-d");
    $ngay_nhan = $_POST['ngay_nhan'];
    $ngay_tra = $_POST['ngay_tra'];
    $so_luong_nguoi_lon = $_POST['so_luong_nguoi_lon'];
    $so_luong_tre_em_tren_6 = isset($_POST['so_luong_tre_em_tren_6']) ? $_POST['so_luong_tre_em_tren_6'] : '';
    $so_luong_tre_em_duoi_6 = isset($_POST['so_luong_tre_em_duoi_6']) ? $_POST['so_luong_tre_em_duoi_6'] : '';
    // echo $so_luong_nguoi_lon;
    // echo $so_luong_tre_em_duoi_6;
    // echo $so_luong_tre_em_tren_6;
    $so_luong_tre_em = $so_luong_tre_em_tren_6 + $so_luong_tre_em_duoi_6;
    $phu_thu_tre_em = isset($_POST['phu_thu_tre_em']) ? $_POST['phu_thu_tre_em'] : 0;
    $so_luong_phong_dat = $_POST['so_luong_phong_dat'];
    $tien_coc = $_POST['tien_coc'];
    $tong_tien = $_POST['tong_tien'];
    $trang_thai = "Chờ xác nhận";


    $ho_ten = $_POST['ho_ten'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $cccd = $_POST['cccd'];
    $sdtkh = $_POST['sdtkh'];
    $emailkh = $_POST['emailkh'];
    $dia_chi = isset($_POST['dia_chi']) ? $_POST['dia_chi'] : '';
    $matkhaukh = isset($_POST['matkhaukh']) ? $_POST['matkhaukh'] : '';

    $sql_insert_khach_hang = "INSERT INTO khach_hang (ho_ten, gioi_tinh, cccd, sdtkh, emailkh, dia_chi, matkhaukh) 
    VALUES ('$ho_ten', '$gioi_tinh', '$cccd', '$sdtkh', '$emailkh', '$dia_chi', '$matkhaukh')";


    if ($conn->query($sql_insert_khach_hang) === TRUE) {

        $ma_kh = $conn->insert_id;

        // Tiếp tục lưu thông tin vào bảng phieu_dat
        $sql_insert_phieu_dat = "INSERT INTO phieu_dat (ma_kh, ma_loai, ma_nv, ngay_dat, ngay_nhan, ngay_tra, 
                                so_luong_nguoi_lon, so_luong_tre_em, so_luong_tre_em_tren_6, so_luong_tre_em_duoi_6, phu_thu_tre_em, so_luong_phong_dat, 
                                tien_coc, tong_tien, trang_thai) 
                                VALUES ('$ma_kh', '$ma_loai', NULL, '$ngay_dat', '$ngay_nhan', '$ngay_tra', 
                                '$so_luong_nguoi_lon', '$so_luong_tre_em','$so_luong_tre_em_tren_6','$so_luong_tre_em_duoi_6', '$phu_thu_tre_em', '$so_luong_phong_dat', 
                                '$tien_coc', '$tong_tien', '$trang_thai')";

        if ($conn->query($sql_insert_phieu_dat) === TRUE) {
            echo "<script>alert('Bạn đã đặt phòng thành công!');   window.location.href='trangchu.php';</script> ";
            exit;
        } else {
            echo "Lỗi: " . $sql_insert_phieu_dat . "<br>" . $conn->error;
        }
    } else {
        echo "Lỗi: " . $sql_insert_khach_hang . "<br>" . $conn->error;
    }
}
?>


<form enctype="multipart/form-data" action="" id="xulydatphong" method="post"
    onsubmit="event.preventDefault(); showConfirmationPopup();">


    <div class="image-bia">
        <img class="img-bia" src="anhtin/a1.jpg" />
    </div>

    <div class="form-datphong">
        <h4>PHIẾU ĐẶT</h4>
        <p>Sử dụng biểu mẫu dưới đây, bạn có thể đặt phòng trực tuyến của chúng tôi và nhận đặt phòng đảm bảo.</p>
        <div class="form-namekh">
            <div class="tilte-namekh">
                <span>Vui lòng nhập thông tin của bạn</span>
            </div>
            <div class="frame-formkh">
                <div class="formkh">
                    <span>Họ và tên</span>
                    <input style="width: 622px;" type="text" name="ho_ten" placeholder="Nhập đầy đủ họ tên" />
                </div>
            </div>
            <div class="frame-formkh">
                <div class="formkh">
                    <span>Giới tính</span>
                    <select name="gioi_tinh">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
                <div class="formkh">
                    <span>Căn cước công dân</span>
                    <input type="text" name="cccd" />
                </div>

            </div>
            <div class="frame-formkh">
                <div class="formkh">
                    <span>Số điện thoại</span>
                    <input type="text" name="sdtkh" />
                </div>
                <div class="formkh">
                    <span>Email</span>
                    <input type="text" name="emailkh" />
                </div>
            </div>

        </div>
        <div class="frame-form">
            <div class="title-form">
                <span>Vui lòng chọn ngày nhận, trả phòng và số lượng khách</span>
            </div>
            <div class="frame-content">
                <div class="content">
                    <span style="color: dimgray;">Bạn đang chọn phòng "<a
                            style="color:#b20600; font-weight:bold;"><?php echo htmlspecialchars($ten_loai); ?></a>"</span>
                </div>
            </div>
            <div class="frame-contentt">
                <div class="content">
                    <span>Ngày nhận phòng</span>
                    <input type="date" name="ngay_nhan" id="ngay_nhan" onchange="updateTotal()" />
                </div>
                <div class="content">
                    <span>Ngày trả phòng</span>
                    <input type="date" name="ngay_tra" id="ngay_tra" onchange="updateTotal()" />
                </div>
            </div>
            <div class="framecontentt">
                <div class="content">
                    <span>Số lượng người lớn</span>
                    <div class="quantity-control">
                        <button style="height: 22px; width: 23px; font-size: 15px;" type="button"
                            onclick="updateQuantity('so_luong_nguoi_lon', -1)">-</button>
                        <input style="height: 37px; width: 221px;" type="text" id="so_luong_nguoi_lon"
                            name="so_luong_nguoi_lon" value="1" readonly data-label="người lớn">
                        <button style="height: 22px; width: 23px; font-size: 15px;" type="button"
                            onclick="updateQuantity('so_luong_nguoi_lon', 1)">+</button>
                    </div>
                </div>
                <div class="content">
                    <span>Chọn số lượng trẻ <a style="color:#b20600;">dưới</a> 6 tuổi</span>
                    <div class="quantity-control">
                        <button style="height: 22px; width: 23px; font-size: 15px;" type="button"
                            onclick="updateQuantity('so_luong_tre_em_duoi_6', -1)">-</button>
                        <input style="height: 37px; width: 221px;" type="text" id="so_luong_tre_em_duoi_6"
                            name="so_luong_tre_em_duoi_6" value="0" readonly data-label="trẻ em">
                        <button style="height: 22px; width: 23px; font-size: 15px;" type="button"
                            onclick="updateQuantity('so_luong_tre_em_duoi_6', 1)">+</button>
                    </div>
                    <span style="color:#b20600;">**Trẻ từ 6 tuổi trở lên, phụ thu thêm 70.000/người</span>

                    <span>Chọn số lượng trẻ <a style="color:#b20600;">trên</a> 6 tuổi</span>
                    <div class="quantity-control">
                        <button style="height: 22px; width: 23px; font-size: 15px;" type="button"
                            onclick="updateQuantity('so_luong_tre_em_tren_6', -1)">-</button>
                        <input style="height: 37px; width: 221px;" type="text" id="so_luong_tre_em_tren_6"
                            name="so_luong_tre_em_tren_6" value="0" readonly data-label="trẻ em">
                        <button style="height: 22px; width: 23px; font-size: 15px;" type="button"
                            onclick="updateQuantity('so_luong_tre_em_tren_6', 1)">+</button>
                    </div>
                    <span>Số tiền phụ thu trẻ: <input style="border:none; background-color:#F0F0F0; color:#b20600;"
                            type="text" readonly name="phu_thu_tre_em" id="phu_thu_tre_em" /></span>

                </div>
            </div>

            <div class="frame-contenttt">
                <div class="contentt">
                    <span>Số lượng phòng</span>
                    <select name="so_luong_phong_dat" id="so_luong_phong_dat" onchange="updateTotal()">
                        <option value="" disabled selected>Chọn số lượng phòng</option>
                        <?php
                        for ($i = 1; $i <= $so_luong; $i++) {
                            echo '<option value="' . $i . '">' . $i . ' phòng</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="frame-contentt">
                <div class="content">
                    <span>Tổng số tiền</span>
                    <input type="text" readonly name="tong_tien" value="<?php echo $tong_tien; ?>" />
                </div>
                <div class="content">
                    <span>Tiền cọc phòng</span>
                    <input type="text" readonly name="tien_coc" value="<?php echo $tien_coc; ?>" />
                </div>
            </div>

            <div class="framecontent">
                <div class="frcontent">
                    <span>Thông tin chuyển khoản</span>
                    <p><a style="color:#b20600;">**</a>Quý khách vui lòng<a style="color:#b20600;">chuyển khoản
                            đặt cọc phòng trước khi bấm đặt phòng</a>để được xác nhận phòng nhanh chóng.
                    </p>
                    <p><a style="color:#b20600;">**</a>Nội dung chuyển khoản: HỌ TÊN - LOẠI PHÒNG ĐÃ ĐẶT.</p>
                    <label class="imgQR">
                        <img class="imgqr" src="anhtin/maqr.jpg" />
                    </label>

                </div>

            </div>
            <button type="button" class="btdatphongg" onclick="showConfirmationPopup()">ĐẶT PHÒNG</button>
        </div>
        <div id="confirmationPopup" class="popup">
            <div class="popup-content">
                <div class="title-xn">
                    <span>Xác nhận đặt phòng với các thông tin sau:</span>
                    <p id="confirmationMessage"></p>
                </div>
                <div class="xndat">
                    <button class="btn" onclick="submitBooking()">Đồng ý</button>
                    <span class="close btn cancel-btn close" onclick="closePopup()">Huỷ bỏ</span>
                </div>
            </div>
        </div>
        <div class="phone-button">
            <a href="tel:+0903345615">
                <i class="fa-solid fa-phone"></i>0903 345 615
            </a>
        </div>
        <button onclick="topFunction()" id="scrollToTopBtn" title="Go to top">
            <i style="font-size: 18px; color:white;" class="fa-solid fa-arrow-up"></i>
        </button>
    </div>
</form>
<script>
    function showConfirmationPopup() {
        let ngayNhanValue = document.getElementById('ngay_nhan').value;
        let ngayTraValue = document.getElementById('ngay_tra').value;

        let ngayNhan = new Date(ngayNhanValue);
        let ngayTra = new Date(ngayTraValue);

        let ngayNhanFormatted = `${ngayNhan.getDate()}/${ngayNhan.getMonth() + 1}/${ngayNhan.getFullYear()}`;
        let ngayTraFormatted = `${ngayTra.getDate()}/${ngayTra.getMonth() + 1}/${ngayTra.getFullYear()}`;
        
        if (ngayNhanFormatted === 'NaN/NaN/NaN' || ngayTraFormatted === 'NaN/NaN/NaN') {
            Swal.fire({
                title: "Lỗi!",
                text: "Vui lòng kiểm tra ngày nhận phòng!",
                icon: "error"
            });
            document.getElementById('ngay_nhan').value = '';
            return;
        }

        let soLuongNguoiLon = document.getElementById('so_luong_nguoi_lon').value;
        let soLuongTreEmDuoi6 = document.getElementById('so_luong_tre_em_duoi_6').value;
        let soLuongTreEmTren6 = document.getElementById('so_luong_tre_em_tren_6').value;
        let soLuongPhong = document.getElementById('so_luong_phong_dat').value;
        let tongTien = document.getElementsByName('tong_tien')[0].value;
        let tienCoc = document.getElementsByName('tien_coc')[0].value;
        let phuThuTreEm = document.getElementsByName('phu_thu_tre_em')[0].value;

        let hoTen = document.querySelector('input[name="ho_ten"]').value;
        let gioiTinh = document.querySelector('select[name="gioi_tinh"]').value;
        let cccd = document.querySelector('input[name="cccd"]').value;
        let sdtkh = document.querySelector('input[name="sdtkh"]').value;
        let emailkh = document.querySelector('input[name="emailkh"]').value;

        if (tongTien === '0' || soLuongNguoiLon === '0' || soLuongPhong === '0' || hoTen.trim() === '' || gioiTinh === '' || cccd.trim() === '' || sdtkh.trim() === '' || emailkh.trim() === '') {
            Swal.fire({
                title: "Lỗi!",
                text: "Vui lòng kiểm tra lại!",
                icon: "error"
            });
            document.getElementById('ngay_nhan').value = '';
            return;
        }

        let confirmationMessage = `
            Ngày nhận phòng: ${ngayNhanFormatted}
            Ngày trả phòng: ${ngayTraFormatted}
            Số lượng người lớn: ${soLuongNguoiLon}
            Số lượng trẻ em trên 6 tuổi: ${soLuongTreEmTren6}
            Số lượng trẻ em dưới 6 tuổi: ${soLuongTreEmDuoi6}
            Phụ thu trẻ em: ${phuThuTreEm}
            Số lượng phòng đặt: ${soLuongPhong}
            Tổng tiền: ${tongTien}
            Tiền cọc: ${tienCoc}
            Họ tên: ${hoTen}
            Giới tính: ${gioiTinh}
            CCCD: ${cccd}
            Số điện thoại: ${sdtkh}
            Email: ${emailkh}`;

        document.getElementById('confirmationMessage').innerText = confirmationMessage;
        document.getElementById('confirmationPopup').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('confirmationPopup').style.display = 'none';
    }

    function submitBooking() {
        document.getElementById('xulydatphong').submit();
    }

    window.onclick = function (event) {
        var popup = document.getElementById('confirmationPopup');
        if (event.target == popup) {
            popup.style.display = 'none';
        }
    }
</script>

<script>
    let mybutton = document.getElementById("scrollToTopBtn");
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    function updateQuantity(id, change) {
        let input = document.getElementById(id);
        let currentValue = parseInt(input.value);
        if (!isNaN(currentValue)) {
            let newValue = currentValue + change;
            if (newValue >= 0) {
                if (id === "so_luong_tre_em_duoi_6" || id === "so_luong_tre_em_tren_6") {
                    input.value = newValue;
                } else {
                    input.value = newValue;
                }

                updateTotal();
            }
        }
    }


    function updateTotal() {
        console.log('coa gọi');
        let selectedRooms = document.getElementById("so_luong_phong_dat").value;
        let ngay_nhan = new Date(document.getElementById("ngay_nhan").value);
        let ngay_tra = new Date(document.getElementById("ngay_tra").value);
        let diffTime = Math.abs(ngay_tra - ngay_nhan);
        if (diffTime == 0) {
            diffTime = 1;
        }
        let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        let totalPrice = selectedRooms * <?php echo $gia_phong; ?> * diffDays;
        let additionalCharge = 0;
        let so_luong_tre_em_tren_6 = parseInt(document.getElementById("so_luong_tre_em_tren_6").value);
        if (!isNaN(so_luong_tre_em_tren_6)) {
            additionalCharge = so_luong_tre_em_tren_6 * 70000;
        }
        document.getElementById("phu_thu_tre_em").value = additionalCharge;
        let totalWithChildren = additionalCharge + totalPrice;
        let deposit = totalWithChildren / 2;
        if (isNaN(totalWithChildren)) {
            totalWithChildren = 0;
        }
        if (isNaN(deposit)) {
            deposit = 0;
        }
        document.getElementsByName("tong_tien")[0].value = totalWithChildren;
        if (selectedRooms !== "") {
            document.getElementsByName("tien_coc")[0].value = deposit;
        } else {
            document.getElementsByName("tien_coc")[0].value = 0;
        }

        const ngayNhan = document.getElementById('ngay_nhan').value;
        const ngayTra = document.getElementById('ngay_tra').value;
        const today = new Date().toISOString().split('T')[0];

        if (ngayNhan && ngayNhan < today) {
            Swal.fire({
                title: "Lỗi!",
                text: "Vui lòng kiểm tra lại ngày nhận phòng!",
                icon: "error"
            });
            document.getElementById('ngay_nhan').value = '';
            return;
        }

        // Kiểm tra ngày trả phòng
        if (ngayTra && ngayTra < today) {
            Swal.fire({
                title: "Lỗi!",
                text: "Vui lòng kiểm tra lại ngày trả phòng!",
                icon: "error"
            });
            document.getElementById('ngay_tra').value = '';
            return;
        }

        // Kiểm tra ngày nhận phòng phải nhỏ hơn hoặc bằng ngày trả phòng
        if (ngayNhan && ngayTra && ngayNhan > ngayTra) {
            Swal.fire({
                title: "Lỗi!",
                text: "Vui lòng kiểm tra lại ngày nhận phòng!",
                icon: "error"
            });
            document.getElementById('ngay_nhan').value = ''; // Xóa giá trị không hợp lệ
            document.getElementById('ngay_tra').value = ''; // Xóa giá trị không hợp lệ
        }
    }

</script>
<?php
include ("footertc.php")
    ?>