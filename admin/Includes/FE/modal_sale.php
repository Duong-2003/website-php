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
    <input type="text" id="search_product" class="form-control" placeholder="Nhập tên sản phẩm hoặc chọn từ danh sách" oninput="filterProducts()" />
    <select id="product_select" name="sp_ma" class="form-select mt-2" required>
        <option value="">Chọn sản phẩm</option>
        <?php
        // Truy vấn sản phẩm từ cơ sở dữ liệu
        $sqlProducts = "SELECT sp_ma, sp_ten FROM sanpham";
        $resultProducts = $connect->query($sqlProducts);

        // Lưu danh sách sản phẩm vào một biến để sử dụng trong JavaScript
        $products = [];
        while ($product = $resultProducts->fetch_assoc()) {
            $products[] = $product;
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
<script>
    // Lưu danh sách sản phẩm vào biến JavaScript
    const products = <?php echo json_encode($products); ?>;

    function filterProducts() {
        const input = document.getElementById('search_product').value.toLowerCase();
        const select = document.getElementById('product_select');

        // Xóa tất cả các tùy chọn hiện tại
        select.innerHTML = '<option value="">Chọn sản phẩm</option>';

        // Lọc và thêm các sản phẩm phù hợp vào select
        products.forEach(product => {
            if (product.sp_ten.toLowerCase().includes(input)) {
                const option = document.createElement('option');
                option.value = product.sp_ma;
                option.textContent = product.sp_ten;
                select.appendChild(option);
            }
        });
    }
</script>