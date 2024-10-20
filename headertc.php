<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
?>
<link rel="stylesheet" href="css/datphong.css" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link href="img/logo/rose1.png" rel="icon">
    <title>Le Grand Ha Noi Hotel </title>
    <link href="css\trangchu.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://kit.fontawesome.com/71a8190e62.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="formtong">
        <div class="top">
            <div class="khung_menu">
                <div class="logo_name">
                    <div class="logo_rose">
                        <img src="img/logo/rose1.png">
                    </div>
                    <div class="name_hotel"><a href="trangchu.php">Le Grand Ha Noi Hotel</a></div>
                </div>

                <div class="option">
                    <label class="optionn">
                        <a href="trangchu.php">TRANG CHỦ</a>
                        <a href="gioithieu.php">GIỚI THIỆU</a>
                        <a href="tintuc.php">TIN TỨC</a>
                        <a href="lienhe.php">LIÊN HỆ</a>
                        <?php
                        // Check if the customer is logged in
                        if (isset($_SESSION['ho_ten'])) {
                            echo '<div class="dropdown">';
                            echo '<div  class="logout-link"><a style="color: #b20600;" href="dangxuat.php">ĐĂNG XUẤT</a></div>';
                            echo '</div>';
                            echo '<a class="ttkhach" style="color: black;" href="thongtinkhach.php">' . $_SESSION['ho_ten'] . '</a>';

                        } else {
                            echo '<a href="dangnhap.php">ĐĂNG NHẬP</a>';
                        }
                        ?>
                    </label>
                </div>
            </div>