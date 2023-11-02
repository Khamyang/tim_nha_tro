<?php 
    if (isset($_GET['edit_home'])) {
        $id = $_GET['edit_home'];

        $sql = "SELECT * FROM tb_thong_tin_nha WHERE MaNha = $id";
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
    if(isset($_FILES['image'])){

        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext=pathinfo($file_name, PATHINFO_EXTENSION);

        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        // if($file_size > 2097152) {
        //  $errors[]='File size must be excately 2 MB';
        // }

         if($file_name != "") {
          unlink("./image/product_image/".$image_old);
          $move_file = move_uploaded_file($file_tmp,"./image/product_image/".$file_name);
            if($move_file){
                if (isset($_POST['edit_home'])) {
                    $home_name = $_POST['home_name'];
                    $home_details = $_POST['home_details'];
                    $fee = $_POST['fee'];
                    $home_address = $_POST['home_address'];
                    $sl_huyen = $_POST['sl_huyen'];
                    $sl_ban = $_POST['sl_ban'];
                    $query_update = "UPDATE tb_thong_tin_nha SET TenNha = '$home_name', HinhAnh = '$file_name' , DiaChi = '$home_address', Gia = '$fee', MoTa = '$home_details', MaHuyen = $MaHuyen, MaBan = $MaBan WHERE MaNha = $id";
                    $conn -> query($query_update);
            
                    echo "<script>alert('Sửa thành công".$id."');location='?page=my_home';</script>";
                    // echo "<script>alert(".$matk.")</script>";
            
                }
            }
         }else{
          
            if (isset($_POST['edit_home'])) {
                $home_name = $_POST['home_name'];
                $home_details = $_POST['home_details'];
                $fee = $_POST['fee'];
                $home_address = $_POST['home_address'];
                $sl_huyen = $_POST['sl_huyen'];
                $sl_ban = $_POST['sl_ban'];
                $query_update = "UPDATE tb_thong_tin_nha SET TenNha = '$home_name', DiaChi = '$home_address', Gia = '$fee', MoTa = '$home_details', MaHuyen = $MaHuyen, MaBan = $MaBan WHERE MaNha = $id";
                $conn -> query($query_update);

                echo "<script>alert('Sửa thành công".$id."');location='?page=my_home';</script>";
                // echo "<script>alert(".$matk.")</script>";

            }

         }
    } else {
            if (isset($_POST['edit_home'])) {
                $home_name = $_POST['home_name'];
                $home_details = $_POST['home_details'];
                $fee = $_POST['fee'];
                $home_address = $_POST['home_address'];
                $sl_huyen = $_POST['sl_huyen'];
                $sl_ban = $_POST['sl_ban'];
                $query_update = "UPDATE tb_thong_tin_nha SET TenNha = '$home_name', DiaChi = '$home_address', Gia = '$fee', MoTa = '$home_details', MaHuyen = $MaHuyen, MaBan = $MaBan WHERE MaNha = $id";
                $conn -> query($query_update);

                echo "<script>alert('Sửa thành công".$id."');location='?page=my_home';</script>";
                // echo "<script>alert(".$matk.")</script>";

            }
    }
 ?>



<section class="mt-5 mb-5">
    <div class="d-flex justify-content-center">
        <div class="col-sm-12" style="width: 900px;">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row border border-success rounded">
                    <div class="col-sm- p-0 bg-light" style="width: 100%;height:auto">
                        <div class="p-4" id="add">
                            <center>
                                <h4 style="color: #f65129;">Điền thông tin nhà</h4>
                            </center>
                            <div class="form-group ">
                                <label for="username">Tên nhà</label>
                                <input type="text" class="form-control" name="home_name" id="home_name" placeholder="" required value="<?php echo $row_ed['TenNha']; ?>">
                                <span class="text-danger" id="home_name_err"></span>
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="username">Mô tả</label>
                                <input type="text" class="form-control" name="home_details" id="home_details" placeholder="" value="<?php echo $row_ed['MoTa']; ?>">
                                <span class="text-danger" id="home_details_err"></span>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="address">Chọn ảnh</label>
                                <input type="file"  name="image" id="image" class="form-control" accept="image/png, image/jpeg, image/jpg">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="text">Giá thuê/tháng</label>
                                <input type="text" class="form-control" name="fee" id="fee" placeholder="" required value="<?php echo $row_ed['Gia']; ?>">
                                <span class="text-danger" id="fee_err"></span>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <br>
                                <label style="margin-bottom: 15px;" for="">&nbsp;&nbsp;Chọn huyện: </label>
                                <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM tb_huyen");
                                ?>
                                <SELECT style=" width: 85%; float: right;" class="form-control" id="sl_huyen" name="sl_huyen" required>
                                    <OPTION selected Value="<?php echo $row_ed['MaHuyen'];  ?>"> <?php echo $row_huyen['TenHuyen'];  ?></OPTION>
                                    <?php if ($sql->num_rows > 0) {
                                        while ($row = mysqli_fetch_object($sql)) {
                                    ?>
                                            <OPTION Value="<?= $row->MaHuyen ?>"><?= $row->TenHuyen ?></OPTION>
                                    <?php }
                                    } ?>
                                </SELECT>
                                <br>
                                <label style="margin-bottom: 15px;" for="">&nbsp;&nbsp;Chọn Bản: </label>
                                <SELECT style=" width: 85%; float: right;" class="form-control" id="sl_ban" name="sl_ban" required>
                                    <OPTION selected Value="<?php echo $row_ed['MaBan'];  ?>"> <?php echo $row_ban['TenBan'];  ?></OPTION>
                                    <!-- <OPTION Value="Under 16">Chanthabuly</OPTION> -->

                                </SELECT>
                                <!-- <input type="text" id="search_ban" class="form-control"> -->
                                <input type="text" class="form-control" name="home_address" id="home_address" placeholder="Địa chỉ chi tiết (Phường, đường, Số nhà...)" value="<?php echo $row_ed['DiaChi']; ?>">
                                <span class="text-danger" id="home_address_err"></span>
                            </div>
                            <br>
                            <br>
                            <div class="mb-3">
                                <input style="float: right; margin-bottom: 8px;" type="submit" class="btn btn-success" name="edit_home" id="edit_home" value="Sửa">
                            </div>

                        </div>
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
                    url: "controller/ControllerGetBan.php?huyen_id=" + huyen_id,
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