<div class="d-flex">
    <div class="pe-2 d-flex flex-column justify-content-center align-items-center">
        <label class="text-white">Chào bạn: <span class="text-danger"><?= $_SESSION['username'] ?></span></label>
    </div>
    <div id="user_popup">
        <?php
        $matk = $_SESSION['matk'];
        $sql_img_pro  = mysqli_query($conn, "SELECT profile_img FROM tb_taikhoan WHERE MaTK = $matk");
        $res_pro_img = mysqli_fetch_object($sql_img_pro);
        $profile = $res_pro_img->profile_img;
        $profile_img =  '<img class="rounded-circle" src="./image/profile_image/' . $profile . '" alt="" style="width: 35px; height: 35px">';
        ?>
        <span class="float-end bg-primary d-flex flex-column justify-content-center align-items-center rounded-circle" style="height: 30px; width:30px;margin-top:5px; margin-right: 5px;"> <?= (!empty($profile) ? $profile_img : "<i class='fa fa-user'></i>"); ?></span>
        <ul id="list_user_popup">
            
            <li><a href="?page=thaydoi_matkhau"><i class="fa fa-key border p-2 rounded"></i> Thay đổi mật khẩu</a></li>
            <li><a href="?page=profile"><i class="fa fa-user border p-2 rounded"></i> Thông tin cá nhân</a></li>
            <hr>
            <li align="center"><a href="./controller/ControllerLogout.php?logout"><i class="fa fa-sign-out text-danger"></i> Logout</a></li>
        </ul>
    </div>
</div>
  