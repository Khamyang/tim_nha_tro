<?php 
    include "../connect/connect.php";

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

        if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
        }

         if(empty($errors)==true) {
          move_uploaded_file($file_tmp,"../image/product_image/".$file_name);
        //  echo "<script>alert('Up anh thanh cong');location='../index.php?page=add_home';</script>";
         }else{
          echo "<script>alert('Hinh khong dung dang');location='../index.php?page=add_home';</script>";
         }
    } else {
        echo "<script>alert('Hay chon anh');location='../index.php?page=add_home';</script>";
    }



    if (isset($_POST['add_home'])) {
        $home_name = $_POST['home_name'];
        $home_details = $_POST['home_details'];
        $fee = $_POST['fee'];
        $home_address = $_POST['home_address'];
        $sl_huyen = $_POST['sl_huyen'];
        $sl_ban = $_POST['sl_ban'];

            // if (isset($_SESSION['username'])) {
            //     $TenTK = $_SESSION['username'];
            // }
            // $sql_tk = mysqli_query($conn, "SELECT * FROM tb_taikhoan where TenTK = '$TenTK'");
            // if ($sql_tk->num_rows > 0) {
            //     while ($row = mysqli_fetch_object($sql)) {
            //         $MaTK = $row["MaTK"];
            //     }
            // }


        $query_insert = "INSERT INTO tb_thong_tin_nha (MaTK, TenNha, HinhAnh, DiaChi, Gia, MoTa, MaHuyen, MaBan) value('2233','$home_name','$file_name','$home_address','$fee', '$home_details', '$sl_huyen', '$sl_ban')";
        $conn -> query($query_insert);

        echo "<script>alert('Thêm nhà thành công');location='../index.php?page=my_home';</script>";

    }


 ?>