<div class="card p-3">
    <div class="text-end mb-2">
        <!-- <button class="btn btn-primary">Thêm nhân viên</button> -->
        <a href="<?php if ($_SESSION['maquyen'] == 2 || $_SESSION['maquyen'] == 3) {echo "";} else {echo "?page=add_nhan_vien";}?>" class="btn btn-<?php if ($_SESSION['maquyen'] == 2 || $_SESSION['maquyen'] == 3) {echo "secondary"; } else {echo "primary";}?>" id="btn_add" name="btn_add" >Thêm nhân viên</a>
    </div>
    <div class="table-responsive">
    	<form action="" method="post" enctype="multipart/form-data">
	        <table class="table table-borderde table-hover table-striped" style="width: 100%;" id="tb_taikhoan">
	            <thead class="alert-success">
	                <tr>
	                    <th>STT</th>
	                    <th>Ảnh</th>
	                    <th>Mã nhân viên</th>
	                    <th>Tên đăng nhập</th>
	                    <th>Họ Tên nhân viên</th>
	                    <th>Quyển</th>
	                    <th>Giới tính</th>
	                    <th>Ngày sinh</th>
	                    <th>Địa chỉ</th>
	                    <th>Số điện thoại</th>
	                    <th>Sửa</th>
	                    <th>Xóa</th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php
	                $matk = $_SESSION['matk'];
	                $sql = "SELECT quyen.TenQuyen, tk.* FROM tb_quyen as quyen, tb_taikhoan as tk WHERE quyen.MaQuyen = tk.MaQuyen and tk.MaQuyen = 2 and tk.MaTK not in ($matk)";
	                $query = mysqli_query($conn, $sql);
	                $stt = 0;
	                while($row = mysqli_fetch_object( $query)){
	                    $stt++;
	                ?>
	                <tr>
	                    <td align="center"><?=$stt?></td>
	                    <td><img src="../../image/profile_image/<?=$row->profile_img?>" alt="" width="100px" class="rounded"></td>
	                    <td><?=$row->MaTK?></td>
	                    <td><?=$row->TenDN?></td>
	                    <td><?=$row->HoTen?></td>
	                    <td><?=$row->TenQuyen?></td>
	                    <td><?=$row->GioiTinh?></td>
	                    <td><?=$row->NgaySinh?></td>
	                    <td><?=$row->DiaChi?></td>
	                    <td><?=$row->SoDT?></td>
	                    <td>
	                        <a class="btn btn-sm btn-<?php if ($_SESSION['maquyen'] == 2 || $_SESSION['maquyen'] == 3) {echo "secondary"; } else {echo "success";}?>" id='btn_edit' href='<?php if ($_SESSION['maquyen'] == 2 || $_SESSION['maquyen'] == 3) {echo "";} else {echo "?page=edit_nhan_vien&edit_nhan_vien=".$row->MaTK;}?>' ><i class="fa fa-edit"></i></a>
	                    </td>
	                    <td>
	                        <button class="btn btn-sm btn-<?php if ($_SESSION['maquyen'] == 2 || $_SESSION['maquyen'] == 3) {echo "secondary"; } else {echo "danger";}?>" <?php if ($_SESSION['maquyen'] == 2 || $_SESSION['maquyen'] == 3) {echo "disabled";} else {echo "";}?> type="submit" id='btn_del' name="btn_del" value="<?=$row->MaTK?>"><i class="fa fa-trash"></i></button>
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
            echo "location='/tim_nha_tro/view/admin/?page=nhan_vien';";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('Xóa không thành công!');";
            echo "location='/tim_nha_tro/view/admin/?page=nhan_vien';";
            echo "</script>";
        }
        mysqli_close($conn);
 }
?>



<!-- ********************** table filter ********************** -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tb_taikhoan').DataTable({
                "ordering": false
            });
            $('.dataTables_length').addClass('bs-select');
        })
    </script>

    