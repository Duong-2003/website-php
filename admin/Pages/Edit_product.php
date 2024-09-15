<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Product List</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.1/css/bootstrap.min.css">
  <style>
    .content {
      padding: 50px 30px;
    }
    .error-message {
      text-align: center;
      font-size: 20px;
    }
    .form-label {
      font-weight: bold;
    }
  </style>
</head>

<body>

  <?php include("./MenuAdmin.php"); ?>

  <div class="content">
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
      echo ('<div class="alert alert-danger">ERROR: Không tìm thấy sản phẩm.</div>');
    }
    $sp = $result->fetch_assoc();
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
          <td><?= htmlspecialchars($sp['sp_ma']) ?></td>
          <td><?= htmlspecialchars($sp['sp_ten']) ?></td>
          <td><?= htmlspecialchars($sp['loaisp_ten']) ?></td>
          <td><?= number_format($sp['sp_gia'], 0, '.', ',') ?> VNĐ</td>
          <td><?= htmlspecialchars($sp['sp_mota']) ?></td>
          <td><?= htmlspecialchars($sp['sp_motachitiet']) ?></td>
          <td><img src="<?= htmlspecialchars($sp['sp_img']) ?>" alt="Image" style="max-width: 100px;"></td>
          <td><?= htmlspecialchars($sp['sp_soluong']) ?></td>
        </tr>
      </tbody>
    </table>

    <div class="mt-4">
      <h5 class="text-dark mb-3">Sửa sản phẩm</h5>
      <div id="error-message" class="text-danger"></div>
      <form action="<?= $linkBE ?>Edit_product.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="sp_ma" value="<?= htmlspecialchars($sp['sp_ma']) ?>">
        
        <div class="mb-3">
          <label class="form-label">Tên sp <span class="text-danger">*</span></label>
          <input value="<?= htmlspecialchars($sp['sp_ten']) ?>" name="sp_ten" type="text" class="form-control" required>
        </div>
        
        <div class="mb-3">
          <label class="form-label">Tên Loại sp <span class="text-danger">*</span></label>
          <select name="productType" class="form-select" required>
            <?php foreach ($danhsachLSP as $Lsp) : ?>
              <option value="<?= htmlspecialchars($Lsp['loaisp_ten']) ?>"><?= htmlspecialchars($Lsp['loaisp_ten']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Giá sp <span class="text-danger">*</span></label>
          <input value="<?= htmlspecialchars($sp['sp_gia']) ?>" name="sp_gia" type="text" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Mô tả sp</label>
          <textarea name="sp_mota" class="form-control" rows="3"><?= htmlspecialchars($sp['sp_mota']) ?></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Mô tả sp chi tiết <span class="text-danger">*</span></label>
          <textarea name="sp_motachitiet" class="form-control" rows="3" required><?= htmlspecialchars($sp['sp_motachitiet']) ?></textarea>
        </div>

        <div class="form-check form-switch mb-3">
          <input class="form-check-input" type="checkbox" role="switch" id="checkbox_Img" onchange="toggleSection()">
          <label class="form-check-label" for="checkbox_Img">Sửa ảnh sản phẩm</label>
        </div>

        <div class="mb-3" id="image-section" style="display:none;">
          <input name="sp_img" type="file" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">Số lượng <span class="text-danger">*</span></label>
          <input value="<?= htmlspecialchars($sp['sp_soluong']) ?>" name="sp_soluong" type="number" min='0' class="form-control" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Sửa</button>
      </form>
    </div>
  </div>

  <script>
    function toggleSection() {
      var checkBoxImg = document.getElementById("checkbox_Img");
      var imageSection = document.getElementById("image-section");
      imageSection.style.display = checkBoxImg.checked ? "block" : "none";
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