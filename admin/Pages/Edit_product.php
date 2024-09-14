<!doctype html>
<html lang="en">

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
    $sqlLSP = "SELECT * FROM loaisp";
    $resultLSP = $connect->query($sqlLSP);

    $danhsachLSP = [];
    while ($row = mysqli_fetch_array($resultLSP, MYSQLI_ASSOC)) {
      $danhsachLSP[] = array(
        'loaisp_ten' => $row['loaisp_ten'],
      );
    }
    $dataKey = $_GET['datakey'];

    $sqlSP = "SELECT * FROM sanpham WHERE sp_ma = '$dataKey'";
    $result = $connect->query($sqlSP);
    if ($result->num_rows != 1) {
      echo ('ERROR');
    }
    $sp = $result->fetch_assoc();
    // var_dump(($danhsachSP));
    ?>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>Mã sp</th>
          <th>Tên sp</th>
          <th>Loại sp</th>
          <th>Giá sp</th>
          <th>Mô tả</th>
          <th>Mô tả chi tiết</th>
          <th>Image</th>
          <th>Số lượng</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <?= $sp['sp_ma'] ?>
          </td>
          <td>
            <?= $sp['sp_ten'] ?>
          </td>
          <td>
            <?= $sp['loaisp_ten'] ?>
          </td>
          <td>
            <?= number_format($sp['sp_gia'], 0, '.', ',') ?>
          </td>
          <td>
            <?= $sp['sp_mota'] ?>
          </td>
          <td>
            <?= $sp['sp_motachitiet'] ?>
          </td>
          <td>
            <?= $sp['sp_img'] ?>
          </td>
          <td>
            <?= $sp['sp_soluong'] ?>
          </td>
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
      <form action="<?= $linkBE ?>Edit_product.php" method="post" enctype="multipart/form-data">
        <!-- Trường ẩn hidden -->
        <input type="hidden" name="sp_ma" value="<?= $sp['sp_ma'] ?>">
        <div class="input-group mb-3">
          <span class="input-group-text" id="">Tên sp<span style="color: red;">*</span></span>
          <input value="<?= $sp['sp_ten'] ?>" name="sp_ten" type="text" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="">Tên Loại sp<span style="color: red;">*</span></span>
          <select name="productType" class="form-select" aria-label="Default select example">
            <?php
            foreach ($danhsachLSP as $Lsp) : ?>
              <option value="<?= $Lsp['loaisp_ten'] ?>">
                <?= $Lsp['loaisp_ten'] ?>
              </option>
            <?php endforeach;
            ?>
          </select>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="">Giá sp<span style="color: red;">*</span></span>
          <input value="<?= $sp['sp_gia'] ?>" name="sp_gia" type="text" class="form-control">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Mô tả sp</label>
          <textarea name="sp_mota" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $sp['sp_mota'] ?></textarea>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Mô tả sp chi tiết<span style="color: red;">*</span></span></label>
          <textarea name="sp_motachitiet" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $sp['sp_motachitiet'] ?></textarea>
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" role="switch" onchange="toggleSection()" id="checkbox_Img">
          <label class="form-check-label" for="flexCheckDefault">Sửa ảnh sản phẩm</label>
        </div>
        <div class="input-group mb-3">
          <input name="sp_img" type="file" class="form-control" id="input_Img" style="display:none">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="">Số lượng<span style="color: red;">*</span></span>
          <input value="<?= $sp['sp_soluong'] ?>" name="sp_soluong" type="number" min='0' value="1" class="form-control">
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

  function toggleSection() {
    var checkBoxImg = document.getElementById("checkbox_Img");
    var inputImg = document.getElementById("input_Img");

    // Kiểm tra trạng thái của checkbox và ẩn/hiện phần tử tương ứng
    if (checkBoxImg.checked) {
      inputImg.style.display = "block";
    } else {
      inputImg.style.display = "none";
      inputImg.value = null;
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