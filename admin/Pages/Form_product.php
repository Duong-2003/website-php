<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi Tiết Sản Phẩm</title>
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
    .table th, .table td {
      vertical-align: middle;
    }
    .table th {
        width: 1%; 
    }

    .table td {
        width: 1%; 
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
    $sqlLSP = "SELECT * FROM loaisp";
    $resultLSP = $connect->query($sqlLSP);
   
    if ($resultLSP === false) {
        echo ('<div class="alert alert-danger">ERROR: Không thể truy cập dữ liệu loại sản phẩm.</div>');
        exit();
    }

    $danhsachLSP = [];
    while ($row = mysqli_fetch_array($resultLSP, MYSQLI_ASSOC)) {
      $danhsachLSP[] = array(
        'loaisp_ten' => $row['loaisp_ten'],
        'loaisanpham' => $row['loaisanpham']
      );
    }
    
    $dataKey = isset($_GET['datakey']) ? $_GET['datakey'] : null;

    if ($dataKey === null) {
        echo ('<div class="alert alert-danger">ERROR: Không tìm thấy mã sản phẩm.</div>');
        exit();
    }

    $sqlSP = "SELECT * FROM sanpham WHERE sp_ma = '$dataKey'";
    $result = $connect->query($sqlSP);
    
    if ($result === false || $result->num_rows != 1) {
      echo ('<div class="alert alert-danger">ERROR: Không tìm thấy sản phẩm.</div>');
      exit();
    }
    
    $sp = $result->fetch_assoc();
    ?>

    <h2 class="text-center mb-4">Chi Tiết Sản Phẩm</h2>
    
    <div class="card mb-4">
      <div class="card-header">Thông Tin Sản Phẩm</div>
      <div class="card-body">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>Mã sản phẩm</th>
              <th>Tên sản phẩm</th>
              <th>Loại sản phẩm</th>
              <th>Giá sản phẩm</th>
              <th>Mô tả</th>
              <th>Mô tả chi tiết</th>
              <th>Hình ảnh</th>
              <th>Số lượng</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?= htmlspecialchars($sp['sp_ma']) ?></td>
              <td><?= htmlspecialchars($sp['sp_ten']) ?></td>
              <td><?= htmlspecialchars($sp['loaisp_ten']) ?></td>
              <td><?= number_format($sp['sp_gia'], 0, ',', '.') ?> VNĐ</td>
              <td><?= htmlspecialchars($sp['sp_mota']) ?></td>
              <td><?= htmlspecialchars($sp['sp_motachitiet']) ?></td>
              <td><img src="<?= htmlspecialchars($sp['sp_img']) ?>" alt="Image" style="max-width: 100px;"></td>
              <td><?= htmlspecialchars($sp['sp_soluong']) ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="card">
      <div class="card-header">Sửa sản phẩm</div>
      <div class="card-body">
        <div id="error-message" class="text-danger error-message"></div>
        <form action="../Includes/BE/Edit_product.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="sp_ma" value="<?= htmlspecialchars($sp['sp_ma']) ?>">

          <div class="mb-3">
            <label class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
            <input value="<?= htmlspecialchars($sp['sp_ten']) ?>" name="sp_ten" type="text" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Loại sản phẩm <span class="text-danger">*</span></label>
            <select name="productType" class="form-select" required>
              <?php foreach ($danhsachLSP as $Lsp) : ?>
                <option value="<?= htmlspecialchars($Lsp['loaisanpham']) ?>" <?= ($sp['loaisanpham'] == $Lsp['loaisanpham']) ? 'selected' : ''; ?>><?= htmlspecialchars($Lsp['loaisanpham']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Tên loại sản phẩm <span class="text-danger">*</span></label>
            <select name="productTypeName" class="form-select" required>
              <?php foreach ($danhsachLSP as $Lsp) : ?>
                <option value="<?= htmlspecialchars($Lsp['loaisp_ten']) ?>" <?= ($sp['loaisp_ten'] == $Lsp['loaisp_ten']) ? 'selected' : ''; ?>><?= htmlspecialchars($Lsp['loaisp_ten']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
         
          <div class="mb-3">
            <label class="form-label">Giá sản phẩm <span class="text-danger">*</span></label>
            <input value="<?= htmlspecialchars($sp['sp_gia']) ?>" name="sp_gia" type="text" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Mô tả sản phẩm</label>
            <textarea name="sp_mota" class="form-control" rows="6"><?= htmlspecialchars($sp['sp_mota']) ?></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Mô tả sản phẩm chi tiết <span class="text-danger">*</span></label>
            <textarea name="sp_motachitiet" class="form-control" rows="6" required><?= htmlspecialchars($sp['sp_motachitiet']) ?></textarea>
          </div>

          <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" role="switch" id="checkbox_Img" onchange="toggleSection()">
            <label class="form-check-label" for="checkbox_Img">Sửa ảnh sản phẩm</label>
          </div>

          <div class="mb-3" id="image-section" style="display:none;">
            <input name="sp_img" type="file" class="form-control" accept="image/*" onchange="previewImage(event)">
            <img id="image-preview" src="" alt="Image Preview">
          </div>

          <div class="mb-3">
            <label class="form-label">Số lượng <span class="text-danger">*</span></label>
            <input value="<?= htmlspecialchars($sp['sp_soluong']) ?>" name="sp_soluong" type="number" min='0' class="form-control" required>
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