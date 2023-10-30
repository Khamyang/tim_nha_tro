
<?php
    if(isset($_SESSION['username']) == ''){
        echo"<script>window.location.href='./index.php?page=home'</script>";
    }
?>
<div class="mt-3 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <div class="card p-5">
                    <?php 
                    include "./connect/connect.php";
                     $sql = "SELECT * FROM tb_taikhoan WHERE MaTK= ".$_SESSION['matk']."";
                     $query = mysqli_query($conn, $sql);
                     $res = mysqli_fetch_object($query);
                    ?>
                    <form action="./controller/ControllerPersonalProfile.php" method="post">
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="">Họ tên</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="" class="form-control" value="<?=$res->HoTen?>">
                            </div>

                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="">Ngày sinh</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" value="<?=$res->HoTen?>">
                            </div>

                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="">Giới tính</label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" <?=($res->GioiTinh == "Nam")? "checked": "";?> value="Nam">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Nam
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" <?=($res->GioiTinh == "Nữ")? "checked": "";?> value="Nữ">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Nữ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" <?=($res->GioiTinh == "Khác")? "checked": "";?>>
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
                                <input type="text" class="form-control" value="<?=$res->SoDT?>">
                            </div>

                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <label for="">Địa chỉ</label>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="" id="" rows="5" class="form-control"><?=$res->DiaChi?></textarea>
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