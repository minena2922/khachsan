<?php include("header.php");
include("ketnoi.php");
?>
<style>
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

    .btt {
        display: flex;
        gap: 4px;
        align-items: center;
        justify-content: center;
    }

    .key {
        color: #D04848;
        height: 25px;
        border: 1.5px solid #D04848;
        background-color: white;
        border-radius: 3px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hoadon {
        color: #FFC100;
        height: 25px;
        border: 1.5px solid #FFC100;
        background-color: white;
        border-radius: 3px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    h6 {
        font-size: 1.5rem;
        font-family: Tahoma;
        color: #40679E;
        font-weight: 600;
        margin: 2px;
    }

    .table th,
    .table td {
        text-align: center;
        vertical-align: middle;
    }

    .status-chua-xac-nhan {
        color: #40679E;
        font-weight: bold;
    }

    .status-da-xac-nhan {
        color: #65B741;
        font-weight: bold;
    }

    .status-da-huy {
        color: #D04848;
        font-weight: bold;
    }

    .status-tra_phong {
        color: #FFC100;
        font-weight: bold;
    }

    .table th,
    .table td {
        font-size: 14px;
        vertical-align: middle;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6>QUẢN LÝ PHIẾU ĐẶT</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th width="11%">Mã phiếu</th>
                            <th width="18%">Khách hàng</th>
                            <th width="22%">Loại phòng</th>
                            <th width="10%">Ngày đặt</th>
                            <th width="13%">Ngày nhận</th>
                            <th>Số lượng phòng</th>
                            <th width="14%">Trạng thái</th>
                            <th width="12%">Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("ketnoi.php");
                        $sql = "SELECT * FROM phieu_dat";
                        $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin " . mysqli_error($conn));
                        while ($row = mysqli_fetch_array($kq)) {

                            $loai_phongs = $row["ma_loai"];
                            $sql2 = "SELECT * FROM loai_phong WHERE ma_loai='" . $loai_phongs . "'";
                            $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin " . mysqli_error($conn));
                            $loai_phong = mysqli_fetch_array($kq2);

                            $khach_hangs = $row["ma_kh"];
                            $sql3 = "SELECT * FROM khach_hang WHERE ma_kh='" . $khach_hangs . "'";
                            $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin " . mysqli_error($conn));
                            $khach_hang = mysqli_fetch_array($kq3);

                            $status_class = '';
                            switch ($row["trang_thai"]) {
                                case 'Chưa xác nhận':
                                    $status_class = 'status-chua-xac-nhan';
                                    break;
                                case 'Đã xác nhận':
                                    $status_class = 'status-da-xac-nhan';
                                    break;
                                case 'Đã hủy':
                                    $status_class = 'status-da-huy';
                                    break;
                                case 'Đã trả phòng':
                                    $status_class = 'status-tra_phong';
                                    break;
                            }

                            echo "<tr>";
                            echo "<td>" . $row["ma_phieu_dat"] . "</td>";
                            $usern = $row["ma_phieu_dat"];
                            echo "<td>" . $khach_hang["ho_ten"] . "</td>";
                            echo "<td>" . $loai_phong["ten_loai"] . "</td>";
                            echo "<td>" . date('d/m/Y', strtotime($row["ngay_dat"])) . "</td>";
                            echo "<td>" . date('d/m/Y', strtotime($row["ngay_nhan"])) . "</td>";
                            echo "<td>" . $row["so_luong_phong_dat"] . "</td>";
                            echo "<td class='$status_class'>" . $row["trang_thai"] . "</td>";
                            echo "<td class='btt'>";
                            if ($row["trang_thai"] == "Đã trả phòng") {
                                echo "<a href='hoadon.php?user=$usern'><button class='hoadon'>HD</button></a>";
                            } else {
                                echo "<a href='suaChiTietPD.php?ma_phieu_dat=$usern'><button class='eye'><ion-icon name='eye'></ion-icon></button></a>";
                                echo "<a href='phanphong.php'><button class='key'><ion-icon name='key'></ion-icon></button></a>";
                            }
                            echo "</td>";
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