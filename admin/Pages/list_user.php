<?php
include('./admin_website.php');
include('../../connect_SQL/connect.php');

// Lấy danh sách hồ sơ người dùng với phân trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Lấy số trang từ URL
$limit = 10; // Số bản ghi trên mỗi trang
$offset = ($page - 1) * $limit; // Tính toán offset

// Lấy danh sách hồ sơ
$sqlProfiles = "SELECT * FROM profile_user LIMIT ? OFFSET ?";
$stmt = $connect->prepare($sqlProfiles);
$stmt->bind_param("ii", $limit, $offset);
$stmt->execute();
$resultProfiles = $stmt->get_result();

$danhsachProfiles = [];

// Chuyển dữ liệu thành mảng
while ($row = $resultProfiles->fetch_assoc()) {
    $danhsachProfiles[] = array(
        'profile_id' => (int) $row['profile_id'],
        'user_id' => (int) $row['user_id'],
        'date_of_birth' => htmlspecialchars($row['date_of_birth']),
        'gender' => htmlspecialchars($row['gender']),
        'bio' => htmlspecialchars($row['bio']),
        'website' => htmlspecialchars($row['website']),
        'location' => htmlspecialchars($row['location']),
        'created_at' => htmlspecialchars($row['created_at']),
        'updated_at' => htmlspecialchars($row['updated_at']),
        'phone' => htmlspecialchars($row['phone']),
    );
}

// Giải phóng biến không cần thiết
$stmt->close();
?>

<div class="container">
    <h1 class="text-center mb-4">Danh Sách Hồ Sơ Người Dùng</h1>
    <div class="text-end mb-3">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddProfile">
            Thêm Hồ Sơ
        </button>
    </div>
    <table id="danhsach" class="table table-striped table-bordered table-hover">
        <thead>
            <tr style="font-size: larger;">
                <th>ID Hồ Sơ</th>
                <th>ID Người Dùng</th>
                <th>Ngày Sinh</th>
                <th>Giới Tính</th>
                <th>Tiểu Sử</th>
                <th>Website</th>
                <th>Địa Điểm</th>
                <th>Số Điện Thoại</th>
                <th>Ngày Tạo</th>
                <th>Cập Nhật</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($danhsachProfiles as $profile) {
                echo "<tr>
                    <td>{$profile['profile_id']}</td>
                    <td>{$profile['user_id']}</td>
                    <td>{$profile['date_of_birth']}</td>
                    <td>{$profile['gender']}</td>
                    <td>{$profile['bio']}</td>
                    <td>{$profile['website']}</td>
                    <td>{$profile['location']}</td>
                    <td>{$profile['phone']}</td>
                    <td>{$profile['created_at']}</td>
                    <td>{$profile['updated_at']}</td>
                    <td>
                        <div class='d-flex justify-content-center'>
                            <a href='../Includes/BE/delete_SQL.php?key=profile_id&table=profile_user&datakey=" . urlencode($profile['profile_id']) . "' class='btn btn-danger mx-1'>Xóa</a>
                            <a href='form_profiles.php?datakey=" . urlencode($profile['profile_id']) . "' class='btn btn-warning mx-1'>Sửa</a>
                        </div>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Modal for Adding Profile -->
<?php include('../Includes/FE/modal_add_profile.php'); ?>

<script>
    $(document).ready(function () {
        $('#danhsach').DataTable({
            "language": {
                "lengthMenu": "Hiện _MENU_ hồ sơ trên mỗi trang",
                "zeroRecords": "Không tìm thấy hồ sơ nào",
                "info": "Hiển thị trang _PAGE_ của _PAGES_",
                "infoEmpty": "Không có hồ sơ",
                "infoFiltered": "(lọc từ _MAX_ tổng số hồ sơ)",
                "search": "Tìm kiếm:",
                "paginate": {
                    "next": "Tiếp",
                    "previous": "Trước"
                }
            },
            "paging": true, // Bật phân trang
            "searching": true // Bật tìm kiếm
        });
    });

    // Đánh dấu menu hiện tại
    document.getElementById("profile").classList.add("active");
    document.getElementById("profile-collapse").classList.add("show");
</script>