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
        height: 84px;
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
        /* Căn giữa dữ liệu */
        vertical-align: middle;
       font-size: 13px;
    }

    
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6>QUẢN LÝ TIN TỨC</h6>
            </div>
            <a class="btthem" href="themQLTT.php"><button>
            <ion-icon name="add-circle"></ion-icon>
                Thêm</button></a>
           
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th width="10%">Mã tin</th>
                            <th width="15%">Người đăng</th>
                            <th width="14%">Tiêu đề</th>
                            <th width="18%">Nội dung</th>
                            <th width="7%">Ảnh</th>
                            <th width="13%">Ngày đăng</th>
                            <th width="12%">Trạng thái</th>
                            <th width="13%">Tuỳ chọn</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        include ("ketnoi.php");
                        $sql = "select * from tin_tuc";
                        $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin " . mysqli_error());

                        while ($row = mysqli_fetch_array($kq)) {
                            $nhan_viens = $row["ma_nv"];
                            $sql2 = "SELECT * FROM nhan_vien WHERE ma_nv='" . $nhan_viens . "'";
                            $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin" . mysqli_error());
                            $nhan_vien = mysqli_fetch_array($kq2);
                            echo "<tr>";

                            echo "<td>" . $row["ma_tin_tuc"] . "</td>";
                            $usern = $row["ma_tin_tuc"]; 
                            echo "<td>" . $nhan_vien["ho_ten"] . "</td>";
                            echo "<td>" . $row["ten_tin_tuc"] . "</td>";
                            echo "<td style='text-align:justify'>" . substr($row["noi_dung"], 0, 60) . "...</td>";
                            echo "<td><img src= '" . $row["hinh_anh"] . "' height='50' width='50'></td>";
                            echo "<td>" . date('d/m/Y', strtotime($row["ngay_dang"])) . "</td>";
                            echo "<td>" . $row["trang_thai"] . "</td>";
                            echo "<td class='btt'>
                        <a href='suaQLTT.php?user=$usern'><button class='pencil'><ion-icon name='pencil'></ion-icon></button></a>
                        <a href='xoaQLTT.php?user=$usern'><button class='trash'><ion-icon name='trash'></ion-icon></button></a>
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