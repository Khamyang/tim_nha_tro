<?php
    $title = "";
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch ($page) {
            case 'home':
                include "../view/admin/chu_nha.php";
                break;
            default: 
            include "../view/admin/chu_nha.php";
                break;
            break;
        }
    }else{
        include "./view/home.php";
    }
    
?>