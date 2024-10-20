<?php
include ("headertc.php");
?>
<link rel="stylesheet" href="css/tintuc.css" />

<?php

function limit_words($text, $limit) {
    $words = explode(' ', $text); 
    if (count($words) > $limit) { 
        $words = array_slice($words, 0, $limit); 
        $text = implode(' ', $words) . '...'; 
    }
    return $text; 
}
?>

<div class="khung-chua">
    <div class="image-bia">
        <img class="img-bia" src="anhtin/a1.jpg" />
    </div>
    <h4>TIN TỨC</h4>
    <div class="grid-container">
    <?php
  
    include 'ketnoi.php';

  
    $sql = "SELECT ma_tin_tuc, ten_tin_tuc, noi_dung, hinh_anh, ngay_dang FROM tin_tuc WHERE trang_thai = 'Công khai'";
    $result = $conn->query($sql);

    // Kiểm tra và hiển thị kết quả
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          
            $noi_dung_gioi_han = limit_words(strip_tags($row["noi_dung"]), 50); 
            echo '
            <div class="grid-item">
                <div class="fr-hinh">
                    <img class="hinh-tin" src="' . $row["hinh_anh"] . '" />
                </div>
                <div class="fr-thongtin">
                    <label class="tieude"><a href="thongtintintuc.php?ma_tin_tuc=' . $row["ma_tin_tuc"] . '">' . $row["ten_tin_tuc"] . '</a></label>
                    <label class="noidung">
                        <p>' . $noi_dung_gioi_han . '</p>
                    </label>
                </div>
                <label class="update">' . date("d/m/Y", strtotime($row["ngay_dang"])) . '</label>
            </div>';
        }
    } else {
        echo "Không có tin tức nào.";
    }


    $conn->close();
    ?>
    </div>

    <div class="phone-button">
        <a href="tel:+0903345615">
            <i class="fa-solid fa-phone"></i>0903 345 615
        </a>
    </div>
</div>

<?php
include ("footertc.php");
?>
