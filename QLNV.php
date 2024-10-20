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

    h6 {
        font-size: 1.5rem;
        font-family: Tahoma;
        color: #40679E;
        font-weight: 600;
        margin: 2px;
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

    .table th,
    .table td {
        text-align: center;
        vertical-align: middle;
       font-size: 13.5px;

    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6>QUẢN LÝ NHÂN VIÊN</h6>
            </div>
            <a class="btthem" href="themQLNV.php"><button>
                    <ion-icon name="add-circle"></ion-icon>Thêm</button></a>

            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th width="14%">Mã nhân viên</th>
                            <th width="20%">Tên nhân viên</th>
                            <th width="11%">Điện thoại</th>
                            <th width="20%">Địa chỉ</th>
                            <th width="10%">Tài khoản</th>
                            <th width="13%">Trạng thái</th>
                            <th width="11%">Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include ("ketnoi.php");
                        $sql = "select * from nhan_vien";
                        $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin nhân viên " . mysqli_error());
                        while ($row = mysqli_fetch_array($kq)) {
                            echo "<tr>";
                            echo "<td>" . $row["ma_nv"] . "</td>";
                            $usern = $row["ma_nv"]; // Gán dữ liệu cột username vào biến $usern
                            echo "<td>" . $row["ho_ten"] . "</td>";
                            // echo "<td>" . $row["gioi_tinh"] . "</td>";
                            // echo "<td>" . $row["cccd"] . "</td>";
                            // echo "<td>" . $row["ngay_sinh"] . "</td>";
                            echo "<td>" . $row["sdtnv"] . "</td>";
                            echo "<td>" . $row["dia_chi"] . "</td>";
                            echo "<td>" . $row["user"] . "</td>";
                            // echo "<td>" . $row["pass"] . "</td>";
                            echo "<td>" . $row["tinh_trang"] . "</td>";
                            echo "<td class='btt'>
                    <a style='display: flex; align-items: center;' href='suaQLNV.php?user=$usern'><button style='display: flex;padding: 5px;' class='pencil'><ion-icon name='pencil'></ion-icon></button></a>
                    <button style='display: flex;padding: 5px;' class='eye' data-user='$usern'><ion-icon name='eye'></ion-icon></button>
                    <a href='xoaQLNV.php?user=$usern'><button class='trash'><ion-icon name='trash'></ion-icon></button></a>           
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
<!-- Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="labelinfo">
                <h5>Thông tin chi tiết nhân viên</h5>
            </div>
            <div class="modal-body">
                <!-- Nội dung thông tin khách hàng sẽ được tải vào đây -->
                <div id="customer-info"></div>
            </div>
            <div class="modal-footer">
                <button style="color: white; background-color:#D04848; border: #fafafa;" type="button"
                    class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<style>
    .labelinfo {
        padding: 15px 10px;
        height: 60px;
        border-bottom: 1px solid lightgray;
        display: flex;
        justify-content: center;
    }
</style>
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
<script>
    $(document).ready(function () {
        $('.eye').on('click', function (e) {
            e.preventDefault();
            var user = $(this).data('user');

            // Gửi yêu cầu AJAX để lấy thông tin nhân viên
            $.ajax({
                url: 'infonv.php', // Tạo tệp để xử lý yêu cầu này
                type: 'GET',
                data: { user: user },
                success: function (response) {
                    // Hiển thị thông tin nhân viên trong modal
                    $('#customer-info').html(response);
                    // Hiển thị modal
                    $('#customerModal').modal('show');
                },
                error: function () {
                    alert('Không thể tải thông tin nhân viên.');
                }
            });
        });
    });
</script>