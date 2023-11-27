<?php
$MaNV = $_SESSION['matk'];
if (isset($_GET['sua_nha_thue'])) {
    $id = $_GET['sua_nha_thue'];

    $sql = "SELECT tk.MaTK, tk.TenDN, nha.* FROM tb_taikhoan as tk, tb_thong_tin_nha as nha WHERE nha.MaTK = tk.MaTK and nha.MaNha = $id";
    $result = mysqli_query($conn, $sql);
    $row_ed = mysqli_fetch_assoc($result);

    $image_old = $row_ed['HinhAnh'];
    $MaHuyen = $row_ed['MaHuyen'];
    $sql_huyen = "SELECT TenHuyen FROM tb_huyen WHERE MaHuyen = $MaHuyen";
    $result_huyen = mysqli_query($conn, $sql_huyen);
    $row_huyen = mysqli_fetch_assoc($result_huyen);

    $MaBan = $row_ed['MaBan'];
    $sql_ban = "SELECT TenBan FROM tb_ban WHERE MaBan = $MaBan";
    $result_ban = mysqli_query($conn, $sql_ban);
    $row_ban = mysqli_fetch_assoc($result_ban);
}


//session_start();
//include "../../connect/connect.php";
//$matk = $_SESSION['matk'];
if (isset($_FILES['image'])) {

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    // if($file_size > 2097152) {
    //  $errors[]='File size must be excately 2 MB';
    // }

    if ($file_name != "") {
        //unlink("./image/product_image/".$image_old);
        $move_file = move_uploaded_file($file_tmp, "../../image/product_image/" . $file_name);
        if ($move_file) {

            if (isset($_POST['sua_nha_thue'])) {
                $user_name = $_POST['user_name'];
                $sql = "SELECT MaTK FROM tb_taikhoan WHERE TenDN = '$user_name'";
                $result = mysqli_query($conn, $sql);
                $row_code = mysqli_fetch_assoc($result);
                if (empty($row_code['MaTK'])) {
                    echo "<script> alert('Tên tài khoản này không có trong hệ thống, hãy kiểm tra lại!');history.back();</script>";
                } else {
                    $user_code = $row_code['MaTK'];
                    $home_name = $_POST['home_name'];
                    $home_details = $_POST['home_details'];
                    $fee = $_POST['fee'];
                    $home_address = $_POST['home_address'];
                    $sl_huyen = $_POST['sl_huyen'];
                    $sl_ban = $_POST['sl_ban'];
                    $query_update = "UPDATE tb_thong_tin_nha SET MaTK = $user_code, TenNha = '$home_name', HinhAnh = '$file_name' , DiaChi = '$home_address', Gia = '$fee', MoTa = '$home_details', MaHuyen = $sl_huyen, MaBan = $sl_ban WHERE MaNha = $id";
                    $conn->query($query_update);

                    echo "<script>location='?page=nha_thue';</script>";
                    // echo "<script>alert(".$matk.")</script>";
                }
            }
        }
    } else {
        if (isset($_POST['sua_nha_thue'])) {
            $user_name = $_POST['user_name'];
            $sql = "SELECT MaTK FROM tb_taikhoan WHERE TenDN = '$user_name'";
            $result = mysqli_query($conn, $sql);
            $row_code = mysqli_fetch_assoc($result);
            if (empty($row_code['MaTK'])) {
                echo "<script> alert('Tên tài khoản này không có trong hệ thống, hãy kiểm tra lại!');history.back();</script>";
            } else {
                $user_code = $row_code['MaTK'];
                $home_name = $_POST['home_name'];
                $home_details = $_POST['home_details'];
                $fee = $_POST['fee'];
                $home_address = $_POST['home_address'];
                $sl_huyen = $_POST['sl_huyen'];
                $sl_ban = $_POST['sl_ban'];
                $query_update = "UPDATE tb_thong_tin_nha SET MaTK = $user_code, TenNha = '$home_name', DiaChi = '$home_address', Gia = '$fee', MoTa = '$home_details', MaHuyen = $sl_huyen, MaBan = $sl_ban WHERE MaNha = $id";
                $conn->query($query_update);

                echo "<script>location='?page=nha_thue';</script>";
                // echo "<script>alert(".$matk.")</script>";
            }
        }
    }
} else {
    if (isset($_POST['sua_nha_thue'])) {
        $user_name = $_POST['user_name'];
        $sql = "SELECT MaTK FROM tb_taikhoan WHERE TenDN = '$user_name'";
        $result = mysqli_query($conn, $sql);
        $row_code = mysqli_fetch_assoc($result);
        if (empty($row_code['MaTK'])) {
            echo "<script> alert('Tên tài khoản này không có trong hệ thống, hãy kiểm tra lại!');history.back();</script>";
        } else {
            $user_code = $row_code['MaTK'];
            $home_name = $_POST['home_name'];
            $home_details = $_POST['home_details'];
            $fee = $_POST['fee'];
            $home_address = $_POST['home_address'];
            $sl_huyen = $_POST['sl_huyen'];
            $sl_ban = $_POST['sl_ban'];
            $query_update = "UPDATE tb_thong_tin_nha SET MaTK = $user_code, TenNha = '$home_name', DiaChi = '$home_address', Gia = '$fee', MoTa = '$home_details', MaHuyen = $sl_huyen, MaBan = $sl_ban WHERE MaNha = $id";
            $conn->query($query_update);

            echo "<script>location='?page=nha_thue';</script>";
            // echo "<script>alert(".$matk.")</script>";
        }
    }
}
?>



