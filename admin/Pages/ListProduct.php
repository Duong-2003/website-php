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

        .content {
            margin: 40px auto;
            max-width: 1200px;
        }

        h1 {
            color: tomato;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        p#notifi_log {
            font-weight: 900;
            font-size: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php include('./MenuAdmin.php'); ?>
    <?php
    include_once($linkconnPages);

    // Lấy danh sách loại sản phẩm
    $sqlLSP = "SELECT * FROM loaisp";
    $resultLSP = $connect->query($sqlLSP);
    $danhsachLSP = [];
    while ($row = mysqli_fetch_array($resultLSP, MYSQLI_ASSOC)) {
        $danhsachLSP[] = array(
            'loaisanpham' => htmlspecialchars($row['loaisanpham']),
            'loaisp_ten' => htmlspecialchars($row['loaisp_ten']),
        );
    }

    // Lấy danh sách sản phẩm
    $sqlSP = "SELECT * FROM sanpham";
    $resultSP = $connect->query($sqlSP);
    $danhsachSP = [];
    while ($row = mysqli_fetch_array($resultSP, MYSQLI_ASSOC)) {
        $danhsachSP[] = array(
            'sp_ma' => $row['sp_ma'],
            'sp_ten' => htmlspecialchars($row['sp_ten']),
            'loaisanpham' => htmlspecialchars($row['loaisanpham']),
            'loaisp_ten' => htmlspecialchars($row['loaisp_ten']),
            'sp_gia' => number_format($row['sp_gia'], 0, '.', ','),
            'sp_mota' => htmlspecialchars($row['sp_mota']),
            'sp_motachitiet' => htmlspecialchars($row['sp_motachitiet']),
            'sp_img' => htmlspecialchars($row['sp_img']),
            'sp_soluong' => $row['sp_soluong']
        );
    }
    ?>
    
    <div class="content">
        <h1 class="text-center">Danh mục sản phẩm</h1>
        <hr style="color:red">
        <?php
        $notifi = isset($_GET["notifi"]) ? htmlspecialchars($_GET["notifi"]) : '';
        ?>
        <p id="notifi_log" class="text-success"><?= $notifi ?></p>
      
        <div class="text-end mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddProduct">
                Thêm sản phẩm
            </button>
        </div>

        <table id="danhsach" class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Mã sp</th>
                    <th>Tên sp</th>
                    <th>Loại sp</th>
                    <th>Tên loại sp</th>
                    <th>Giá sp</th>
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
                    echo "<tr>
                        <td>{$row['sp_ma']}</td>
                        <td>{$row['sp_ten']}</td>
                        <td>{$row['loaisanpham']}</td>
                        <td>{$row['loaisp_ten']}</td>
                        <td>{$row['sp_gia']}</td>
                        <td>{$row['sp_mota']}</td>
                        <td>{$row['sp_motachitiet']}</td>
                        <td><img style='max-height: 100px;' src='{$linkSanPham}{$row['sp_img']}' alt=''></td>
                        <td>{$row['sp_soluong']}</td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <a href='{$linkBE}DeleteSQL.php?key=sp_ma&table=sanpham&datakey={$row['sp_ma']}' class='btn btn-danger mx-1'>Xóa</a>
                                <a href='Edit_product.php?datakey={$row['sp_ma']}' class='btn btn-warning mx-1'>Sửa</a>
                            </div>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal for Adding Product -->
    <?php include_once($linkFE . "ModalAddProduct.php"); ?>

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
                }
            });
        });
    </script>
</body>

</html>