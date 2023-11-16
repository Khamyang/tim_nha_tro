<?php 
session_start();
include "../connect/connect.php";
if (isset($_POST['btn_luu'])) {
    $kiem_tra_TK = trim($_POST['TenDN']);

}

$sql = "SELECT MaTK FROM tb_taikhoan WHERE TenDN = '$kiem_tra_TK'";
$result = mysqli_query($conn, $sql);
$row_tk = mysqli_fetch_assoc($result);
if (empty($row_tk['MaTK'])) {
	echo "<script> alert('Tên tài khoản này không có trong hệ thống, hãy kiểm tra lại!');location='../view/admin/?page=don_dangky&them_don_dangky';</script>";
} else {
   $MaTK = $row_tk['MaTK'];
   if(isset($_FILES['anh'])){
        $errors= array();
        $file_name = $_FILES['anh']['name'];
        $file_size = $_FILES['anh']['size'];
        $file_tmp = $_FILES['anh']['tmp_name'];
        $file_type = $_FILES['anh']['type'];
        $file_ext=pathinfo($file_name, PATHINFO_EXTENSION);

        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

          $move_file = move_uploaded_file($file_tmp,"../image/order_image/".$file_name);

            if($move_file){
                if (isset($_POST['btn_luu'])) {
                    $TenDN = trim($_POST['TenDN']);
                    $SoTien = $_POST['SoTien'];
                    $NgayDK = $_POST['NgayDK'];
                    $NgayHH = $_POST['NgayHH'];
                    $SoTien = $_POST['SoTien'];

                    $query_insert = "INSERT INTO tb_dondk (MaTK, HinhTT, NgayDK, NgayHetHan, SoTien) value ($MaTK,'$file_name', '$NgayDK', '$NgayHH', $SoTien)";
                    $conn -> query($query_insert);
                    echo "<script>location='/tim_nha_tro/view/admin/?page=don_dangky';</script>";
            
                }
            } else {
                if (isset($_POST['btn_luu'])) {
                    $TenDN = trim($_POST['TenDN']);
                    $SoTien = $_POST['SoTien'];
                    $NgayDK = $_POST['NgayDK'];
                    $NgayHH = $_POST['NgayHH'];
                    $SoTien = $_POST['SoTien'];

                    $query_insert = "INSERT INTO tb_dondk (MaTK, NgayDK, NgayHetHan, SoTien) value ($MaTK, '$NgayDK', '$NgayHH', $SoTien)";
                    $conn -> query($query_insert);
                    echo "<script>location='/tim_nha_tro/view/admin/?page=don_dangky';</script>";
            
                }
            }
    }
}


?>