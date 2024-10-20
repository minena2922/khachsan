<?php 
include_once("header.php");
include_once("ketnoi.php");

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

    h6 {
        font-size: 1.5rem;
        font-family: Tahoma;
        color: #40679E;
        font-weight: 600;
        margin: 2px;
    }

    .pencil {
        color: #FFC100;
        height: 25px;
        border: 1.5px solid #FFC100;
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

    .trash {
        color: #65B741;
        height: 25px;
        border: 1.5px solid #65B741;
        background-color: white;
        border-radius: 3px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .table th,
    .table td {
        text-align: center;
        vertical-align: middle;
        font-size: 14px;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6>NHẬT KÝ HOẠT ĐỘNG</h6>
                
            </div>

            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th width="15%">Mã hoạt động</th>
                            <th width="15%">Mã nhân viên</th>
                            <th width="50%">Hành động</th>
                            <th width="20%">Ngày giờ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Check if the connection is successful
                        if ($conn->connect_error) {
                            die('Connection failed: ' . htmlspecialchars($conn->connect_error));
                        }

                        // Sử dụng JOIN để lấy thông tin nhân viên cùng với nhật ký
                        $sql = "SELECT log.ma_log, nhan_vien.ma_nv, log.hanh_dong, log.ngay 
                                FROM log 
                                LEFT JOIN nhan_vien ON log.ma_nv = nhan_vien.ma_nv";

                        $stmt = $conn->prepare($sql);
                        if ($stmt === false) {
                            die('Prepare failed: ' . htmlspecialchars($conn->error));
                        }
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Hiển thị từng bản ghi
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["ma_log"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["ma_nv"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["hanh_dong"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["ngay"]) . "</td>";
                            echo "</tr>";
                        }

                        $stmt->close();
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>

<script>
    $(document).ready(function () {
        var table = $('#dataTable').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "Không có dữ liệu",
                "info": "Đang hiển thị _START_ đến _END_ của _TOTAL_ mục",
                "infoEmpty": "Đang hiển thị 0 đến 0 của 0 mục",
                "infoFiltered": "(đã lọc từ tổng số _MAX_ mục)",
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

        // Custom search input
        $('#customSearch').on('keyup', function () {
            // Áp dụng tìm kiếm cho cả 2 cột: Mã hoạt động (0) và Mã nhân viên (1)
            table.columns([0, 1]).search(this.value).draw();
        });
    });
</script>
