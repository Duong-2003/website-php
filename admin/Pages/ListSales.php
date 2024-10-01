<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Danh Sách Giảm Giá</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.cloudflare.com/jquery-3.6.0.min.js"></script>
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

    // Lấy danh sách giảm giá
    $sqlSales = "SELECT s.sale_id, s.sp_ma, s.discount_percent, s.start_date, s.end_date, s.sale_description, s.is_expired, sp.sp_ten
                 FROM sales s
                 JOIN sanpham sp ON s.sp_ma = sp.sp_ma";
    $resultSales = $connect->query($sqlSales);
    $danhsachSales = [];
    while ($row = mysqli_fetch_array($resultSales, MYSQLI_ASSOC)) {
        $danhsachSales[] = array(
            'sale_id' => $row['sale_id'],
            'sp_ma' => $row['sp_ma'],
            'discount_percent' => $row['discount_percent'],
            'start_date' => $row['start_date'],
            'end_date' => $row['end_date'],
            'sale_description' => $row['sale_description'],
            'is_expired' => $row['is_expired'],
            'sp_ten' => $row['sp_ten']
        );
    }
    ?>

    <div class="container">
        <h1 class="text-center mb-4">Danh Sách Giảm Giá</h1>
        <div class="text-end mb-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddSale">
                Thêm Giảm Giá
            </button>
        </div>
        <table id="danhsach" class="table table-striped table-bordered table-hover">
            <thead>
                <tr style="font-size: larger;">
                    <th>Mã giảm giá</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Phần trăm giảm giá</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Mô tả</th>
                    <th>Hết hạn</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($danhsachSales as $row) {
                    echo "<tr>
                        <td>{$row['sale_id']}</td>
                        <td>{$row['sp_ma']}</td>
                        <td>{$row['sp_ten']}</td>
                        <td>{$row['discount_percent']}%</td>
                        <td>{$row['start_date']}</td>
                        <td>{$row['end_date']}</td>
                        <td>{$row['sale_description']}</td>
                        <td>" . ($row['is_expired'] ? 'Có' : 'Không') . "</td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <a href='../Includes/BE/DeleteSQL.php?key=sale_id&table=sales&datakey={$row['sale_id']}' class='btn btn-danger mx-1'>Xóa</a>
                                <a href='../Pages/Form_sale.php?datakey={$row['sale_id']}' class='btn btn-warning mx-1'>Sửa</a>
                            </div>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include('../Includes/FE/ModalSales.php');?>
    
    <script>
        $(document).ready(function () {
            $('#danhsach').DataTable({
                "language": {
                    "lengthMenu": "Hiện _MENU_ giảm giá trên mỗi trang",
                    "zeroRecords": "Không tìm thấy giảm giá nào",
                    "info": "Hiển thị trang _PAGE_ của _PAGES_",
                    "infoEmpty": "Không có giảm giá",
                    "infoFiltered": "(lọc từ _MAX_ tổng số giảm giá)",
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

        var myDiv = document.getElementById("sales");
        myDiv.classList.add("active");
        var myDiv = document.getElementById("sales-collapse");
        myDiv.classList.add("show");
    </script>
</body>

</html>