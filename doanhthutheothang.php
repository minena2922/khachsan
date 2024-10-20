<?php
include 'ketnoi.php'; 
include 'header.php'; 

$data_day = [];
$data_month = [];
$data_year = [];

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Filter by day
    if (isset($_GET['day']) && isset($_GET['month']) && isset($_GET['year'])) {
        $day = $_GET['day'];
        $month = $_GET['month'];
        $year = $_GET['year'];

        $sql_day = "SELECT DATE_FORMAT(ngay_lap_hoa_don, '%d-%m-%Y') AS day, SUM(thanh_tien) AS revenue 
                    FROM hoa_don 
                    WHERE DAY(ngay_lap_hoa_don) = ? AND MONTH(ngay_lap_hoa_don) = ? AND YEAR(ngay_lap_hoa_don) = ?
                    GROUP BY DAY(ngay_lap_hoa_don)";

        $stmt_day = $conn->prepare($sql_day);
        $stmt_day->bind_param("iii", $day, $month, $year);
        $stmt_day->execute();
        $result_day = $stmt_day->get_result();

        while ($row = $result_day->fetch_assoc()) {
            $data_day[] = $row;
        }
    }

    // Filter by month
    if (isset($_GET['month']) && isset($_GET['year'])) {
        $month = $_GET['month'];
        $year = $_GET['year'];

        $sql_month = "SELECT DATE_FORMAT(ngay_lap_hoa_don, '%m-%Y') AS month, SUM(thanh_tien) AS revenue 
                      FROM hoa_don 
                      WHERE MONTH(ngay_lap_hoa_don) = ? AND YEAR(ngay_lap_hoa_don) = ?
                      GROUP BY MONTH(ngay_lap_hoa_don), YEAR(ngay_lap_hoa_don)";

        $stmt_month = $conn->prepare($sql_month);
        $stmt_month->bind_param("ii", $month, $year);
        $stmt_month->execute();
        $result_month = $stmt_month->get_result();

        while ($row = $result_month->fetch_assoc()) {
            $data_month[] = $row;
        }
    }

    // Filter by year
    if (isset($_GET['year'])) {
        $year = $_GET['year'];

        $sql_year = "SELECT DATE_FORMAT(ngay_lap_hoa_don, '%Y') AS year, SUM(thanh_tien) AS revenue 
                     FROM hoa_don 
                     WHERE YEAR(ngay_lap_hoa_don) = ?
                     GROUP BY YEAR(ngay_lap_hoa_don)";

        $stmt_year = $conn->prepare($sql_year);
        $stmt_year->bind_param("i", $year);
        $stmt_year->execute();
        $result_year = $stmt_year->get_result();

        while ($row = $result_year->fetch_assoc()) {
            $data_year[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thống kê đặt phòng và doanh thu</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            drawChartYear();
            drawChartMonth();
            drawChartDay();
        }

        function drawChartDay() {
            var dataDay = new google.visualization.DataTable();
            dataDay.addColumn('string', 'Ngày');
            dataDay.addColumn('number', 'Doanh thu (VNĐ)');
            var revenueDataDay = <?php echo json_encode($data_day); ?>;
            for (var i = 0; i < revenueDataDay.length; i++) {
                dataDay.addRow([revenueDataDay[i].day, parseInt(revenueDataDay[i].revenue)]);
            }
            var optionsDay = {
                title: 'Doanh thu theo ngày',
                hAxis: {title: 'Ngày'},
                vAxis: {title: 'Doanh thu (VNĐ)'},
                legend: { position: 'bottom' },
                annotations: {
                    textStyle: {
                        fontSize: 12,
                        bold: true,
                        italic: false,
                        color: '#871b47',
                        auraColor: 'none'
                    }
                },
                colors: ['#871b47']
            };
            var chartDay = new google.visualization.ColumnChart(document.getElementById('chart_div_day'));
            chartDay.draw(dataDay, optionsDay);
        }

        function drawChartMonth() {
            var dataMonth = new google.visualization.DataTable();
            dataMonth.addColumn('string', 'Tháng');
            dataMonth.addColumn('number', 'Doanh thu (VNĐ)');
            var revenueDataMonth = <?php echo json_encode($data_month); ?>;
            for (var i = 0; i < revenueDataMonth.length; i++) {
                dataMonth.addRow([revenueDataMonth[i].month, parseInt(revenueDataMonth[i].revenue)]);
            }
            var optionsMonth = {
                title: 'Doanh thu theo tháng',
                hAxis: {title: 'Tháng'},
                vAxis: {title: 'Doanh thu (VNĐ)'},
                legend: { position: 'bottom' },
                annotations: {
                    textStyle: {
                        fontSize: 12,
                        bold: true,
                        italic: false,
                        color: '#871b47',
                        auraColor: 'none'
                    }
                },
                colors: ['#4682B4']
            };
            var chartMonth = new google.visualization.ColumnChart(document.getElementById('chart_div_month'));
            chartMonth.draw(dataMonth, optionsMonth);
        }

        function drawChartYear() {
            var dataYear = new google.visualization.DataTable();
            dataYear.addColumn('string', 'Năm');
            dataYear.addColumn('number', 'Doanh thu (VNĐ)');
            var revenueDataYear = <?php echo json_encode($data_year); ?>;
            for (var i = 0; i < revenueDataYear.length; i++) {
                dataYear.addRow([revenueDataYear[i].year, parseInt(revenueDataYear[i].revenue)]);
            }
            var optionsYear = {
                title: 'Doanh thu theo năm',
                hAxis: {title: 'Năm'},
                vAxis: {title: 'Doanh thu (VNĐ)'},
                legend: { position: 'bottom' },
                annotations: {
                    textStyle: {
                        fontSize: 12,
                        bold: true,
                        italic: false,
                        color: '#871b47',
                        auraColor: 'none'
                    }
                },
                colors: ['#65B741']
            };
            var chartYear = new google.visualization.ColumnChart(document.getElementById('chart_div_year'));
            chartYear.draw(dataYear, optionsYear);
        }
    </script>
</head>
<body>
    <div id="filters_year" style="margin-bottom: 20px;">
        <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>#chart_div_year">
            <label for="year_filter">Năm:</label>
            <select name="year" id="year_filter">
                <?php
                // Populate years dropdown
                $sql_years = "SELECT DISTINCT YEAR(ngay_lap_hoa_don) AS year_num FROM hoa_don";
                $stmt_years = $conn->prepare($sql_years);
                $stmt_years->execute();
                $result_years = $stmt_years->get_result();

                while ($row_year = $result_years->fetch_assoc()) {
                    $selected = ($_GET['year'] == $row_year['year_num']) ? 'selected' : '';
                    echo "<option value='{$row_year['year_num']}' $selected>Năm {$row_year['year_num']}</option>";
                }
                ?>
            </select>
            <button type="submit">Lọc</button>
        </form>
    </div>
    <div id="chart_div_year" style="width: 100%; height: 500px; margin-bottom: 30px;"></div>

    <div id="filters_month" style="margin-bottom: 20px;">
        <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>#chart_div_month">
            <label for="month_filter">Tháng:</label>
            <select name="month" id="month_filter">
                <?php
                // Populate months dropdown
                $sql_months = "SELECT DISTINCT MONTH(ngay_lap_hoa_don) AS month_num FROM hoa_don WHERE YEAR(ngay_lap_hoa_don) = ?";
                $stmt_months = $conn->prepare($sql_months);
                $stmt_months->bind_param("i", $year);
                $stmt_months->execute();
                $result_months = $stmt_months->get_result();

                while ($row_month = $result_months->fetch_assoc()) {
                    $selected = ($_GET['month'] == $row_month['month_num']) ? 'selected' : '';
                    echo "<option value='{$row_month['month_num']}' $selected>Tháng {$row_month['month_num']}</option>";
                }
                ?>
            </select>
            <label for="year_filter_month">Năm:</label>
            <select name="year" id="year_filter_month">
                <?php
                // Populate years dropdown
                $sql_years = "SELECT DISTINCT YEAR(ngay_lap_hoa_don) AS year_num FROM hoa_don";
                $stmt_years = $conn->prepare($sql_years);
                $stmt_years->execute();
                $result_years = $stmt_years->get_result();

                while ($row_year = $result_years->fetch_assoc()) {
                    $selected = ($_GET['year'] == $row_year['year_num']) ? 'selected' : '';
                    echo "<option value='{$row_year['year_num']}' $selected>Năm {$row_year['year_num']}</option>";
                }
                ?>
            </select>
            <button type="submit">Lọc</button>
        </form>
    </div>
    <div id="chart_div_month" style="width: 100%; height: 500px; margin-bottom: 30px;"></div>

    <div id="filters_day" style="margin-bottom: 20px;">
        <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>#chart_div_day">
            <label for="day_filter">Ngày:</label>
            <select name="day" id="day_filter">
                <?php
                // Populate days dropdown
                $sql_days = "SELECT DISTINCT DAY(ngay_lap_hoa_don) AS day_num FROM hoa_don WHERE MONTH(ngay_lap_hoa_don) = ? AND YEAR(ngay_lap_hoa_don) = ?";
                $stmt_days = $conn->prepare($sql_days);
                $stmt_days->bind_param("ii", $month, $year);
                $stmt_days->execute();
                $result_days = $stmt_days->get_result();

                while ($row_day = $result_days->fetch_assoc()) {
                    $selected = ($_GET['day'] == $row_day['day_num']) ? 'selected' : '';
                    echo "<option value='{$row_day['day_num']}' $selected>Ngày {$row_day['day_num']}</option>";
                }
                ?>
            </select>
            <label for="month_filter_day">Tháng:</label>
            <select name="month" id="month_filter_day">
                <?php
                // Populate months dropdown
                $sql_months = "SELECT DISTINCT MONTH(ngay_lap_hoa_don) AS month_num FROM hoa_don WHERE YEAR(ngay_lap_hoa_don) = ?";
                $stmt_months = $conn->prepare($sql_months);
                $stmt_months->bind_param("i", $year);
                $stmt_months->execute();
                $result_months = $stmt_months->get_result();

                while ($row_month = $result_months->fetch_assoc()) {
                    $selected = ($_GET['month'] == $row_month['month_num']) ? 'selected' : '';
                    echo "<option value='{$row_month['month_num']}' $selected>Tháng {$row_month['month_num']}</option>";
                }
                ?>
            </select>
            <label for="year_filter_day">Năm:</label>
            <select name="year" id="year_filter_day">
                <?php
                // Populate years dropdown
                $sql_years = "SELECT DISTINCT YEAR(ngay_lap_hoa_don) AS year_num FROM hoa_don";
                $stmt_years = $conn->prepare($sql_years);
                $stmt_years->execute();
                $result_years = $stmt_years->get_result();

                while ($row_year = $result_years->fetch_assoc()) {
                    $selected = ($_GET['year'] == $row_year['year_num']) ? 'selected' : '';
                    echo "<option value='{$row_year['year_num']}' $selected>Năm {$row_year['year_num']}</option>";
                }
                ?>
            </select>
            <button type="submit">Lọc</button>
        </form>
    </div>
    <div id="chart_div_day" style="width: 100%; height: 500px;"></div>
</body>
</html>
<?php
include "footer.php";
?>