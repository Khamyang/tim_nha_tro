<section class="card">
    <div class="d-flex justify-content-center">
        <div class="col-sm-12">
            <form action="../../controller/ControllerAddUser.php" method="post" enctype="multipart/form-data">
                <div class="row p-2 rounded">
                    <!-- <div> -->
                        
                            <?php if(isset($_SESSION['add_err'])){?>
                                <div class="col-sm-12 p-3 alert-danger rounded"><?php echo$_SESSION['add_err']; unset($_SESSION['add_err'])?></div>
                            <?php }?>
                        
                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="username">Tên đăng nhập</label>
                                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Tên đăng nhập không được trống!" required>
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="full_name">Họ và tên</label>
                                <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Họ và tên không được trống!" required>
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="password">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu không được trống!" required>
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="gioi_tinh">Quyền</label>
                                <SELECT class="form-control" id="permission" name="permission" required>
                                    <OPTION selected Value=""> - Chọn quyền -</OPTION>
                                    <OPTION Value="1">Supper Admin</OPTION>
                                    <OPTION Value="2">Admin</OPTION>
                                    <OPTION Value="3">User</OPTION>

                                </SELECT>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="profile_image">Ảnh</label>
                                <input type="file" name="profile_image" id="profile_image" class="form-control" accept="image/png, image/jpeg, image/jpg" onchange="loadFile(event)">
                                <img class="border rounded p-1" src="../../image/profile_image/user_img1.png" alt="" width="150" id="output" style="width: 150px; height: 150px; margin-top: 5px;" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="gioi_tinh">Giới tính</label>
                                <SELECT class="form-control" id="gender" name="gender">
                                    <OPTION selected Value=""> - Chọn giới tính -</OPTION>
                                    <OPTION Value="Nam">Nam</OPTION>
                                    <OPTION Value="Nữ">Nữ</OPTION>
                                    <OPTION Value="Khác">Khác</OPTION>

                                </SELECT>
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="birthday">Ngày sinh</label>
                                <input type="date" class="form-control" name="birthday" id="birthday">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="">
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="address">Địa chỉ</label>
                                <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 text-end">
                            <a href="?page=nguoi_dung" class="btn btn-danger me-3">Thoát</a>
                            <input style="float: right; margin-bottom: 8px;" type="submit" class="btn btn-success" name="add_user" id="add_user" value="Thêm">
                        </div>
                    <!-- </div> -->
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>