<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi Tiết Người Dùng</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.1/css/bootstrap.min.css">
  <style>
    .content {
      padding: 50px 30px;
      background-color: #f9f9f9;
    }
    .error-message {
      text-align: center;
      font-size: 20px;
    }
    .form-label {
      font-weight: bold;
    }
    #image-preview {
      max-width: 150px;
      margin-top: 10px;
      border: 2px solid #007bff;
      border-radius: 5px;
      display: none;
    }
    .card {
      border: none;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    .card-header {
      background-color: #007bff;
      color: white;
      font-weight: bold;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
    }
    .btn-primary {
      background-color: #28a745;
      border: none;
    }
    .btn-primary:hover {
      background-color: #218838;
    }
  </style>
</head>

<body>
  <div class="content">
    <?php
    include('./MenuAdmin.php');    
    include('../Includes/conn/connect.php');

    $dataKey = isset($_GET['datakey']) ? $_GET['datakey'] : null;

if ($dataKey === null) {
    echo ('<div class="alert alert-danger">ERROR: Không tìm thấy mã người dùng.</div>');
    exit();
}

// Cập nhật câu lệnh SQL để tìm người dùng theo user_id
$sqlUser = "SELECT * FROM users WHERE name = '$dataKey'";
$result = $connect->query($sqlUser);

if ($result === false || $result->num_rows != 1) {
    echo ('<div class="alert alert-danger">ERROR: Không tìm thấy người dùng.</div>');
    exit();
}

$user = $result->fetch_assoc();
    ?>

    <h2 class="text-center mb-4">Chi Tiết Người Dùng</h2>
    
    <div class="card mb-4">
      <div class="card-header">Thông Tin Người Dùng</div>
      <div class="card-body">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>Tên đăng nhập</th>
              <th>Email</th>
              <th>Mật khẩu</th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th>Quyền</th>
              <th>Ảnh đại diện</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?= htmlspecialchars($user['name']) ?></td>
              <td><?= htmlspecialchars($user['email']) ?></td>
              <td><?= $user['pass'] ?></td>
              <td><?= htmlspecialchars($user['address']) ?></td>
              <td><?= htmlspecialchars($user['phone']) ?></td>
              <td><?= htmlspecialchars($user['role']) ?></td>
              <td><img src="<?= htmlspecialchars($user['avatar']) ?>" alt="Avatar" style="max-width: 100px;"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="card">
      <div class="card-header">Sửa Thông Tin Người Dùng</div>
      <div class="card-body">
        <div id="error-message" class="text-danger error-message"></div>
        <form action="../Includes/BE/Edit_User.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="name" value="<?= htmlspecialchars($user['name']) ?>">

          <div class="mb-3">
            <label class="form-label">Tên đăng nhập <span class="text-danger">*</span></label>
            <input value="<?= htmlspecialchars($user['name']) ?>" name="name" type="text" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email <span class="text-danger">*</span></label>
            <input value="<?= htmlspecialchars($user['email']) ?>" name="email" type="email" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Mật khẩu <span class="text-danger">*</span></label>
            <input value="<?= $user['pass'] ?>" name="pass" type="password" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Địa chỉ </label>
            <input value="<?= htmlspecialchars($user['address']) ?>" name="address" type="text" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Số điện thoại </label>
            <input value="<?= htmlspecialchars($user['phone']) ?>" name="phone" type="text" class="form-control">
          </div>

          <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" role="switch" id="checkbox_Img" onchange="toggleSection()">
            <label class="form-check-label" for="checkbox_Img">Sửa ảnh đại diện</label>
          </div>

          <div class="mb-3" id="image-section" style="display:none;">
            <input name="avatar" type="file" class="form-control" accept="image/*" onchange="previewImage(event)">
            <img id="image-preview" src="" alt="Image Preview">
          </div>

          <div class="mb-3">
            <label class="form-label">Quyền </label>
            <select name="role" class="form-select" required>
              <option value="Admin" <?= ($user['role'] === 'Admin') ? 'selected' : ''; ?>>Admin</option>
              <option value="User" <?= ($user['role'] === 'User') ? 'selected' : ''; ?>>User</option>
            </select>
          </div>

          <button type="submit" name="submit" class="btn btn-primary">Sửa</button>
        </form>
      </div>
    </div>
  </div>

  <script>
    function toggleSection() {
      const checkBoxImg = document.getElementById("checkbox_Img");
      const imageSection = document.getElementById("image-section");
      imageSection.style.display = checkBoxImg.checked ? "block" : "none";
      document.getElementById("image-preview").style.display = "none"; // Ẩn hình ảnh khi chuyển đổi
    }

    function previewImage(event) {
      const imagePreview = document.getElementById("image-preview");
      imagePreview.src = URL.createObjectURL(event.target.files[0]);
      imagePreview.style.display = "block"; // Hiển thị hình ảnh
    }

    const form = document.querySelector("form");
    form.addEventListener("submit", function(event) {
      const requiredInputs = form.querySelectorAll('input[required], textarea[required]');
      let allFilled = true;

      requiredInputs.forEach(input => {
        if (!input.value.trim()) {
          allFilled = false;
        }
      });

      if (!allFilled) {
        document.getElementById("error-message").textContent = "Vui lòng nhập đầy đủ thông tin.";
        event.preventDefault();
      }
    });

    form.addEventListener("input", function() {
      document.getElementById("error-message").textContent = "";
    });
  </script>
</body>

</html>