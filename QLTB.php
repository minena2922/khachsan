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
    }

    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .popup-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }

    .popup-buttons {
        gap: 40px;
    margin-top: 20px;
    display: flex;
    justify-content: center;
    }

    .popup-buttons button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .popup-buttons .confirm {
        display: flex;
    background-color: #65B741;
    color: #fff;
    width: 70px;
    height: 36px;
    align-items: center;
    justify-content: center;
    }

    .popup-buttons .cancel {
        background-color: #D04848;
        color: #fff;
        display: flex;
        width: 70px;
    height: 36px;
    align-items: center;
    justify-content: center;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6>QUẢN LÝ THIẾT BỊ</h6>
            </div>
            <a class="btthem" href="themQLTB.php">
                <button>
                    <ion-icon name="add-circle"></ion-icon>
                    Thêm</button></a>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Mã thiết bị</th>
                            <th>Tên thiết bị</th>
                            <th>Tổng số lượng</th>
                            <th>Số lượng sử dụng</th>
                            <th>Số lượng tồn</th>
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include ("ketnoi.php");
                        $sql = "select * from thiet_bi";
                        $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin thiết bị " . mysqli_error());
                        while ($row = mysqli_fetch_array($kq)) {
                            echo "<tr>";
                            echo "<td>" . $row["ma_thiet_bi"] . "</td>";
                            $usern = $row["ma_thiet_bi"]; // Gán dữ liệu cột username vào biến $usern
                            echo "<td>" . $row["ten_thiet_bi"] . "</td>";
                            echo "<td>" . $row["so_luong_tong"] . "</td>";
                            echo "<td>" . $row["so_luong_su_dung"] . "</td>";
                            echo "<td>" . $row["so_luong_ton"] . "</td>";
                            echo "<td class='btt'>
                      <a href='suaQLTB.php?user=$usern'><button class='pencil'><ion-icon name='pencil'></ion-icon></button></a>
                    <button class='trash' onclick='showPopup(\"xoaQLTB.php?user=$usern\")'><ion-icon name='trash'></ion-icon></button>
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
<div id="popup" class="popup">
    <div class="popup-content">
        <p>Bạn có chắc chắn muốn xóa thiết bị này không?</p>
        <div class="popup-buttons">
            <button class="confirm" id="confirmDelete">Xóa</button>
            <button class="cancel" onclick="hidePopup()">Hủy</button>
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
    function showPopup(url) {
        document.getElementById('popup').style.display = 'flex';
        document.getElementById('confirmDelete').onclick = function() {
            window.location.href = url;
        };
    }

    function hidePopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>