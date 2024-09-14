<?php
include_once($linkconnWebsite);

if (isset($loggedInUsername)) {
    $name = $loggedInUsername;
    $sql =  "SELECT * FROM users WHERE name = '$name'";
    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
}


?>
<div style="z-index: 10000;" class="modal fade" id="User" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="margin: 150px 0px;">
            <div class="modal-header" >
                <h1 class="modal-title "style="font-size: 20px;" id="">Thông tin người dùng</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div id="error-message" class="text-danger" style="text-align:center ;font-size:25px"></div>
            <div class="modal-body">
                <div class="menu-content  ">
                    <form action=<?= $linkBE . "Add_product.php" ?> method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <img src="https://avatars.githubusercontent.com/u/125018793?s=400&u=d66a7dc1d555eb23d223fe07b638e9701a5735be&v=4" alt="" width="32" height="32" class="rounded-circle me-2">
                            <p style="font-size: 20px;">Tên đăng nhập: </p>
                            <p style="font-size: 20px;"> <?= $user['name'] ?></p>
                        </div>

                        <div class="input-group mb-3">

                            <span class="input-group-text" id="email">Email<span style="color: red;">*</span></span>
                            <input name="email" type="email" class="form-control" value="<?php echo $user['email']; ?>">
                            <a href="">  <button type="button" class="btn btn-dark">Đổi Email</button></a>
                        </div>
                        

                        <div class="input-group mb-3">

                            <span class="input-group-text" id="address">Địa chỉ</span>
                            <input name="address" type="text" class="form-control" value="<?php echo $user['address']; ?>">
                           <a href=""> <button type="button" class="btn btn-dark">Đổi địa chỉ</button></a>
                        </div>


                        <div class="input-group mb-3">
                            <a href="">  <button type="button" class="btn btn-dark">Đổi mật khẩu</button></a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>