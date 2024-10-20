<?php 
include ("header.php");
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

    .table th,
    .table td {
        text-align: center;
        /* Căn giữa dữ liệu */
        vertical-align: middle;
        /* Căn giữa theo chiều dọc */

    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6>QUẢN LÝ HÌNH ẢNH</h6>
            </div>
            <a class="btthem" href="themQLHA.php"> <button>
                    <ion-icon name="add-circle"></ion-icon>
                    Thêm</button></a>

            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Mã hình ảnh</th>
                            <th>Hình ảnh</th>
                            <th>Loại phòng</th>
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include ("ketnoi.php");
                        $sql = "select * from hinh_anh";
                        $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin " . mysqli_error($conn));

                        while ($row = mysqli_fetch_array($kq)) {
                            $loai_phongs = $row["ma_loai"];
                            $sql2 = "SELECT * FROM loai_phong WHERE ma_loai='" . $loai_phongs . "'";
                            $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin" . mysqli_error($conn));
                            $loai_phong = mysqli_fetch_array($kq2);
                            echo "<tr>";

                            echo "<td>" . $row["ma_ha"] . "</td>";
                            $usern = $row["ma_ha"];
                            echo "<td><img src='" . $row["hinh_anh"] . "' height='80' width='100'></td>";
                            echo "<td>" . $loai_phong["ten_loai"] . "</td>";
                            echo "<td class='btt'>
                    <a href='suaQLHA.php?user=$usern'><button class='pencil'><ion-icon name='pencil'></ion-icon></button></a>
                    <a href='xoaQLHA.php?user=$usern'><button class='trash'><ion-icon name='trash'></ion-icon></button></a>
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