<?php 
include "../connect/connect.php";
$data_res = [];
    if(isset($_POST['madk'])){
        $MaDK = $_POST['madk'];
        $up = mysqli_query($conn, "UPDATE tb_dondk SET TrangThai = 0 WHERE MaDK = $MaDK");
        if($up){
            $data_res['ststus'] = 1;
        }
    }
    echo json_encode($data_res)

?>