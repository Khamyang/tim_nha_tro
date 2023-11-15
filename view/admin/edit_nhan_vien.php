<?php
    include "../../connect/connect.php";
    if (isset($_GET['edit_nhan_vien'])) {
        $id = $_GET['edit_nhan_vien'];
        $sql = "SELECT * FROM tb_taikhoan WHERE MaTK = $id";
        $result = mysqli_query($conn, $sql);
        $row_ed = mysqli_fetch_assoc($result);

    }
?>
<section class="mt-5 mb-5">
    <div class="d-flex justify-content-center">
        <div class="col-sm-12" style="width: 900px;">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row border border-success rounded">
                    <div class="col-sm- p-0 bg-light" style="width: 100%;height:auto">
                        <div class="p-4" id="add">
                            <center>
                                <h4 style="color: #f65129;">Sửa thông tin nhân viên</h4>
                            </center>
                            <div class="form-group ">
                                <label for="username">Tên đăng nhập</label>
                                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Tên đăng nhập không được trống!" value="<?php echo $row_ed['TenDN']; ?>" required>
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="full_name">Họ và tên</label>
                                <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Họ và tên không được trống!" value="<?php  echo $row_ed['HoTen']; ?>" required>
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="password">Đặt lại mật khẩu</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Để trống nếu không cần đặt lại mật khẩu">
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="gioi_tinh">Quyền</label>
                                <SELECT class="form-control" id="permission" name="permission" required>
                                    <OPTION selected Value="<?php  echo $row_ed['MaQuyen']; ?>"> <?php if ($row_ed['MaQuyen'] == 1) {echo 'Supper Admin';} else if ($row_ed['MaQuyen'] == 2){echo "Admin";} else {echo "User";} ?></OPTION>
                                    <OPTION Value="1">Supper Admin</OPTION>
                                    <OPTION Value="2">Admin</OPTION>
                                    <OPTION Value="3">User</OPTION>

                                </SELECT>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="profile_image">Ảnh</label>
                                <input type="file"  name="profile_image" id="profile_image" class="form-control" accept="image/png, image/jpeg, image/jpg" onchange="loadFile(event)">
                                <img class="border rounded p-1" src="../../image/profile_image/<?php  echo $row_ed['profile_img']; ?>" alt="" width="150" id="output" style="width: 150px; height: 150px; margin-top: 5px;" />
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="gioi_tinh">Giới tính</label>
                                <SELECT class="form-control" id="gender" name="gender" >
                                    <OPTION selected Value="<?php  echo $row_ed['GioiTinh']; ?>"><?php  echo $row_ed['GioiTinh']; ?></OPTION>
                                    <OPTION Value="Nam">Nam</OPTION>
                                    <OPTION Value="Nữ">Nữ</OPTION>
                                    <OPTION Value="Khác">Khác</OPTION>

                                </SELECT>
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="birthday">Ngày sinh</label>
                                <input type="date" class="form-control" name="birthday" id="birthday" value="<?php  echo $row_ed['NgaySinh']; ?>">
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="address" value="<?php  echo $row_ed['DiaChi']; ?>">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="" value="<?php  echo $row_ed['SoDT']; ?>">
                            </div>
                            <br>
                            <br>
                            <div class="mb-3">
                                <input style="float: right; margin-bottom: 8px;" type="submit" class="btn btn-success" name="edit_user" id="edit_user" value="Sửa">
                                <button  type="cancel" class="btn btn-success" id="quay_lai" name="quay_lai" >Quay lại</button>
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
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>



