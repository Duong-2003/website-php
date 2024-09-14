<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <title>Login</title>
  <?php
  include('../sources/linkFIle.php');
  ?>
</head>

<body>

  <?php
  include($linkFE . 'top_header.php');
  include($linkFE . 'header.php');
  ?>

  <style>
    .error>p {
      font-size: 20px;
      text-align: center;
      font-weight: 600;

    }

    #font-login {
      border: 1px solid;
      color: #ac7d7d;
      border-radius: 20px;
      box-shadow: 0 0 12px 4px;
    }
    .form-group{
      margin:20px 0;
    }
  </style>

  <div class="container py-4">
    <div class="row">
      <div class="col-lg-6 ">
        <img src=<?= $linkImgIndex . "img-login2.jpg"  ?> width="100%" alt="">
      </div>



      <div class="col-lg-6  py-3" id="font-login">
        <h2 style="text-align:center; color: #da7070;">ĐĂNG NHẬP TÀI KHOẢN</h2>

        <div class="error">
          <?php
          $error =  isset($_GET["error"]) ? $_GET["error"] : '';
          $notifi = isset($_GET["notifi"]) ? $_GET["notifi"] : '';
          ?>

          <p name="notifi" id="notifi_log" class="text-primary"><?= $notifi ?></p>
          <p name="error" id="error_log" class="text-danger"><?= $error ?></p>
        </div>

        <form action=<?= $linkBE . "login_process.php" ?> method="post">
          <div class="form-group">
            <strong>Tài khoản: <span style="color: red;">*</span></strong>
            <input id="account" placeholder="Nhập tài khoản" type="text" class="form-control" name="account" >
          </div>

          <div class="form-group">
            <strong>Mật khẩu: <span style="color: red;">*</span></strong>
            <input type="password" placeholder="Nhập mật khẩu" id="password" class="form-control" name="password" >
          </div>

          <div class="text-center p-3">
            <button type="submit" id="loginSubmit" name="submit" class="btn btn-primary">Đăng nhập</button>
            
            <!-- <a class="btn btn-primary" href="./register.php">Đăng ký</a> -->
            <a class="btn btn-danger" href="./resetpass.php">Quên mật khẩu</a>
          </div>

        </form>
      </div>
    </div>
  </div>
  </div>




  <?php
  include($linkFE . "footer.php");

  ?>

</body>

</html>