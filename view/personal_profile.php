<?php
include "./controller/check_access.php";
?>
<div class="mt-3 mb-5">
    <div class="container">
        <div class="">
            <a href="./?page=home">Trang chủ</a> <i class="fa fa-angles-right"></i>  <a class="text-primary" href="./?page=profile">Thông tin cá nhân </a>
        </div>
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <div class="card p-5">
                    <?php
                    include "./connect/connect.php";
                    $sql = "SELECT * FROM tb_taikhoan WHERE MaTK= " . $_SESSION['matk'] . "";
                    $query = mysqli_query($conn, $sql);
                    $res = mysqli_fetch_object($query);
                    if($query->num_rows > 0){
                        $HoTen = $res->HoTen;
                        $NgaySinh = $res->NgaySinh;
                        $GioiTinh = $res->GioiTinh;
                        $SoDT = $res->SoDT;
                        $DiaChi = $res->DiaChi;
                    } else {
                        $HoTen = '';
                        $NgaySinh = '';
                        $GioiTinh = '';
                        $SoDT = '';
                        $DiaChi = '';
                    }
                    ?>
                    <form action="./controller/ControllerPersonalProfile.php?act=user" method="post" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="">Họ tên</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="HoTen" class="form-control" value="<?= $res->HoTen ?>">
                            </div>

                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="">Ngày sinh</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="date" name="NgaySinh" class="form-control" value="<?= $res->NgaySinh ?>">
                            </div>

                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="">Giới tính</label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" name="GioiTinh" type="radio" name="flexRadioDefault" id="flexRadioDefault1" <?= ($res->GioiTinh == "Nam") ? "checked" : ""; ?> value="Nam">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Nam
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="GioiTinh" type="radio" name="flexRadioDefault" id="flexRadioDefault2" <?= ($res->GioiTinh == "Nữ") ? "checked" : ""; ?> value="Nữ">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Nữ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="GioiTinh" type="radio" name="flexRadioDefault" id="flexRadioDefault2" <?= ($res->GioiTinh == "Khác") ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Khác
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="">Số điện thoại</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="SoDT" class="form-control" value="<?= $res->SoDT ?>">
                            </div>

                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="">Địa chỉ</label>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="DiaChi" id="DiaChi" rows="5" class="form-control"><?= $res->DiaChi ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="">Ảnh Profile</label>
                            </div>
                            <div class="col-sm-9">
                                <!-- <img src="./image/profile_image/user_img.png" alt="" width="150" id="open_profile_img">

                                <input class="form-control" type="file" name="profile_img" id="profile_img" accept="image/png, image/jpeg, image/jpg" /> -->
                                <input type="hidden" name="profile_img_old" value="<?=$res->profile_img?>">
                                <input type="file" name="profile_img" class="form-control" accept="image/*" onchange="loadFile(event)" value="<?=$res->profile_img?>">
                                <img class="border rounded p-1" src="./image/profile_image/<?=(!empty($res->profile_img)) ? $res->profile_img : "user_img1.png";?>" alt="" width="150" id="output" style="width: 150px; height: 150px; margin-top: 5px;" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-9">
                                <button type="submit" name="btn_save_pro" class="btn btn-success"> Cập nhập</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3">

            </div>
        </div>
    </div>
</div>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
<script>
    // $(document).ready(function() {
    //     $('#open_profile_img').click(function() {
    //         $('#profile_img').trigger('click');
    //         var profile_img = $('#profile_img').val();

    //         if(profile_img !=''){
    //             $('#open_profile_img').attr('src' , profile_img);
    //         }
    //     });


    // })
</script>
