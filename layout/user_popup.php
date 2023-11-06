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
            
            <li><a href="#exampleModal" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-key border p-2 rounded"></i> Thay đổi mật khẩu</a></li>
            <li><a href="?page=profile"><i class="fa fa-user border p-2 rounded"></i> Thông tin cá nhân</a></li>
            <hr>
            <li align="center"><a href="./controller/ControllerLogout.php?logout"><i class="fa fa-sign-out text-danger"></i> Logout</a></li>
        </ul>
    </div>
</div>
<div class="modal fade text-black" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          
          <h5 class="modal-title" id="exampleModalLabel">Thay đổi mật khẩu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" id="form_change_pass">
          <div class="modal-body">
            <input type="hidden" name="matk" id="matk" value="<?= $_SESSION['matk'] ?>">
            <div class="row mb-2">
              <div class="col-sm-4">
                <label for="">Mật khẩu cũ</label>
              </div>
              <div class="col-sm-8">
                <input type="password" name="old_password" id="old_password" class="form-control" required>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-sm-4">
                <label for="">Mật khẩu mới</label>
              </div>
              <div class="col-sm-8">
                <input type="password" name="new_password" id="new_password" class="form-control" required>
              </div>
            </div>
            <div class="row ">
              <div class="col-sm-4">
                <label for="">Xác nhận Mật khẩu</label>
              </div>
              <div class="col-sm-8">
                <input type="password" name="comfirm_password" id="comfirm_password" class="form-control" required>
                <span class="text-danger" hidden id="comfirm_pass_err">Xác nhận Mật khẩu không đúng</span>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-success">Lưu</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function() {
      $('#form_change_pass').submit(function(e) {
        e.preventDefault();
        var matk = $("#matk").val();
        var old_pass = $('#old_password').val();
        var new_pass = $('#new_password').val();
        var comfirm_pass = $('#comfirm_password').val();

        if (new_pass != comfirm_pass) {
          $('#comfirm_pass_err').attr('hidden', false);
        } else {
          $.ajax({
            url: "controller/ControllerChangePassword.php?change_pass=1",
            type: "POST",
            data: {
              "matk": matk,
              "old_pass": old_pass,
              "new_pass": new_pass
            },
            success: function(data_res) {
              var db_res = JSON.parse(data_res);
              console.log(db_res)
              if (db_res.status == 1) {
                swal_success(db_res.msg);
                window.setTimeout(function() {
                  location.reload();
                }, 1500);
              }
              if (db_res.status == 0) {
                swal_err(db_res.msg, db_res.txt);
              }
            }
          })
        }
      })
    })
  </script>