<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Product List</title>
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
            color: tomato;
        }
        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }
        p#notifi_log {
            font-weight: 900;
            font-size: 20px;
            text-align: center;
        }
        img {
            max-height: 100px;
            width: auto;
        }
        .table {
            margin-top: 20px;
        }
        .btn-success {
            margin-bottom: 10px;
        }
        .modal-header {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>

<body>

    <?php
    include('./MenuAdmin.php');    
    include('../Includes/conn/connect.php');

    // Lấy danh sách loại sản phẩm
    $sqlLSP = "SELECT * FROM loaisp";
    $resultLSP = $connect->query($sqlLSP);
    $danhsachLSP = [];
    while ($row = mysqli_fetch_array($resultLSP, MYSQLI_ASSOC)) {
        $danhsachLSP[] = array(
            'loaisanpham' => $row['loaisanpham'],
            'loaisp_ten' => $row['loaisp_ten'],
        );
    }

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
                Thêm 
            </button>
        </div>
        <table id="danhsach" class="table table-striped table-bordered table-hover">
            <thead>
                <tr style="font-size: larger;">
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
                                <a href='../Includes/BE/DeleteSQL.php?key=sp_ma&table=sanpham&datakey={$row['sp_ma']}' class='btn btn-danger mx-1'>Xóa</a>
                                <a href='../Pages/Form_product.php?datakey={$row['sp_ma']}' class='btn btn-warning mx-1'>Sửa</a>
                            </div>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal for Adding Product -->
    <?php include('../Includes/FE/ModalAddProduct.php');?>

    <script>
        $(document).ready(function () {
            $('#danhsach').DataTable({
                "language": {
                    "lengthMenu": "Hiện _MENU_ sản phẩm trên mỗi trang",
                    "zeroRecords": "Không tìm thấy sản phẩm nào",
                    "info": "Hiển thị trang _PAGE_ của _PAGES_",
                    "infoEmpty": "Không có sản phẩm",
                    "infoFiltered": "(lọc từ _MAX_ tổng số sản phẩm)",
                    "search": "Tìm kiếm:",
                    "paginate": {
                        "next": "Tiếp",
                        "previous": "Trước"
                    }
                },
                "paging": true, // Bật phân trang
                "searching": true // Bật tìm kiếm
            });
        });

        var myDiv = document.getElementById("product");
        myDiv.classList.add("active");
        var myDiv = document.getElementById("product-collapse");
        myDiv.classList.add("show");
    </script>
</body>

</html>