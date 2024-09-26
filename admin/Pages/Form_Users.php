<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Danh Sách Người Dùng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.1/css/bootstrap.min.css">
    <style>
        .content {
            padding: 100px 30px;
        }
        .error-message {
            text-align: center;
            font-size: 25px;
        }
    </style>
</head>

<body>
    <div class="content">
        <?php
           include('../Includes/conn/connect.php');

        // Lấy dữ liệu người dùng
        $dataKey = $_GET['datakey'];
        $sql = "SELECT * FROM users WHERE name = '$dataKey'";
        $result = $connect->query($sql);

        if ($result->num_rows != 1) {
            echo ('<div class="alert alert-danger">ERROR: Người dùng không tồn tại.</div>');
            exit;
        }
        $user = $result->fetch_assoc();
        ?>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Tên đăng nhập</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Địa chỉ</th>
                    <th>Quyền</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['pass']) ?></td>
                    <td><?= htmlspecialchars($user['address']) ?></td>
                    <td><?= htmlspecialchars($user['role']) ?></td>
                </tr>
            </tbody>
        </table>

        <div>
            <h5 class="mb-3 text-dark">Sửa Người Dùng</h5>
            <div id="error-message" class="text-danger error-message"></div>
            <div class="text-danger error-message">
                <?= isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '' ?>
            </div>
            <form action="../Includes/BE/Edit_Users.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên đăng nhập<span class="text-danger">*</span></label>
                    <input value="<?= htmlspecialchars($user['name']) ?>" name="name" type="text" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                    <input value="<?= htmlspecialchars($user['email']) ?>" name="email" type="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="pass" class="form-label">Mật khẩu<span class="text-danger">*</span></label>
                    <input value="<?= htmlspecialchars($user['pass']) ?>" name="pass" type="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ<span class="text-danger">*</span></label>
                    <input value="<?= htmlspecialchars($user['address']) ?>" name="address" type="text" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Quyền<span class="text-danger">*</span></label>
                    <select name="role" class="form-select" aria-label="Quyền" required>
                        <?php
                        $allowedRoles = ['Admin', 'User', 'Guest'];
                        foreach ($allowedRoles as $role) : ?>
                            <option value="<?= $role ?>" <?= ($role === $user['role']) ? 'selected' : '' ?>><?= $role ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-dark">Sửa</button>
            </form>
        </div>
    </div>

    <script>
        function MoveToError() {
            var targetElement = document.getElementById("error-message");
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 150,
                    behavior: "smooth"
                });
            }
        }

        const form = document.querySelector("form");
        form.addEventListener("submit", function(event) {
            const inputs = form.querySelectorAll('input, select');
            let allFilled = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    allFilled = false;
                }
            });

            if (!allFilled) {
                document.getElementById("error-message").textContent = "Vui lòng nhập đầy đủ thông tin.";
                MoveToError();
                event.preventDefault();
            }
        });

        form.addEventListener("input", function() {
            document.getElementById("error-message").textContent = "";
        });
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>