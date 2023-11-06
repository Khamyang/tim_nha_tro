<?php 
//Status show
    include "../connect/connect.php";
    //$MaNha = echo " <script>document.writeln(MaNha);</script>";
    //$sql_0 = "UPDATE tb_thong_tin_nha SET TrangThai = 0 WHERE MaNha = $MaNha";
    $sql_1 = "UPDATE tb_thong_tin_nha SET TrangThai = 1 WHERE MaNha = $MaNha";
    //$conn -> query($sql_0);
    $conn -> query($sql_1);
    mysqli_close($conn);
    echo "<script> alert('Thay đổi thạng thái'); location='../index.php?page=my_home';</script>";
 ?>

