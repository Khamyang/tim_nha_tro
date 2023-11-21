<style>
    #tb_nguoi_dung_filter label {
        margin-bottom: 5px;
    }
</style>
<div class="card p-3">
    <?php if(isset($_SESSION['add_succ'])){?>
        <div class="col-sm-12 p-3 mb-2 alert-success rounded"><?php echo$_SESSION['add_succ']; unset($_SESSION['add_succ'])?></div>
    <?php }?>
    <div class="text-end mb-2">
        <!-- <button class="btn btn-primary">Thêm người dùng</button> -->
        <a href="<?php if ($_SESSION['maquyen'] == 2) {echo "javascript:void(0)";} else {echo "?page=them_nguoi_dung";}?>" class="btn btn-<?php if ($_SESSION['maquyen'] == 2) {echo "secondary"; } else {echo "primary";}?>" id="btn_add" name="btn_add" >Thêm người dùng</a>
    </div>
    <div class="table-responsive">
    	<form action="" method="post" enctype="multipart/form-data">
	        <table class="table table-borderde table-hover table-striped" style="width: 100%;" id="tb_nguoi_dung">
	            <thead class="alert-success">
	                <tr>
	                    <th class="text-center">STT</th>
	                    <th>Ảnh</th>
	                    <th>Tên đăng nhập</th>
	                    <th>Họ Tên người dùng</th>
	                    <th class="text-center">Quyền</th>
	                    <th>Số điện thoại</th>
	                    <th>Thao tác</th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php
	                $matk = $_SESSION['matk'];
	                $sql = "SELECT quyen.MaQuyen,quyen.TenQuyen, tk.* FROM tb_quyen as quyen, tb_taikhoan as tk WHERE quyen.MaQuyen = tk.MaQuyen and tk.MaTK not in ($matk)";
	                $query = mysqli_query($conn, $sql);
	                $stt = 0;
                    $color_quyen ='';
	                while($row = mysqli_fetch_object( $query)){
                        if($row->MaQuyen == 1){
                            $color_quyen = "<span class='p-1 bg-success rounded-pill '>";
                        } else if($row->MaQuyen == 2) {
                            $color_quyen = "<span class='p-1 bg-info rounded-pill '>";
                        } else if($row->MaQuyen == 3 || $row->MaQuyen == 4) {
                            $color_quyen = "<span class='p-1 bg-warning rounded-pill '>";
                        }
	                    $stt++;
	                ?>
	                <tr class="">
	                    <td align="center"><?=$stt?></td>
	                    <td><img src="../../image/profile_image/<?=(!empty($row->profile_img)) ? $row->profile_img : 'user_profile.jpg';?>" alt="" style="width: 45px; height: 45px" class="rounded-circle"></td>
	                    <td><?=$row->TenDN?></td>
	                    <td><?=$row->HoTen?></td>
	                    <td align="center"><?=$color_quyen.$row->TenQuyen."</span>"?></td>
	                    <td><?=$row->SoDT?></td>
	                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a class="btn btn-info" id='chitiet_thongtin_nguoidung' href='?page=chitiet_thongtin_nguoidung&chitiet_thongtin_nguoidung=<?php echo $row->MaTK; ?>' ><i class="fa fa-eye"></i></a>
	                        <a class="btn btn-<?php if ($_SESSION['maquyen'] == 2) {echo "secondary"; } else {echo "success";}?>" id='btn_edit' href='<?php if ($_SESSION['maquyen'] == 2) {echo "";} else {echo "?page=sua_nguoi_dung&sua_nguoi_dung=".$row->MaTK;}?>' ><i class="fa fa-edit"></i></a>

	                        <button class="btn btn-<?php if ($_SESSION['maquyen'] == 2) {echo "secondary"; } else {echo "danger";}?>" <?php if ($_SESSION['maquyen'] == 2) {echo "disabled";} else {echo "";}?> type="submit" id='btn_del' name="btn_del" value="<?=$row->MaTK?>"><i class="fa fa-trash"></i></button>
                        </div>
	                    </td>
	                </tr>
	                <?php }?>
	            </tbody>
        </table>
        </form>
    </div>
</div>

<?php 
//Delete_NhanVien
    //include "../../connect/connect.php";
    if (isset($_POST['btn_del'])) {
    $MaTK = $_POST['btn_del'];
    $sql = "SELECT * FROM tb_taikhoan WHERE MaTK = $MaTK";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()) {
            $image = $row['profile_img'];
        }
    }
        //unlink("../image/product_image/".$image);
        $sql = "DELETE FROM tb_taikhoan WHERE MaTK = $MaTK";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script type='text/javascript'>";
            //echo "alert('Đã xóa thành công".$MaNha."');";
            echo "location='/tim_nha_tro/view/admin/?page=nguoi_dung';";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('Xóa không thành công!');";
            echo "location='/tim_nha_tro/view/admin/?page=nguoi_dung';";
            echo "</script>";
        }
        mysqli_close($conn);
 }
?>



<!-- ********************** table filter ********************** -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tb_nguoi_dung').DataTable({
                "ordering": false
            });
            $('.dataTables_length').addClass('bs-select');
        })
    </script>

    