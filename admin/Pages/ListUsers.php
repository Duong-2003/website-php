<?php 
include('./MenuAdmin.php');    
include("../Includes/FE/ModalAddUsers.php"); 
include('../Includes/conn/connect.php');

// Retrieve the list of users
$sql = "SELECT * FROM users";
$result = $connect->query($sql);

$ListUsers = [];
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $ListUsers[] = array(
        'name' => htmlspecialchars($row['name']),
        'email' => htmlspecialchars($row['email']),
        'address' => htmlspecialchars($row['address']),
        'phone' => htmlspecialchars($row['phone']),
        'avatar' => htmlspecialchars($row['avatar']),
        'role' => (int)$row['role'], 
    );
}
?>

<script>
    $(document).ready(function () {
        var myDiv = document.getElementById("user");
        myDiv.classList.add("active");
    });
</script>

<div class="container">
    <h1 class="text-center">Danh mục người dùng</h1>
    <hr style="color:red">
    <?php
    $notifi = isset($_GET["notifi"]) ? htmlspecialchars($_GET["notifi"]) : '';
    ?>
    <p id="notifi_log" class="text-success"><?= $notifi ?></p>

    <div class="text-end mb-3">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddProduct">
            Thêm người dùng
        </button>
    </div>

    <table id="danhsach" class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Tên đăng nhập</th>
                <th>Email</th>
                <th>Mật khẩu</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Ảnh</th>
                <th>Quyền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ListUsers as $user) : ?>
                <tr>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>******</td> <!-- Password is hidden -->
                    <td><?= $user['address'] ?></td>
                    <td><?= $user['phone'] ?></td>
                    <td><?= $user['avatar'] ?></td>
                    <td><?= ($user['role'] === 1 ? 'ADMIN' : 'USER') ?></td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="../Includes/BE/DeleteSQL.php?key=name&table=users&datakey=<?= urlencode($user['name']) ?>" class="btn btn-danger mx-1">Xóa</a>
                            <a href="Form_Users.php?datakey=<?= urlencode($user['name']) ?>" class="btn btn-warning mx-1">Sửa</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>

</html>