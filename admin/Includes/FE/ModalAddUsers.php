<div class="modal fade" id="AddProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="margin: 150px 0px;">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="">Thêm người dùng</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="error-message" class="text-danger" style="text-align:center; font-size:25px;"></div>
      <div class="modal-body">
        <div class="menu-content">
          <form action="<?= $linkBE . 'Add_Users.php' ?>" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
              <span class="input-group-text" id="name">Tên đăng nhập<span style="color: red;">*</span></span>
              <input name="name" type="text" class="form-control" required>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="email">Email<span style="color: red;">*</span></span>
              <input name="email" type="email" class="form-control" required>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="pass">Mật khẩu<span style="color: red;">*</span></span>
              <input name="pass" type="password" class="form-control" required>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="address">Địa chỉ<span style="color: red;">*</span></span>
              <input name="address" type="text" class="form-control" required>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">Quyền<span style="color: red;">*</span></span>
              <select name="role" class="form-select" aria-label="Quyền" required>
                <?php
                $allowedRoles = ['admin', 'user']; // Danh sách quyền
                foreach ($allowedRoles as $role) : ?>
                  <option value="<?= $role ?>"><?= ucfirst($role) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <button type="submit" name="submit" class="btn btn-dark">Thêm</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const form = document.querySelector("form");
  const errorMessage = document.getElementById("error-message");

  form.addEventListener("submit", function(event) {
    const inputs = form.querySelectorAll("input[required], select[required]");
    let allFilled = true;

    inputs.forEach(input => {
      if (input.value.trim() === "") {
        allFilled = false;
      }
    });

    if (!allFilled) {
      errorMessage.textContent = "Vui lòng nhập đầy đủ thông tin.";
      event.preventDefault();
    }
  });

  form.addEventListener("input", function() {
    errorMessage.textContent = "";
  });
</script>