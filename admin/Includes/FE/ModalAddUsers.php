<div class="modal fade" id="AddProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="margin: 150px 0px;">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="">Thêm người dùng</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div id="error-message" class="text-danger" style="text-align:center ;font-size:25px" ></div>
      <div class="modal-body">
      <div class="menu-content" >

      <form action=<?= $linkBE . "Add_Users.php" ?> method="post" enctype="multipart/form-data">
      <div class="input-group mb-3">
          <span class="input-group-text" id="name">Tên đăng nhập<span style="color: red;">*</span></span>
          <input  name="name" type="text" class="form-control">
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text" id="email">Email<span style="color: red;">*</span></span>
          <input  name="email" type="email" class="form-control">
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text" id="pass"> Mật khẩu<span style="color: red;">*</span></span>
          <input  name="pass" type="password" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="address">Địa chỉ<span style="color: red;">*</span></span>
          <input  name="address" type="text" class="form-control">
        </div>


        <div class="input-group mb-3">
          <span class="input-group-text">Quyền<span style="color: red;">*</span></span>
          <select name="role" class="form-select" aria-label="Quyền">
            <?php
            $allowedRoles = ['Admin', 'User', 'Guest']; // Danh sách các quyền cho phép
            foreach ($allowedRoles as $role) : ?>
              <option><?= $role ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" name="submit" type="button" class="btn btn-dark">Thêm</button>
        
      </form>
      
    </div>
  </div>
     
    </div>
  </div>
</div>

<script>
  // Lấy form và nút "Thêm"
  const form = document.querySelector("form");
  const submitButton = document.querySelector('button[name="submit"]');

  // Xử lý sự kiện khi form được gửi
  form.addEventListener("submit", function(event) {
    // Kiểm tra các trường nhập liệu
    const productName = document.querySelector('input[name="sp_ten"]').value;
    const productType = document.querySelector('select[name="productType"]').value;
    const productPrice = document.querySelector('input[name="sp_gia"]').value;
    const productDescription = document.querySelector('textarea[name="sp_mota"]').value;
    const productDetail = document.querySelector('textarea[name="sp_motachitiet"]').value;
    const productImage = document.querySelector('input[name="sp_img"]').value;
    const productQuantity = document.querySelector('input[name="sp_soluong"]').value;

    if (
      productName.trim() === "" ||
      productType.trim() === "" ||
      productPrice.trim() === "" ||
      productDescription.trim() === "" ||
      productDetail.trim() === "" ||
      productImage.trim() === "" ||
      productQuantity.trim() === ""
    ) {
      // Hiển thị thông báo lỗi
      document.getElementById("error-message").textContent = "Vui lòng nhập đầy đủ thông tin.";
      event.preventDefault(); // Ngăn chặn gửi form
    } 
  });

  // Xóa thông báo lỗi và thành công khi người dùng bắt đầu nhập liệu
  form.addEventListener("input", function() {
    document.getElementById("error-message").textContent = "";
  });
</script>