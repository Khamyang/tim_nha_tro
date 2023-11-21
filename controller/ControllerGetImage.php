<?php
     include "../connect/connect.php";
     $data = array();
     if($_GET['get_img']){
        $madk = $_GET['madk'];
        $sql = mysqli_query($conn, "SELECT HinhTT FROM tb_dondk WHERE MaDK = $madk");
        $res = $sql->fetch_object();
        
        if($sql->num_rows > 0){
            $data['status'] = 1;
            $data['img'] =  $res->HinhTT;
        } else {
            $data['status'] = 0;
            $data['img'] =  '';
        }
        // $data['status'] = 1;
     }
     echo json_encode($data);
?>