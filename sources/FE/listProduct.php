<style>
    .dropdown-content a {
        background-color: #6c757d;
        color: aliceblue;
    }

    .card {
        transition: transform 0.3s;
        margin-bottom: 20px;

        box-shadow: 0 0 5px 0px;
        color: #999;
        margin-bottom: 20px;

    }


    .card:hover {
        transform: scale(1.1);
    }
</style>

<body>
    <?php

    include_once($linkconnWebsite);

    $productValueShow = 16;
    $page;
    if ($_GET['page'] != '' || $_GET['page'] != null) {
        $page = $_GET['page'];
    } else {
        echo "ERROR: Không nhận được trang";
        exit();
    }
    $arrange = isset($_GET['arrange']) ? $_GET['arrange'] : "";
    $minShow = $productValueShow * ($page - 1);

    if (isset($_GET['ProductTypes'])) {
        $productTypes = is_array($_GET["ProductTypes"]) ? $_GET["ProductTypes"] : array($_GET["ProductTypes"]);
        $sql = "SELECT * FROM sanpham WHERE loaisp_ten IN(" . implode(",", $productTypes) . ")";
    } else {
        $sql = "SELECT * FROM sanpham";
    }

    if ($arrange == "") {
        $sql = $sql . " LIMIT $minShow,$productValueShow";
    } else if ($arrange == "price") {
        //Tang dan
        $sql = $sql . " ORDER BY sp_gia ASC LIMIT $minShow,$productValueShow";
    }

    $result = $connect->query($sql);
    $duongdanimg = $linkImgSp;
    $dataArray = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $dataArray[] = $row;
        }
    }

    $sql =  "SELECT * FROM loaisp";
    $result = $connect->query($sql);

    $danhsachLSP = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $danhsachLSP[] = $row;
        }
    }
    ?>

    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="dropdown">
                    <a href="#" class="btn btn-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                        if ($arrange != '') {
                            if ($arrange == "price") {
                                echo "Theo giá";
                            }
                        } else {
                            echo "Sắp xếp";
                        }
                        ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" id="menu-dr-price">
                                Theo giá
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="dropdown">
                    <a href="#" class="btn btn-secondary dropdown-toggle" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Sản phẩm
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal lựa chọn sản phẩm-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hiển thị Sản phẩm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container text-center">
                        <?php
                        $col = 4;
                        $countLSP = count($danhsachLSP);
                        $row = ceil($countLSP / $col);
                        for ($dong = 0; $dong < $row; $dong++) :
                        ?>
                            <div class="row">
                                <?php
                                for ($cot = 0; $cot < $col; $cot++) :
                                    $index = $dong * $col + $cot;
                                    if ($index < $countLSP) :
                                ?>
                                        <div class="col">
                                            <div class="form-check form-check-reverse">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <?php echo $danhsachLSP[$index]["loaisp_ten"]; ?>
                                                </label>
                                                <input class="form-check-input" type="checkbox" id="checked_'<?= $danhsachLSP[$index]["loaisp_ten"] ?>'" value=" <?= $danhsachLSP[$index]["loaisp_ten"] ?>" name="checkbox_ProductType[]">
                                            </div>
                                        </div>
                                <?php
                                    endif;
                                endfor;
                                ?>
                            </div>
                        <?php
                        endfor;
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button id="btn_Apdung" type="button" class="btn btn-primary">Áp dụng</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#btn_Apdung').click(function() {
            // Lấy giá trị của tất cả các checkbox được chọn
            var selectedProducts = $('.form-check-input:checked').map(function() {
                var valueProductTypes = this.value;
                valueProductTypes = "'" + valueProductTypes.trim() + "'";
                return valueProductTypes;
            }).get();
            //CHAT GPT
            if (selectedProducts != '') {
                var result = window.location.href.replace(/&&ProductTypes[^&&]*/, '');
                var url = result + "&&ProductTypes=" + selectedProducts.join(',');
                window.location.href = url;
            } else {

                var result = window.location.href.replace(/&&ProductTypes[^&&]*/, '');
                window.location.href = result;
            }
        });

        var urlParams = new URLSearchParams(window.location.search);
        // Lấy giá trị của tham số có tên là từ truy vấn chuỗi
        var ProductTypes = urlParams.get('ProductTypes');
        var arrayTypes = ProductTypes.split(',');
        arrayTypes.forEach(function(item, index) {
            var checkbox = document.getElementById("checked_" + item);
            checkbox.checked = true;
        });
    </script>

    <div class="product-list mb-3 p-2">


        <script>
            var arrange = "<?php echo $arrange ?>";
            var element;
            if (arrange == "price") {
                element = document.getElementById("menu-dr-price");
            }

            if (element)
                element.style.backgroundColor = "#6464d8";

            document.getElementById("menu-dr-price").addEventListener("click", function() {
                if (arrange == "price") {
                    var urlSapXep = window.location.href.replace(/&&arrange[^&&]*/, '');
                    window.location.href = urlSapXep;
                } else {
                    window.location.href = window.location.href + "&&arrange=price";
                }
            });
        </script>
    </div>






    <div class="container text-center py-5">
        <div class="row">
            <?php foreach ($dataArray as $data) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 py-2" id="font-card">
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
                </div>
            <?php endforeach; ?>
        </div>
    </div>










    <div>
        <!-- Mã PHP xử lý phân trang ở đây -->



        <div>
            <?php
            $sql = "SELECT COUNT(*) as total FROM sanpham";
            $result = $connect->query($sql);
            $total = 0;
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $total = $row['total'];
            }
            $pagination = ceil($total / $productValueShow);
            // Đóng kết nối
            $connect->close();
            ?>


            <nav aria-label="Page navigation example" style="display: flex; justify-content: center;">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true" style="font-weight: bold; font-size: 30px;">&laquo;</span>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $pagination; $i++) : ?>
                        <li class="page-item">
                            <a class="page-link" href="" id="phantrang<?= $i ?>" style="font-weight: bold; font-size: 30px;">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true" style="font-weight: bold; font-size: 30px;">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <script>
                for (var i = 1; i <= <?= $pagination ?>; i++) {
                    var trang = document.getElementById("phantrang" + i);
                    var resultTrang = window.location.href.replace(/page[^&&]*/, '');
                    var urlTrang = resultTrang + "&&page=" + i;
                    trang.href = urlTrang;
                }
            </script>
        </div>

    </div>
    </div>
</body>

</html>