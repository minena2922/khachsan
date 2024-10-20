<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$quyen = isset($_SESSION['admin_quyen']) ? $_SESSION['admin_quyen'] : 0;
$ho_ten = isset($_SESSION['admin_ho_ten']) ? $_SESSION['admin_ho_ten'] : 'Chưa đăng nhập';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/rose1.png" rel="icon">
    <title>Khách sạn Le Grand Hà Nội - The Oriental</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
     
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="img/logo/rose1.png">
                </div>
                <div class="sidebar-brand-text mx-3">Khách sạn Le Grand Hà Nội - The Oriental</div>
            </a>
            <hr class="sidebar-divider my-0">
            <!-- Chỉ hiển thị thống kê nếu người dùng có quyền = 1 -->
            <?php if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 1) { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm"
                    aria-expanded="true" aria-controls="collapseForm">
                    <i class="fas fa-fw fa-solid fa-server"></i>
                    <span>Thống kê</span>
                </a>
                <div id="collapseForm" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Thống kê</h6>
                        <a class="collapse-item" href="thongkeloaiphong.php">Thống kê loại phòng</a>
                        <a class="collapse-item" href="doanhthutheothang.php">Thống kê doanh thu</a>                      
                    </div>
                </div>
            </li>
            <?php } ?>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                QUẢN LÝ PHÒNG
            </div>
            <li class="nav-item">
                <a class="nav-link" href="QLLP.php">
                    <i class="fas fa-fw fa-solid fa-building"></i>
                    <span>Loại phòng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="QLP.php">
                    <i class="fas fa-fw fa-solid fa-door-closed"></i>
                    <span>Phòng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage"
                    aria-expanded="true" aria-controls="collapsePage">
                    <i class="fas fa-fw fa-solid fa-server"></i>
                    <span>Thiết bị</span>
                </a>
                <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Thiết bị</h6>
                        <a class="collapse-item" href="QLTB.php">Quản lý thiết bị</a>
                        <a class="collapse-item" href="QLCTTB.php">Chi tiết thiết bị</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
                    aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="fas fa-fw fa-solid fa-suitcase-rolling"></i>
                    <span>Vật tư</span>
                </a>
                <div id="collapseBootstrap" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Vật tư</h6>
                        <a class="collapse-item" href="QLVT.php">Quản lý vật tư</a>
                        <a class="collapse-item" href="QLCTVT.php">Chi tiết vật tư</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                QUẢN LÝ ĐẶT PHÒNG
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-regular fa-id-card"></i>
                    <span>Phiếu đặt phòng</span>
                </a>
                <div id="collapseTable" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Phiếu đặt phòng</h6>
                        <a class="collapse-item" href="QLPD.php">Phiếu đặt</a>
                        <a class="collapse-item" href="phanphong.php">Phân phòng</a>
                    </div>
                </div>
            </li>
          
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                QUẢN LÝ CHUNG
            </div>
            <li class="nav-item">
                <a class="nav-link" href="QLKH.php">
                    <i class="fas fa-fw fa-solid fa-address-book"></i>
                    <span>Khách hàng</span>
                </a>
            </li>
            <!-- Chỉ hiển thị mục Quản lý nhân viên nếu người dùng có quyền khác 0 -->
            <?php if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 1) { ?>
            <li class="nav-item">
                <a class="nav-link" href="QLNV.php">
                    <i class="fas fa-fw fa-solid fa-users"></i>
                    <span>Nhân viên</span>
                </a>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="QLTT.php">
                    <i class="fas fa-fw fa-solid fa-newspaper"></i>
                    <span>Tin tức</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="QLHD.php">
                  <i class="fas fa-receipt"></i>
                    <span>Hóa đơn</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="QLHA.php">
                    <i class="fas fa-fw fa-regular fa-images"></i>
                    <span>Hình ảnh</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="QLDG.php">
                    <i class="fas fa-fw fa-solid fa-comment"></i>
                    <span>Đánh giá</span>
                </a>
            </li>
            <?php if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 1) { ?>
            <li class="nav-item">
                <a class="nav-link" href="nhatkyhoatdong.php">
                <i class="fas fa-fw fa-solid fa-signal"></i>
                    <span>Nhật ký hoạt động</span>
                </a>
            </li>
            <?php } ?>
        </ul> 
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" style="color:white" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
             <li class="nav-item dropdown no-arrow">                           
            <li class="nav-item dropdown no-arrow mx-1">           
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                 <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px"> 
                <span style="margin-top:20px; font-size: 15px;" class="ml-2 d-none d-lg-inline text-white small">
                  <?php
                  // Kiểm tra xem session có tồn tại và có chứa tên người dùng không
                  if (isset($_SESSION['ho_ten'])) {
                    echo '<p>' . $_SESSION['ho_ten'] . '</p>';
                  } else {
                    echo '<p>Chưa đăng nhập</p>';
                  }
                  ?>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if (isset($_SESSION['ho_ten'])) { ?>
                  <a class="dropdown-item" href="thongtinquantri.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Thông tin cá nhân
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="dangxuat.php"> 
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Đăng xuất
                  </a>
                <?php } else { ?>
                  <a class="dropdown-item" href="dangnhap.php"> 
                    <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Đăng nhập
                  </a>
                <?php } ?>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">    
  
