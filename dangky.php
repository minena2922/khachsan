<head><title>Le Grand Ha Noi Hotel - Đăng ký tài khoản</title></head>
<link rel="stylesheet" href="css/dangky.css"/>
<form enctype="multipart/form-data" action="xulydangky.php" name="xulydangky" method="post" onsubmit="return validateForm()">
    <div class="form-tong">
        <h4>ĐĂNG KÝ TÀI KHOẢN</h4>
        <div class="themtong">
            <div class="themmoi">
                <div class="thema">
                    <span>Họ tên khách hàng</span>
                    <input style="width:800px" type="text" name="ho_ten" placeholder="Vui lòng nhập họ tên đầy đủ"/>
                </div>
            </div>

            <div class="themmoi">
                <div class="thema">
                    <span>Giới tính</span>
                    <select style="width:800px" name="gioi_tinh">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
            </div>

            <div class="themmoi">
                <div class="thema">
                    <span>Căn cước công dân</span>
                    <input style="width:800px" type="text" name="cccd" placeholder="CCCD/CMND"/>
                </div>
            </div>

            <div class="themmoi">
                <div class="thema">
                    <span>Số điện thoại</span>
                    <input style="width:800px" type="text" name="sdtkh" placeholder="Số điện thoại" />
                </div>
            </div>

            <div class="themmoi">
                <div class="thema">
                    <span>Địa chỉ</span>
                    <input style="width:800px" type="text" name="dia_chi" placeholder="Địa chỉ"/>
                </div>
            </div>

            <div class="themmoi">
                <div class="thema">
                    <span>Email</span>
                    <input style="width:800px" type="text" name="emailkh" placeholder="Tài khoản đăng nhập" />
                </div>
            </div>

            <div class="themmoi">
                <div class="thema">
                    <span>Mật khẩu</span>
                    <input style="width:800px" type="password" name="matkhaukh" placeholder="Mật khẩu đăng nhập"/>
                </div>
            </div>


            <div class="luulai">
                <input type="submit" name="luu" value="Đăng ký" />
                <a href="dangnhap.php">Tôi đã có tài khoản!</a>
            </div>
        </div>
    </div>
</form>
</body>

</html>
<script>
        function validateForm() {
            var hoTen = document.forms["xulydangky"]["ho_ten"].value;
            var gioiTinh = document.forms["xulydangky"]["gioi_tinh"].value;
            var cccd = document.forms["xulydangky"]["cccd"].value;
            var sdtkh = document.forms["xulydangky"]["sdtkh"].value;
            var diaChi = document.forms["xulydangky"]["dia_chi"].value;
            var emailkh = document.forms["xulydangky"]["emailkh"].value;
            var matkhaukh = document.forms["xulydangky"]["matkhaukh"].value;

            if (hoTen == "" || gioiTinh == "" || cccd == "" || sdtkh == "" || diaChi == "" || emailkh == "" || matkhaukh == "") {
                alert("Vui lòng điền đầy đủ thông tin.");
                return false;
            }
            return true;
        }
    </script>l