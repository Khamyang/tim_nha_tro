<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function swal_success(text_succ,url) {
        
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: text_succ,
            showConfirmButton: false,
            timer: 2500
        })
        // .then((result) => {
        //     if (result.dismiss === Swal.DismissReason.timer) {
        //         location.href = url;
        //     }
        // })
        window.setTimeout(function(){
            location.href = url;
        })
    }

    function swal_err(title, txt_err) {
        Swal.fire({
            // toast: true,
            position: 'center',
            icon: 'error',
            title: title,
            text: txt_err,
            showConfirmButton: true,
        });
    }
</script>
<body>
    <?php
    include "../connect/connect.php";
    session_start();
    $rand = rand(0, 100);
    if (isset($_POST['them_don_dangky'])) {
        $MaTK = $_POST['ten_chu_nha'];
        // $HinhTT = $_POST['hinh_tt'];
        $goi_id = $_POST['goi'];
        $ngay_hethan = $_POST['ngay_hethan'];
        $uploaddir = "../image/product_image/";
        $HinhTT_name = $_FILES['hinh_tt']['name'];
        $HinhTT_tmp = $_FILES['hinh_tt']['tmp_name'];
        if ($HinhTT_tmp == "") {
            $_SESSION['msg_err'] = 'Thêm đơn đăng ký không thành công';
            echo "<script>window.location.href='../view/admin/?page=them_don_dangky'</script>";
        } else {
            $new_hinh_tt = $rand . $HinhTT_name;
            if (file_exists($uploaddir . $new_hinh_tt)) {
                $_SESSION['msg_err'] = 'Đã có hình thành toán này trong hệ thống rồi';
                echo "<script>window.location.href='../view/admin/?page=them_don_dangky'</script>";
            } else {

                $uploadfile = $uploaddir . $new_hinh_tt;
                $move_up = move_uploaded_file($HinhTT_tmp, $uploadfile);
                if ($move_up == true) {
                    $sql = "INSERT INTO tb_dondk SET MaTK =$MaTK,HinhTT = '$new_hinh_tt', NgayHetHan = '$ngay_hethan', MaGoi = $goi_id";
                    $query = mysqli_query($conn, $sql);
                    if ($query) {
                        $_SESSION['msg_succ'] = 'Thêm đơn đăng ký thành công';
                        echo "<script>window.location.href='../view/admin/?page=don_dangky'</script>";
                        // echo"<script>swal_success('Thêm đơn đăng ký thành công','../view/admin/?page=don_dangky')</script>";
                    } else {
                        $_SESSION['msg_err'] = 'Thêm đơn đăng ký không thành công';
                        echo "<script>window.location.href='../view/admin/?page=them_don_dangky'</script>";
                    }
                }
            }
        }
    }
    //  echo json_encode($data);
    ?>
</body>
