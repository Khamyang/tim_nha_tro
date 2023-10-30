<?php 
session_start();
    if(isset($_REQUEST['logout'])){
        unset($_SESSION['username']);
        unset($_SESSION['maquyen']);
        unset($_SESSION['matk']);
        header("Location: ../?page=home");
    }
?>