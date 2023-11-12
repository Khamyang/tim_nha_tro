<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch ($page) {
            case 'don_dangky':
                include "../../view/admin/don_dangky.php";
                break;
            case 'chu_nha':
                include "../../view/admin/chu_nha.php";
                break;
            case 'profile':
                include "../../view/admin/personal_profile.php";
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