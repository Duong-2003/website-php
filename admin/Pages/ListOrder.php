<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .content {
            padding: 20px;
        }

        h1 {
            color: tomato;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }
    </style>
</head>
<?php include('./MenuAdmin.php'); ?>

<body>



    <script>
        var myDiv = document.getElementById("order");
        myDiv.classList.add("active");
    </script>

    <div class="container-fluid">
        <h1 class="text-center">Danh sách đơn hàng</h1>
       

        <div class="container">
            <div>
                <?= isset($_GET["notifi"]) ? $_GET["notifi"] : '' ?>
            </div>
            <div>
                <?= isset($_GET["error"]) ? $_GET["error"] : '' ?>
            </div>

            <table id="danhsach" class="table table-striped table-hover table-bordered">
                <thead class="table-light">
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
                    include('../Includes/conn/connect.php');
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

                    foreach ($danhsachdonhang as $donhang):
                        $donhanggia = number_format($donhang['donhang_gia'], 0, '.', ','); ?>
                        <tr>
                            <td><?= $donhang['donhang_ma'] ?></td>
                            <td><?= $donhang['sp_ma'] ?></td>
                            <td><?= $donhang['name'] ?></td>
                            <td><?= $donhang['timeorder'] ?></td>
                            <td
                                class="text-center <?= ($donhang['donhang_trangthai'] == "Đã hủy") ? 'text-danger' : ''; ?>">
                                <?= $donhang['donhang_trangthai'] ?>
                            </td>
                            <td><?= $donhanggia ?> đ</td>
                            <td><?= $donhang['donhang_soluongsp'] ?></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a data-bs-toggle="modal" data-bs-target="#infoOrder<?= $donhang['donhang_ma'] ?>"
                                        class="btn btn-info btn-sm mx-1">Thông tin</a>
                                    <a href="./Edit_Order.php?datakey=<?= $donhang['donhang_ma'] ?>"
                                        class="btn btn-warning btn-sm mx-1">Sửa</a>
                                    <?php if ($donhang['donhang_trangthai'] != "Đã hủy"): ?>
                                        <a href="../Includes/BE/OrderCancel.php?datakey=<?= $donhang['donhang_ma'] ?>"
                                            class="btn btn-danger btn-sm mx-1">Huỷ đơn</a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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
        include("../Includes/FE/ModalInfoOrder.php");
    }
    ?>
</body>

</html>