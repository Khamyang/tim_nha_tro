<?php
$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Vientien Apartment</title>
    <style>
        #user_pro {
            position: relative;
        }

        .popup_user_pro {
            box-shadow: 0 0 1px rgb(255, 255, 255);
            padding: 5px;
            margin-top: 10px;
            position: absolute;
            right: 0;
            width: 150px;
            background-color: #dbd2d0;
            border-radius: 2px;
            display: none;


        }

        #popup_user_pro li {
            list-style: none;
            color: #e9eaeb;

        }

        #popup_user_pro li a {
            text-decoration: none;
            color: #000000;

        }
    </style>
</head>

<body id="top">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.html">
                <img src="images/logo1.png" class="img-fluid logo-image">
                <div class="d-flex flex-column">
                    <strong class="logo-text">VT-APARTMENT</strong>
                    <small class="logo-slogan">Online 24 th</small>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-center ms-lg-5">
                    <li class="nav-item ">
                        <a class="nav-link" href="?page=home" <?= ($curPageName == 'index.php') ? "style='background-color: #f65129;padding:  2px 10px 2px 10px; border-radius: 5px; color: #fff'" : ''; ?>>Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" role="button" aria-expanded="false">Blog</a>
                        
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" role="button" aria-expanded="false">Quản lý nhà</a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php" <?= ($curPageName == 'about.php') ? "style='background-color: #f65129;padding:  2px 10px 2px 10px; border-radius: 5px;color: #fff'" : ''; ?>>About VT-APM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php" <?= ($curPageName == 'contact.php') ? "style='background-color: #f65129;padding:  2px 10px 2px 10px; border-radius: 5px;color: #fff'" : ''; ?>>Contact</a>
                    </li>
                    <!-- <li class="nav-item ms-lg-auto">
                        <a class="btn btn-danger btn-sm me-5" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                    </li> -->
                    <li class="nav-item ms-lg-auto">
                        <?php if ($curPageName == 'login.php') { ?>
                            <a class="btn btn-sm me-5" href="login.php" style="background-color: #f65129;">Login</a>
                        <?php } else { ?>
                            <a class="btn btn-danger btn-sm me-5" href="login.php">Login</a>
                            <!-- <a class="nav-link" href="about.php">About VT-APM</a> -->
                        <?php } ?>

                    </li>
                    <?php $user_type = 3;
                    if ($user_type == 1) { ?>
                        <li class="nav-item" id="user_pro">
                            <button class="btn btn-sm bg-success" id="btn_user_pro"><i class="fa-solid fa-user"></i></button>
                            <ul class="popup_user_pro" id="popup_user_pro">
                                <li><a href="#" id="lg_change1"><img src="images/icons/vietnam.png" width="20" alt="">Vietname</a></li>
                                <li><a href="#" id="lg_change2"><img src="images/icons/laos.png" width="20" alt=""> Lao</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script> -->
    <script>
        let popup_user_pro = document.getElementById('popup_user_pro');
        let btn_user_pro = document.getElementById('btn_user_pro');
        let lg_change1 = document.getElementById('lg_change1');
        let lg_change2 = document.getElementById('lg_change2');
        let lg_change3 = document.getElementById('lg_change3');
        let lg_change4 = document.getElementById('lg_change4');
        btn_user_pro.addEventListener('click', function() {
            if (popup_user_pro.style.display === 'none' || popup_user_pro.style.display === '') {
                popup_user_pro.style.display = 'block';
            } else {
                popup_user_pro.style.display = 'none';
            }
        })
        lg_change1.addEventListener('click', function() {
            popup_user_pro.style.display = 'none';
        });
        lg_change2.addEventListener('click', function() {
            popup_user_pro.style.display = 'none';
        })
        lg_change3.addEventListener('click', function() {
            popup_user_pro.style.display = 'none';
        })
        lg_change4.addEventListener('click', function() {
            popup_user_pro.style.display = 'none';
        })

        // $(document).ready(function(){
        //     $('#btn_user_pro').click(function(){
        //         $('.popup_user_pro').removeAttr('hidden');
        //     })
        // })
    </script>