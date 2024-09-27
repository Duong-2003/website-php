<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Users List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        p#notifi_log {
            font-weight: 900;
            font-size: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php 
    include('./MenuAdmin.php');    
    include("../Includes/FE/ModalAddUsers.php"); 
    include('../Includes/conn/connect.php');

    // Lấy danh sách người dùng
    $sql = "SELECT * FROM users";
    $result = $connect->query($sql);

    $ListUsers = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $ListUsers[] = array(
            'name' => htmlspecialchars($row['name']),
            'pass' => htmlspecialchars($row['pass']), // Nên ẩn mật khẩu
            'address' => htmlspecialchars($row['address']),
            'role' => $row['role'],
            'email' => htmlspecialchars($row['email']),
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
        <h1 class="text-center">Danh sách người dùng</h1>
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
                    <th>Quyền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ListUsers as $user) : ?>
                    <tr>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>******</td> <!-- Ẩn mật khẩu -->
                        <td><?= $user['address'] ?></td>
                        <td><?= ($user['role'] === 'admin' ? 'Admin' : 'User') ?></td>
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

    <script>
        $(document).ready(function () {
            $('#danhsach').DataTable({
                "language": {
                    "lengthMenu": "Hiện _MENU_ người dùng trên mỗi trang",
                    "zeroRecords": "Không tìm thấy người dùng nào",
                    "info": "Hiển thị trang _PAGE_ của _PAGES_",
                    "infoEmpty": "Không có người dùng",
                    "infoFiltered": "(lọc từ _MAX_ tổng số người dùng)",
                    "search": "Tìm kiếm:",
                    "paginate": {
                        "next": "Tiếp",
                        "previous": "Trước"
                    }
                }
            });
        });
    </script>
</body>

</html>