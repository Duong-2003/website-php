<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <title>Register</title>
  
  <?php include_once('../sources/linkFIle.php'); ?>
  
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(to right, #f8f9fa, #e9ecef);
    
    }
    
    #font-register {
      border: 1px solid #ced4da;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      padding: 30px;
      background-color: #ffffff;
    }

    .form-control {
      border-radius: 10px;
    }

    .btn {
      border-radius: 10px;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #0056b3;
      color: white;
    }

    .error>p {
      font-size: 18px;
      text-align: center;
      font-weight: 600;
    }
  </style>
</head>

<body>

  <?php include($linkFE . 'top_header.php'); ?>
  <?php include($linkFE . 'header.php'); ?>

  <div class="container">
    <div class="row justify-content-center ">
      <div class="col-lg-6 col-md-8 col-sm-10 py-3" id="font-register">
        <h2 class="text-center text-danger">ĐĂNG KÝ TÀI KHOẢN</h2>
        <div class="error">
          <p id="notifi_register" class="text-primary"><?= isset($_GET["notifi"]) ? $_GET["notifi"] : '' ?></p>
          <p id="error_register" class="text-danger"><?= isset($_GET["error"]) ? $_GET["error"] : '' ?></p>
        </div>

        <form action="<?= $linkBE . 'register_process.php' ?>" method="post">
          <div class="form-group mb-3">
            <label for="email"><strong>Email: </strong></label>
            <input id="email" placeholder="Email để lấy lại mật khẩu" type="email" class="form-control" name="email" required>
          </div>

          <div class="form-group mb-3">
            <label for="account"><strong>Tài khoản: <span class="text-danger">*</span></strong></label>
            <input id="account" placeholder="Tài khoản bạn muốn đăng ký" type="text" class="form-control" name="username" required>
          </div>

          <div class="form-group mb-3">
            <label for="password"><strong>Nhập mật khẩu: <span class="text-danger">*</span></strong></label>
            <input id="password" placeholder="Nhập mật khẩu" type="password" name="password" autocomplete="new-password" class="form-control" required>
          </div>

          <div class="form-group mb-3">
            <label for="rePass"><strong>Nhập lại mật khẩu: <span class="text-danger">*</span></strong></label>
            <input name="rePass" placeholder="Nhập lại mật khẩu" id="rePass" type="password" class="form-control" required>
          </div>

          <div class="form-group mb-3">
            <label for="address"><strong>Địa chỉ: <span class="text-danger">*</span></strong></label>
            <input id="address" placeholder="Địa chỉ bạn muốn đăng ký" type="text" class="form-control" name="address" required>
          </div>

          <div class="text-center p-3">
            <button type="submit" name="submit" id="reg_submit" class="btn btn-primary">Đăng ký</button>
            <a class="btn btn-secondary" href="./login.php">Đăng nhập</a>
            <a class="btn btn-danger" href="./resetpass.php">Quên mật khẩu</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include($linkFE . 'footer.php'); ?>
</body>

</html>