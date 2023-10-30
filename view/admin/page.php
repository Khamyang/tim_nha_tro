<?php
    $title = "";
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch ($page) {
            case 'dashboard':
                include "chu_nha.php";
                break;
                
            default: 
                include "chu_nha.php";
            break;
        }
    }else{
        include "./view/home.php";
    }
    
?>