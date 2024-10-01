<!-- Modal for Adding Sale -->
<div class="modal fade" id="AddSale" tabindex="-1" aria-labelledby="AddSaleLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddSaleLabel">Thêm Giảm Giá</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../Includes/BE/Add_Sales.php" method="POST">
                    <div class="mb-3">
                        <label for="sp_ma" class="form-label">Chọn Sản Phẩm <span class="text-danger">*</span></label>
                        <select name="sp_ma" class="form-select" required>
                            <option value="">Chọn sản phẩm</option>
                            <?php
                            // Assuming you have a database connection named $connect
                            $sqlProducts = "SELECT sp_ma, sp_ten FROM sanpham";
                            $resultProducts = $connect->query($sqlProducts);

                            while ($product = $resultProducts->fetch_assoc()) {
                                echo "<option value='" . htmlspecialchars($product['sp_ma']) . "'>" . htmlspecialchars($product['sp_ten']) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="discount_percent" class="form-label">Phần Trăm Giảm Giá (%) <span class="text-danger">*</span></label>
                        <input type="number" name="discount_percent" class="form-control" required min="0" max="100" placeholder="Nhập phần trăm giảm giá">
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Ngày Bắt Đầu <span class="text-danger">*</span></label>
                        <input type="date" name="start_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Ngày Kết Thúc <span class="text-danger">*</span></label>
                        <input type="date" name="end_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="sale_description" class="form-label">Mô Tả</label>
                        <textarea name="sale_description" class="form-control" placeholder="Nhập mô tả"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="is_expired" class="form-label">Hết Hạn</label>
                        <textarea name="is_expired" class="form-control" placeholder="Nhập thông tin hết hạn"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Thêm Giảm Giá</button>
                </form>
            </div>
        </div>
    </div>
</div>