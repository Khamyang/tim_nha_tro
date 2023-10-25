<?php
    $title = "";
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch ($page) {
            case 'home':
                include "./view/home.php";
                break;
            case 'login':
                    include "./view/login.php";
                break;
            case 'detail':
                include "./view/room_detail.php";
                break;
            default: 
                include "./view/home.php";
            break;
        }
    }else{
        include "./view/home.php";
    }
    
?>