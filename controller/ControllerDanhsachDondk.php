<?php 
include "../connect/connect.php";
$data_res = [];
 $sql = "SELECT dk.*, tk.HoTen,tk.TenDN,tk.SoDT
 FROM tb_dondk as dk 
 LEFT JOIN tb_taikhoan as tk ON tk.MaTK = dk.MaTK";
 $query = mysqli_query($conn, $sql);
if($query->num_rows > 0){
    $data_res = mysqli_fetch_assoc($query);
      
} else {
    $data_res = "Không có dữ liệu";
}
echo json_encode($data_res);
 
?>