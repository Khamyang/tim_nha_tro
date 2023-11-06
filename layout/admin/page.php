<?php
 
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch ($page) {
            case 'hoa-don':
                include "../../view/admin/hoa_don.php";
                break;
            case 'chu-nha':
                include "../../view/admin/chu_nha.php";
                break;
            default: 
            include "../../view/admin/hoa_don.php";
            break;
        }
    } else {
        include "../../view/admin/hoa_don.php";
    }
?>