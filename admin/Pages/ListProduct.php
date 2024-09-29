<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Danh Sách Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        h1 {
            color: #dc3545;
            /* Màu đỏ tươi */
        }

        .table {
            margin-top: 20px;
            background-color: #ffffff;
            /* Nền trắng cho bảng */
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }

        img {
            max-height: 100px;
            width: auto;
        }

        .btn-success {
            margin-bottom: 10px;
        }

        .modal-header {
            background-color: #343a40;
            color: white;
        }

        .btn-danger,
        .btn-warning {
            margin: 0 5px;
        }

        .table th {
            background-color: #007bff;
            /* Màu xanh cho tiêu đề */
            color: white;
        }
    </style>
</head>

<body>

    <?php
    include('./MenuAdmin.php');
    include('../Includes/conn/connect.php');

    // Lấy danh sách sản phẩm
    $sqlSP = "SELECT * FROM sanpham";
    $resultSP = $connect->query($sqlSP);
    $danhsachSP = [];
    while ($row = mysqli_fetch_array($resultSP, MYSQLI_ASSOC)) {
        $danhsachSP[] = array(
            'sp_ma' => $row['sp_ma'],
            'sp_ten' => $row['sp_ten'],
            'loaisanpham' => $row['loaisanpham'],
            'loaisp_ten' => $row['loaisp_ten'],
            'sp_gia' => $row['sp_gia'],
            'sp_mota' => $row['sp_mota'],
            'sp_motachitiet' => $row['sp_motachitiet'],
            'sp_img' => $row['sp_img'],
            'sp_soluong' => $row['sp_soluong']
        );
    }
    ?>

    <div class="container">
        <h1 class="text-center mb-4">Danh Sách Sản Phẩm</h1>
        <div class="text-end mb-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddProduct">
                Thêm Sản Phẩm
            </button>
        </div>
        <table id="danhsach" class="table table-striped table-bordered table-hover">
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
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($danhsachSP as $row) {
                    $imgPath = '../../Assets/img/SanPham/' . htmlspecialchars($row['sp_img']);
                    echo "<tr>
                        <td>{$row['sp_ma']}</td>
                        <td>{$row['sp_ten']}</td>
                        <td>{$row['loaisp_ten']}</td>
                        <td>" . number_format($row['sp_gia'], 0, ',', '.') . " VNĐ</td>
                        <td>{$row['sp_mota']}</td>
                        <td>{$row['sp_motachitiet']}</td>
                        <td><img src='{$imgPath}' alt='Hình ảnh sản phẩm'></td>
                        <td>{$row['sp_soluong']}</td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <a href='../Includes/BE/DeleteSQL.php?key=sp_ma&table=sanpham&datakey={$row['sp_ma']}' class='btn btn-danger'>Xóa</a>
                                <a href='../Pages/Form_product.php?datakey={$row['sp_ma']}' class='btn btn-warning'>Sửa</a>
                            </div>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <?php include('../Includes/FE/ModalAddProduct.php'); ?>

    <script>


        var myDiv = document.getElementById("product");
        myDiv.classList.add("active");
        var myDivCollapse = document.getElementById("product-collapse");
        myDivCollapse.classList.add("show");

    </script>
</body>

</html>