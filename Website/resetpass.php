<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <title>Quên Mật Khẩu</title>

  <?php include_once('../sources/linkFIle.php'); ?>

  <style>
    .error > p {
      font-size: 20px;
      text-align: center;
      font-weight: 600;
    }

    #font-register {
      border: 1px solid #ced4da;
      border-radius: 20px;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
      padding: 20px;
      background-color: #ffffff;
    }

    #main_login {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-group {
      margin-bottom: 15px;
    }
  </style>
</head>

<body>
<?php include($linkFE . 'top_header.php'); ?>
  <?php include($linkFE . 'header.php'); ?>

  <div id="main_login" class="container py-4">
    <div class="row">
      <div class="col-lg-12" id="font-register">
        <form action="<?= $linkBE . 'resetpass_process.php' ?>" method="post">
          <h2 class="text-center">QUÊN MẬT KHẨU</h2>
          <div class="error">
            <p id="notifi" class="text-primary"><?= isset($_GET["notifi"]) ? $_GET["notifi"] : '' ?></p>
            <p id="error" class="text-danger"><?= isset($_GET["error"]) ? $_GET["error"] : '' ?></p>
          </div>

          <div class="form-group">
            <label for="account"><strong>Tài khoản: <span class="text-danger">*</span></strong></label>
            <input placeholder="Tài khoản của bạn" id="account" type="text" class="form-control" name="account" required>
          </div>

          <div class="form-group">
            <label for="email"><strong>Email: <span class="text-danger">*</span></strong></label>
            <input id="email" placeholder="Email của bạn" type="email" class="form-control" name="email" required>
          </div>

          <div class="form-group">
            <label for="passwordReset"><strong>Mật khẩu mới: <span class="text-danger">*</span></strong></label>
            <input type="password" placeholder="Mật khẩu mới" id="passwordReset" class="form-control" name="passwordReset" required>
          </div>

          <div class="text-center p-3">
            <button type="submit" id="loginSubmit" name="submit" class="btn btn-primary">Thay đổi</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include($linkFE . 'footer.php'); ?>
</body>

</html>