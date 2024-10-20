<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include necessary files
include("header.php");
include("ketnoi.php");

// Load Composer's autoloader
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Function to send email
function sendConfirmationEmail($email, $ma_phieu_dat, $ngay_dat, $ten_loai, $so_luong_phong) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'hihilife22@gmail.com'; // SMTP username
        $mail->Password   = 'uqit tekx pvlf aeij'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('hihilife22@gmail.com', 'THE ROSE HOTEL');
        $mail->addAddress($email); 

    
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8'; 
        $mail->Subject = 'Thông báo xác nhận phiếu đặt phòng';
        $mail->Body    = "
            <p>Phiếu đặt phòng của bạn đã được xác nhận.</p>
            <p>Mã phiếu đặt: $ma_phieu_dat</p>
            <p>Ngày đặt: " . date('d/m/Y', strtotime($ngay_dat)) . "</p>
            <p>Loại phòng: $ten_loai</p>
            <p>Số lượng phòng: $so_luong_phong</p>
            <p>Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi.</p>
        ";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Check if ma_phieu_dat is provided in the URL
if (isset($_GET['ma_phieu_dat'])) {
    $ma_phieu_dat = $_GET['ma_phieu_dat'];

    $sql_phieu_dat = "SELECT * FROM phieu_dat WHERE ma_phieu_dat='$ma_phieu_dat'";
    $result_phieu_dat = mysqli_query($conn, $sql_phieu_dat);
    $row_phieu_dat = mysqli_fetch_assoc($result_phieu_dat);

    // Check if the booking exists
    if (!$row_phieu_dat) {
        echo "<div class='alert alert-warning'>Không tồn tại phiếu đặt có mã $ma_phieu_dat</div>";
        exit;
    }

    $ma_khach_hang = $row_phieu_dat['ma_kh'];
    $sql_khach_hang = "SELECT * FROM khach_hang WHERE ma_kh='$ma_khach_hang'";
    $result_khach_hang = mysqli_query($conn, $sql_khach_hang);
    $row_khach_hang = mysqli_fetch_assoc($result_khach_hang);

    $ma_loai_phong = $row_phieu_dat['ma_loai'];
    $sql_loai_phong = "SELECT * FROM loai_phong WHERE ma_loai='$ma_loai_phong'";
    $result_loai_phong = mysqli_query($conn, $sql_loai_phong);
    $row_loai_phong = mysqli_fetch_assoc($result_loai_phong);

    $ma_nhan_vien = $row_phieu_dat['ma_nv'];
    $sql_nhan_vien = "SELECT * FROM nhan_vien WHERE ma_nv='$ma_nhan_vien'";
    $result_nhan_vien = mysqli_query($conn, $sql_nhan_vien);
    $row_nhan_vien = mysqli_fetch_assoc($result_nhan_vien);

    // Check if the form is submitted to update the status
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $trang_thai = $_POST['trang_thai'];

        $ma_nv_dang_nhap = isset($_SESSION['ma_nv']) ? $_SESSION['ma_nv'] : null;

        if ($trang_thai == 'Đã xác nhận' && $ma_nv_dang_nhap) {
            $sql_update = "UPDATE phieu_dat SET trang_thai='$trang_thai', ma_nv='$ma_nv_dang_nhap' WHERE ma_phieu_dat='$ma_phieu_dat'";
        } else {
            $sql_update = "UPDATE phieu_dat SET trang_thai='$trang_thai' WHERE ma_phieu_dat='$ma_phieu_dat'";
        }

        if (mysqli_query($conn, $sql_update)) {
            // Send email confirmation
            if ($trang_thai == 'Đã xác nhận') {
                sendConfirmationEmail(
                    $row_khach_hang['emailkh'],
                    $row_phieu_dat['ma_phieu_dat'],
                    $row_phieu_dat['ngay_dat'],
                    $row_loai_phong['ten_loai'],
                    $row_phieu_dat['so_luong_phong_dat']
                );
            }

            echo "<script>alert('Cập nhật trạng thái thành công!'); window.location.href='QLPD.php';</script>";
            $row_phieu_dat['trang_thai'] = $trang_thai;
        } else {
            echo "<div class='alert alert-danger'>Lỗi khi cập nhật trạng thái: " . mysqli_error($conn) . "</div>";
        }
    }
} else {
    echo "<div class='alert alert-warning'>Không có mã phiếu đặt được cung cấp.</div>";
    exit;
}
?>


<style>
    .alert-success {
        font-weight: bolder;
        background-color: #65B741;
    }
