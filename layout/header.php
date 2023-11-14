<?php
// $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
session_start();
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
      font-size: 20px;
      color: #d24e02;
    }
    .navbar-brand:hover {
      color: #d24e02;
    }

    .nav-link,
    .navbar-toggler {
      color: white;
    }
    .nav-link:hover{
      color: #d24e02;
    }

    #user_popup {
      position: relative;
      right: 0
    }

    #list_user_popup {
      background-color: #d4ae25;
      border-radius: 3px;
      width: 200px;
      position: absolute;
      top: 2.5rem;
      right: 1rem;
      padding: 10px;
      display: none;
    }

    #list_user_popup li {
      list-style: none;
      padding: 5px;
    }

    #list_user_popup li a {
      text-decoration: none;
      color: #333;
    }
    #list_user_popup li:hover {
      background-color:darkgrey;
      color: #333;
    }
  </style>
</head>

<body id="top">
  <nav class="navbar navbar-expand-lg p-3" style="background-color: #333; position:fixed;left:0;right:0;top:0;z-index: 100">
    <div class="container-fluid">
    <img src="./image/logo_header.png" alt="" width="80px">
      <span class="navbar-brand">Trung tâm nhà trọ</span>
      <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php

      if (isset($_GET['page'])) {
        $page = $_GET['page'];
        // if($_GET['page'] == "login"){
        //   $active = "bg-primary rounded";
        // }
      } else {
        $page = "home";
      }
      ?>
      <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
            <a class="nav-link mx-2 <?= ($page == "home" || $page == "") ? "bg-primary rounded" : ""; ?>" aria-current="page" href="?page=home"><i class="nav-icon fas fa-home"></i> Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 <?= ($page == "my_home") ? "bg-primary rounded" : ""; ?>" href="?page=my_home">Quản lý nhà</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 <?= ($page == "blog") ? "bg-primary rounded" : ""; ?>" href="?page=blog">Blog</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link mx-2 <?= ($page == "gioi_thieu") ? "bg-primary rounded" : ""; ?>" href="?page=gioi_thieu">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 <?= ($page == "contact") ? "bg-primary rounded" : ""; ?>" href="?page=contact">Liên hệ</a>
          </li>
        </ul>
        <div class="search_bar">
            <form method="post" action="">
              <input type="text" class="form-control rounded-pill" placeholder="Tìm kiếm.." name="stext" required>
              <!-- <button type="submit"><i class="fa fa-search"></i></button>
             -->
            </form>
        </div>
        <ul class="navbar-nav ms-auto d-none d-lg-inline-flex">
          <?php if (isset($_SESSION['username']) == '') { ?>
            <li class="nav-item mx-2">
              <a class="nav-link h5 <?= ($page == "login") ? "bg-primary rounded" : ""; ?>" href="?page=login">Login</a>
            </li>
          <?php } else { ?>
            <?php include "user_popup.php";?>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  
  <!-- <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    let list_user_popup = document.getElementById('list_user_popup');
    let user_popup = document.getElementById('user_popup');
    user_popup.addEventListener('click', function() {
      if (list_user_popup.style.display === 'none' || list_user_popup.style.display === '') {
        list_user_popup.style.display = 'block';
      } else {
        list_user_popup.style.display = 'none';
      }
    });
  </script>

 