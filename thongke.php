<?php
// Kết nối đến CSDL
include 'ketnoi.php'; // Đảm bảo rằng file kết nối đã được định nghĩa đúng

// Truy vấn SQL để lấy top 10 phòng phổ biến nhất trong tháng
$sql = "SELECT p.ten_phong AS ten_phong, COUNT(*) AS so_lan_phan_phong
        FROM o o
        INNER JOIN phong p ON o.ma_phong = p.ma_phong
        WHERE MONTH(STR_TO_DATE(o.ngay_den, '%d/%m/%Y')) = MONTH(CURDATE())
        GROUP BY o.ma_phong
        ORDER BY so_lan_phan_phong DESC
        LIMIT 10";

$result = mysqli_query($conn, $sql);

// Chuẩn bị dữ liệu cho biểu đồ
$data = array();
$data[] = ['Phòng', 'Số lần phân phòng']; // Cột 'Phòng' là string, 'Số lần phân phòng' là số nguyên.

while ($row = mysqli_fetch_assoc($result)) {
    $phong = $row['ten_phong'];
    $so_lan = intval($row['so_lan_phan_phong']); // Ép kiểu về số nguyên
    $data[] = [$phong, $so_lan];
}

$json_data = json_encode($data); // Chuyển đổi dữ liệu thành JSON

// Đóng kết nối CSDL
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Biểu đồ Top 10 phòng được phân phòng nhiều nhất trong tháng</title>
    <!-- Đường dẫn thư viện Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load thư viện Google Charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Hàm vẽ biểu đồ
        function drawChart() {
            // Dữ liệu từ PHP
            var jsonData = <?php echo $json_data; ?>;
            var data = google.visualization.arrayToDataTable(jsonData);

            // Cấu hình biểu đồ
            var options = {
                title: 'Top 10 phòng được phân phòng nhiều nhất trong tháng',
                chartArea: {width: '60%', height: '70%'},
                hAxis: {
                    title: 'Số lần phân phòng',
                    minValue: 0
                },
                vAxis: {
                    title: 'Phòng'
                },
                legend: { position: 'none' }, // Ẩn chú thích
                bars: 'horizontal' // Vẽ biểu đồ cột ngang
            };

            // Vẽ biểu đồ cột
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>

    <div id="chart_div" style="width: 900px; height: 400px; margin: 0 auto;"></div>
</body>
</html>