<?php
    $image_old = $row_ed['profile_img'];
    if(isset($_FILES['profile_image'])){
        $file_name = $_FILES['profile_image']['name'];
        $file_size = $_FILES['profile_image']['size'];
        $file_tmp = $_FILES['profile_image']['tmp_name'];
        $file_type = $_FILES['profile_image']['type'];
        $file_ext=pathinfo($file_name, PATHINFO_EXTENSION);

        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        // if($file_size > 2097152) {
        //  $errors[]='File size must be excately 2 MB';
        // }

         if($file_name != "") {
          //unlink("../../image/profile_image/".$image_old);
          $move_file = move_uploaded_file($file_tmp,"../../image/profile_image/".$file_name);
            if($move_file){
                if (isset($_POST['edit_user'])) {
                    $user_name = trim($_POST['user_name']);
                    $full_name = $_POST['full_name'];
                    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
                    $permission = $_POST['permission'];
                    $gender = $_POST['gender'];
                    $birthday = $_POST['birthday'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    if (!empty($_POST['password'])) {
                        $query_update = "UPDATE tb_taikhoan SET MaQuyen = $permission, TenDN = '$user_name', profile_img = '$file_name', MatKhau = '$password', HoTen = '$full_name', GioiTinh = '$gender' , NgaySinh = '$birthday', DiaChi = '$address', SoDT = '$phone' WHERE MaTK = $id";
                    } else {
                        $query_update = "UPDATE tb_taikhoan SET MaQuyen = $permission, TenDN = '$user_name', profile_img = '$file_name', HoTen = '$full_name', GioiTinh = '$gender' , NgaySinh = '$birthday', DiaChi = '$address', SoDT = '$phone' WHERE MaTK = $id";
                    }
                    
                    $conn -> query($query_update);
            
                    echo "<script>location='/tim_nha_tro/view/admin/?page=nhan_vien';</script>";
                    // echo "<script>alert(".$matk.")</script>";
            
                }
            }
         }else{
          
            if (isset($_POST['edit_user'])) {
                $user_name = trim($_POST['user_name']);
                $full_name = $_POST['full_name'];
                $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
                $permission = $_POST['permission'];
                $gender = $_POST['gender'];
                $birthday = $_POST['birthday'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                if (!empty($_POST['password'])) {
                    $query_update = "UPDATE tb_taikhoan SET MaQuyen = $permission, TenDN = '$user_name', MatKhau = '$password', HoTen = '$full_name', GioiTinh = '$gender' , NgaySinh = '$birthday', DiaChi = '$address', SoDT = '$phone' WHERE MaTK = $id";
                } else {
                    $query_update = "UPDATE tb_taikhoan SET MaQuyen = $permission, TenDN = '$user_name', HoTen = '$full_name', GioiTinh = '$gender' , NgaySinh = '$birthday', DiaChi = '$address', SoDT = '$phone' WHERE MaTK = $id";
                }
                
                $conn -> query($query_update);
        
                echo "<script>location='/tim_nha_tro/view/admin/?page=nhan_vien';</script>";
                // echo "<script>alert(".$matk.")</script>";

            }

         }
    } else {
            if (isset($_POST['edit_user'])) {
                $user_name = trim($_POST['user_name']);
                $full_name = $_POST['full_name'];
                $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
                $permission = $_POST['permission'];
                $gender = $_POST['gender'];
                $birthday = $_POST['birthday'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                if (!empty($_POST['password'])) {
                    $query_update = "UPDATE tb_taikhoan SET MaQuyen = $permission, TenDN = '$user_name', MatKhau = '$password', HoTen = '$full_name', GioiTinh = '$gender' , NgaySinh = '$birthday', DiaChi = '$address', SoDT = '$phone'";
                } else {
                    $query_update = "UPDATE tb_taikhoan SET MaQuyen = $permission, TenDN = '$user_name', HoTen = '$full_name', GioiTinh = '$gender' , NgaySinh = '$birthday', DiaChi = '$address', SoDT = '$phone'"; 
                }
                
                $conn -> query($query_update);
        
                echo "<script>location='/tim_nha_tro/view/admin/?page=nhan_vien';</script>";
                // echo "<script>alert(".$matk.")</script>";

            }
    }


//QuayLai
    if (isset($_POST['quay_lai'])) {
        echo "<script>location='/tim_nha_tro/view/admin/?page=nhan_vien';</script>";
    }
 ?>
