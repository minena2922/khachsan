<?php include ("header.php");
include ("ketnoi.php");
?>
<style>
    .btthem>button {
        display: flex;
        color: #fafafa;
        font-weight: bolder;
        border: none;
        background-color: #D04848;
        border-radius: 3px;
        margin-left: 15px;
        margin-top: 20px;
        gap: 2px;
        justify-content: center;
        align-items: center;
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

    .btt {
        display: flex;
        gap: 4px;
        align-items: center;
        justify-content: center;
        height: 50px;
    }

    .pencil {
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
        /* Căn giữa dữ liệu */
        vertical-align: middle;
        /* Căn giữa theo chiều dọc */
        font-size: 14px;
    }
    .hoadon{
        color: red;
        border: 1px solid red;
        background-color: white;
        border-radius: 3px;
    }

</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6>QUẢN LÝ PHÂN PHÒNG</h6>
            </div>
            <a class="btthem" href="thempp.php"><button><ion-icon name="add-circle"></ion-icon>Thêm</button></a>

            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th width="15%">Mã phân phòng</th>
                            <th width="12%">Mã phiếu</th>
                            <th width="15%">Loại phòng</th>
                            <th width="8%">Phòng</th>
                            <th width="16%">Khách hàng</th>
                            <th width="13%">Ngày nhận</th>
                            <th width="8%">Ngày trả</th>
                            <th width="8%">Tình trạng</th>
                            <th width="13%">Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        try {
                            $sql = "SELECT o.*, pd.ma_phieu_dat, lp.ten_loai, p.ten_phong, kh.ho_ten as ten_khach_hang
                                    FROM o
                                    LEFT JOIN phieu_dat pd ON o.ma_phieu_dat = pd.ma_phieu_dat
                                    LEFT JOIN loai_phong lp ON o.ma_loai = lp.ma_loai
                                    LEFT JOIN phong p ON o.ma_phong = p.ma_phong
                                    LEFT JOIN khach_hang kh ON o.ma_kh = kh.ma_kh";

                            $stmt = mysqli_prepare($conn, $sql);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row["ma_o"]) . "</td>";
                                $usern = $row["ma_o"];
                                echo "<td>" . htmlspecialchars($row["ma_phieu_dat"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["ten_loai"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["ten_phong"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["ten_khach_hang"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["ngay_den"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["ngay_di"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["tinh_trang"]) . "</td>";
                                
                                echo "<td class='btt'>";
                                echo "<a href='chitietphanphong.php?ma_o=" . urlencode($usern) . "'><button class='eye'><ion-icon name='eye'></ion-icon></button></a>";

                                if($row["tinh_trang"] != 'Đã trả phòng'){
                                    echo "<a href='suapp.php?user=" . urlencode($usern) . "'><button class='pencil'><ion-icon name='pencil'></ion-icon></button></a>";
                                }
                                echo "</td>";

                                echo "</tr>";
                            }
                            mysqli_stmt_close($stmt);
                        } catch (Exception $e) {
                            echo "Có lỗi xảy ra: " . htmlspecialchars($e->getMessage());
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include ("footer.php"); ?>

<script>
    $(document).ready(function () {
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
<?php
if(isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<script>alert('Thêm phân phòng thành công!');</script>";
}
?>
