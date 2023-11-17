<?php
    include "../../connect/connect.php";
    if (isset($_GET['sua_don_dangky'])) {
        $id = $_GET['sua_don_dangky'];
        $sql = "SELECT tk.TenDN, dk.* FROM tb_taikhoan as tk, tb_dondk as dk WHERE tk.MaTK = dk.MaTK and dk.MaDK = $id";
        $result = mysqli_query($conn, $sql);
        $row_dk = mysqli_fetch_assoc($result);

    }
?>
<div>
    <form action="" method="post" enctype="multipart/form-data">
            <div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Tên tài khoản</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="TenDN" name="TenDN" placeholder="" value="<?php echo $row_dk['TenDN']; ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Hình thanh toán</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="anh" name="anh" placeholder="" accept="image/png, image/jpeg, image/jpg" onchange="loadFile(event)" >
                        <img class="border rounded p-1" src="../../image/order_image/<?php echo $row_dk['HinhTT'];?>" alt="" width="150" id="output" style="width: 150px; height: 150px; margin-top: 5px;" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Số tiền</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="free" name="SoTien" placeholder="" value="<?php echo $row_dk['SoTien']; ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label" >Ngày đăng ký</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="NgayDK" name="NgayDK" placeholder="" value="<?php echo $row_dk['NgayDK']; ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Ngày hết hạn</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="NgayHH" name="NgayHH" placeholder="" value="<?php echo $row_dk['NgayHetHan']; ?>" required>
                    </div>
                </div>
            </div>
        <div class="text-end" >
            <a href="?page=don_dangky" type="button" class="btn btn-danger" style="width: 100px;">Thoát</a>
            <button type="submit" id="btn_luu" name="btn_luu" class="btn btn-success" style="width: 100px;">Lưu</button>
        </div>
    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>



<?php 
//Edit Order
    if(isset($_FILES['anh'])){
        $errors= array();
        $file_name = $_FILES['anh']['name'];
        $file_size = $_FILES['anh']['size'];
        $file_tmp = $_FILES['anh']['tmp_name'];
        $file_type = $_FILES['anh']['type'];
        $file_ext=pathinfo($file_name, PATHINFO_EXTENSION);

        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

          $move_file = move_uploaded_file($file_tmp,"../../image/order_image/".$file_name);
          $MaTK = $row_dk['MaTK'];
            if($move_file){
                unlink("../../image/order_image/".$row_dk['HinhTT']);
                if (isset($_POST['btn_luu'])) {
                    $TenDN = trim($_POST['TenDN']);
                    $SoTien = $_POST['SoTien'];
                    $NgayDK = $_POST['NgayDK'];
                    $NgayHH = $_POST['NgayHH'];
                    $SoTien = $_POST['SoTien'];

                    $query = "UPDATE tb_dondk set MaTK = $MaTK, HinhTT = '$file_name', NgayDK = '$NgayDK', NgayHetHan = '$NgayHH', SoTien = $SoTien WHERE MaDK = $id ";
                    $conn -> query($query);
                    echo "<script>location='/tim_nha_tro/view/admin/?page=don_dangky';</script>";
            
                }
            } else {
                if (isset($_POST['btn_luu'])) {
                    $TenDN = trim($_POST['TenDN']);
                    $SoTien = $_POST['SoTien'];
                    $NgayDK = $_POST['NgayDK'];
                    $NgayHH = $_POST['NgayHH'];
                    $SoTien = $_POST['SoTien'];

                    $query = "UPDATE tb_dondk set MaTK = $MaTK, NgayDK = '$NgayDK', NgayHetHan = '$NgayHH', SoTien = $SoTien WHERE MaDK = $id";
                    $conn -> query($query);
                    echo "<script>location='/tim_nha_tro/view/admin/?page=don_dangky';</script>";
            
                }
            }
    }


?>

