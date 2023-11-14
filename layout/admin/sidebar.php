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
    if(isset($_REQUEST['page'])){
        $page = $_REQUEST['page'];
        $title = "";
        if ($page == "chu_nha") {
            $title =  "Quản lý Chủ nhà";
        } elseif ($page == "nha_thue") {
            $title =  "Quản lý Nhà thuê";
        }
        elseif ($page == "don_dangky") {
            $title =  "Quản lý Đơn đăng ký";
        }
        elseif ($page == "nhan_vien" || $page == "them_nhan_vien" || $page == "sua_nhan_vien" || $page == 'chitiet_thongtin_nguoidung') {
            $title =  "Quản lý Nhân viên";
        }
        elseif ($page == "thong_ke") {
            $title =  "Thống kê";
        }
        elseif ($page == "profile") {
            $title =  "Thông tin cá nhân";
        }
    } else {
        $title =  "Quản lý Hóa đơn";
        $page = 'dsdf';
    }

?>
    <div class="menu mt-4">
    <a href="../../view/admin/?page=don_dangky" class="<?= (($page == "don_dangky" || $page == "") ? "bg-light" : ""); ?>" >Quản lý Đơn đăng ký</a>
    <!-- <a href="../../view/admin/?page=chu_nha" class="<?= (($page == "chu_nha") ? "bg-light" : ""); ?>">Quản lý Chủ nhà</a> -->
    <a href="../../view/admin/?page=chu_nha" class="<?= (($page == "chu_nha") ? "bg-light" : ""); ?>">Quản lý Nhà thuê</a>
    <a href="../../view/admin/?page=nhan_vien" class="<?= (($page == "nhan_vien" || $page == "them_nhan_vien" || $page == "sua_nhan_vien" || $page == "chitiet_thongtin_nguoidung") ? "bg-light" : ""); ?>">Quản lý Nhân viên</a>
    <a href="../../view/admin/?page=thong_ke" class="<?= (($page == "thong_ke") ? "bg-light" : ""); ?>">Thống kê</a>
    </div>
    
    <!-- <a href="?logout" class="btn btn-danger btn-sm text-white">Logout</a> -->
</div>