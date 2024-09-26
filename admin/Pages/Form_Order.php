<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>



    <?php

  include('./MenuAdmin.php');    
    include('../Includes/conn/connect.php');
    $dataKey = $_GET['datakey'];
    $sqldonhang = "SELECT * FROM donhang WHERE donhang_ma = '$dataKey'";
    $result = $connect->query($sqldonhang);
    
    if ($result->num_rows != 1) {
        echo ('<div class="alert alert-danger text-center">ERROR</div>');
        exit();
    }
    
    $donhang = $result->fetch_assoc();
    ?>
    
    <div class="container my-5">
        <h2 class="text-center mb-4">Sửa Đơn Hàng</h2>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Mã sản phẩm</th>
                    <th>Người đặt</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Giá</th>
                    <th>Số lượng sản phẩm</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $donhang['donhang_ma'] ?></td>
                    <td><?= $donhang['sp_ma'] ?></td>
                    <td><?= $donhang['name'] ?></td>
                    <td><?= $donhang['timeorder'] ?></td>
                    <td><?= $donhang['donhang_trangthai'] ?></td>
                    <td><?= number_format($donhang['donhang_gia'], 0, '.', ',') ?> đ</td>
                    <td><?= $donhang['donhang_soluongsp'] ?></td>
                </tr>
            </tbody>
        </table>

        <div>
            <div id="error-message" class="text-danger text-center mb-3" style="font-size: 20px;"></div>
            <div class="text-danger text-center" style="font-size: 20px;">
                <?= isset($_GET['error']) ? $_GET['error'] : '' ?>
            </div>
            <form action="<?= $linkBE ?>Edit_Order.php" method="post">
                <input type="hidden" name="donhang_ma" value="<?= $donhang['donhang_ma'] ?>">

                <div class="mb-3">
                    <label for="select_trangthai" class="form-label">Trạng thái<span class="text-danger">*</span></label>
                    <select name="donhang_trangthai" id="select_trangthai" class="form-select" onchange="showOtherInput(this.value)">
                        <?php
                        $optionDonhang = ['Chưa xác nhận', 'Đã xác nhận', 'Đang giao', 'Hoàn thành'];
                        foreach ($optionDonhang as $option) : ?>
                            <option value="<?= $option; ?>" <?= ($donhang['donhang_trangthai'] == $option) ? 'selected' : ''; ?>>
                                <?= $option; ?>
                            </option>
                        <?php endforeach; ?>
                        <option value="Khác" <?= (!in_array($donhang['donhang_trangthai'], $optionDonhang)) ? 'selected' : ''; ?>>Khác</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="donhang_gia" class="form-label">Giá<span class="text-danger">*</span></label>
                    <input value="<?= $donhang['donhang_gia'] ?>" name="donhang_gia" type="text" class="form-control" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="mb-3" id="Other_status" style="visibility: hidden;">
                    <label for="status_input" class="form-label">Trạng thái Khác<span class="text-danger">*</span></label>
                    <input value="<?= $donhang['donhang_trangthai'] ?>" name="status_input" type="text" class="form-control" aria-describedby="inputGroup-sizing-default">
                </div>

                <button type="submit" name="submit" class="btn btn-dark">Sửa</button>
            </form>
        </div>
    </div>

    <script>
        function showOtherInput(selectedValue) {
            var additionalInput = document.getElementById('Other_status');
            additionalInput.style.visibility = (selectedValue === 'Khác') ? 'visible' : 'hidden';
        }

        // Kiểm tra select khi load trang
        window.onload = function() {
            var selectElement = document.getElementById('select_trangthai');
            showOtherInput(selectElement.value);
        };

        // Lấy form và nút "Sửa"
        const form = document.querySelector("form");
        const errorMessage = document.getElementById("error-message");

        // Xử lý sự kiện khi form được gửi
        form.addEventListener("submit", function(event) {
            const productNewPrice = document.querySelector('input[name="donhang_gia"]').value;
            const productNewOtherStatus = document.querySelector('input[name="status_input"]').value;

            if (productNewPrice.trim() === "" || (document.getElementById('Other_status').style.visibility === 'visible' && productNewOtherStatus.trim() === "")) {
                errorMessage.textContent = "Vui lòng nhập đầy đủ thông tin.";
                event.preventDefault(); // Ngăn chặn gửi form
            }
        });

        // Xóa thông báo lỗi khi người dùng bắt đầu nhập liệu
        form.addEventListener("input", function() {
            errorMessage.textContent = "";
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>