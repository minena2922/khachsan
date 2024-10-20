<?php
include("ketnoi.php");

$offset = $_GET['offset'];
$limit = $_GET['limit'];

$sql = "SELECT ten_loai, dien_tich, chi_tiet_phong, anh_loai_phong FROM loai_phong LIMIT $offset, $limit";
$result = $conn->query($sql);

$output = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= '
        <div class="room1">
            <div class="image-fr">
                <img src="' . $row["anh_loai_phong"] . '" class="image-room" />
            </div>
            <div class="info-room1">
                <h4>' . $row["ten_loai"] . '</h4>
                <div class="tt-chung">
                    <label class="dt-room">
                        <a><i class="fa-solid fa-location-dot"></i></a>
                        <span>' . $row["dien_tich"] . '</span>
                    </label>
                    <label class="dt-room">
                        <a><i class="fa-solid fa-user-group"></i></a>
                        <span>' . $row["chi_tiet_phong"] . '</span>
                    </label>
                </div>
                <a style="color:#b20600;" class="btXemphong" href="xemphong.php?loai_phong=' . urlencode($row["ten_loai"]) . '">XEM PHÒNG</a>
            </div>
        </div>';
    }

    // Tính tổng số phòng
    $sql_count = "SELECT COUNT(*) AS total FROM loai_phong";
    $count_result = $conn->query($sql_count);
    $row_count = $count_result->fetch_assoc();
    $total_rooms = $row_count['total'];

    // Nếu còn nhiều phòng để hiển thị, thêm nút "Xem thêm"
    if ($offset + $limit < $total_rooms) {
        $output .= '<button class="load-more" data-offset="' . ($offset + $limit) . '">HIỂN THỊ THÊM</button>';
    } else {
        // Nếu tất cả các phòng đã được tải, hiển thị nút "Ẩn bớt"
        $output .= '<button class="load-more hide-more">ẨN BỚT</button>';
    }
} else {
    $output = "Không có kết quả";
}

echo $output;
$conn->close();
?>
