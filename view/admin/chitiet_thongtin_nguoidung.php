<?php
    include "../../connect/connect.php";
    if (isset($_GET['chitiet_thongtin_nguoidung'])) {
        $id = $_GET['chitiet_thongtin_nguoidung'];
        $sql = "SELECT quyen.MaQuyen,quyen.TenQuyen, tk.* FROM tb_quyen as quyen, tb_taikhoan as tk WHERE quyen.MaQuyen = tk.MaQuyen and tk.MaTK in ($id)";
        $result = mysqli_query($conn, $sql);
        $row_ct = mysqli_fetch_assoc($result);

    }
?>
<div class="card p-3" style="margin-bottom: 30px;">
    <div class="col-sm-12">
        <img style="position: center;" class="border rounded p-1 rounded mx-auto d-block" src="../../image/profile_image/<?php if ($row_ct['profile_img'] == "") {echo "user_img1.png";} else {echo $row_ct['profile_img']; }?>" alt="" width="250" id="output" style="width: 150px; height: 150px; margin-top: 5px;" />
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-6">
                <div class="row p-2">
                    <div class="col-sm-4">
                        <b for="">Mã nhân viên: </b>
                    </div>
                    <div class="col-sm-8 border-bottom ps-0 ">
                        <span for="" ><?php echo $row_ct['MaTK']; ?></span>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-4">
                        <b for="">Tên đăng nhập:</b>
                    </div>
                    <div class="col-sm-8 border-bottom ps-0 ">
                        <span for="" ><?php echo $row_ct['TenDN']; ?></span>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-4">
                        <b for="">Họ và tên: </b>
                    </div>
                    <div class="col-sm-8 border-bottom ps-0 ">
                        <span for="" ><?php echo $row_ct['HoTen']; ?></span>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-4">
                        <b for="">Quyền: </b>
                    </div>
                    <div class="col-sm-8 border-bottom ps-0 ">
                        <span for="" ><?php echo $row_ct['TenQuyen']; ?></span>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="row p-2">
                    <div class="col-sm-4">
                        <b for="">Giới tính: </b>
                    </div>
                    <div class="col-sm-8 border-bottom ps-0 ">
                        <span for="" ><?php echo $row_ct['GioiTinh']; ?></span>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-4">
                        <b for="">Ngày sinh: </b>
                    </div>
                    <div class="col-sm-8 border-bottom ps-0 ">
                        <span for="" ><?php echo $row_ct['NgaySinh']; ?></span>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-4">
                        <b for="">Địa chỉ: </b>
                    </div>
                    <div class="col-sm-8 border-bottom ps-0 ">
                        <span for="" ><?php echo $row_ct['DiaChi']; ?></span>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-4">
                        <b for="">Số điện thoại: </b>
                    </div>
                    <div class="col-sm-8 border-bottom ps-0 ">
                        <span for="" ><?php echo $row_ct['SoDT']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-end">
    <input style="width: auto;" type="submit" class="btn btn-success" onclick="history.back()" value="Thoát">
</div>
