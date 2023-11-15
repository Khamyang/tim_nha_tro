<style>
    .switch {
        margin: 0;
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: green;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px green;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    #tb_don_dk_filter label {
        margin-bottom: 5px;
    }
</style>
<script>
    function auto_change_status(madk){
        // alert(madk);
        $.ajax({
            url: "../../controller/ControllerTatDk.php",
            type: "POST",
            data: {'madk':madk},
            success: function(data){
                var dat = JSON.parse(data);
                console.log(dat)
                $('#trangthai_dk'+madk).prop('checked', false);
            }
        })
    }
</script>

<!-- <body onload="checkStatus()"> -->
    <div class="card p-3">
        <?php if(isset($_REQUEST['page']) && isset($_REQUEST['them_don_dangky'])) {?>
            <div>
                <form action="">
                        <div>
                            <div class="row mb-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">Tên tài khoản</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="colFormLabel" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">Hình thanh toán</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="colFormLabel" placeholder="" accept="image/png, image/jpeg, image/jpg" onchange="loadFile(event)">
                                    <img class="border rounded p-1" src="" alt="" width="150" id="output" style="width: 150px; height: 150px; margin-top: 5px;" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">Số tiền</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="colFormLabel" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label" >Ngày đăng ký</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="colFormLabel" placeholder="" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">Ngày hết hạn</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="colFormLabel" placeholder="col-form-label">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end" >
                        <a href="?page=don_dangky" type="button" class="btn btn-danger" style="width: 100px;">Thoát</a>
                        <button type="button" class="btn btn-success" style="width: 100px;">Lưu</button>
                    </div>
                </form>
            </div>
            <?php } else {?>
        <div class="text-end mb-2">
            <form action="" method="post">
            <a href="?page=don_dangky&them_don_dangky" class="btn btn-primary">Thêm mới</a>
            <button type="submit" name="btn_check_status" id="btn_check_status" class="btn btn-success">Quyết ngày hết hạn </button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-borderde table-hover table-striped" style="width: 100%;" id="tb_don_dk">
                <thead class="alert-success">
                    <tr>
                        <th>STT</th>
                        <th>Tên chủ nhà</th>
                        <th>Hình thành toán</th>
                        <th>Ngày đăng ký</th>
                        <th>Ngày hết hạn</th>
                        <th>Số tiền</th>
                        <th>Số điện thoại</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody id="data_dondk">
                    <?php
                    $sql = "SELECT dk.*, tk.HoTen,tk.TenDN,tk.SoDT
                    FROM tb_dondk as dk 
                    LEFT JOIN tb_taikhoan as tk ON tk.MaTK = dk.MaTK";
                    $query = mysqli_query($conn, $sql);
                    $stt = 0;
                    $date_current = date('Y-m-d');
                    while ($row = mysqli_fetch_object($query)) {
                        $stt++;
                        if(strtotime($date_current) >= strtotime($row->NgayHetHan)){
                            echo "<script>auto_change_status('".$row->MaDK."')</script>";
                        }
                    ?>
                        <tr>
                            <td align="center"><?= $stt ?></td>
                            <td><?= $row->TenDN ?></td>
                            <td><img src="../../image/order_image/<?= $row->HinhTT ?>" alt="" width="100px" class="rounded"></td>
                            <td><?= $row->NgayDK ?></td>
                            <td><?= $row->NgayHetHan ?></td>
                            <td><?= number_format($row->SoTien) ?></td>
                            <td><?= $row->SoDT ?></td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" <?=($row->TrangThai == 1) ? 'checked':'unchecked';?> id="trangthai_dk<?=$row->MaDk?>" disabled>
                                    <span class="slider round" data-on-label="On" data-off-label="Off"></span>
                                </label>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <button type="button" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                    <button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php }?>
    </div>
<!-- </body> -->

<!-- ********************** table filter ********************** -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#tb_don_dk').DataTable({
            "ordering": false
        });
        $('.dataTables_length').addClass('bs-select');
    })


    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>


