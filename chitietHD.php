<style>
    .fix1 {
        display: flex;
        align-items: center;
        gap: 10%;
        width: 70%;
        justify-content: center;
        height: 20px;
    }

    .fix2{
   
    display: flex;
    width: 70%;
    padding-left:  25.5%;
    align-items: center;
    height: 20px;
    }

    .fix3{
        padding-top: 10px;
    font-size: 18px;
    font-weight: 700;
    display: flex;
    padding-bottom: 10px;
    width: 70%;
    margin-left: 25.5%;
    gap: 55px;
    height: 20px;
    align-items: center;
    }

    .fix4{
    padding-top: 15px;
    font-size: 18px;
    font-weight: 700;
    display: flex;
    padding-bottom: 15px;
    width: 70%;
    margin-left: 30%;
    gap: 55px;
    height: 20px;
    align-items: center;
    }

.fix5{
    font-size: 18px;
    margin-top: 20px;
    width: 90%;
    display: flex;
    justify-content: flex-end;
    font-weight: 700;
}
    .fix {
        margin: 0 auto;
        display: flex;
        align-items: center;
        gap: 10px;
        width: 90%;
        /* width: 105%; */
        justify-content: center;
        flex-direction: column;
    }

    .anhlogo {
        display: flex;
        justify-content: center;
    }

</style>

<?php
include ("ketnoi.php");

