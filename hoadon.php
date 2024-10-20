<?php
session_start();
include("ketnoi.php");

// Kiểm tra xem người dùng đã đăng nhập (có session ma_nv) chưa
if (isset($_SESSION['ma_nv'])) {
    // Lấy mã đơn đặt phòng từ tham số GET
    if (isset($_GET['user'])) {
        $ma_phieu_dat = $_GET['user'];

        // Lấy thông tin từ bảng `phieu_dat` dựa trên mã `ma_phieu_dat`
        $sql_select_phieu_dat = "SELECT * FROM phieu_dat WHERE ma_phieu_dat = '$ma_phieu_dat'";
        $result_phieu_dat = mysqli_query($conn, $sql_select_phieu_dat);
        if (!$result_phieu_dat) {
            die("Không thể lấy thông tin phiếu đặt: " . mysqli_error($conn));
        }
        $row_phieu_dat = mysqli_fetch_assoc($result_phieu_dat);

        if (!$row_phieu_dat) {
            die("Không tìm thấy phiếu đặt với mã: " . $ma_phieu_dat);
        }

        // Lấy thông tin khách hàng từ bảng `khach_hang`
        $ma_kh = $row_phieu_dat["ma_kh"];
        $sql_select_kh = "SELECT * FROM khach_hang WHERE ma_kh = '$ma_kh'";
        $result_kh = mysqli_query($conn, $sql_select_kh);
        if (!$result_kh) {
            die("Không thể lấy thông tin khách hàng: " . mysqli_error($conn));
        }
        $row_kh = mysqli_fetch_assoc($result_kh);

        if (!$row_kh) {
            die("Không tìm thấy khách hàng với mã: " . $ma_kh);
        }

        // Lấy thông tin từ bảng `o` dựa trên mã `ma_phieu_dat`
        $sql_select_o = "SELECT * FROM o WHERE ma_phieu_dat = '$ma_phieu_dat'";
        $result_o = mysqli_query($conn, $sql_select_o);
        if (!$result_o) {
            die("Không thể lấy thông tin từ bảng o: " . mysqli_error($conn));
        }

        $tong_tien_phu_thu_den_truoc = 0;
        $tong_tien_phu_thu_den_sau = 0;
        $tong_tien_chi_phi_phat_sinh = 0;
        $ma_o = null;

        while ($row_o = mysqli_fetch_assoc($result_o)) {
            // Lấy mã o cho lần chèn hóa đơn
            if ($ma_o === null) {
                $ma_o = $row_o['ma_o'];
            }

            // Tính tổng tiền phụ thu và chi phí phát sinh
            $tong_tien_phu_thu_den_truoc += $row_o['so_tien_phu_thu_den_truoc'];
            $tong_tien_phu_thu_den_sau += $row_o['so_tien_phu_thu_den_sau'];
            $tong_tien_chi_phi_phat_sinh += $row_o['chi_phi_phat_sinh'];

            // Lấy mã phòng từ bảng o và cập nhật trạng thái
            $ma_phong = $row_o['ma_phong'];
            $sql_update_trang_thai = "UPDATE phong SET trang_thai='0' WHERE ma_phong='$ma_phong'";
            if (!mysqli_query($conn, $sql_update_trang_thai)) {
                die("Không thể cập nhật trạng thái phòng: " . mysqli_error($conn));
            }
        }

        // Kiểm tra xem có ma_o hợp lệ không
        if ($ma_o === null) {
            die("Không tìm thấy thông tin ở cho phiếu đặt này.");
        }

        // Tính thành tiền
        $thanh_tien = ($row_phieu_dat['tong_tien'] + $tong_tien_phu_thu_den_truoc + $tong_tien_phu_thu_den_sau + $tong_tien_chi_phi_phat_sinh) - $row_phieu_dat['tien_coc'];

        // Thêm hóa đơn vào bảng `hoa_don`
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngay_lap_hoa_don = date("Y-m-d H:i:s");
        $ma_nv = $_SESSION['ma_nv'];

        $sql_insert_hoa_don = "INSERT INTO hoa_don (ma_phieu_dat, ma_o, ma_kh, ma_nv, ngay_lap_hoa_don, thanh_tien)
                               VALUES ('$ma_phieu_dat', '$ma_o', '$ma_kh', '$ma_nv', '$ngay_lap_hoa_don', '$thanh_tien')";
        if (mysqli_query($conn, $sql_insert_hoa_don)) {
            // Thông báo thành công bằng JavaScript và chuyển hướng về trang QLHD.php
            echo "<script language='javascript'>
                    alert('Thêm hóa đơn thành công!');
                    window.location='QLHD.php';
                  </script>";
        } else {
            die("Không thể tạo hóa đơn: " . mysqli_error($conn));
        }
        exit();
    } else {
        echo "Không tìm thấy mã số đơn hàng để tạo hóa đơn.";
    }
} else {
    // Nếu chưa đăng nhập, có thể chuyển hướng hoặc xử lý một cách thích hợp
    echo "Bạn cần đăng nhập để thực hiện tạo hóa đơn.";
}

// Đóng kết nối CSDL
mysqli_close($conn);
?>
