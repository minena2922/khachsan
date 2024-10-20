<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/rose1.png" rel="icon">
  <title>Le Grand Ha Noi Hotel - Quên mật khẩu</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-login">
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Quên mật khẩu</h1>
                  </div>
                  <?php
                  if (isset($_GET['error'])) {
                    if ($_GET['error'] == 1) {
                      echo '<div class="alert alert-danger" role="alert">Mật khẩu mới và xác nhận mật khẩu không khớp.</div>';
                    } elseif ($_GET['error'] == 2) {
                      echo '<div class="alert alert-danger" role="alert">Có lỗi xảy ra khi cập nhật mật khẩu. Vui lòng thử lại.</div>';
                    } elseif ($_GET['error'] == 3) {
                      echo '<div class="alert alert-danger" role="alert">Email không tồn tại trong hệ thống.</div>';
                    }
                  }
                  if (isset($_GET['success']) && $_GET['success'] == 1) {
                    echo '<div class="alert alert-success" role="alert">Mật khẩu đã được thay đổi thành công. Vui lòng đăng nhập bằng mật khẩu mới.</div>';
                    echo '<script>
                            setTimeout(function() {
                              window.location.href = "dangnhap.php";
                            }, 3000);
                          </script>';
                  }
                  ?>
                  <form class="user" action="xulyquenmatkhau.php" method="post">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Nhập địa chỉ email của bạn" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="new_password" class="form-control" placeholder="Nhập mật khẩu mới" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu mới" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Xác nhận</button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" style="color: #D04848;" href="dangnhap.php">Quay lại đăng nhập</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>
</html>
