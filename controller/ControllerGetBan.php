<?php 
    $data_ban = [];
    include "../connect/connect.php";
    if(isset($_REQUEST['huyen_id'])){
        $huyen_id = $_REQUEST['huyen_id'];

        $sql = "SELECT * FROM tb_ban WHERE MaHuyen = '$huyen_id'";
        $query = mysqli_query($conn, $sql);
        $data = [];
        if($query->num_rows > 0){
            $data_ban['status'] = 1;
            while($row = mysqli_fetch_object($query)){
                $data[$row->MaBan] = $row->TenBan;
            }
        } else {
            $data_ban['status'] = 0;
            $data_ban['msg'] = "Không có bàn nào trong huyện này";
        }
        $data_ban['data'] = $data;


    }

    echo json_encode($data_ban);
?>