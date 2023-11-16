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
</style>
<div class="card p-3">
    <div class="text-end mb-2">
        <button class="btn btn-primary">Thêm nhà mới</button>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="table-responsive">
            <table class="table table-borderde table-hover table-striped" style="width: 100%;" id="tb_chu_nha">
                <thead class="alert-success">
                    <tr>
                        <th>STT</th>
                        <th>Tên chủ nhà</th>
                        <th>Tên nhà</th>
                        <th>Hình ảnh</th>
                        <th>Huyện</th>
                        <th>Bản</th>
                        <th width="20%">Mô tả</th>
                        <th>Chi tiết địa chỉ</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT th.*, tk.MaQuyen, tk.HoTen,tk.TenDN,h.TenHuyen,b.TenBan FROM tb_thong_tin_nha as th 
                    LEFT JOIN tb_taikhoan as tk ON th.MaTK = tk.MaTK
                    LEFT JOIN tb_huyen as h ON th.MaHuyen = h.MaHuyen
                    LEFT JOIN tb_ban as b ON th.MaBan = b.MaBan";
                    $query = mysqli_query($conn, $sql);
                    $stt = 0;
                    while($row = mysqli_fetch_object( $query)){
                        $stt++;
                    ?>
                    <tr>
                        <td align="center"><?=$stt?></td>
                        <td><?=$row->TenDN?></td>
                        <td><?=$row->TenNha?></td>
                        <td><img src="../../image/product_image/<?=$row->HinhAnh?>" alt="" width="100px" class="rounded"></td>
                        <td><?=$row->TenHuyen?></td>
                        <td><?=$row->TenBan?></td>
                        <td><?=$row->MoTa?></td>
                        <td><?=$row->DiaChi?></td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" <?=($row->TrangThai == 1) ? 'checked':'unchecked';?> id="trangthai_dk<?=$row->MaDK?>" <?php if(($row->MaQuyen == 1) || ($row->MaQuyen == 2)) {echo "";} else {echo "disabled";}?>>
                                <span class="slider round" data-on-label="On" data-off-label="Off"></span>
                            </label>
                        </td>
                        <td>
                            <a href="<?php if(($row->MaQuyen == 1) || ($row->MaQuyen == 2)) {echo "?page=sua_nha_thue&sua_nha_thue=".$row->MaNha;} else {echo "";}?>" class="btn btn-<?php if(($row->MaQuyen == 1) || ($row->MaQuyen == 2)) {echo "info";} else {echo "secondary";}?>" name="sua_nha_thue" id="sua_nha_thue" ><i class="fa fa-edit" aria-hidden="true"></i></a>
                            <button type="submit" class="btn btn-danger" name="btn_xoa" id="btn_xoa" value="<?php echo $row->MaNha; ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                    <?php }?>
                    
                </tbody>
            </table>
        </div>
    </form>
</div>

<?php 
//Xoa Nha
    //include "../connect/connect.php";
    if (isset($_POST['btn_xoa'])) {
    $MaNha = $_POST['btn_xoa'];
    $sql = "SELECT * FROM tb_thong_tin_nha WHERE MaNha = $MaNha";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()) {
            $image = $row['HinhAnh'];
        }
    }
        //unlink("./image/product_image/".$image);
        $sql = "DELETE FROM tb_thong_tin_nha WHERE MaNha = $MaNha";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script type='text/javascript'>";
            //echo "alert('Đã xóa thành công".$MaNha."');";
            echo "location='index.php?page=nha_thue';";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('Xóa không thành công!');";
            echo "location='index.php?page=nha_thue';";
            echo "</script>";
        }
        mysqli_close($conn);
 }
?>



<!-- ********************** table filter ********************** -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#tb_chu_nha').DataTable({
            "ordering": false
        });
        $('.dataTables_length').addClass('bs-select');
    })
</script>




