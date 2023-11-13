<?php 
session_start();
    include "../connect/connect.php";
    $matk = $_SESSION['matk'];
    if(isset($_GET['ma_nha'])){
        $arr = [];
        $MaNha = $_GET['ma_nha'];
        $action = $_GET['action'];

        if($action == "to_checked"){
            $up = mysqli_query($conn, "UPDATE tb_thong_tin_nha SET TrangThai = 0 WHERE MaNha = $MaNha");
        } else {
            $up = mysqli_query($conn, "UPDATE tb_thong_tin_nha SET TrangThai = 1 WHERE MaNha = $MaNha");
        }
        if($up){
            $sql = "SELECT TrangThai FROM tb_thong_tin_nha WHERE MaNha = $MaNha";
            $query = mysqli_query($conn, $sql);
            $result = $query->fetch_object();
            $trangthai =  $result->TrangThai;

            $arr['status'] = 1;
            $arr['msg'] = "Đăng nhà thành công";
            $arr['manha'] = $MaNha;
            $arr['trang_thai'] =  $trangthai;
        } else {
            $arr['status'] = 0;
            $arr['msg'] = "Đăng nhà không thành công, Liên hệ với Admin";
        }
    } else {
        $arr['status'] = 0;
        $arr['msg'] = "Đăng nhà không thành công, Liên hệ với Admin";
    }
    echo json_encode($arr);

 ?>