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

    <?php include("./MenuAdmin.php"); ?>

    <script>
        var myDiv = document.getElementById("user");
        myDiv.classList.add("active");
    </script>

    <div class="container-fluid">
        <h1 class="text-center">Danh sách người dùng</h1>
        <hr style="color:red">
        <?php
   
        $notifi = isset($_GET["notifi"]) ? $_GET["notifi"] : '';
        ?>
        <p id="notifi_log" class="text-success"><?= $notifi ?></p>
  
        <div class="text-end mb-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddProduct">
                Thêm người dùng
            </button>
        </div>

        <?php include_once($linkFE . "ModalAddUsers.php"); ?>

        <?php
        include_once($linkconnPages);
        $sql = "SELECT * FROM users";
        $result = $connect->query($sql);

        $ListUsers = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $ListUsers[] = array(
                'name' => $row['name'],
                'pass' => $row['pass'],
                'address' => $row['address'],
                'role' => $row['role'],
                'email' => $row['email'],
            );
        }
        ?>

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
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['pass']) ?></td>
                        <td><?= htmlspecialchars($user['address']) ?></td>
                        <td><?= ($user['role'] ? 'admin' : 'user') ?></td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="<?= $linkBE . "DeleteSQL.php?key=name&table=users&datakey=" . urlencode($user['name']) ?>" class="btn btn-danger mx-1">Xóa</a>
                                <a href="Edit_Users.php?datakey=<?= urlencode($user['name']) ?>" class="btn btn-warning mx-1">Sửa</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
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