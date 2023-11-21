<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch ($page) {
            case 'don_dangky':
                include "../../view/admin/don_dangky.php";
                break;
            case 'them_don_dangky':
                include "../../view/admin/them_don_dangky.php";
                break;
            case 'sua_don_dangky':
                include "../../view/admin/sua_don_dangky.php";
                break;
            case 'nha_thue':
                include "../../view/admin/nha_thue.php";
                break;
            case 'them_nha_thue':
                include "../../view/admin/them_nha_thue.php";
                break;
            case 'sua_nha_thue':
                include "../../view/admin/sua_nha_thue.php";
                break;
            case 'profile':
                include "../../view/admin/personal_profile.php";
                break;
            case 'nguoi_dung':
                include "../../view/admin/nguoi_dung.php";
                break;
            case 'them_nguoi_dung':
                include "../../view/admin/them_nguoi_dung.php";
                    break;
            case 'sua_nguoi_dung':
                include "../../view/admin/sua_nguoi_dung.php";
                break;
            case 'chitiet_thongtin_nguoidung':
                include "../../view/admin/chitiet_thongtin_nguoidung.php";
                break;
                
            default: 
            include "../../view/admin/don_dangky.php";
            break;
        }
    } else {
        include "../../view/admin/don_dangky.php";
        $page = '';
    }
