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
            case 'my_home':
                    include "./view/user/my_home.php";
                    break;
            case 'add_home':
                    include "./view/user/add_home.php";
                    break;
            default: 
                include "./view/home.php";
            break;
        }
    }else{
        include "./view/home.php";
    }
?>