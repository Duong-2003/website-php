<!doctype html>
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
        a {
            text-decoration: none;
        }
        p#notifi_log {
            font-weight: 900;
            font-size: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php include("./MenuAdmin.php"); ?>
    <?php
    include_once($linkconnPages);
    $sql = "SELECT * FROM loaisp";
    $result = $connect->query($sql);

    $danhsachLSP = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $danhsachLSP[] = array(
            'loaisp_ten' => $row['loaisp_ten'],
            'loaisanpham' => $row['loaisanpham'], // Thêm trường loại sản phẩm
        );
    }
    ?>

    <div class="content container mt-5">
        <h1 class="text-center">Danh sách loại sản phẩm</h1>
        <hr style="color:red">
        <?php
        $notifi = isset($_GET["notifi"]) ? $_GET["notifi"] : '';
        ?>
        <p id="notifi_log" class="text-success"><?= $notifi ?></p>

        <table id="danhsach" class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Tên loại sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th style="text-align:center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($danhsachLSP as $lsp) : ?>
                    <tr>
                        <td><?= $lsp['loaisp_ten'] ?></td>
                        <td><?= $lsp['loaisanpham'] ?></td> <!-- Hiển thị loại sản phẩm -->
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="<?= $linkBE . "DeleteSQL.php?key=loaisp_ten&table=loaisp&datakey=" . $lsp['loaisp_ten'] ?>" class="btn btn-danger mx-1">Xóa</a>
                                <!-- <a href="#" class="btn btn-warning mx-1">Sửa</a> -->
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mt-4">
            <h5 class="text-dark">Thêm loại sản phẩm</h5>
            <form action="<?= $linkBE . 'Add_productType.php' ?>" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text">Tên loại sản phẩm<span style="color: red;">*</span></span>
                    <input name="loaisp" type="text" class="form-control" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Loại sản phẩm<span style="color: red;">*</span></span>
                    <input name="loaisanpham" type="text" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Thêm</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#danhsach').DataTable({
                "language": {
                    "lengthMenu": "Hiện _MENU_ loại sản phẩm trên mỗi trang",
                    "zeroRecords": "Không tìm thấy loại sản phẩm nào",
                    "info": "Hiển thị trang _PAGE_ của _PAGES_",
                    "infoEmpty": "Không có loại sản phẩm",
                    "infoFiltered": "(lọc từ _MAX_ tổng số loại sản phẩm)",
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