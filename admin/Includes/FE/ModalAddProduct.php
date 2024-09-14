<div class="modal fade" id="AddProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="margin: 150px 0px;">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm sản phẩm</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div id="error-message" class="text-danger" style="text-align:center ;font-size:25px" ></div>
      <div class="modal-body">
      <div class="menu-content  " >
      <form action=<?= $linkBE . "Add_product.php" ?> method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Tên sp<span style="color: red;">*</span></span>
          <input name="sp_ten" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Tên Loại sp<span style="color: red;">*</span></span>
          <select name="productType" class="form-select" aria-label="Default select example">
            <?php
            foreach ($danhsachLSP as $Lsp) : ?>
              <option value="<?= $Lsp['loaisp_ten'] ?>"><?= $Lsp['loaisp_ten'] ?></option>
            <?php endforeach;
            ?>
          </select>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Giá sp<span style="color: red;">*</span></span>
          <input name="sp_gia" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Mô tả sp</label>
          <textarea name="sp_mota" class="form-control" id="" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Mô tả sp chi tiết<span style="color: red;">*</span></span></label>
          <textarea name="sp_motachitiet" class="form-control" id="" rows="3"></textarea>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Img<span style="color: red;">*</span></span>
          <input name="sp_img" type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Số lượng<span style="color: red;">*</span></span>
          <input name="sp_soluong" type="number" min='0' value="1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
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