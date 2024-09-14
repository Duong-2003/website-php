<head>
  <meta charset="utf-8">
  <title>Product List</title>

</head>

<body>

  <?php
  include("./MenuAdmin.php");

  ?>

  <script>
    var myDiv = document.getElementById("order");
    myDiv.classList.add("active");
  </script>


  <div class="content">
    <h1 style="text-align: center; padding-top:40px;color:tomato">Danh sách đơn hàng</h1>
    <hr style="color:red">


    <?php
    include_once($linkconnPages);
    $sql = "SELECT * FROM donhang";
    $result = $connect->query($sql);

    $danhsachdonhang = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $danhsachdonhang[] = array(
        'donhang_ma' => $row['donhang_ma'],
        'sp_ma' => $row['sp_ma'],
        'name' => $row['name'],
        'timeorder' => $row['timeorder'],
        'donhang_trangthai' => $row['donhang_trangthai'],
        'donhang_gia' => $row['donhang_gia'],
        'donhang_soluongsp' => $row['donhang_soluongsp'],
      );
    }

    ?>
    <div>
      <?= isset($_GET["notifi"]) ? $_GET["notifi"] : '' ?>
    </div>
    <div>
      <?= isset($_GET["error"]) ? $_GET["error"] : '' ?>
    </div>
    <div class="container">

      <table id="danhsach" class=" table table-striped table-hover table-secondary table-bordered table-hover">
        <thead>
          <tr>
            <th>Mã đơn hàng</th>
            <th>Mã sản phẩm</th>
            <th>Người đặt</th>
            <th>Ngày đặt</th>
            <th>Trạng thái</th>
            <th>Tiền thu</th>
            <th>Số lượng sản phẩm</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($danhsachdonhang as $donhang):
            $donhanggia = number_format($donhang['donhang_gia'], 0, '.', ','); ?>
            <tr>
              <td>
                <?= $donhang['donhang_ma'] ?>
              </td>
              <td>
                <?= $donhang['sp_ma'] ?>
              </td>
              <td>
                <?= $donhang['name'] ?>
              </td>
              <td>
                <?= $donhang['timeorder'] ?>
              </td>
              <td id="trangthai">
                <?= $donhang['donhang_trangthai'] ?>
              </td>
              <td>
                <?= $donhanggia ?>
              </td>
              <td>
                <?= $donhang['donhang_soluongsp'] ?>
              </td>

              <td>
                <div class="container text-center">
                  <div class="row gx-5">
                    <div class="col">
                      <div class=""><a data-bs-toggle="modal" data-bs-target="#infoOrder<?= $donhang['donhang_ma'] ?>"
                          href="#">Thông tin</a></div>
                    </div>
                    <div class="col">
                      <div class="p-2"><a href="./Edit_Order.php?datakey=<?= $donhang['donhang_ma'] ?>">Sửa</a></div>
                    </div>
                    <?php
                    if ($donhang['donhang_trangthai'] != "Đã hủy"): ?>
                      <div class="col">
                        <div class="p-2"><a href="<?= $linkBE ?>OrderCancel.php?datakey=<?= $donhang['donhang_ma'] ?>">Huỷ
                            đơn</a></div>
                      </div>
                    <?php endif;
                    ?>
                  </div>
                </div>
              </td>
            </tr>
            <?php
          endforeach;
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    $(document).ready(function () {
      $('#danhsach').DataTable();
    });
  </script>
  <?php
  foreach ($danhsachdonhang as $donhang) {
    include($linkFE . "ModalInfoOrder.php");
  }
  ?>
</body>