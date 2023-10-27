<?php
include "../connect/connect.php";
    $response['status'] = 0;
    $response['msg'] = 'Thay đổi mật khẩu không thành công';
    if(isset($_REQUEST['change_pass'])){
        $matk = $_POST['matk'];
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
         $sql = mysqli_query($conn, "SELECT * FROM tb_taikhoan where MaTK = '$matk'");
         $result = $sql->fetch_object();
         $pass_chk = $result->MatKhau;

        if($sql->num_rows > 0){
            if(password_verify($old_pass, $pass_chk)){
                $new_pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);
                $sql_up = mysqli_query($conn, "UPDATE tb_taikhoan SET MatKhau = '$new_pass_hash' WHERE MaTK = '$matk'");
                if($sql_up){
                    $response['status'] = 1;
                    $response['msg'] = 'Thay đổi mật khẩu thành công';
                } else {
                    $response['status'] = 0;
                    $response['msg'] = 'Thay đổi mật khẩu không thành công11';
                }
            } else {
                $response['status'] = 0;
                $response['msg'] = 'Thay đổi mật khẩu không thành công';
                $response['txt'] = 'Mật khẩu cũ của bạn không đúng';
            }

        } 
    }
    echo json_encode($response);
?>