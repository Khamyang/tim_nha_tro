<?php
session_start();
    include "../connect/connect.php";
    $response = [];
    if(isset($_REQUEST['login'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $sql = "SELECT*FROM tb_taikhoan WHERE TenDN = '$username'";
        $query = mysqli_query($conn, $sql);
        if($query->num_rows > 0){
            $result = mysqli_fetch_object($query);
            $pass_hash = $result->MatKhau;
            if(password_verify($password, $pass_hash)){
                $_SESSION['username'] = $result->TenDN;
                $_SESSION['maquyen'] = $result->MaQuyen;
                $_SESSION['matk'] = $result->MaTK;
                if($result->MaQuyen == '1' || $result->MaQuyen == '2'){
                    $response['status'] = 1;
                    $response['msg'] = 'Đăng nhập thành công';
                    $response['status_user'] = "admin";
                }
                if($result->MaQuyen == '3' || $result->MaQuyen == '4'){
                    $response['status'] = 1;
                    $response['msg'] = 'Đăng nhập thành công';
                    $response['status_user'] = "user";
                }
            } else {
                $response['status'] = 0;
                $response['password'] = $password;
                $response['msg'] = 'Đăng nhập không thành công';
                $response['status_user'] = "";
            }
        } else {
            $response['status'] = 0;
            $response['msg'] = 'Đăng nhập không thành công';
            $response['status_user'] = "";
        }

    }
    echo json_encode($response);
?>