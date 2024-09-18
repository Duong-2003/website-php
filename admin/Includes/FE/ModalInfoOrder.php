<?php
if (isset($donhang)) {
    $id = $donhang['name'];

    // Sử dụng Prepared Statements để tránh SQL injection
    $sql = "SELECT address FROM users WHERE name = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        echo "ERROR: Lỗi truy vấn CSDL";
        exit();
    }
    $user = $result->fetch_assoc();
    if (!$user) {
        echo "ERROR: Không tìm thấy người đặt hàng " . $donhang['name'];
        exit();
    }
    $address = $user['address'];

    // Lấy thông tin loại sản phẩm
    $sanpham_sql = "SELECT loaisp_ten FROM sanpham WHERE sp_ma = ?";
    $stmt_product = $connect->prepare($sanpham_sql);
    $stmt_product->bind_param("s", $donhang['sp_ma']);
    $stmt_product->execute();
    $result_product = $stmt_product->get_result();

    if ($result_product) {
        $sanpham = $result_product->fetch_assoc();
    } else {
        echo "ERROR: Không tìm thấy thông tin sản phẩm";
        exit();
    }
} else {
    echo "ERROR: Không nhận được id";
    exit();
}
?>

<div class="modal fade" id="infoOrder<?= $donhang['donhang_ma'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thông tin đơn hàng</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="error-message" class="text-danger text-center" style="font-size: 20px;"></div>
            <div class="modal-body">
                <div class="menu-content">
                    <div class="mb-3">
                        <label for="orderId" class="form-label">Mã đơn hàng <span style="color: red;">*</span></label>
                        <p id="orderId"><?= $donhang['donhang_ma'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="productType" class="form-label">Loại sản phẩm <span style="color: red;">*</span></label>
                        <p id="productType"><?= $sanpham['loaisp_ten'] ?? 'Chưa có loại' ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="customerName" class="form-label">Người đặt <span style="color: red;">*</span></label>
                        <p id="customerName"><?= $donhang['name'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="customerAddress" class="form-label">Địa chỉ <span style="color: red;">*</span></label>
                        <p id="customerAddress"><?= $address ?: "Chưa có địa chỉ" ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="orderDate" class="form-label">Ngày đặt <span style="color: red;">*</span></label>
                        <p id="orderDate"><?= $donhang['timeorder'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="orderStatus" class="form-label">Trạng thái <span style="color: red;">*</span></label>
                        <p id="orderStatus"><?= $donhang['donhang_trangthai'] ?></p>
                    </div>
                    <div class="mb-3">
                        <label for="totalAmount" class="form-label">Thành tiền <span style="color: red;">*</span></label>
                        <p id="totalAmount"><?= number_format($donhang['donhang_gia'], 0, '.', ',') ?> đ</p>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số lượng hàng <span style="color: red;">*</span></label>
                        <p id="quantity"><?= $donhang['donhang_soluongsp'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>