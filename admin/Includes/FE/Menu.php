

<head>
  <?php
  include("../Includes/linkAdmin.php");
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <title>Document</title>


  <style>

  </style>
</head>

<body>






  <nav class="navbar navbar-dark bg-dark fixed-left">

    <div class="container-fluid">

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div>
        <a class="navbar-brand" href="#" style="font-family:'Courier New', Courier, monospace">TRANG QUẢN TRỊ ADMIN </a>
      </div>
      <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar">
        <div class="offcanvas-header">

          <div class="d-flex flex-nowrap fixed-left">


            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;" style="position: fixed; top : 0px;">
              <div class="col-lg-3 col-md-6" id="logo" style="padding:5px 5px">
                <a href="#"><img src=<?= $linkImg . "admin.png" ?> alt="" style="height:60px;    margin: 0 70px;"></a>
              </div>
              <hr>
              <ul class="nav nav-pills flex-column mb-auto">
                <li>
                  <a href="./Ecom.php" class="nav-link text-white" id="Ecom"  >

                    <i class="fa-solid fa-sliders"></i>
                    Thống kê doanh số
                  </a>

                </li>
                <li>
                  <a href="./ListProductType.php" class="nav-link text-white" id="productType">

                    <i class="fa-solid fa-list"></i>
                    Danh mục Loại Sản phẩm
                  </a>

                </li>
                <li>
                  <a href="./ListProduct.php" class="nav-link text-white" id="product">

                    <i class="fa-solid fa-list"></i>
                    Danh mục Sản phẩm
                  </a>
                </li>
                <li>

                  <a href="ListUsers.php" class="nav-link text-white" id="user">

                    <i class="fa-solid fa-user"></i>

                    Danh mục Người dùng
                  </a>
                </li>
                <li>
                  <a href="ListOrder.php" class="nav-link text-white" id="order">

                    <i class="fa-solid fa-cart-plus"></i>

                    Danh mục Đơn hàng
                  </a>
                </li>
              </ul>
              <hr>
              <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="https://avatars.githubusercontent.com/u/125018793?s=400&u=d66a7dc1d555eb23d223fe07b638e9701a5735be&v=4" alt="" width="32" height="32" class="rounded-circle me-2">
                  <strong>Admin</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                  <li><a class="dropdown-item" target="_blank" href="../../Website/Website.php">View</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
              </div>
            </div>



  </nav>

</body>
