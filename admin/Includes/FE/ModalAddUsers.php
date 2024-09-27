<div class="modal fade" id="AddProduct">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Thêm người dùng</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="error-message" class="text-danger" style="text-align:center; font-size:20px;"></div>
            <div class="modal-body">
                <form action='../Includes/BE/Add_Users.php' method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên đăng nhập <span class="text-danger">*</span></label>
                        <input name="name" type="text" class="form-control" required placeholder="Nhập tên đăng nhập">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input name="email" type="email" class="form-control" required placeholder="Nhập email">
                    </div>

                    <div class="mb-3">
                        <label for="pass" class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                        <input name="pass" type="password" class="form-control" required placeholder="Nhập mật khẩu">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                        <input name="address" type="text" class="form-control" required placeholder="Nhập địa chỉ">
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Quyền <span class="text-danger">*</span></label>
                        <select name="role" class="form-select" aria-label="Quyền" required>
                            <?php
                            $allowedRoles = ['admin', 'user']; // Danh sách quyền
                            foreach ($allowedRoles as $role) : ?>
                                <option value="<?= htmlspecialchars($role) ?>"><?= ucfirst($role) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-dark">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const form = document.querySelector("form");
    const errorMessage = document.getElementById("error-message");

    form.addEventListener("submit", function(event) {
        const inputs = form.querySelectorAll("input[required], select[required]");
        let allFilled = true;

        inputs.forEach(input => {
            if (input.value.trim() === "") {
                allFilled = false;
            }
        });

        if (!allFilled) {
            errorMessage.textContent = "Vui lòng nhập đầy đủ thông tin.";
            event.preventDefault();
        }
    });

    form.addEventListener("input", function() {
        errorMessage.textContent = "";
    });
</script>

<style>
    .modal-content {
        border-radius: 8px; /* Bo góc cho modal */
    }

    .modal-header {
        background-color: #343a40; /* Màu nền header */
        color: white; /* Màu chữ trong header */
    }

   

    .form-label {
        font-weight: bold; /* Làm đậm nhãn */
    }

    .btn-dark {
        background-color: #343a40; /* Màu nút thêm */
        border: none; /* Không có viền */
    }

    .btn-dark:hover {
        background-color: #495057; /* Màu nền khi hover */
    }

    #error-message {
        margin-bottom: 15px; /* Khoảng cách dưới thông báo lỗi */
    }
</style>