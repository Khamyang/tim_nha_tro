<div id="mySidenav" class="sidenav">
    <div class=" m-0 p-2 logo">
        <!-- <span onclick="closeNav()" style="font-size:40px;cursor:pointer;position:absolute;top:-12px;right:5px">&times;</span> -->
        <div class="pt-2">
            <div class="d-flex justify-content-center ">
                <img src="../../image/admin_logo.png" class="brand_logo" alt="Logo">
            </div>
        </div>
        <div class="d-flex justify-content-center mb-2 text-white">
            <h3>Quản lý tìm nhà trọ</h3>
        </div>
    </div>
    <?php
    $active = "";
    if (isset($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
        $title = "";
        if ($page == "chu_nha") {
            $title =  "Quản lý Chủ nhà";
        } else if ($page == "nha_thue") {
            $title =  "Quản lý Nhà thuê";
        }else if ($page == "them_nha_thue") {
            $title =  "Quản lý Nhà thuê <i class='fa fa-angles-right'></i><span style='color:chocolate'> Thêm nhà thuê</span>";
        }else if ($page == "sua_nha_thue") {
            $title =  "Quản lý Nhà thuê <i class='fa fa-angles-right'></i><span style='color:chocolate'> Sửa nhà thuê</span>";
        }else if ($page == "don_dangky" || $page == "") {
            $title =  "Quản lý Đơn đăng ký";
        }else if ($page == "them_don_dangky") {
             $title =  "Quản lý Nhà thuê <i class='fa fa-angles-right'></i><span style='color:chocolate'> Thêm đơn đang ký</span>";
        }else if ($page == "sua_don_dangky") {
             $title =  "Quản lý Nhà thuê <i class='fa fa-angles-right'></i><span style='color:chocolate'> Sửa đơn đang ký</span>";
        }else if ($page == "nguoi_dung") {
            $title =  "Quản lý Nhân viên";
        } else if ($page == "them_nguoi_dung") {
            $title =  "Quản lý Nhà thuê <i class='fa fa-angles-right'></i><span style='color:chocolate'> Thêm người dùng</span>";
        } else if ($page == "sua_nguoi_dung") {
            $title =  "Quản lý Nhà thuê <i class='fa fa-angles-right'></i><span style='color:chocolate'> Sửa người dùng</span>";
        } else if ($page == 'chitiet_thongtin_nguoidung') {
            $title =  "Quản lý Nhà thuê <i class='fa fa-angles-right'></i><span style='color:chocolate'> Chi tiết người dùng</span>";
        } elseif ($page == "profile") {
            $title =  "Thông tin cá nhân";
        }
    } else {
        $title =  "Quản lý Đơn đăng ký";
        $page = '';
    }

    ?>
    <div class="menu mt-4">
        <a href="../../view/admin/?page=don_dangky" class="<?= (($page == "don_dangky" || $page == "" || $page == "them_don_dangky" || $page == "sua_don_dangky") ? "bg-light" : ""); ?>">Quản lý Đơn đăng ký</a>
        <a href="../../view/admin/?page=nha_thue" class="<?= (($page == "nha_thue" || $page == "them_nha_thue" || $page == "sua_nha_thue") ? "bg-light" : ""); ?>">Quản lý Nhà thuê</a>
        <a href="../../view/admin/?page=nguoi_dung" class="<?= (($page == "nguoi_dung" || $page == "them_nguoi_dung" || $page == "sua_nguoi_dung" || $page == "chitiet_thongtin_nguoidung") ? "bg-light" : ""); ?>">Quản lý Người dùng</a>
        <!-- <a href="../../view/admin/?page=thong_ke" class="<?= (($page == "thong_ke") ? "bg-light" : ""); ?>">Thống kê</a> -->
    </div>

    <!-- <a href="?logout" class="btn btn-danger btn-sm text-white">Logout</a> -->
</div>