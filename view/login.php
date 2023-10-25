<section class="mt-5 mb-5">
    <div class="d-flex justify-content-center">
        <div class="col-sm-12" style="width: 900px;">
            <form action="" method="post">
                <div class="row border border-success rounded">
                    <div class="col-sm-6 p-0 bg-light" style="width: 50%;height:auto">
                        <div id="img1" hidden>
                            <img src="image/vt-image.jpg" class="mw-100" alt="" height="400px">
                        </div>
                        <div class="p-4" id="form-signin">
                            <div>
                                <center>
                                    <h4 style="color: #f65129;">Đăng nhập</h4>
                                </center>
                            </div>
                            <div class="p-2">
                                <div class="form-group ">
                                    <label for="username"> Tên đăng nhập</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập">
                                    <span class="text-danger" id="username_err"></span>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="password"> Mật khẩu</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Tên đăng nhập">
                                    <span class="text-danger" id="password_err"></span>
                                </div>
                                <br>
                                <div>
                                    <input type="checkbox"><span class="ms-2">nhớ mật khẩu</span>
                                </div>
                                <br>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-success" name="signin" id="signin" value="Đăng nhập">
                                </div>
                                <div>
                                    <span>Tạo mật khẩu mới <a href="javascript:void(0)" id="signup">Đăng ký</a> </span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 p-0" style="width: 50%;height:auto">
                        <div id="img2">
                            <img src="image/vt-image.jpg" class="mw-100" alt="" height="400px">
                        </div>
                        <div class="col-sm-12 p-4" style="width: 100%;height:auto" hidden id="signup-form">
                            <div>
                                <center>
                                    <h4 style="color: #f65129;">Đăng ký</h4>
                                </center>
                            </div>
                            <div class="p-2">
                                <div class="form-group ">
                                    <label for="username"> Tên đăng nhập</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập">
                                </div>

                                <div class="form-group">
                                    <label for="password"> Số điện thoại</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Tên đăng nhập">
                                </div>
                                <div class="form-group">
                                    <label for="password"> Mật khẩu</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Tên đăng nhập">
                                </div>
                                <div class="form-group">
                                    <label for="password">Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Tên đăng nhập">
                                </div>
                                <div class="float-end mt-4">
                                    <input type="submit" class="btn btn-primary" name="btnsignup" id="btnsignup" value="Đăng ký" style="width: 90px;">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#signup').click(function() {
            $('#form-signin').attr('hidden', 'hidden');
            $('#img1').removeAttr('hidden');
            $('#signup-form').removeAttr('hidden');
            $('#img2').remove();

        })
    });
</script>
<script>
    $(document).ready(function() {
        $('#signin').click(function(e) {
            e.preventDefault();
            var username = $('#username').val();
            var password = $('#password').val();
            if (username == '') {
                $('#username_err').text('Tên đăng nhập không thể để trống');
            }
            if (username == '') {
                $('#password_err').text('Mật khẩu không thể để trống');
            }
            if (username != '' && password != '') {
                $.ajax({
                    url: "./controller/ControllerLogin.php?login",
                    method: "POST",
                    data: {
                        "username": username,
                        "password": password
                    },
                    success: function(response) {
                        var res = JSON.parse(response);
                        if (res.status == 1) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.setTimeout(function() {
                                if(res.status_user == "admin"){
                                    location.href = "./view/admin/index.php"
                                }
                                if(res.status_user == "user"){
                                    location.href = "./?page=home";
                                }
                                
                            });
                        }
                        if (res.status == 0) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'Your work has been saved',
                                showConfirmButton: true,
                            })
                        }

                    }
                })
            }

        })
    });
</script>