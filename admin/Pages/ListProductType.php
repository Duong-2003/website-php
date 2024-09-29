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
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
        }

        p#notifi_log {
            font-weight: 900;
            font-size: 20px;
            text-align: center;
        }

        .input-group-text {
            min-width: 200px; /* Giữ chiều rộng tối thiểu cho nhãn */
        }

        .form-control {
            box-shadow: none; /* Bỏ bóng cho input */
        }

        .table {
            margin-top: 20px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .btn-danger, .btn-success {
            min-width: 80px; /* Chiều rộng tối thiểu cho nút */
        }
    </style>
</head>

<body>

    <?php
    include('./MenuAdmin.php');    
    include('../Includes/conn/connect.php');

    // Lấy danh sách loại sản phẩm
    $sql = "SELECT * FROM loaisp";
    $result = $connect->query($sql);

    $danhsachLSP = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $danhsachLSP[] = array(
            'loaisp_ten' => $row['loaisp_ten'],
            'loaisanpham' => $row['loaisanpham'],
        );
    }
    ?>

    <div class="content container mt-5">
        <h1 class="text-center">Danh Sách Loại Sản Phẩm</h1>
        <hr style="color:red">
        <?php
        $notifi = isset($_GET["notifi"]) ? htmlspecialchars($_GET["notifi"]) : '';
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
                        <td><?= htmlspecialchars($lsp['loaisp_ten']) ?></td>
                        <td><?= htmlspecialchars($lsp['loaisanpham']) ?></td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href='../Includes/BE/DeleteSQL.php?key=loaisp_ten&table=loaisp&datakey=<?= urlencode($lsp['loaisp_ten']) ?>' class="btn btn-danger mx-1">Xóa</a>
                                <!-- <a href="#" class="btn btn-warning mx-1">Sửa</a> -->
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mt-4">
            <h5 class="text-dark">Thêm loại sản phẩm</h5>
            <form action='../Includes/BE/Add_productType.php' method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text">Tên loại sản phẩm<span class="text-danger">*</span></span>
                    <input name="loaisp" type="text" class="form-control" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Loại sản phẩm<span class="text-danger">*</span></span>
                    <input name="loaisanpham" type="text" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Thêm</button>
            </form>
        </div>
    </div>

    
</body>

</html>