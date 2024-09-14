<head>
  <meta charset="utf-8">
  <title>Product List</title>
</head>

<body>

  <?php
  include('./MenuAdmin.php');
  include($linkJs . "Product.js");
  ?>


  <div class=" content">

    <h1 style="text-align: center; padding-top:40px;color:tomato">Danh mục sản phẩm</h1>
    <hr style="color:red">
    <!-- 
    <div> <?= isset($_GET["notifi"]) ? $_GET["notifi"] : '' ?></div> -->

    <?php
    include_once($linkconnPages);
    $sqlLSP =  "SELECT * FROM loaisp";
    $resultLSP = $connect->query($sqlLSP);

    $danhsachLSP = [];
    while ($row =  mysqli_fetch_array($resultLSP, MYSQLI_ASSOC)) {
      $danhsachLSP[] = array(
        'loaisp_ten' => $row['loaisp_ten'],
      );
    }

    $sqlSP =  "SELECT * FROM sanpham";
    $resultSP = $connect->query($sqlSP);

    $danhsachSP = [];
    while ($row =  mysqli_fetch_array($resultSP, MYSQLI_ASSOC)) {
      $danhsachSP[] = array(
        'sp_ma' => $row['sp_ma'],
        'sp_ten' => $row['sp_ten'],
        'loaisp_ten' => $row['loaisp_ten'],
        'sp_gia' => $row['sp_gia'],
        'sp_mota' => $row['sp_mota'],
        'sp_motachitiet' => $row['sp_motachitiet'],
        'sp_img' => $row['sp_img'],
        'sp_soluong' => $row['sp_soluong']
      );
    }

    // var_dump(($danhsachSP));
    ?>
    <div style="margin: 0px 120px">
      <table id="danhsach" class="table table-striped table-secondary table-bordered  table-hover">
        <thead>
          <tr style="text-align:center; font-size: larger;">
            <th>Mã sp</th>
            <th>Tên sp</th>
            <th>Loại sp</th>
            <th>Giá sp</th>
            <th>Mô tả</th>
            <th>Mô tả chi tiết</th>
            <th>Image</th>
            <th>Số lượng</th>

            <th>Thao tác</th>


          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($danhsachSP as $sp) : ?>
            <tr style="text-align:center">
              <td><?= $sp['sp_ma'] ?></td>
              <td><?= $sp['sp_ten'] ?></td>
              <td><?= $sp['loaisp_ten'] ?></td>
              <td><?= number_format($sp['sp_gia'], 0, '.', ',') ?></td>
              <td><?= $sp['sp_mota'] ?></td>
              <td><?= $sp['sp_motachitiet'] ?></td>
              <td>
                <img style="max-height: 100px;" src="<?php echo $linkSanPham . $sp['sp_img'] ?>" alt="">
              </td>
              <td><?= $sp['sp_soluong'] ?></td>

              <td>
                <div class="container text-center">
                  <div class="row gx-2">
                    <div class="col">
                      <div class="p-2"><a href=<?= $linkBE . "DeleteSQL.php?key=sp_ma&table=sanpham&datakey=" . $sp['sp_ma'] ?>>
                          <button type="submit" name="submit" type="button" class="btn btn-dark">Xóa</button>
                        </a></div>
                    </div>
                    <div class="col">
                      <div class="p-2"><a href=<?= "Edit_product.php?datakey=" . $sp['sp_ma'] ?>>
                          <button type="submit" name="submit" type="button" class="btn btn-dark">Sửa</button>
                        </a>
                      </div>
                    </div>
                  </div>

                </div>
              </td>

            </tr>
          <?php endforeach;
          ?>
        </tbody>

    </div>
    <script>
      $(document).ready(function() {
        $('#danhsach').DataTable();
      });
    </script>
</body>

</html>








<!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#AddProduct">
  Thêm sản phẩm
</button>

<?php
include_once($linkFE . "ModalAddProduct.php");
?>