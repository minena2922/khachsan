<?php
include("ketnoi.php");

if(isset($_POST['ma_phieu_dat'])) {
    $ma_phieu_dat = $_POST['ma_phieu_dat'];

    
    $sql = "SELECT pd.*, kh.ho_ten as ho_ten_khach_hang, lp.ten_loai as loai_phong, lp.gia_phong as gia_phong
            FROM phieu_dat pd
            JOIN khach_hang kh ON pd.ma_kh = kh.ma_kh
            JOIN loai_phong lp ON pd.ma_loai = lp.ma_loai
            WHERE pd.ma_phieu_dat = ?";

    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error); 
    }

    $stmt->bind_param("s", $ma_phieu_dat);

    if (!$stmt->execute()) {
        die("Error executing query: " . $stmt->error);
    }

    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        
        echo json_encode([
            'ho_ten_khach_hang' => $data['ho_ten_khach_hang'],
            'loai_phong' => $data['loai_phong'],
            'ngay_den' => $data['ngay_den'], 
            'ngay_di' => $data['ngay_di'],   
            'tong_so_tien' => $data['gia_phong'], 
            'tien_coc' => $data['tien_coc'] 
        ]);
    } else {
        echo json_encode(["error" => "Không tìm thấy thông tin phiếu đặt với mã: " . $ma_phieu_dat]); 
    }

    $stmt->close(); 

} else {
    echo json_encode(["error" => "Không nhận được mã phiếu đặt"]);
}

$conn->close(); // Close the database connection
?>
