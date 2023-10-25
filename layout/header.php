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
        .navbar-brand {
          font-size: 36px;
        }
        .nav-link,.navbar-brand,.navbar-toggler{
          color: white;
        }
        .navbar-brand:hover{
          color: #fff;
        }
    </style>
</head>

<body id="top">
<nav class="navbar navbar-expand-lg p-3" style="background-color: #333; position:fixed;left:0;right:0;top:0;z-index: 100">
      <div class="container-fluid">
        <span class="navbar-brand">Trung tâm nhà trọ</span>
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        if(isset($_GET['page'])){
          $page = $_GET['page'];
          // if($_GET['page'] == "login"){
          //   $active = "bg-primary rounded";
          // }
        }
        ?>
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2 <?= ($page == "home" || $page == "") ? "bg-primary rounded": "";?>" aria-current="page" href="?page=home">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="#">Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="#">Quản lý nhà</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="#">Liên hệ</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto d-none d-lg-inline-flex">
            <li class="nav-item mx-2">
              <a class="nav-link h5 <?= ($page == "login") ? "bg-primary rounded": "";?>" href="?page=login">Login</a>
            </li>
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