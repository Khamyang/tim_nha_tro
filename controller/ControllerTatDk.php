<?php 
include "../connect/connect.php";
$data_res = [];
    if(isset($_POST['madk'])){
        $MaDK = $_POST['madk'];
        $sql = "SELECT dk.*, tk.HoTen,tk.TenDN,tk.SoDT
        FROM tb_dondk as dk 
        LEFT JOIN tb_taikhoan as tk ON tk.MaTK = dk.MaTK";
        $query = mysqli_query($conn, $sql);
        $date_current = date('Y-m-d');
        while ($row = mysqli_fetch_object($query)) {
            if(strtotime($date_current) >= strtotime($row->NgayHetHan)){
                $query_insert = "INSERT INTO tb_dondk TrangThai = 0 WHERE MaDK = $MaDK";
                //$conn -> query($query_insert);
            } else {
                $query_insert = "INSERT INTO tb_dondk TrangThai = 1 WHERE MaDK = $MaDK";
                //$conn -> query($query_insert);
            }
        }
        $conn -> query($query_insert);


        //$up = mysqli_query($conn, "UPDATE tb_dondk SET TrangThai = 0 WHERE MaDK = $MaDK");
        if($query_insert){
            $data_res['ststus'] = 1;
        }
    }
    echo json_encode($data_res)

?>