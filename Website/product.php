<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Document</title>
    <?php
    include_once('../sources/linkFIle.php');
    ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* width: 100%; */
        }

        .notifi>p {
            font-size: 25px;
            text-align: center;
            font-weight: 600;

        }

        #item {
            /* border-radius: 20px; */
            display: inline-block;
            height: 40px;
            line-height: 40px;
            color: #fff;
            background: #65717d;
            padding: 0 20px;
            font-weight: bold;
            font-size: 16px;
            border-right: solid 1px #fff;
        }

        #item-head {
            font-family: cursive;
            color: #cf5a51;
            font-size: 35px;

        }





    </style>
</head>

<body>
    <?php
    session_start();
    include($linkFE . 'top_header.php');
    include($linkFE . 'header.php');
    ?>

    <?php
    include_once($linkconnWebsite);

    if ($_GET['sp_ma'] != '') {
        $id = $_GET['sp_ma'];
        $sql =  "SELECT * FROM sanpham WHERE sp_ma = $id";
        $result = $connect->query($sql);
        $duongdanimg = $linkImgSp;
        $sp = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (!$sp) {
            echo "ERROR: Không tìm thấy sản phẩm";
            exit();
        }
    } else {
        echo "ERROR: Không nhận được id";
        exit();
    }

    ?>
    <html>
    <div class="notifi">
        <?php
        $notifi = isset($_GET["notifi"]) ? $_GET["notifi"] : '';
        $error = isset($_GET["error"]) ? $_GET["error"] : '';
        ?>
        <p name="notifi" id="notifi" class="text-primary" style="color: ;"><?= $notifi ?></p>
        <p name="error" id="error" class="text-primary" style="color: red;"><?= $error ?></p>
    </div>
    <!-------------------PRODUCT----------------  -->


    <form method="post" action=<?= $linkBE . "order_process.php" ?>>
        <div class="container py-4">
            <div class="row">

                <div class="col-lg-7 col-md-7 py-3 ">

                    <img src="<?= $duongdanimg . $sp['sp_img'] ?>" alt="" style="width: 100%; height:100%;border-radius:15px">

                </div>
                <div class="col-lg-5 col-md-5 " style="border-radius: 15px; box-shadow: 0 0 10px 0px;    background: aliceblue;">
                    <div class="row ">


                        <!-- <div>
                            <div class="p-1 text-center text-secondary">
                                <h2 style="color:cadetblue"><?= $sp['sp_ten'] ?></h2>
                            </div>
                        </div> -->
                        <hr>
                        <div>
                            <div class="p-1">
                                <strong id="item-head"><?= $sp['sp_ten'] ?></strong>

                            </div>
                            <inputtype="hidden" name="sp_ma" value="<?php echo $sp['sp_ma']; ?>">
                        </div>
                        <div>
                            <div class="p-1">
                                <i>
                                    <h4 style="color:#cf5a51" id="">Mã sản phẩm:<?= $sp['sp_ma'] ?></h4>
                                </i>

                            </div>
                            <inputtype="hidden" name="sp_ma" value="<?php echo $sp['sp_ma']; ?>">
                        </div>


                        <div>
                            <div class="p-1">
                               <i></i> <strong style="color:#f30;font-size:25px">
                                <?= number_format($sp['sp_gia'], 0, '.', ','); ?>
                                    <sup>đ</sup>
                                </strong></i>
                            </div>
                        </div>
                        <hr>







                        <div>
                            <div class="p-1">
                                <strong id="item">Loại sản phẩm: <?= $sp['loaisp_ten'] ?></strong>

                            </div>
                            <input type="hidden" name="sp_ma" value="<?php echo $sp['sp_ma']; ?>">
                        </div>
                    </div>



                    <div>
                        <div class="p-1">
                            <strong id="item">Số lượng còn lại:

                                <?= $sp['sp_soluong'] != 0 ? $sp['sp_soluong'] : '<span class="text-danger">Hết hàng</span>' ?>
                            </strong>
                        </div>
                    </div>


                    <div>
                        <div class="p-1">
                            <div class="input-group ">
                                <span class="input-group-text" id="" style="margin:0;padding:0">
                                    <strong id="item">Số lượng mua:</strong>


                                    <input id='value_buy' name="donhang_soluongsp" type="number" max='<?= $sp['sp_soluong'] ?>' min='1' value="1" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="p-1">
                            <strong id="item">Chi tiết: <?= $sp['sp_motachitiet'] ?></strong>

                        </div>


                   
                        <div class="title_km">
                            <h2 class="title_km">
                                <span>Khuyến mãi - ưu đãi</span>
                            </h2>
                            <div class="box-promotion">

                                <ul>
                                    <li>Tặng tai nghe Airpod 3 chính hãng</li>
                                    <li>Tăng ốp lưng chống sốc trị giá 200k</li>
                                    <li>Tặng thêm 1 năm bảo hành miễn phí</li>
                                    <li>Dán cường lực miễn phí trọn đời</li>

                                </ul>
                            </div>
                        </div>
                    

                    <hr>
                    <div>
                        <div class="p-1" id='pay'>
                            <strong id="item">Giá phải trả:
                                <?= number_format($sp['sp_gia'], 0, '.', ','); ?>
                                <sup>đ</sup>
                            </strong>
                            <script>
                                const inputElement = document.getElementById('value_buy');
                                const ouputElement = document.getElementById('pay');
                                var valuepay;
                                inputElement.addEventListener('change', function(event) {
                                    valuepay = event.target.value * <?= $sp['sp_gia'] ?>;
                                    valuepay = valuepay.toLocaleString('en-US');
                                    var textpay = "<strong>" + "Giá phải trả : " + "</strong>" + valuepay;
                                    ouputElement.innerHTML = textpay;
                                });
                            </script>

                        </div>
                    </div>

                 
                    <hr>




                 











                    <div>

                        <div class="p-1">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <?php if ($sp['sp_soluong'] != 0) : ?>

                                    <button id="btnModal" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        Mua
                                    </button>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content " style="margin-top: 45%;">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xác nhận</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="modal-content">
                                        Bạn có chắc chắn mua
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="submit" id="btn_dathang">Xác nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            const contentModal = document.getElementById('modal-content');
                            var buttonModal = document.getElementById('btnModal');
                            buttonModal.addEventListener("click", function() {
                                var text = "Bạn có chắc chắn mua ";
                                var textNameProduct = "<?= $sp['sp_ten'] ?>";
                                var textGia = valuepay == undefined ? "<?= number_format($sp['sp_gia'], 0, '.', ','); ?>" : valuepay;
                                contentModal.innerHTML = text + textNameProduct + "<br>Giá: " + textGia;
                            });
                        </script>
                    </div>

                </div>
            </div>
        </div>

        </div>
    </form>

    <!---------------------------------------  -->
</body>


<?php

include($linkFE . 'footer.php');


?>

</html>

<style>
    
   

        .title_km {
            padding: 0 15px;
            display: block;
            font-weight: bold;
            z-index: 5;
        }

         .title_km span {
            position: relative;
            background: #cf5a51;
            color: #fff;
            text-transform: uppercase;
            font-size: 18px;
            padding: 5px 5px;
            border-radius: 15px;

        }

   .box-promotion {
            padding: 5px 15px;
            font-size: 14px;
            position: relative;
        }

      .box-promotion ul li {
            padding-left: 17px;
            position: relative;
            margin-bottom: 7px;
            line-height: 1.2;
            font-size: 18px;
            color:#cf5a51
            
        }
         
        /* ::before và ::after */
      .box-promotion ul li:before {
            content: "";
            width: 8px;
            height: 8px;
            background: #39b54a;
            border-radius: 100%;
            -webkit-border-radius: 100%;
            position: absolute;
            top: 5px;
            left: 0px;
        }
</style>