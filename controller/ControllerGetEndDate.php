<?php 
 include "../connect/connect.php";
 $date = date('Y-m-d');
 if(isset($_GET['get_enddate'])){
    $goi_id = $_GET['goi_id'];
    $sql = mysqli_query($conn, "SELECT*FROM tb_goi WHERE MaGoi = $goi_id");
    if($sql->num_rows > 0){
        $result =  $sql->fetch_object();
        $ThoiGian_SuDung = $result->ThoiGian_SuDung;
        $enddate = strtotime ($ThoiGian_SuDung.'month' , strtotime ( $date ) ) ;
        $enddate = date ( 'Y-m-d' , $enddate );
        $data['status'] = 1;
        $data['enddate'] = $enddate;
    } else {
        $data['status'] = 0;
        $data['enddate'] = '';
    }
    

 }
 echo json_encode($data)

?>