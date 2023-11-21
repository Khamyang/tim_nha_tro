<?php 
include "../connect/connect.php";
$data_res = [];
    if(isset($_POST['madk'])){
        $MaDK = $_POST['madk'];
        $MaTK = $_POST['matk'];
        $up = mysqli_query($conn, "UPDATE tb_dondk SET TrangThai = 0 WHERE MaDK = $MaDK");
        if($up){
            $up_1 = mysqli_query($conn, "UPDATE tb_thong_tin_nha SET TrangThai = 0 WHERE MaTK = $MaTK");
            if($up_1) {
                $data_res['ststus'] = 1;
            }
            
        }
    }
    echo json_encode($data_res)

?>