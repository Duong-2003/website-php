<style>
  .content a {
    text-decoration: none;
  }


  .card {
    box-shadow: 0 0 5px 0px;
    color: #999;
    margin-bottom: 20px;

  }


  .card {
    transition: transform 0.3s;
  }

  .card:hover {
    transform: scale(1.1);
  }

  @media screen and (max-width: 456px) {
    #menu {
      flex-wrap: wrap;
      justify-content: space-evenly;

    }
  }

  @media screen and (max-width: 1190px) {
    #menu {
      flex-wrap: wrap;
      justify-content: space-evenly;

    }

  }
</style>

</head>

<body>


  <div class="product-list mb-3 p-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="" style="color: red; text-decoration: none; font-size: 30px">
            <hr>Sản phẩm mới nhất
            <hr>
          </a>
        </div>
      </div>
    </div>

    <?php
    include_once($linkconnWebsite);
    $valueCart = 20;
    $sql = "SELECT * FROM sanpham LIMIT $valueCart";
    $result = $connect->query($sql);
    $duongdanimg = $linkImgSp;

    $dataArray = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $dataArray[] = $row;
      }
    }
    // Đóng kết nối
    $connect->close();
    ?>

    

    <div class="container text-center py-2">
      <div class="row">
        <?php foreach ($dataArray as $data): ?>
          <div class="col-lg-3 col-md-4 col-sm-6 py-2" id="font-card">
            <a href="./product.php?sp_ma=<?= $data['sp_ma'] ?>">
              <div id="card<?= $i ?>" class="card">
                <img src="<?= $duongdanimg . $data['sp_img'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-title">
                    <strong>
                      <?= $data['sp_ten'] ?>
                    </strong>
                  </p>
                  <p class="card-text">
                    <strong style="color:#f30;font-size:25px">
                      <?= number_format($data['sp_gia'], 0, '.', ','); ?>
                      <sup>đ</sup>
                    </strong>
                  </p>
                  <a href="./product.php?sp_ma=<?= $data['sp_ma'] ?>" class="btn btn-primary">
                    <i class="fa-solid fa-cart-shopping"></i>
                    Mua
                  </a>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>


    <div class="text-center ">
      <a class="btn btn-primary" href="./List.php?page=1">Xem thêm</a>
    </div>
</body>