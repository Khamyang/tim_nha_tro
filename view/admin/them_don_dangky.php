<style>

</style>

<div class="card p-3">
    <form action="../../controller/ControllerThemDonDangky.php" method="post" id="form_dondangky" enctype="multipart/form-data">
        <div>
        <?php if(isset($_SESSION['msg_err']) != ""){?>
            <div class="row mb-3">
                <span class="p-2 rounded bg-danger">
                        <?php 
                        echo$_SESSION['msg_err'];
                        unset($_SESSION['msg_err'])
                        ?>
                </span>
        </div>
        <?php }?>
            <div class="row mb-3">
                <label for="ten_chu_nha" class="col-sm-2 col-form-label">Tên chủ nhà</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="ten_chu_nha" id="ten_chu_nha" required>
                        <option selected value="">Chọn tên chủ nhà</option>
                        <?php
                        $sql = mysqli_query($conn, "SELECT MaTK, TenDN FROM tb_taikhoan WHERE MaQuyen in('2','3','4')");
                        while ($row = mysqli_fetch_object($sql)) {
                        ?>
                            <option value="<?= $row->MaTK ?>"><?= $row->TenDN ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Hình thanh toán</label>
                <div class="col-sm-10">
                    <input type="file" name="hinh_tt" id="hinh_tt" class="form-control" required accept="image/png, image/jpeg, image/jpg" onchange="loadFile(event)">
                    <img src="../../image/profile_image/user_img1.png" class="border rounded p-1" src="" alt="" width="150" id="output" style="width: 150px; height: 150px; margin-top: 5px;" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Đăng ký gói</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" onchange="realtime_enddate($('#goi').val())" name="goi" id="goi" required>
                        <option selected value="">Chọn gói</option>
                        <?php
                        $sql_goi = mysqli_query($conn, "SELECT * FROM tb_goi");
                        while ($row_goi = mysqli_fetch_object($sql_goi)) {
                        ?>
                            <option value="<?= $row_goi->MaGoi ?>"><?= $row_goi->TenGoi ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Ngày hết hạn</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ngay_hethan" id="ngay_hethan" readonly>
                </div>
            </div>
        </div>
        <div class="text-end">
            <a href="?page=don_dangky" type="button" class="btn btn-danger" style="width: 100px;">Thoát</a>
            <button type="submit" class="btn btn-success" name="them_don_dangky" style="width: 100px;">Lưu</button>
        </div>
    </form>
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
    $(document).ready(function() {
        $('#ten_chu_nha').select2();
    });
</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script>
    function realtime_enddate(value) {
        if (value != "") {
            $.ajax({
                url: "../../controller/ControllerGetEndDate.php?get_enddate",
                type: "GET",
                data: {
                    goi_id: value
                },
                success: function(data) {
                    var dt = JSON.parse(data);
                    if (dt.status == 1) {
                        $('#ngay_hethan').val(dt.enddate)
                    } else {
                        $('#ngay_hethan').val('')
                    }
                    // console.log(data)

                }
            })
        } else {
            $('#ngay_hethan').val('');
        }
    }
</script>
<script>

</script>