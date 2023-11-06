<?php 
//Status show
    include "../connect/connect.php";
    $sql = "UPDATE tb_thong_tin_nha SET TrangThai = 0 WHERE MaNha = $MaNha";
     //echo "<script> alert('Thay đổi thạng thái".$MaNha"')</script>";
    // echo "<script>alert(".$MaNha.")</script>";
    //$sql_1 = "UPDATE tb_thong_tin_nha SET TrangThai = 1 WHERE MaNha = $MaNha";
    $conn -> query($sql);
    //$conn -> query($sql_1);
    mysqli_close($conn);

    echo "<script> alert('Thay đổi thạng thái'); location='../index.php?page=my_home';</script>";
 ?>

