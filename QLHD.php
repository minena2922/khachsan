<?php include("header.php");
include("ketnoi.php");
?>
<style>
    h6 {
        font-size: 1.5rem;
        font-family: Tahoma;
        color: #40679E;
        font-weight: 600;
    }

    .btt {
        display: flex;
        gap: 4px;
        align-items: center;
        justify-content: center;
        height: 50px;
    }

    .eye {
        color: #65B741;
        height: 25px;
        border: 1.5px solid #65B741;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 3px;
    }

    .print {
        color: red;
        height: 25px;
        border: 1.5px solid red;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 3px;
    }

    .table th,
    .table td {
        text-align: center;
        vertical-align: middle;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6>QUẢN LÝ HOÁ ĐƠN</h6>
            </div>

            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Mã hoá đơn</th>
                            <th>Mã phiếu đặt</th>
                            <th>Khách hàng</th>
                            <th>Nhân viên</th>
                            <th>Ngày lập</th>
                            <th>Thành tiền</th>
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM hoa_don";
                        $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin hóa đơn: " . mysqli_error($conn));
                        while ($row = mysqli_fetch_array($kq)) {
                            // Lấy thông tin khách hàng
                            $khach_hangs = $row["ma_kh"];
                            $sql3 = "SELECT * FROM khach_hang WHERE ma_kh='$khach_hangs'";
                            $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin khách hàng: " . mysqli_error($conn));
                            $khach_hang = mysqli_fetch_array($kq3);

                            // Lấy thông tin nhân viên
                            $nhan_viens = $row["ma_nv"];
                            $sql4 = "SELECT * FROM nhan_vien WHERE ma_nv='$nhan_viens'";
                            $kq4 = mysqli_query($conn, $sql4) or die("Không thể xuất thông tin nhân viên: " . mysqli_error($conn));
                            $nhan_vien = mysqli_fetch_array($kq4);

                            // Kiểm tra xem ma_phieu_dat có null hoặc rỗng không
                            $phieu_dats = $row["ma_phieu_dat"];
                            if (!empty($phieu_dats)) {
                                $sql5 = "SELECT * FROM phieu_dat WHERE ma_phieu_dat='$phieu_dats'";
                                $kq5 = mysqli_query($conn, $sql5) or die("Không thể xuất thông tin phiếu đặt: " . mysqli_error($conn));
                                if ($phieu_dat = mysqli_fetch_array($kq5)) {
                                    $ma_phieu_dat = $phieu_dat["ma_phieu_dat"];
                                } else {
                                    $ma_phieu_dat = "Không tìm thấy";
                                }
                            } else {
                                $ma_phieu_dat = "Không có";
                            }

                            // Hiển thị kết quả trong bảng
                            echo "<tr>";
                            echo "<td>" . $row["ma_hoa_don"] . "</td>";
                            echo "<td>" . $ma_phieu_dat . "</td>";
                            echo "<td>" . $khach_hang["ho_ten"] . "</td>";
                            echo "<td>" . $nhan_vien["ho_ten"] . "</td>";
                            echo "<td>" . (new DateTime($row["ngay_lap_hoa_don"], new DateTimeZone('Asia/Ho_Chi_Minh')))
                                ->format('d/m/Y H:i:s') . "</td>";
                            echo "<td>" . number_format($row["thanh_tien"], 0, ',', '.') . " VND</td>";

                            $usern = $row["ma_hoa_don"];
                            echo "<td class='btt'>
                    <a href='chitietHD.php?ma_hoa_don=$usern'><button class='eye'><ion-icon name='eye'></ion-icon></button></a>
                </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


<?php include("footer.php"); ?>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "Không có dữ liệu",
                "info": "Đang hiển thị _START_ đến _END_ của _TOTAL_ mục",
                "infoEmpty": "Đang hiển thị 0 đến 0 của 0 mục",
                "infoFiltered": "(đã lọc từ tổng số _MAX_ mục)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Hiển thị _MENU_ mục",
                "loadingRecords": "Đang tải...",
                "processing": "Đang xử lý...",
                "search": "Tìm kiếm:",
                "zeroRecords": "Không tìm thấy kết quả phù hợp",
                "paginate": {
                    "first": "Đầu",
                    "last": "Cuối",
                    "next": "Tiếp",
                    "previous": "Trước"
                },
                "aria": {
                    "sortAscending": ": sắp xếp tăng dần",
                    "sortDescending": ": sắp xếp giảm dần"
                },
                "searchPlaceholder": "Tìm kiếm..."
            },
            "pageLength": 10,

        });
    });
</script>