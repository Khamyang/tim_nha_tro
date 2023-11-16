<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch ($page) {
            case 'don_dangky':
                include "../../view/admin/don_dangky.php";
                break;
            case 'nha_thue':
                include "../../view/admin/nha_thue.php";
                break;
            case 'sua_nha_thue':
                include "../../view/admin/sua_nha_thue.php";
                break;
            case 'profile':
                include "../../view/admin/personal_profile.php";
                break;
            case 'nhan_vien':
                include "../../view/admin/nhan_vien.php";
                break;
            case 'add_nhan_vien':
                include "../../view/admin/add_nhan_vien.php";
                break;
            case 'edit_nhan_vien':
                include "../../view/admin/edit_nhan_vien.php";
                break;
            case 'chitiet_thongtin_nguoidung':
                include "../../view/admin/chitiet_thongtin_nguoidung.php";
                break;
            case 'sua_don_dangky':
                include "../../view/admin/sua_don_dangky.php";
                break;
            default: 
            include "../../view/admin/don_dangky.php";
            break;
        }
    } else {
        include "../../view/admin/don_dangky.php";
        $page = '';
    }
?>