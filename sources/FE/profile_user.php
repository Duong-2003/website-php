<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Hồ Sơ Người Dùng</title>
    <style>
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover; /* Đảm bảo ảnh không bị méo */
        }
    </style>
</head>
<?php
  include($linkFE.'top_header.php');
  include($linkFE.'header.php');
   
    ?>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="./index.html">Tech of World</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./login.html">Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./register.html">Đăng ký</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Hồ Sơ Của Tôi</h2>
        <div class="card">
            <div class="card-body">
                <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên người dùng</label>
                        <input type="text" class="form-control" id="username" name="username" value="Tên người dùng" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Ảnh đại diện</label>
                        <div>
                            <img src="https://cdn-media.sforum.vn/storage/app/media/THANHAN/2/2a/avatar-dep-119.jpg" alt="Avatar" class="avatar">
                        </div>
                        <input type="file" class="form-control" id="avatar" name="avatar">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="email@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="0123456789">
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php
  
   
   
   
   
    
  include($linkFE.'footer_save.php');
  include($linkFE.'footer.php');

    
    ?>
</html>