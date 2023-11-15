<?php 
session_start();
    include "../connect/connect.php";
    $matk = $_SESSION['matk'];
    if(isset($_FILES['image'])){

        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext=pathinfo($file_name, PATHINFO_EXTENSION);

        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        // if($file_size > 2097152) {
        //  $errors[]='File size must be excately 2 MB';
        // }

         //if(empty($errors)==true) {
          $move_file = move_uploaded_file($file_tmp,"../image/product_image/".$file_name);
            if($move_file){ 
                if (isset($_POST['add_home'])) {
                    $home_name = $_POST['home_name'];
                    $home_details = $_POST['home_details'];
                    $fee = $_POST['fee'];
                    $home_address = $_POST['home_address'];
                    $sl_huyen = $_POST['sl_huyen'];
                    $sl_ban = $_POST['sl_ban'];
                    $query_insert = "INSERT INTO tb_thong_tin_nha (MaTK, TenNha, HinhAnh, DiaChi, Gia, MoTa, MaHuyen, MaBan) value ($matk,'$home_name','$file_name','$home_address','$fee', '$home_details', $sl_huyen, $sl_ban)";
                    $conn -> query($query_insert);
            
                    echo "<script>location='../index.php?page=my_home';</script>";
                    // echo "<script>alert(".$matk.")</script>";
            
                }
            } else {
                    if (isset($_POST['add_home'])) {
                    $home_name = $_POST['home_name'];
                    $home_details = $_POST['home_details'];
                    $fee = $_POST['fee'];
                    $home_address = $_POST['home_address'];
                    $sl_huyen = $_POST['sl_huyen'];
                    $sl_ban = $_POST['sl_ban'];
                    $query_insert = "INSERT INTO tb_thong_tin_nha (MaTK, TenNha, HinhAnh, DiaChi, Gia, MoTa, MaHuyen, MaBan) value ($matk,'$home_name','','$home_address','$fee', '$home_details', $sl_huyen, $sl_ban)";
                    $conn -> query($query_insert);

                    echo "<script>location='../index.php?page=my_home';</script>";
                    // echo "<script>alert(".$matk.")</script>";

                }
            }
         //}else{
         // echo "<script>alert('Anh không đúng dạng');location='../index.php?page=add_home';</script>";
         //}
    }
     //echo "<script> location='../index.php?page=add_home'; </script>";
 ?>