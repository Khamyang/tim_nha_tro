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
    function auto_change_status(madk,matk){
        // alert(madk);
        $.ajax({
            url: "../../controller/ControllerTatDk.php",
            type: "POST",
            data: {'madk':madk,'matk':matk},
            success: function(data){
                var dat = JSON.parse(data);
                console.log(dat)
                $('#trangthai_dk'+madk).prop('checked', false);
            }
        })
    }
</script>
<div class="card p-3">
    <?php if(isset($_SESSION['msg_succ'])) {?>
        <div class="row mb-2">
            <span class="alert-success p-2 rounded"><?php echo$_SESSION['msg_succ']; unset($_SESSION['msg_succ'])?></span>
        </div>
    <?php }?>
    <div class="row mb-2 alert-success p-2 rounded" id="delete_err" hidden>
            
    </div>
    <div class="text-end mb-2">
        <a href="?page=them_don_dangky" class="btn btn-primary">Thêm mới</a>
    </div>
    <div class="table-responsive">
        <table class="table table-borderde table-hover table-striped" style="width: 100%;" id="tb_don_dk">
            <thead class="alert-success">
                <tr>
                    <th widht="1%">STT</th>
                    <th widht="5%">Tên chủ nhà</th>
                    <th widht="20%">Hình thành toán</th>
                    <th widht="10%">Ngày đăng ký</th>
                    <th widht="10%">Ngày hết hạn</th>
                    <th widht="10%">Số tiền</th>
                    <th widht="10%">Số Điện thoại</th>
                    <th widht="10%">Trạng thái</th>
                    <th widht="10%">Thao tác</th>
                </tr>
            </thead>
            <tbody id="data_dondk">
                <?php
                $sql = "SELECT dk.*, tk.HoTen,tk.TenDN,tk.SoDT, goi.*
                FROM tb_dondk as dk 
                LEFT JOIN tb_taikhoan as tk ON tk.MaTK = dk.MaTK
                LEFT JOIN tb_goi as goi ON dk.MaGoi = goi.MaGoi";
                $query = mysqli_query($conn, $sql);
                $stt = 0;
                $date_current = date('Y-m-d');
                while ($row = mysqli_fetch_object($query)) {
                    $stt++;
                    if(strtotime($date_current) >= strtotime($row->NgayHetHan)){
                        echo "<script>auto_change_status('".$row->MaDK."','".$row->MaTK."')</script>";
                    }
                    // echo $row->MaTK;
                ?>
                    <tr>
                        <td align="center"><?= $stt ?></td>
                        <td><?= $row->TenDN ?></td>
                        <td><img src="../../image/product_image/<?= $row->HinhTT ?>" alt="" width="80px" height="100px" class="rounded" style="cursor: pointer;" onclick="show_img(<?=$row->MaDK?>)"></td>
                        <td><?= $row->NgayDK ?></td>
                        <td><?= $row->NgayHetHan ?></td>
                        <td><?= number_format($row->SoTien) ?></td>
                        <td><?= $row->SoDT ?></td>
                        <td>
                            <span class="d-flex align-center rounded p-2 alert-<?=($row->TrangThai == 1) ? 'success':'warning'?>" id="trangthai_dk<?=$row->MaDK?>"><?=($row->TrangThai == 1) ? 'Đang còn hạn':'Đã hết hạn'?></span>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="?page=sua_don_dangky&ma_don_dangky=<?php echo$row->MaDK;?>" type="button" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a href="?page=don_dangky&ma_don_dangky=<?php echo$row->MaDK;?>" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade p-0" id="hinh_tt" tabindex="-1" aria-labelledby="hinh_ttLabel" aria-hidden="true">
  <div class="modal-dialog p-0">
    <!-- <div class="text-end" style="z-index: 200;position: absolute;right: -28px; top: -28px;">
        <a class="text-white" data-bs-dismiss="modal" style="font-size: 30px;" href=""><i class="fa fa-window-close" aria-hidden="true" style="cursor: pointer"></i></a>
    </div> -->
    <div class="modal-content p-0" id="show_hinh_tt" style="position: relative;">
    </div>
   
  </div>
</div>
<?php 
    if(isset($_GET['ma_don_dangky'])){
        $uploaddir = "../../image/product_image/";
        $MaDK = $_GET['ma_don_dangky'];
        $select = mysqli_query($conn, "SELECT HinhTT FROM tb_dondk WHERE MaDK = $MaDK");
        $res = $select->fetch_object();
       echo $HinhTT = $res->HinhTT;
        if(file_exists($uploaddir.$HinhTT) == True){
            $unlink = unlink($uploaddir.$HinhTT);
            if($unlink){
                $del = mysqli_query($conn, "DELETE FROM tb_dondk WHERE MaDK = $MaDK");
                if($del){
                    echo"<script>window.location.href='?page=don_dangky'</script>";
                    
                }
            }else {
                echo"<script>$('#delete_err').attr('hidden', true);$('#delete_err').val('Xóa thành công');</script>";
            }
        } else {
            echo"<script>$('#delete_err').attr('hidden', true);$('#delete_err').val('Xóa thành công');</script>";
        }
    }
?>

<!-- ********************** table filter ********************** -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#tb_don_dk').DataTable({
            "ordering": false
        });
        $('.dataTables_length').addClass('bs-select');
    })
</script>
<script type="text/javascript">
    function show_img(madk){
        // $('#hinh_tt').modal('show');
        $.ajax({
            url: "../../controller/ControllerGetImage.php?get_img="+madk,
            type: "GET",
            data: {'madk':madk},
            success: function(data_R){
                var dt = JSON.parse(data_R);
                console.log(dt)
                var html = '';
                if(dt.status == 1){
                    html += "<img src='../../image/product_image/"+dt.img+"' alt='' class='rounded' style='width: 100%; height: 100vh'>"
                }
                
                $('#show_hinh_tt').html(html);
                $('#hinh_tt').modal('show');
                
            }
        })
        
    }
</script>

