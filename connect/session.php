<?php
    // session_start();
    // echo $_SESSION['maquyen'];
    if(isset($_SESSION['username']) == ''){
        header("Location: ../../?page=login");
    } else {
        if($_SESSION['maquyen'] == '3' || $_SESSION['maquyen'] == '4'){
            header("Location: ../../?page=home");
        }
        // if($_SESSION['maquyen'] == '1' || $_SESSION['maquyen'] == '2'){
        //     header("Location: ../../view/admin/index.php");
        // }
    }
?>