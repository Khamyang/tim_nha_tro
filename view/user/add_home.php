<?php 
    // include "./controller/ControllerAddHome.php";
 ?>
<section class="mt-5 mb-5">
    <div class="d-flex justify-content-center">
        <div class="col-sm-12" style="width: 900px;">
            <form action="./controller/ControllerAddHome.php" method="post" enctype="multipart/form-data">
                <div class="row border border-success rounded">
                    <div class="col-sm- p-0 bg-light" style="width: 100%;height:auto">
                        <div class="p-4" id="add">
                            <center>
                                <h4 style="color: #f65129;">Điền thông tin nhà</h4>
                            </center>
                            <div class="form-group ">
                                <label for="username">Tên nhà</label>
                                <input type="text" class="form-control" name="home_name" id="home_name" placeholder="">
                                <span class="text-danger" id="home_name_err"></span>
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="username">Mô tả</label>
                                <input type="text" class="form-control" name="home_details" id="home_details" placeholder="">
                                <span class="text-danger" id="home_details_err"></span>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="address">Chọn ảnh</label>
                                <input type="file"  name="image" id="image" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="text">Giá thuê/tháng</label>
                                <input type="text" class="form-control" name="fee" id="fee" placeholder="">
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
                                <SELECT style=" width: 85%; float: right;" class="form-control" id="sl_huyen" name="sl_huyen">
                                    <OPTION selected Value="Under 16"> - Chọn huyện -</OPTION>
                                    <?php if ($sql->num_rows > 0) {
                                        while ($row = mysqli_fetch_object($sql)) {
                                    ?>
                                            <OPTION Value="<?= $row->MaHuyen ?>"><?= $row->TenHuyen ?></OPTION>
                                    <?php }
                                    } ?>
                                </SELECT>
                                <br>
                                <label style="margin-bottom: 15px;" for="">&nbsp;&nbsp;Chọn Bản: </label>
                                <SELECT style=" width: 85%; float: right;" class="form-control" id="sl_ban" name="sl_ban">
                                    <OPTION selected Value=""> - Chọn bàn -</OPTION>
                                    <!-- <OPTION Value="Under 16">Chanthabuly</OPTION> -->

                                </SELECT>
                                <!-- <input type="text" id="search_ban" class="form-control"> -->
                                <input type="text" class="form-control" name="home_address" id="home_address" placeholder="Địa chỉ chi tiết (Phường, đường, Số nhà...)">
                                <span class="text-danger" id="home_address_err"></span>
                            </div>
                            <br>
                            <br>
                            <div class="mb-3">
                                <input style="float: right; margin-bottom: 8px;" type="submit" class="btn btn-success" name="add_home" id="add_home" value="Thêm">
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