<head>
    <meta charset="utf-8">
    <title>Product List</title>
</head>

<body>

    <?php
    include("./MenuAdmin.php");
    ?>

    <?php
    include_once($linkconnPages);
    $dataKey = $_GET['datakey'];
    $sqldonhang =  "SELECT * FROM donhang WHERE donhang_ma = '$dataKey'";
    $result = $connect->query($sqldonhang);
    if ($result->num_rows != 1) {
        echo ('ERROR');
    }
    $donhang = $result->fetch_assoc();
    ?>
    <div class="content" style="padding: 100px 30px;">

        <table id="danhsach" class=" table table-striped table-hover table-secondary table-bordered table-hover">
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
                    <td><?= number_format($donhang['donhang_gia'], 0, '.', ',') ?></td>
                    <td><?= $donhang['donhang_soluongsp'] ?></td>

                </tr>
            </tbody>
        </table>

        <div>
            <span class="log_heading text-dark mb-3">
                <h5>Sửa đơn hàng</h5>
            </span>
            <div id="error-message" class="text-danger" style="text-align:center ;font-size:25px"></div>
            <div class="text-danger" style="text-align:center ;font-size:25px">
                <?= isset($_GET['error']) ? $_GET['error'] : '' ?>
            </div>
            <form action="<?= $linkBE ?>Edit_Order.php" method="post">
                <input type="hidden" name="donhang_ma" value="<?= $donhang['donhang_ma'] ?>">
                <div class="input-group mb-3">
                    <?php
                    $optionDonhang = ['Chưa xác nhận', 'Đã xác nhận', 'Đang giao', 'Hoàn thành'];
                    ?>
                    <span class="input-group-text" id="inputGroup-sizing-default">Trạng thái<span style="color: red;">*</span></span>
                    <select name="donhang_trangthai" id="select_trangthai" class="form-select" aria-label="Default select example" onchange="showOtherInput(this.value)">
                        <?php foreach ($optionDonhang as $option) : ?>
                            <option value="<?php echo $option; ?>" <?php echo ($donhang['donhang_trangthai'] == $option) ? 'selected' : ''; ?>>
                                <?php echo $option; ?>
                            </option>
                        <?php endforeach; ?>
                        <option value="Khác" <?php echo (!in_array($donhang['donhang_trangthai'], $optionDonhang)) ? 'selected' : ''; ?>>
                            Khác
                        </option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Giá<span style="color: red;">*</span></span>
                    <input value="<?= $donhang['donhang_gia'] ?>" name="donhang_gia" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3" id='Other_status' style="visibility : hidden;">
                    <span class="input-group-text" id="inputGroup-sizing-default">Trạng thái Khác<span style="color: red;">*</span></span>
                    <input value="<?= $donhang['donhang_trangthai'] ?>" name="status_input" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <button type="submit" name="submit" type="button" class="btn btn-dark">Sửa</button>
            </form>
        </div>
    </div>
    </div>
    <script>
        function showOtherInput(selectedValue) {
            var additionalInput = document.getElementById('Other_status');
            // Hiển thị hoặc ẩn thẻ dựa trên giá trị lựa chọn
            if (selectedValue === 'Khác') {
                additionalInput.style.visibility = 'visible';
            } else {
                additionalInput.style.visibility = 'hidden';
            }
        }
        //Kiểm tra select khi load trang
        var selectElement = document.getElementById('select_trangthai');
        var selectedValue = selectElement.value;
        window.onload = showOtherInput(selectedValue);


        // Lấy form và nút "Sửa"
        const form = document.querySelector("form");
        const submitButton = document.querySelector('button[name="submit"]');

        // Xử lý sự kiện khi form được gửi
        form.addEventListener("submit", function(event) {
            // Kiểm tra các trường nhập liệu
            const productNewPrice = document.querySelector('input[name="donhang_gia"]').value;
            const productNewOtherStatus = document.querySelector('input[name="status_input"]').value;

            if (
                productNewPrice.trim() === "" ||
                productNewOtherStatus.trim() === ""
            ) {
                // Hiển thị thông báo lỗi
                document.getElementById("error-message").textContent = "Vui lòng nhập đầy đủ thông tin.";
                event.preventDefault(); // Ngăn chặn gửi form

            }
        });

        // Xóa thông báo lỗi và thành công khi người dùng bắt đầu nhập liệu
        form.addEventListener("input", function() {
            document.getElementById("error-message").textContent = "";
        });
    </script>
</body>

</html>