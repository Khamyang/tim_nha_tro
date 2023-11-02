<?php
include "../connect/connect.php";
$response = [];
  if(isset($_REQUEST['register'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $soDT = $_POST['soDT'];

    $new_password = password_hash($password, PASSWORD_DEFAULT);

    $sql_chk = mysqli_query($conn, "SELECT TenDN FROM tb_taikhoan WHERE TenDN = '".$username."'");
    if($sql_chk->num_rows > 0){
        $response['status'] = 0;
        $response['msg'] = 'Đăng ký không thành công, Thử tên đăng nhập khác';
    } else {
        $sql = "INSERT INTO tb_taikhoan SET TenDN = '$username', MatKhau ='$new_password', SoDT = '$soDT'";
        $query = mysqli_query($conn, $sql);
        if($query){
            $response['status'] = 1;
            $response['msg'] = 'Đăng ký thành công '.$username.' '.$new_password.' '.$soDT;
        } else {
            $response['status'] = 0;
            $response['msg'] = 'Đăng ký không thành công '.$username.' '.$new_password.' '.$soDT;
        }
    }

  }
  echo json_encode($response)
?>