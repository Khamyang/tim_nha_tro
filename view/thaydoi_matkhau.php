<div>
    <div class="container mt-4 mb-4">
        <div class="col-sm-12">
            <a href="./?page=home">Trang chủ</a> <i class="fa fa-angles-right"></i> <a class="text-primary" href="./?page=thaydoi_matkhau">Thay đổi mật khẩu </a>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card p-5">
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
                        <div class="mt-3 text-end">
                            <button type="button" onclick="window.location.href='?page=home'" class="btn btn-warning" style="width: 15%;">Hủy</button>
                            <button type="submit" class="btn btn-success" style="width: 15%;">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3"></div>
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
                                location.href = '?page=home';
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