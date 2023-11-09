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
        if ($page == "chu-nha") {
            $title =  "Quản lý Chủ nhà";
        } elseif ($page == "nha-thue") {
            $title =  "Quản lý Nhà thuê";
        }
        elseif ($page == "hoa-don") {
            $title =  "Quản lý Hóa đơn";
        }
        elseif ($page == "nhan-vien") {
            $title =  "Quản lý Nhân viên";
        }
        elseif ($page == "thong-ke") {
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
    <a href="../../view/admin/?page=hoa-don" class="<?= (($page == "hoa-don" || $page == "") ? "bg-light" : ""); ?>" >Quản lý Hóa đơn</a>
    <a href="../../view/admin/?page=chu-nha" class="<?= (($page == "chu-nha") ? "bg-light" : ""); ?>">quản lý chủ nhà</a>
    <a href="../../view/admin/?page=nha-thue" class="<?= (($page == "nha-thue") ? "bg-light" : ""); ?>">quản lý Nhà thuê</a>
    <a href="../../view/admin/?page=nhan-vien" class="<?= (($page == "nhan-vien") ? "bg-light" : ""); ?>">quản lý Nhân viên</a>
    <a href="../../view/admin/?page=thong-ke" class="<?= (($page == "thong-ke") ? "bg-light" : ""); ?>">Thống kê</a>
    </div>
    
    <!-- <a href="?logout" class="btn btn-danger btn-sm text-white">Logout</a> -->
</div>