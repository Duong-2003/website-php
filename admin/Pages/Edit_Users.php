<head>
  <meta charset="utf-8">
  <title>Product List</title>
</head>

<body>

  <?php
  include("./MenuAdmin.php");
  ?>



  <div class="content" style="padding: 100px 30px;">
    <?php
    include_once($linkconnPages);
    $sql =  "SELECT * FROM users";
    $result = $connect->query($sql);

    $ListUsers = [];
    while ($row =  mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $ListUsers[] = array(
        'name' => $row['name'],
        'pass' => $row['pass'],
        'email' => $row['email'],
        'address' => $row['address'],
        'role' => $row['role'],


      );
    }
    $dataKey = $_GET['datakey'];

    $sql =  "SELECT * FROM users WHERE name = '$dataKey'";
    $result = $connect->query($sql);
    if ($result->num_rows != 1) {
      echo ('ERROR');
    }
    $user = $result->fetch_assoc();

    ?>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>Tên đăng nhập</th>
          <th>Mật khẩu</th>
          <th>Email</th>
          <th>Địa chỉ</th>
          <th>Quyền</th>

        </tr>
      </thead>
      <tbody>

        <tr>
          <td><?= $user['name'] ?></td>
          <td><?= $user['email'] ?></td>
          <td><?= $user['pass'] ?></td>
          <td><?= $user['address'] ?></td>
          <td><?= ($user['role'] ? 'admin' : 'user') ?></td>


        </tr>

      </tbody>
    </table>

    <div>
      <span class="log_heading text-dark mb-3">
        <h5>Sửa sản phẩm</h5>
      </span>
      <div id="error-message" class="text-danger" style="text-align:center ;font-size:25px"></div>
      <div class="text-danger" style="text-align:center ;font-size:25px">
        <?= isset($_GET['error']) ? $_GET['error'] : '' ?>
      </div>
      <form action="<?= $linkBE ?>Edit_Users.php" method="post" enctype="multipart/form-data">

        <div class="input-group mb-3">
          <span class="input-group-text" id="name">Tên đăng nhập<span style="color: red;">*</span></span>
          <input value="<?= $user['name'] ?>" name="name" type="text" class="form-control">
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text" id="email">Email<span style="color: red;">*</span></span>
          <input value="<?= $user['email'] ?>" name="email" type="email" class="form-control">
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text" id="pass"> Mật khẩu<span style="color: red;">*</span></span>
          <input value="<?= $user['pass'] ?>" name="pass" type="password" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="address">Địa chỉ<span style="color: red;">*</span></span>
          <input value="<?= $user['address'] ?>" name="address" type="text" class="form-control">
        </div>


        <div class="input-group mb-3">
          <span class="input-group-text">Quyền<span style="color: red;">*</span></span>
          <select name="role" class="form-select" aria-label="Quyền">
            <?php
            $allowedRoles = ['Admin', 'User', 'Guest']; // Danh sách các quyền cho phép
            foreach ($allowedRoles as $role) : ?>
              <option value="<?= $role ?>" <?= ($role === $user['role']) ? 'selected' : '' ?>><?= $role ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" name="submit" type="button" class="btn btn-dark">Sửa</button>
      </form>
    </div>
  </div>
  </div>

</body>
<script>
  function MoveToError() {
    var targetElement = document.getElementById("error-message");
    if (targetElement) {
      // Sử dụng JavaScript để di chuyển đến thẻ
      window.scrollTo({
        top: targetElement.offsetTop - 150,
        behavior: "smooth"
      });
    }
  }
  // Lấy form và nút "Sửa"
  const form = document.querySelector("form");
  const submitButton = document.querySelector('button[name="submit"]');

  // Xử lý sự kiện khi form được gửi
  form.addEventListener("submit", function(event) {
    // Kiểm tra các trường nhập liệu
    const productNewName = document.querySelector('input[name="sp_ten"]').value;
    const productNewType = document.querySelector('select[name="productType"]').value;
    const productNewPrice = document.querySelector('input[name="sp_gia"]').value;
    const productNewDetail = document.querySelector('textarea[name="sp_motachitiet"]').value;
    const productNewImage = document.querySelector('input[name="sp_img"]').value;
    const productNewQuantity = document.querySelector('input[name="sp_soluong"]').value;

    if (
      productNewName.trim() === "" ||
      productNewType.trim() === "" ||
      productNewPrice.trim() === "" ||
      productNewDetail.trim() === "" ||
      productNewImage.trim() === "" ||
      productNewQuantity.trim() === ""
    ) {
      // Hiển thị thông báo lỗi
      document.getElementById("error-message").textContent = "Vui lòng nhập đầy đủ thông tin.";
      MoveToError();
      event.preventDefault(); // Ngăn chặn gửi form

    }
  });

  // Xóa thông báo lỗi và thành công khi người dùng bắt đầu nhập liệu
  form.addEventListener("input", function() {
    document.getElementById("error-message").textContent = "";
  });
</script>

</html>