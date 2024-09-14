<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <title>Register</title>

  <?php
  include_once('../sources/linkFIle.php');
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

    #font-register {
      border: 1px solid;
      color: #ac7d7d;
      border-radius: 20px;
      box-shadow: 0 0 12px 4px;
    }
  </style>



  <div class="container py-4">
    <div class="row">
      <div class="col-lg-6 ">
        <img src=<?= $linkImgIndex . "img-login1.webp" ?> width="100%" alt="">
      </div>

      <div class="col-lg-6 py-2" id="font-register">
        <h2 style="text-align:center; color: #da7070;">ĐĂNG KÝ TÀI KHOẢN</h2>
        <div class="error">
          <p name="notifi" id="notifi_register" class="text-primary"><?= isset($_GET["notifi"]) ? $_GET["notifi"] : '' ?></p>
          <p name="error" id="error_register" class="text-danger"><?= isset($_GET["error"]) ? $_GET["error"] : '' ?></p>
        </div>

        <form action=<?= $linkBE . "register_process.php" ?> method="post">
          <div class="form-group">
            <strong>Email: </strong>


            <input id="email" placeholder="Email để lấy lại mật khẩu" type="email" class="form-control" name="email" >

          </div>
          <div class="form-group">
            <strong>Tài khoản: <span style="color: red;">*</span></strong>

            <input id="account" placeholder="Tài khoản bạn muốn đăng ký" type="text" class="form-control" name="username" >

          </div>


          <div class="form-group">
            <strong>Nhập mật khẩu:  <span style="color: red;">*</span></strong>
            <input id="password" placeholder="Nhập mật khẩu" type="password" name="password" autocomplete="new-password" class="form-control" >

          </div>

          <div class="form-group">

            <strong>Nhập lại mật khẩu:  <span style="color: red;">*</span></strong>

            <input name="rePass" placeholder="Nhập lại mật khẩu" id="rePass" type="password" class="form-control" >

          </div>
            <div class="form-group">
            <strong> Địa chỉ: <span style="color: red;">*</span></strong>

            <input id="address" placeholder="Địa chỉ bạn muốn đăng ký" type="text" class="form-control" name="address" >

          </div>

          <div class="text-center p-3">
            <button type="submit" name="submit" id="reg_submit" class="btn btn-primary">Đăng ký</button>
          
            <!-- <a class="btn btn-primary" href="./login.php">Đăng nhập</a> -->
            <a class="btn btn-danger" href="./resetpass.php">Quên mật khẩu</a>
          </div>
        </form>
      </div>
    </div>
  </div>


  <?php
  include($linkFE . 'footer.php');
  ?>
</body>

</html>