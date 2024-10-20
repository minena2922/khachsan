<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include necessary files
include("header.php");
include("ketnoi.php");

// Check if ma_phieu_dat is provided in the URL
if (isset($_GET['ma_o'])) {
    $ma_o = $_GET['ma_o'];

    // Query to fetch booking details from phieu_dat table
    $sql_o = "SELECT o.*, p.ten_phong FROM o 
              JOIN phong p ON o.ma_phong = p.ma_phong 
              WHERE o.ma_o='$ma_o'";
    $result_o = mysqli_query($conn, $sql_o);
    $row_o = mysqli_fetch_assoc($result_o);

    // Check if the booking exists
    if (!$row_o) {
        echo "<div class='alert alert-warning'>Không tồn tại phiếu đặt có mã $ma_o</div>";
        exit;
    }

    $ma_phieu_dat = $row_o['ma_phieu_dat'];
    $sql_phieu_dat = "SELECT * FROM phieu_dat WHERE ma_phieu_dat='$ma_phieu_dat'";
    $result_phieu_dat = mysqli_query($conn, $sql_phieu_dat);
    $row_phieu_dat = mysqli_fetch_assoc($result_phieu_dat);

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
} else {
    echo "<div class='alert alert-warning'>Không có mã phân phòng được cung cấp.</div>";
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
    <h4 style="color:#40679E; font-weight:bolder;">CHI TIẾT PHÂN PHÒNG</h4>
    <form action="" method="POST">
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Nhân viên xác nhận</th>
                <td><?php echo isset($row_nhan_vien['ho_ten']) ? $row_nhan_vien['ho_ten'] : ''; ?></td>
            </tr>
            <tr>
                <th scope="row">Mã phân phòng</th>
                <td><?php echo $row_o['ma_o']; ?></td>
            </tr>
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
                <th scope="row">Tên phòng</th>
                <td><?php echo $row_o['ten_phong']; ?></td>
            </tr>
            <tr>
                <th scope="row">Ngày nhận phòng</th>
                <td><?php echo $row_o["ngay_den"]; ?></td>
            </tr>
            <tr>
                <th scope="row">Thời gian nhận phòng</th>
                <td><?php echo $row_o['thoi_gian_den']; ?></td>
            </tr>
            <tr>
                <th scope="row">Ngày trả phòng</th>
                <td><?php echo $row_o["ngay_di"]; ?></td>
            </tr>
            <tr>
                <th scope="row">Thời gian trả phòng</th>
                <td><?php echo $row_o['thoi_gian_di']; ?></td>
            </tr>
            <tr>
                <th scope="row">Tổng tiền</th>
                <td><?php echo number_format($row_o['tong_tien'], 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <th scope="row">Số tiền đã cọc</th>
                <td><?php echo number_format($row_o['so_tien_da_coc'], 0, ',', '.'); ?></td>

            </tr>
            <tr>
                <th scope="row">Số tiền cần thanh toán</th>
                <td><?php echo number_format($row_o['tong_so_tien_can_tra'], 0, ',', '.'); ?></td>

            </tr>
            <!-- <tr>
                <th scope="row">Số tiền thực nhận</th>
                <td><?php echo $row_o['so_tien_thuc_nhan']; ?></td>
            </tr> -->
            <tr>
                <th scope="row">Tình trạng</th>
                <td><?php echo $row_o['tinh_trang']; ?></td>
            </tr>
            <tr>
                <th scope="row">Phụ thu nhận phòng sớm</th>
                <td><?php echo $row_o['phu_thu_den_truoc']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số tiền phụ thu nhận phòng sớm</th>
                <td><?php echo number_format($row_o['so_tien_phu_thu_den_truoc'], 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <th scope="row">Phụ thu trả phòng trễ</th>
                <td><?php echo $row_o['phu_thu_den_sau']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số tiền phụ thu trả phòng trễ</th>
                <td><?php echo number_format($row_o['so_tien_phu_thu_den_sau'], 0, ',', '.'); ?></td>
            </tr>
            <!-- <tr>
                <th scope="row">Gia hạn phòng</th>
                <td><?php echo $row_o['gia_han_phong']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số tiền gia hạn phòng</th>
                <td><?php echo $row_o['so_tien_gia_han_phong']; ?></td>
            </tr> -->
            <tr>
                <th scope="row">Chi phí phát sinh</th>
                <td><?php echo number_format($row_o['chi_phi_phat_sinh'], 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <th scope="row">Ghi chú</th>
                <td><?php echo $row_o['ghi_chu']; ?></td>
            </tr>
        </tbody>
    </table>
    <button type="button" style="margin-bottom: 35px;
    margin-left: 46%;color:white;font-weight: bolder ; background-color: #FFC100; border: none; height: 35px; border-radius:3px; width: 100px;" onclick="window.location.href='phanphong.php'">Trở về</button>

</div>


<?php include ("footer.php"); ?>
