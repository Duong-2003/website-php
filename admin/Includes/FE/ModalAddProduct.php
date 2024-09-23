<div class="modal fade" id="AddProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm sản phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="error-message" class="text-danger text-center" style="font-size: 18px;"></div>
            <div class="modal-body">
                <form action="<?= $linkBE . 'Add_product.php' ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="sp_ten" class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                        <input name="sp_ten" type="text" class="form-control" id="sp_ten" required>
                    </div>
                    <div class="mb-3">
                        <label for="productType" class="form-label">Loại sản phẩm <span class="text-danger">*</span></label>
                        <select name="productType" class="form-select" id="productType" required>
                            <?php foreach ($danhsachLSP as $Lsp) : ?>
                                <option value="<?= htmlspecialchars($Lsp['loaisanpham']) ?>"><?= htmlspecialchars($Lsp['loaisanpham']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="productTypeName" class="form-label">Tên loại sản phẩm <span class="text-danger">*</span></label>
                        <select name="productTypeName" class="form-select" id="productTypeName" required>
                            <?php foreach ($danhsachLSP as $Lsp) : ?>
                                <option value="<?= htmlspecialchars($Lsp['loaisp_ten']) ?>"><?= htmlspecialchars($Lsp['loaisp_ten']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sp_gia" class="form-label">Giá sản phẩm <span class="text-danger">*</span></label>
                        <input name="sp_gia" type="number" step="0.01" class="form-control" id="sp_gia" required>
                    </div>
                    <div class="mb-3">
                        <label for="sp_mota" class="form-label">Mô tả sản phẩm</label>
                        <textarea name="sp_mota" class="form-control" id="sp_mota" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="sp_motachitiet" class="form-label">Mô tả chi tiết <span class="text-danger">*</span></label>
                        <textarea name="sp_motachitiet" class="form-control" id="sp_motachitiet" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="sp_img" class="form-label">Hình ảnh <span class="text-danger">*</span></label>
                        <input name="sp_img" type="file" class="form-control" id="sp_img" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="sp_soluong" class="form-label">Số lượng <span class="text-danger">*</span></label>
                        <input name="sp_soluong" type="number" min="0" value="1" class="form-control" id="sp_soluong" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-dark">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector("form").addEventListener("submit", function(event) {
        const errorMessage = document.getElementById("error-message");
        const fields = {
            productName: document.querySelector('input[name="sp_ten"]').value.trim(),
            productType: document.querySelector('select[name="productType"]').value.trim(),
            productPrice: document.querySelector('input[name="sp_gia"]').value.trim(),
            productDetail: document.querySelector('textarea[name="sp_motachitiet"]').value.trim(),
            productImage: document.querySelector('input[name="sp_img"]').value.trim(),
            productQuantity: document.querySelector('input[name="sp_soluong"]').value.trim(),
        };

        const emptyFields = Object.entries(fields).filter(([key, value]) => !value);
        if (emptyFields.length > 0) {
            errorMessage.textContent = "Vui lòng nhập đầy đủ thông tin.";
            event.preventDefault();
        }
    });

    document.querySelector("form").addEventListener("input", function() {
        document.getElementById("error-message").textContent = "";
    });
</script>