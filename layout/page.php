<?php
$title = "";
if (isset($_GET['page'])) {
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
        case 'profile':
            include "./view/personal_profile.php";
            break;
        case 'my_home':
            include "./view/user/my_home.php";
            break;
        case 'add_home':
            include "./view/user/add_home.php";
            break;
        case 'edit_home':
            include "./view/user/edit_home.php";
            break;
        case 'gioi_thieu':
            include "./view/gioi_thieu.php";
            break;
        case 'contact':
            include "./view/lien_he.php";
            break;
        case 'thaydoi_matkhau':
            include "./view/thaydoi_matkhau.php";
            break;
        default:
            include "./view/home.php";
            break;
    }
} else {
    include "./view/home.php";
}