</style>
<div class="container">
    <h4 style="color:#40679E; font-weight:bolder;">CHI TIẾT PHIẾU ĐẶT</h4>
    <form action="" method="POST">
        <div class="form-group">
            <label for="trang_thai" style="color:brown; font-weight: bolder; letter-spacing:1px;">Trạng thái phiếu đặt:</label>
            <select style="letter-spacing:0.5px;" class="form-control" id="trang_thai" name="trang_thai" onchange="updateSelectTextColor()">
                <option style="color: #40679E;" value="Chưa xác nhận" <?php if ($row_phieu_dat['trang_thai'] == 'Chưa xác nhận') echo 'selected'; ?>>Chưa xác nhận</option>
                <option style="color: #65B741;" value="Đã xác nhận" <?php if ($row_phieu_dat['trang_thai'] == 'Đã xác nhận') echo 'selected'; ?>>Đã xác nhận</option>
                <option style="color: #D04848;" value="Đã hủy phòng" <?php if ($row_phieu_dat['trang_thai'] == 'Đã hủy') echo 'selected'; ?>>Đã hủy</option>
                <option style="color: #FFC100;" value="Đã trả phòng" <?php if ($row_phieu_dat['trang_thai'] == 'Đã trả phòng') echo 'selected'; ?>>Đã trả phòng</option>
            </select>
        </div>
        <button type="submit" style="color:white; font-weight: bolder; background-color: #65B741; border: none; height: 35px; border-radius:3px; width: 100px;">Cập nhật</button>
        <button type="button" style="color:white; font-weight: bolder; background-color: #FFC100; border: none; height: 35px; border-radius:3px; width: 100px;" onclick="window.location.href='QLPD.php'">Trở về</button>
    </form>
    <script>
        // cập nhật màu chữ
        function updateSelectTextColor() {
            var select = document.getElementById('trang_thai');
            var selectedOption = select.options[select.selectedIndex];
            select.style.color = selectedOption.style.color;
        }

        // thiết lập màu chữ ban đầu dựa trên tùy chọn đã chọn
        updateSelectTextColor();
    </script>
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Mã phiếu đặt</th>
                <td><?php echo $row_phieu_dat['ma_phieu_dat']; ?></td>
            </tr>
            <tr>
                <th scope="row">Mã khách hàng</th>
                <td><?php echo $row_phieu_dat['ma_kh']; ?></td>
            </tr>
            <tr>
                <th scope="row">Họ tên khách hàng</th>
                <td><?php echo $row_khach_hang['ho_ten']; ?></td>
            </tr>
            <tr>
                <th scope="row">Loại phòng</th>
                <td><?php echo $row_loai_phong['ten_loai']; ?></td>
            </tr>
            <tr>
                <th scope="row">Ngày đặt phòng</th>
                <td><?php echo date('d/m/Y', strtotime($row_phieu_dat["ngay_dat"])); ?></td>
            </tr>
            <tr>
                <th scope="row">Ngày nhận phòng</th>
                <td><?php echo date('d/m/Y', strtotime($row_phieu_dat["ngay_nhan"])); ?></td>
            </tr>
            <tr>
                <th scope="row">Ngày trả phòng</th>
                <td><?php echo date('d/m/Y', strtotime($row_phieu_dat["ngay_tra"])); ?></td>
            </tr>
            <tr>
                <th scope="row">Số lượng người lớn</th>
                <td><?php echo $row_phieu_dat['so_luong_nguoi_lon']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số lượng trẻ em</th>
                <td><?php echo $row_phieu_dat['so_luong_tre_em']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số lượng trẻ em trên 6 tuổi</th>
                <td><?php echo $row_phieu_dat['so_luong_tre_em_tren_6']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số lượng trẻ em dưới 6 tuổi</th>
                <td><?php echo $row_phieu_dat['so_luong_tre_em_duoi_6']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số tiền phụ thu trẻ em trên 6 tuổi</th>
                <td><?php echo number_format($row_phieu_dat['phu_thu_tre_em'], 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <th scope="row">Tổng tiền</th>
                <td><?php echo number_format($row_phieu_dat['tong_tien'], 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <th scope="row">Số tiền đã cọc</th>
                <td><?php echo number_format($row_phieu_dat['tien_coc'], 0, ',','.'); ?></td>
            </tr>
            <tr>
                <th scope="row">Nhân viên xác nhận</th>
                <td><?php echo isset($row_nhan_vien['ho_ten']) ? $row_nhan_vien['ho_ten'] : ''; ?></td>
            </tr>
        </tbody>
    </table>
</div>


<?php include ("footer.php"); ?>
