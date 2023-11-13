<section class="mt-5 mb-5">
    <div class="d-flex justify-content-center">
        <div class="col-sm-12" style="width: 900px;">
            <form action="../../controller/ControllerAddUser.php" method="post" enctype="multipart/form-data">
                <div class="row border border-success rounded">
                    <div class="col-sm- p-0 bg-light" style="width: 100%;height:auto">
                        <div class="p-4" id="add">
                            <center>
                                <h4 style="color: #f65129;">Thêm nhân viên mới</h4>
                            </center>
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
                                <input type="file"  name="profile_image" id="profile_image" class="form-control" accept="image/png, image/jpeg, image/jpg">
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="gioi_tinh">Giới tính</label>
                                <SELECT class="form-control" id="gender" name="gender" >
                                    <OPTION selected Value=""> - Chọn giới tính -</OPTION>
                                    <OPTION Value="Nam">Nam</OPTION>
                                    <OPTION Value="Nữ">Nữ</OPTION>
                                    <OPTION Value="Khác">Khác</OPTION>

                                </SELECT>
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="birthday">Ngày sinh</label>
                                <input type="date" class="form-control" name="birthday" id="birthday" >
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="address" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="" required>
                            </div>
                            <br>
                            <br>
                            <div class="mb-3">
                                <input style="float: right; margin-bottom: 8px;" type="submit" class="btn btn-success" name="add_user" id="add_user" value="Thêm">
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

</script>