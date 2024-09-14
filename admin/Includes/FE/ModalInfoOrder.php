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
    } else {
        echo "ERROR: Không nhận được id";
        exit();
    }
    ?>
 <div class="modal fade" id="infoOrder<?= $donhang['donhang_ma'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="staticBackdropLabel">Thông tin đơn hàng</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

             </div>
             <div id="error-message" class="text-danger" style="text-align:center ;font-size:25px"></div>
             <div class="modal-body">
                 <div class="menu-content  ">
                       <div class="input-group mb-3">
                             <span class="input-group-text" id="inputGroup-sizing-default">Mã đơn hàng:<span style="color: red;">*</span></span>
                             <p><?= $donhang['donhang_ma'] ?></p>
                         </div>
                         <div class="input-group mb-3">
                             <span class="input-group-text" id="inputGroup-sizing-default">Tên hàng<span style="color: red;">*</span></span>
                             <input name="sp_soluong" type="number" min='0' value="1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                         </div>
                         <div class="input-group mb-3">
                             <span class="input-group-text" id="inputGroup-sizing-default">Người đặt<span style="color: red;">*</span></span>
                             <p><?= $donhang['name'] ?></p>
                         </div>
                         <div class="input-group mb-3">
                             <span class="input-group-text" id="inputGroup-sizing-default">Địa chỉ<span style="color: red;">*</span></span>
                             <p><?= $address == null ? "NULL" : $address ?></p>
                         </div>
                         <div class="input-group mb-3">
                             <span class="input-group-text" id="inputGroup-sizing-default">Ngày đặt<span style="color: red;">*</span></span>
                             <p><?= $donhang['timeorder'] ?></p>
                         </div>
                         <div class="mb-3">
                             <span class="input-group-text" id="inputGroup-sizing-default">Trạng thái<span style="color: red;">*</span></span>
                             <p><?= $donhang['donhang_trangthai'] ?></p>
                         </div>
                         <div class="mb-3">
                             <span class="input-group-text" id="inputGroup-sizing-default">Thành tiền<span style="color: red;">*</span></span>
                             <p><?= $donhanggia ?></p>
                         </div>
                         <div class="input-group mb-3">
                             <span class="input-group-text" id="inputGroup-sizing-default">Số lượng hàng<span style="color: red;">*</span></span>
                             <p><?= $donhang['donhang_soluongsp'] ?></p>
                         </div>
                      

                 </div>
             </div>

         </div>
     </div>
 </div>