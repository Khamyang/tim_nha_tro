<?php

include "./controller/check_access.php";

?>
<div>
    <div class="container mt-3 mb-5 ">
        <div class="row">
            <div class="col-sm-12 mb-3" style="font-size:large;">
                <a href="./?page=home">Trang chủ</a> <i class="fa fa-angles-right"></i> <a href="./?page=my_home">Quản lý nhà</a> <i class="fa fa-angles-right"></i> <a class="text-primary" href="./?page=add_home">Thêm nhà mới</a>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="col-sm-12" style="width: 900px;">
                <form action="./controller/ControllerAddHome.php" method="post" enctype="multipart/form-data">
                    <div class="row rounded">
                        <div class="col-sm-12 border" style="width: 100%;height:auto">
                            <div class="p-4" id="add">
                                <div class="form-group mb-3">
                                    <label for="username">Tên nhà</label>
                                    <input type="text" class="form-control" name="home_name" id="home_name" placeholder="">
                                    <span class="text-danger" id="home_name_err"></span>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="address">Chọn ảnh</label>
                                    <input type="file" name="image" id="image" class="form-control" accept="image/png, image/jpeg, image/jpg">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="text">Giá thuê/tháng</label>
                                    <input type="text" class="form-control" name="fee" id="fee" placeholder="">
                                    <span class="text-danger" id="fee_err"></span>
                                </div>
                                <div class="form-group mb-3">
                                    <label style="margin-bottom: 15px;" for="">Chọn huyện: </label>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM tb_huyen");

                                    ?>
                                    <SELECT class="form-control" id="sl_huyen" name="sl_huyen">
                                        <OPTION selected Value="Under 16"> - Chọn huyện -</OPTION>
                                        <?php if ($sql->num_rows > 0) {
                                            while ($row = mysqli_fetch_object($sql)) {
                                        ?>
                                                <OPTION Value="<?= $row->MaHuyen ?>"><?= $row->TenHuyen ?></OPTION>
                                        <?php }
                                        } ?>
                                    </SELECT>
                                    <span class="text-danger" id="home_address_err"></span>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Chọn Bản: </label>
                                    <SELECT class="form-control" id="sl_ban" name="sl_ban">
                                        <OPTION selected Value=""> - Chọn bàn -</OPTION>
                                    </SELECT>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="address">Địa chỉ</label>
                                    <textarea name="" id="" rows="3" class="form-control" name="home_address" id="home_address" placeholder="Địa chỉ chi tiết (Phường, đường, Số nhà...)"></textarea>
                                    <span class="text-danger" id="home_address_err"></span>
                                </div>
                                <div class="form-group mb-3 ">
                                    <label for="username">Mô tả</label>
                                    <!-- <input type="text" class="form-control" name="home_details" id="home_details" placeholder="">
                                <span class="text-danger" id="home_details_err"></span> -->
                                    <textarea name="" id="" rows="3" class="form-control" name="home_details" id="home_details" placeholder="Mô tả"></textarea>
                                </div>
                                <div class="mb-3 text-end">
                                    <input type="button" class="btn btn-danger" style="width: 100px;" onclick="history.back()" value="Thoát">
                                    <input type="submit" class="btn btn-success" style="width: 100px;" name="add_home" id="add_home" value="Thêm">
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


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