<section class="mt-1 mb-5">
    <div class="d-flex justify-content-center">
        <div class="col-sm-12">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row border rounded p-2 bg-light">
                    <div class="col-sm-6">
                        <div class="form-group mb-2 mb-2">
                            <label for="username">Tên chủ nhà</label>
                            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="" value="<?php echo $row_ed['TenDN']; ?>"  readonly>
                            <span class="text-danger" id="user_name_err"></span>
                        </div>
                        <div class="form-group mb-2 ">
                            <label for="username">Tên nhà</label>
                            <input type="text" class="form-control" name="home_name" id="home_name" placeholder="" required value="<?php echo $row_ed['TenNha']; ?>">
                            <span class="text-danger" id="home_name_err"></span>
                        </div>
                        
                        <!-- <div class="form-group mb-2 ">
                            <label for="username">Mô tả</label>
                            <input type="text" class="form-control" name="home_details" id="home_details" placeholder="" value="<?php echo $row_ed['MoTa']; ?>">
                            <span class="text-danger" id="home_details_err"></span>
                        </div> -->
                        
                        <div class="form-group mb-2">
                            <label for="address">Chọn ảnh</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/png, image/jpeg, image/jpg" onchange="loadFile(event)">
                            <img class="border rounded p-1" src="../../image/product_image/<?php echo $row_ed['HinhAnh']; ?>" alt="" width="150" id="output" style="width: 150px; height: 150px; margin-top: 5px;" />
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="form-group mb-2">
                            <label for="text">Giá thuê/tháng</label>
                            <input type="number" class="form-control" name="fee" id="fee" placeholder="" required value="<?php echo $row_ed['Gia']; ?>">
                            <span class="text-danger" id="fee_err"></span>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">&nbsp;&nbsp;Chọn huyện: </label>
                            <?php
                            $sql = mysqli_query($conn, "SELECT * FROM tb_huyen");
                            ?>
                            <SELECT class="form-control" id="sl_huyen" name="sl_huyen" required>
                                <OPTION selected Value="">- Chọn huyện -</OPTION>
                                <?php if ($sql->num_rows > 0) {
                                    while ($row = mysqli_fetch_object($sql)) {
                                        if($row->MaHuyen == $row_ed['MaHuyen']){ ?>
                                ?>
                                        <OPTION selected Value="<?=$row->MaHuyen ?>"><?= $row->TenHuyen ?></OPTION>
                                        <?php } else {?>
                                            <OPTION Value="<?= $row->MaHuyen ?>"><?= $row->TenHuyen ?></OPTION>
                                        <?php }?>
                                <?php }
                                } ?>
                            </SELECT>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">&nbsp;&nbsp;Chọn Bản: </label>
                            <SELECT class="form-control" id="sl_ban" name="sl_ban" required>
                                <OPTION selected Value="<?php echo $row_ed['MaBan'];  ?>"> <?php echo $row_ban['TenBan'];  ?></OPTION>
                                <!-- <OPTION Value="Under 16">Chanthabuly</OPTION> -->

                            </SELECT>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Địa chỉ cụ thể: </label>
                            <textarea class="form-control" name="home_address" id="home_address" placeholder="Địa chỉ chi tiết (Phường, đường, Số nhà...)" rows="3"><?php echo $row_ed['DiaChi']; ?></textarea>
                            <span class="text-danger" id="home_address_err"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="username">Mô tả</label>
                            <textarea class="form-control" name="home_details" id="home_details" placeholder="" rows="3"><?php echo $row_ed['MoTa']; ?></textarea>
                            <span class="text-danger" id="home_details_err"></span>
                        </div>
                    </div>
                    <div class="mb-3 text-end">
                        <input type="button" class="btn btn-danger" style="width: 100px;" onclick="history.back()" value="Thoát">
                        <input class="btn btn-success" style="width: 100px;" type="submit" class="btn btn-success" name="sua_nha_thue" id="sua_thue_home" value="Lưu">

                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sl_huyen').change(function() {
            var huyen_id = $('#sl_huyen').val();
            // alert(id_huyen);
            if (huyen_id != '') {
                $.ajax({
                    url: "../../controller/ControllerGetBan.php?huyen_id=" + huyen_id,
                    type: "POST",
                    // data: {"huyen_id": huyen_id},
                    success: function(data_res) {
                        var db = JSON.parse(data_res);
                        // console.log(db);
                        var html = '<OPTION selected Value=""> - Chọn bàn -</OPTION>';
                        if (db.status == 1) {
                            $.each(db.data, function(index, value) {
                                html += "<OPTION Value=" + index + ">" + value + "</OPTION>";
                            })
                        }
                        if (db.status == 0) {
                            alert(db.msg);
                        }
                        $('#sl_ban').html(html);
                    }
                })
            }

        })
    })
</script>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>