if (isset($_GET['ma_hoa_don'])) {
    $ma_hoa_don = $_GET['ma_hoa_don'];

    // Truy vấn để lấy thông tin chi tiết hóa đơn
    $sql = "SELECT * FROM hoa_don WHERE ma_hoa_don = '$ma_hoa_don'";
    $result = mysqli_query($conn, $sql) or die("Không thể lấy thông tin hóa đơn: " . mysqli_error($conn));

    if ($row = mysqli_fetch_assoc($result)) {
        $ma_phieu_dat = $row['ma_phieu_dat'];
        $ma_kh = $row['ma_kh'];
        $ma_nv = $row['ma_nv'];
        $ngay_lap_hoa_don = $row['ngay_lap_hoa_don'];
        $thanh_tien = $row['thanh_tien'];

        // Truy vấn để lấy thông tin khách hàng
        $sql_khach_hang = "SELECT * FROM khach_hang WHERE ma_kh = '$ma_kh'";
        $result_khach_hang = mysqli_query($conn, $sql_khach_hang) or die("Không thể lấy thông tin khách hàng: " . mysqli_error($conn));
        $row_khach_hang = mysqli_fetch_assoc($result_khach_hang);

        // Truy vấn để lấy thông tin nhân viên
        $sql_nhan_vien = "SELECT * FROM nhan_vien WHERE ma_nv = '$ma_nv'";
        $result_nhan_vien = mysqli_query($conn, $sql_nhan_vien) or die("Không thể lấy thông tin nhân viên: " . mysqli_error($conn));
        $row_nhan_vien = mysqli_fetch_assoc($result_nhan_vien);

        // Truy vấn để lấy thông tin chi tiết phiếu đặt
        $sql_phieu_dat = "SELECT * FROM phieu_dat WHERE ma_phieu_dat = '$ma_phieu_dat'";
        $result_phieu_dat = mysqli_query($conn, $sql_phieu_dat) or die("Không thể lấy thông tin phiếu đặt: " . mysqli_error($conn));
        $row_phieu_dat = mysqli_fetch_assoc($result_phieu_dat);

        echo "<h3 style='margin: 0; align-items: center; display: flex; justify-content: center;'>THE ROSE HOTEL</h3>";
        echo "<div class='anhlogo'>";
        echo "<img style='width:50px; height=50px;' src ='./img/logo/rose1.png'/>";
        echo "</div>";
        echo "<h1 style='text-align:center; margin: 0; font-family: system-ui;'>HOÁ ĐƠN</h1>";

        echo "<div class='fix'>";

            echo "<div class='fix1'>";
            echo "<p>Ngày lập hóa đơn: " . $ngay_lap_hoa_don . "</p>";
            echo "</div>";
        
            echo "<div class='fix1'";
            echo "<p>Mã hóa đơn: " . $ma_hoa_don . "</p>";
            echo "<p>Mã phiếu đặt: " . $ma_phieu_dat . "</p>";
            echo "</div>";  
            echo "<div class='fix2'"; 
            echo "<p>Nhân viên xác nhận: " . $row_nhan_vien['ho_ten'] . "</p>";
            echo "</div>";  
            echo "<div class='fix2'";
            echo "<p>Khách hàng: " . $row_khach_hang['ho_ten'] . "</p>";
            echo "</div>"; 
            echo "<div class='fix2'";
            echo "<p>Ngày đặt: " . date('d/m/Y', strtotime($row_phieu_dat['ngay_dat'])) . "</p>";
            echo "</div>"; 
            echo "<div class='fix3'";
            echo "<p'>Thông tin phiếu đặt</p>";
            echo "</div>"; 
            echo "<div class='fix2'";
            echo "<p>Ngày nhận phòng: " . date('d/m/Y', strtotime($row_phieu_dat['ngay_nhan'])) . "</p>";
            echo "</div>"; 
            echo "<div class='fix2'";
            echo "<p>Ngày trả phòng: " . date('d/m/Y', strtotime($row_phieu_dat['ngay_tra'])) . "</p>";
            echo "</div>"; 
            echo "<div class='fix2'";
            echo "<p>Số lượng phòng đặt: " . $row_phieu_dat['so_luong_phong_dat'] . "</p>";
            echo "</div>"; 
            echo "<div class='fix2'";
            echo "<p>Số lượng người lớn: " . $row_phieu_dat['so_luong_nguoi_lon'] . "</p>";
            echo "</div>"; 
            
            echo "<div class='fix2'";
            echo "<p>Số lượng trẻ em trên 6 tuổi: " . $row_phieu_dat['so_luong_tre_em_tren_6'] . "</p>";
            echo "</div>"; 
            echo "<div class='fix2'";
            echo "<p>Số tiền phụ thu trẻ em trên 6 tuổi: " . number_format($row_phieu_dat['phu_thu_tre_em'], 0, ',', '.') . " VND</p>";
            echo "</div>"; 
            echo "<div class='fix2'";
            echo "<p>Số lượng trẻ em dưới 6 tuổi: " . $row_phieu_dat['so_luong_tre_em_duoi_6'] . "</p>";
            echo "</div>"; 
            echo "<div class='fix2'";
            echo "<p>Số tiền đã cọc: " . number_format($row_phieu_dat['tien_coc'], 0, ',', '.') . " VND</p>";
            echo "</div>"; 
        echo "</div>";
        $tong_tien_phu_thu_den_truoc = 0;
        $tong_tien_phu_thu_den_sau = 0;
        $tong_tien_chi_phi_phat_sinh = 0;


        // Truy vấn để lấy thông tin phân phòng
        $sql_o = "SELECT * FROM o WHERE ma_phieu_dat = '$ma_phieu_dat'";
        $result_o = mysqli_query($conn, $sql_o) or die("Không thể lấy thông tin phân phòng: " . mysqli_error($conn));

        if (mysqli_num_rows($result_o) > 0) {
            echo "<div class='fix4'";
            echo "<p>Thông tin phân phòng</p>";
            echo "</div>"; 
            echo "<table border='1' style='margin: auto; '>";
            echo "<tr>
                        <th>Tên loại phòng</th>
                        <th>Tên phòng</th>
                        <th>Phụ thu đến trước</th>
                        <th>Số tiền phụ thu đến trước</th>
                        <th>Phụ thu đến sau</th>
                        <th>Số tiền phụ thu đến sau</th>
                        <th>Chi phí phát sinh</th>
                        <th>Ghi chú</th>
                    </tr>";

            while ($row_o = mysqli_fetch_assoc($result_o)) {
                // Truy vấn để lấy thông tin phòng
                $ma_phong = $row_o['ma_phong'];
                $sql_phong = "SELECT * FROM phong WHERE ma_phong = '$ma_phong'";
                $result_phong = mysqli_query($conn, $sql_phong) or die("Không thể lấy thông tin phòng: " . mysqli_error($conn));
                $row_phong = mysqli_fetch_assoc($result_phong);

                // Truy vấn để lấy thông tin loại phòng
                $ma_loai = $row_o['ma_loai'];
                $sql_loai_phong = "SELECT * FROM loai_phong WHERE ma_loai = '$ma_loai'";
                $result_loai_phong = mysqli_query($conn, $sql_loai_phong) or die("Không thể lấy thông tin loại phòng: " . mysqli_error($conn));
                $row_loai_phong = mysqli_fetch_assoc($result_loai_phong);

                echo "<tr>";
                echo "<td>" . $row_loai_phong['ten_loai'] . "</td>";

                // Kiểm tra nếu 'row_phong' tồn tại và có 'ten_phong'
                if ($row_phong && isset($row_phong['ten_phong'])) {
                    echo "<td>" . $row_phong['ten_phong'] . "</td>";
                } else {
                    echo "<td>Không có thông tin phòng</td>";
                }
                echo "<td>" . $row_o['phu_thu_den_truoc'] . "</td>";
                echo "<td>" . number_format($row_o['so_tien_phu_thu_den_truoc'], 0, ',', '.') . " VND</td>";
                $tong_tien_phu_thu_den_truoc += $row_o['so_tien_phu_thu_den_truoc'];
                echo "<td>" . $row_o['phu_thu_den_sau'] . "</td>";
                echo "<td>" . number_format($row_o['so_tien_phu_thu_den_sau'], 0, ',', '.') . " VND</td>";
                $tong_tien_phu_thu_den_sau += $row_o['so_tien_phu_thu_den_sau'];
                echo "<td>" . number_format($row_o['chi_phi_phat_sinh'], 0, ',', '.') . " VND</td>";
                $tong_tien_chi_phi_phat_sinh += $row_o['chi_phi_phat_sinh'];
                echo "<td>" . $row_o['ghi_chu'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Không tìm thấy thông tin phân phòng.</p>";
        }

        // Tính lại thành tiền theo công thức
        // $thanh_tien_moi = ($row_phieu_dat['tong_tien'] + $tong_tien_phu_thu_den_truoc + $tong_tien_phu_thu_den_sau) - $row_phieu_dat['tien_coc'];
        $thanh_tien_moi = ($row_phieu_dat['tong_tien'] + $tong_tien_phu_thu_den_truoc + $tong_tien_phu_thu_den_sau + $tong_tien_chi_phi_phat_sinh) - $row_phieu_dat['tien_coc'];
        echo "<div class='fix5'";
        echo "<p>Thành tiền: " . number_format($thanh_tien_moi, 0, ',', '.') . " VND</p>";
        echo "</div>"; 
        echo "</div>";

    } else {
        echo "<p>Không tìm thấy hóa đơn.</p>";
    }
} else {
    echo "<p>Không có mã hóa đơn được cung cấp.</p>";
}

mysqli_close($conn);
?>