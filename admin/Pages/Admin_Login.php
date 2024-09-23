<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <title>Admin Login</title>

  <style>
    .error > p {
      font-size: 20px;
      text-align: center;
      font-weight: 600;
    }

    .account-box-shadow .account-content .auth-block__menu-list {
      list-style: none;
      display: flex;
      height: 50px;
      border-bottom: 1px solid #eee;
    }

    .account-box-shadow .account-content .auth-block__menu-list li {
      flex: 1 1;
      text-align: center;
      position: relative;
    }

    .account-box-shadow .account-content .auth-block__menu-list li.active:before {
      content: "";
      position: absolute;
      height: 1px;
      left: 30px;
      right: 30px;
      bottom: -1px;
      background-color: #9c8350;
    }

    .account-box-shadow .account-content .auth-block__menu-list li.active a {
      font-weight: 600;
      color: #303846;
    }

    .account-box-shadow .account-content .auth-block__menu-list li a {
      display: flex;
      height: 100%;
      width: 100%;
      align-items: center;
      justify-content: center;
      font-size: 15px;
      line-height: 22px;
      color: #999;
    }

    .page-login .btn-blues {
      padding: 0;
      height: 40px;
      font-weight: 700;
      font-size: 13px;
      width: 100%;
      border-radius: 4px;
      background-color: #999;
    }

    .login--notes {
      text-align: center;
      color: #999;
      font-size: 12px;
      margin-top: 10px;
      line-height: 1.1;
    }

    .line-break span {
      display: inline-block;
      font-size: 13px;
      color: #999;
      padding: 1px 10px;
      border-radius: 15px;
      border: 1px solid #eee;
      background-color: #fff;
      position: relative;
      z-index: 1;
    }

    .page-login .form-group label {
      font-weight: 600;
      font-size: 14px;
      text-transform: uppercase;
      margin-bottom: 5px;
    }

    a.btn-link-style {
      margin-top: 0;
      color: #9c8350;
      font-size: 13px;
      font-weight: normal;
    }

    .page-login input[type="text"],
    .page-login input[type="password"] {
      background: #fafafa;
      height: 40px;
      padding: 0 15px;
      border: 1px solid #ececec;
      outline: none;
      box-shadow: none;
    }
  </style>
</head>

<body>

  <div class="container py-5" id="ctn">
    <div class="row justify-content-md-center">
      <div class="col-lg-7 col-md-12">
        <div class="page-login account-box-shadow">
          <div id="login" class="row">
            <div class="error">
              <?php
              $error = isset($_GET["error"]) ? $_GET["error"] : '';
              $notifi = isset($_GET["notifi"]) ? $_GET["notifi"] : '';
              ?>
              <p id="notifi_log" class="text-success"><?= htmlspecialchars($notifi) ?></p>
              <p id="error_log" class="text-danger"><?= htmlspecialchars($error) ?></p>
            </div>
            <div class="col-lg-12 col-md-12 account-content">
              <ul class="auth-block__menu-list">
                <li class="active">
                  <a href="#" title="Đăng nhập">Đăng nhập</a>
                </li>
              </ul>
              <div id="nd-login">
              <form action="../Website/admin/Includes/FE/LoginProcess.php" method="post">
  <fieldset class="form-group margin-bottom-10">
    <label for="account">Tài khoản<span style="color: red;">*</span></label>
    <input id="account" placeholder="Nhập tài khoản" type="text" class="form-control" name="username" required autocomplete="username">
  </fieldset>

  <fieldset class="form-group margin-bottom-0">
    <label for="password">Mật khẩu<span style="color: red;">*</span></label>
    <input type="password" placeholder="Nhập mật khẩu" id="password" class="form-control" name="password" required autocomplete="current-password">
  </fieldset>

  <div class="text-center" style="margin-top: 15px;">
    <button class="btn btn-style btn-blues" type="submit" id="loginSubmit" name="submit">Đăng nhập</button>
  </div>
</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>