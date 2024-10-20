<head>
    <script src="https://kit.fontawesome.com/71a8190e62.js" crossorigin="anonymous"></script>
</head>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include ("header.php");
include ("ketnoi.php");

if (!isset($_SESSION['ma_nv'])) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header('Location: login.php');
    exit;
}

$ma_nv = $_SESSION['ma_nv'];
$sql = "SELECT ho_ten, gioi_tinh, cccd, ngay_sinh, sdtnv, dia_chi, user, pass FROM nhan_vien WHERE ma_nv = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ma_nv);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ho_ten = $row['ho_ten'];
    $gioi_tinh = $row['gioi_tinh'];
    $cccd = $row['cccd'];
    $ngay_sinh = $row['ngay_sinh'];
    $sdtnv = $row['sdtnv'];
    $dia_chi = $row['dia_chi'];
    $user = $row['user'];
    $pass = $row['pass'];

} else {

    echo "Không tìm thấy thông tin nhân viên.";
    exit;
}
$stmt->close();
$conn->close();
?>
<style>
    h4 {
        display: flex;
        margin: 0px;
    }

    .frame-info {
        display: flex;
        width: 100%;
        height: auto;
        background-color: #FEFAF6;
    }

    .info-cus>span {
        color: dimgray;
    }

    .title-info {
        margin-left: 17.5%;
        gap: 10px;
        display: flex;
        font-size: 20px;
        align-items: center;
        margin-top: 4%;
        color: dimgray;
    }

    table {
        padding: 42px;
        margin: 22px auto;
        display: flex;
        justify-content: center;
        width: 65%;
        height: auto;
        background-color: white;
        border: 1px solid #F0F0F0;
    }

    td {
        font-size: 15px;
        height: 40px;
        font-family: sans-serif;
    }

    input {
        padding-left: 10px;
        width: 365px;
        border: 1px solid white;
        background-color: #d3d3d34d;
        height: 30px;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form enctype="multipart/form-data" action="xulysuathongtinquantri.php" method="post">
        <div class="title-info">
            <i class="fa-solid fa-user"></i>
            <h4>CHỈNH SỬA TRANG THÔNG TIN CÁ NHÂN</h4>
        </div>
        <div>
            <table>
                <tr style="display:none;">
                    <td style="width: 180px; color: dimgray; ">Mã nhân viên
                    </td>
                    <td style="width:300px; ">
                        <?php echo htmlspecialchars($ma_nv); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 180px; color: dimgray; ">Họ và tên</td>
                    <td style="width:300px; ">
                        <input type="text" id="ho_ten" name="ho_ten" value="<?php echo htmlspecialchars($ho_ten); ?>">
                    </td>
                </tr>
                <tr>
                    <td style="color: dimgray;">Giới tính</td>
                    <td style="">
                        <input type="text" id="gioi_tinh" name="gioi_tinh"
                            value="<?php echo htmlspecialchars($gioi_tinh); ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 180px; color: dimgray; ">CCCD/CMND</td>
                    <td style="width:300px; ">
                        <input type="text" id="cccd" name="cccd" value="<?php echo htmlspecialchars($cccd); ?>">
                    </td>
                </tr>
                <tr>
                    <td style="width: 180px; color: dimgray; ">Ngày sinh</td>
                    <td style="width:300px; ">
                        <input type="text" id="ngay_sinh" name="ngay_sinh"
                            value="<?php echo htmlspecialchars($ngay_sinh); ?>">
                    </td>
                </tr>
                <tr>
                    <td style="color: dimgray; ">Điện thoại</td>
                    <td style="">
                        <input type="text" id="sdtnv" name="sdtnv" value="<?php echo htmlspecialchars($sdtnv); ?>">
                    </td>
                </tr>
                <tr>
                    <td style="color: dimgray; ">Địa chỉ</td>
                    <td style="">
                        <input type="text" id="dia_chi" name="dia_chi"
                            value="<?php echo htmlspecialchars($dia_chi); ?>">
                    </td>
                </tr>
                <tr>
                    <td style="color: dimgray; ">Tài khoản</td>
                    <td style="">
                        <input type="text" id="user" name="user" value="<?php echo htmlspecialchars($user); ?>">
                    </td>
                </tr>
                <tr>
                    <td style="color: dimgray;">Mật khẩu</td>
                    <td>
                        <input type="password" id="pass" name="pass" value="<?php echo htmlspecialchars($pass); ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit"
                            style="width:300px; margin-left: 115px; height: 25px; margin-top: 30px;  background-color: #40679E; color: white; border: none;">Lưu
                            thông tin</button>
                        <button style="width:300px; margin-left:115px; height: 25px; margin-top: 10px;background-color: gray; color: white; border: none;" type="button"
                            onclick="window.location.href='thongtinquantri.php'">
                            Trở về</a>
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>

</html>
<?php
include ("footer.php");
?>