<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../layout/swal.js"> </script>
<?php 
include "../connect/connect.php";
session_start();
$matk = $_SESSION['matk'];
    $rand = rand(0,100);
    if(isset($_POST['btn_save_pro'])){
        $profile_img_name = $_FILES['profile_img']['name'];
        $profile_img_tmp = $_FILES['profile_img']['tmp_name'];
        $profile_img_old = $_POST['profile_img_old'];
        $HoTen = $_POST['HoTen'];
        $NgaySinh = $_POST['NgaySinh'];
        $GioiTinh = $_POST['GioiTinh'];
        $SoDT = $_POST['SoDT'];
        $DiaChi = $_POST['DiaChi'];
        $uploaddir = "../image/profile_image/";
        $path_unlink = "../image/profile_image/";

        if(empty($profile_img_name) && !empty($profile_img_old)){
            $profile_img_name = $profile_img_old;
            if(file_exists($path_unlink . $profile_img_old)){
                unlink($path_unlink . $profile_img_old);
            } 
        }
        $new_profile_img_name  = $rand."_". $profile_img_name;
        

        if(file_exists($uploaddir . $new_profile_img_name)) {
            echo "<script>swal_err('Đã có file này trong hệ thống rồi, hãy thử đổi tên khác')</script>";
        } else {
            $uploadfile = $uploaddir.$new_profile_img_name;
            if(move_uploaded_file($profile_img_tmp, $uploadfile) == true){
                $sql = "UPDATE tb_taikhoan SET HoTen = '$HoTen', NgaySinh = '$NgaySinh', GioiTinh='$GioiTinh', SoDT='$SoDT', DiaChi='$DiaChi', profile_img = '$new_profile_img_name' WHERE MaTK = $matk";
                $query = mysqli_query($conn, $sql);
                if($query){
                    header("Location: ../?page=profile");
                } else {
                    echo "<script>swal_err('Cập nhập không thành công')</script>";
                }
            } else {
                $sql = "UPDATE tb_taikhoan SET HoTen = '$HoTen', NgaySinh = '$NgaySinh', GioiTinh='$GioiTinh', SoDT='$SoDT', DiaChi='$DiaChi', profile_img = '$new_profile_img_name' WHERE MaTK = $matk";
                $query = mysqli_query($conn, $sql);
                if($query){
                    header("Location: ../?page=profile");
                } else {
                    echo "<script>swal_err('Cập nhập không thành công')</script>";
                }
            }
        }
    }
?>
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="../layout/swal.js"> </script>
</body>