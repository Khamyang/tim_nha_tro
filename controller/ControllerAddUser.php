<?php 
session_start();
include "../connect/connect.php";
if (isset($_POST['add_user'])) {
    $user_check = trim($_POST['user_name']);
}
$check = 0;
$sql = "SELECT TenDN FROM tb_taikhoan";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_object( $query)){
    if ($user_check == $row->TenDN) {
        $check++;
    }
}
if ($check != 0) {
    echo "<script> alert('Tên đăng nhập này đã có trong hệ thống! hãy chọn tên khác');history.back();</script>";
} else {
   if(isset($_FILES['profile_image'])){
        $errors= array();
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

         //if(empty($errors)==true) {
          $move_file = move_uploaded_file($file_tmp,"../image/profile_image/".$file_name);

            if($move_file){
                if (isset($_POST['add_user'])) {
                    $user_name = trim($_POST['user_name']);
                    $full_name = $_POST['full_name'];
                    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
                    $permission = $_POST['permission'];
                    $gender = $_POST['gender'];
                    $birthday = $_POST['birthday'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];

                    $query_insert = "INSERT INTO tb_taikhoan (MaQuyen, TenDN, profile_img, MatKhau, HoTen, GioiTinh, NgaySinh, DiaChi, SoDT) value ($permission,'$user_name','$file_name','$password','$full_name', '$gender', '$birthday', '$address', '$phone')";
                    $conn -> query($query_insert);
                    echo "<script>location='/tim_nha_tro/view/admin/?page=nhan_vien';</script>";
            
                }
            } else {
                    if (isset($_POST['add_user'])) {
                    $user_name = trim($_POST['user_name']);
                    $full_name = $_POST['full_name'];
                    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
                    $permission = $_POST['permission'];
                    $gender = $_POST['gender'];
                    $birthday = $_POST['birthday'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];

                    $query_insert = "INSERT INTO tb_taikhoan (MaQuyen, TenDN, profile_img, MatKhau, HoTen, GioiTinh, NgaySinh, DiaChi, SoDT) value ($permission,'$user_name', '','$password','$full_name', '$gender', '$birthday', '$address', '$phone')";
                    $conn -> query($query_insert);
                    echo "<script>location='/tim_nha_tro/view/admin/?page=nhan_vien';</script>";

                }
            }
         //}else{
        //echo "<script>alert('Anh không đúng dạng');location='/tim_nha_tro/view/admin/?page=add_nhan_vien';</script>";
        // }
    }
}

 ?>