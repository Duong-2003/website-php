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
  include_once('../sources/linkFIle.php');
  ?>



<style>
    .error>p {
      font-size: 15px;
    }

    #error {
      color: red;
    }
  </style>
</head>

<body>
  <?php

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



  <div id="main_login" >
    <div class="container py-4">
      <div class="row">
        <div class="col-lg-6 " >
          <img src=<?= $linkImgIndex . "img404.png"  ?> width="100%" alt="">
        </div>

        
        <div class="col-lg-6 " id="font-register">
        <form action=<?= $linkBE . "resetpass_process.php" ?> method="post">
        <h2 style="text-align:center">QUÊN MẬT KHẨU</h2>
        <div class="error">
          <p name="notifi" class="text-primary"><?= isset($_GET["notifi"]) ? $_GET["notifi"] : '' ?></p>
          <p name="error" class="text-danger"><?= isset($_GET["error"]) ? $_GET["error"] : '' ?></p>
        </div>
          <div class="form-group">
            <strong>Tài khoản: <span style="color: red;">*</span></strong>

            <input placeholder="Tài khoản của bạn" id="account" type="text" class="form-control" name="account" >

          </div>
          <div class="form-group">
            <strong>Email: <span style="color: red;">*</span></strong>

            <input id="email" placeholder="Email của bạn" type="email" class="form-control" name="email" >
         
      </div>
      <div class="form-group">
        <strong>Mật khẩu mới: <span style="color: red;">*</span></strong>

        <input type="password" placeholder="Mật khẩu mới" id="passwordReset" class="form-control" name="passwordReset" >
     
    </div>

    <div class="text-center p-3">
      <button type="submit" id="loginSubmit" name="submit" class="btn btn-primary">Thay đổi</button>

      <!-- <button type="submit" name="submit" id="reg_submit" class="btn btn-primary">Đăng ký</button> -->

      <!-- <a class="btn btn-primary" href="./login.php">Đăng nhập</a> -->



    </div>
    </form>
    </div>
  </div>
  </div>
  </div>

  

  <?php
  include($linkFE . 'footer.php');

  ?>
</body>

</html>