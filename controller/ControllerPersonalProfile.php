<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../layout/swal.js"> </script>
<?php 
include "../connect/connect.php";
session_start();
$matk = $_SESSION['matk'];
    $rand = rand(0,100);
    if(isset($_REQUEST['act'])){
        $a = $_REQUEST['act'];
        
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
            $new_profile_img_name = $_POST['profile_img_old'];
        } else if(!empty($profile_img_old) && !empty($profile_img_name)){
            unlink($path_unlink . $profile_img_old);
            $new_profile_img_name  = $rand."_". $profile_img_name;
        } else if(empty($profile_img_old) && !empty($profile_img_name)){
            $new_profile_img_name  = $rand."_". $profile_img_name;
        }
        if(file_exists($uploaddir . $new_profile_img_name)) {
            $sql = "UPDATE tb_taikhoan SET HoTen = '$HoTen', NgaySinh = '$NgaySinh', GioiTinh='$GioiTinh', SoDT='$SoDT', DiaChi='$DiaChi', profile_img = '$new_profile_img_name' WHERE MaTK = $matk";
                $query = mysqli_query($conn, $sql);
                if($query){
                    if($a == 'admin'){
                        // echo"<script>alert('$a')</script>";
                        // echo "<script>window.location.href='../../../view/admin/?page=profile'</script>";
                        header("Location: ../view/admin/?page=profile");
                    } 
                    else {
                        // header("Location: ../?page=profile");
                        echo "<script>window.location.href='../?page=profile'</script>";
                    }
                    
                } else {
                    echo "<script>swal_err('Cập nhập không thành công')</script>";
                }
        } else {
            $uploadfile = $uploaddir.$new_profile_img_name;
            if(move_uploaded_file($profile_img_tmp, $uploadfile) == true){
                $sql = "UPDATE tb_taikhoan SET HoTen = '$HoTen', NgaySinh = '$NgaySinh', GioiTinh='$GioiTinh', SoDT='$SoDT', DiaChi='$DiaChi', profile_img = '$new_profile_img_name' WHERE MaTK = $matk";
                $query = mysqli_query($conn, $sql);
                if($query){
                    if($a == 'admin'){
                        // echo"<script>alert('$a')</script>";
                        // echo "<script>window.location.href='../../../view/admin/?page=profile'</script>";
                        header("Location: ../view/admin/?page=profile");
                    } 
                    else {
                        // header("Location: ../?page=profile");
                        echo "<script>window.location.href='../?page=profile'</script>";
                    }
                } else {
                    echo "<script>swal_err('Cập nhập không thành công')</script>";
                }
            } else {
                
            }
        }
    }
?>
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="../layout/swal.js"> </script>
</body>