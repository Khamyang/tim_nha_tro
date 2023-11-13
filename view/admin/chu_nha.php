<div class="card p-3">
    <div class="text-end mb-2">
        <button class="btn btn-primary">Thêm nhà mới</button>
    </div>
    <div class="table-responsive">
        <table class="table table-borderde table-hover table-striped" style="width: 100%;" id="tb_chu_nha">
            <thead class="alert-success">
                <tr>
                    <th>STT</th>
                    <th>Tên chủ nhà</th>
                    <th>Hình ảnh</th>
                    <th>Huyện</th>
                    <th>Bản</th>
                    <th width="20%">Mô tả</th>
                    <th>Chi tiết địa chỉ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT th.*, tk.HoTen,tk.TenDN,h.TenHuyen,b.TenBan FROM tb_thong_tin_nha as th 
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
                    <td><img src="../../image/<?=$row->HinhAnh?>" alt="" width="100px" class="rounded"></td>
                    <td><?=$row->TenHuyen?></td>
                    <td><?=$row->TenBan?></td>
                    <td><?=$row->MoTa?></td>
                    <td><?=$row->DiaChi?></td>
                    <td>
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </td>
                </tr>
                <?php }?>
                
            </tbody>
        </table>
    </div>
</div>
<!-- ********************** table filter ********************** -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tb_chu_nha').DataTable({
                "ordering": false
            });
            $('.dataTables_length').addClass('bs-select');
        })
    </script>

    