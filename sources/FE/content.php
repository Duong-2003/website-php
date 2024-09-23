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
  button.cart-button.btn-buy.add_to_cart {
            width: 150px;
            background: #DC2028;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 30px;
            color: #fff;
            font-size: 14px;
            border: 1px solid;
        }

        #buy {
            color: #fff
        }
        
</style>

</head>

<body>


  <div class="product-list mb-3 p-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="../sources/FE/listProduct.php" style="color: red; text-decoration: none; font-size: 30px">
            <hr>Sản phẩm mới nhất
            <hr>
          </a>
        </div>
      </div>
    </div>

    <?php
    include_once("../sources/connect.php");
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

   


    <div class="container text-center ">
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
                  <div class="action-cart group-buttons d-flex align-items-center justify-content-center">

<button class="cart-button btn-buy add_to_cart "
    title="Thêm vào giỏ">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
        viewBox="0 0 20 20" fill="none">
        <path
            d="M11.9975 15.3318C12.2637 15.3318 12.519 15.2312 12.7072 15.0523C12.8954 14.8733 13.0011 14.6305 13.0011 14.3774V12.4688C13.0011 12.2157 12.8954 11.973 12.7072 11.794C12.519 11.615 12.2637 11.5145 11.9975 11.5145C11.7313 11.5145 11.4761 11.615 11.2879 11.794C11.0997 11.973 10.9939 12.2157 10.9939 12.4688V14.3774C10.9939 14.6305 11.0997 14.8733 11.2879 15.0523C11.4761 15.2312 11.7313 15.3318 11.9975 15.3318ZM7.98309 15.3318C8.24926 15.3318 8.50453 15.2312 8.69275 15.0523C8.88096 14.8733 8.9867 14.6305 8.9867 14.3774V12.4688C8.9867 12.2157 8.88096 11.973 8.69275 11.794C8.50453 11.615 8.24926 11.5145 7.98309 11.5145C7.71691 11.5145 7.46164 11.615 7.27343 11.794C7.08522 11.973 6.97948 12.2157 6.97948 12.4688V14.3774C6.97948 14.6305 7.08522 14.8733 7.27343 15.0523C7.46164 15.2312 7.71691 15.3318 7.98309 15.3318ZM17.0156 3.87988H15.6306L13.8943 0.587462C13.8413 0.466313 13.7625 0.356872 13.663 0.265977C13.5634 0.175081 13.4452 0.104685 13.3158 0.0591881C13.1863 0.0136909 13.0484 -0.0059297 12.9106 0.0015524C12.7728 0.00903449 12.6382 0.0434586 12.515 0.102673C12.3918 0.161888 12.2829 0.244621 12.1948 0.345701C12.1068 0.446782 12.0417 0.564037 12.0035 0.690141C11.9653 0.816245 11.9548 0.948486 11.9728 1.0786C11.9908 1.20872 12.0368 1.33391 12.1079 1.44635L13.3825 3.87988H6.59811L7.87269 1.44635C7.97011 1.22391 7.97542 0.974653 7.88757 0.748634C7.79971 0.522616 7.62519 0.336567 7.39905 0.22784C7.17291 0.119112 6.91188 0.095757 6.66838 0.162462C6.42487 0.229167 6.21692 0.380994 6.08627 0.587462L4.35002 3.87988H2.96504C2.25568 3.89014 1.57291 4.13826 1.03716 4.58048C0.501408 5.0227 0.147085 5.63061 0.036685 6.297C-0.0737153 6.96339 0.0668992 7.64544 0.433728 8.22286C0.800557 8.80029 1.37004 9.23599 2.04172 9.45313L2.78439 16.5724C2.85929 17.281 3.20927 17.9377 3.766 18.4142C4.32273 18.8906 5.04623 19.1526 5.79522 19.1491H14.2055C14.9545 19.1526 15.678 18.8906 16.2347 18.4142C16.7914 17.9377 17.1414 17.281 17.2163 16.5724L17.959 9.45313C18.6321 9.23535 19.2025 8.79805 19.5691 8.2187C19.9356 7.63934 20.0747 6.95532 19.9617 6.28778C19.8487 5.62024 19.4909 5.01227 18.9517 4.57155C18.4125 4.13083 17.7266 3.88581 17.0156 3.87988ZM15.199 16.3815C15.1741 16.6177 15.0574 16.8366 14.8718 16.9954C14.6863 17.1543 14.4451 17.2416 14.1954 17.2404H5.78518C5.53552 17.2416 5.29435 17.1543 5.10878 16.9954C4.9232 16.8366 4.80654 16.6177 4.78158 16.3815L4.06901 9.60582H15.9116L15.199 16.3815ZM17.0156 7.69718H2.96504C2.69887 7.69718 2.4436 7.59663 2.25539 7.41766C2.06717 7.23869 1.96144 6.99595 1.96144 6.74285C1.96144 6.48975 2.06717 6.24701 2.25539 6.06804C2.4436 5.88907 2.69887 5.78853 2.96504 5.78853H17.0156C17.2817 5.78853 17.537 5.88907 17.7252 6.06804C17.9134 6.24701 18.0192 6.48975 18.0192 6.74285C18.0192 6.99595 17.9134 7.23869 17.7252 7.41766C17.537 7.59663 17.2817 7.69718 17.0156 7.69718Z"
            fill="#F2F2F2"></path>
    </svg>
    <a id="buy"
        href="./product.php?sp_ma=<?= $data['sp_ma'] ?>">Thêm vào
        giỏ</a>
</button>
</div>
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