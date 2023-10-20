<?php
    $title = "";
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch ($page) {
            case 'home':
                include "./view/home.php";
                break;
            default: 
                include "./view/login.php";
            break;
        }
    }
?>