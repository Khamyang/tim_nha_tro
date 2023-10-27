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
          font-size: 36px;
        }
        .nav-link,.navbar-brand,.navbar-toggler{
          color: white;
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
            <a class="nav-link mx-2 <?= ($page == "home" || $page == "") ? "bg-primary rounded" : ""; ?>" aria-current="page" href="?page=home">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="#">Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="?page=my_home">Quản lý nhà</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="#">Liên hệ</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto d-none d-lg-inline-flex">

          <?php if (isset($_SESSION['username']) == '') { ?>
            <li class="nav-item mx-2">
              <a class="nav-link h5 <?= ($page == "login") ? "bg-primary rounded" : ""; ?>" href="?page=login">Login</a>
            </li>
          <?php } else { ?>
            <div class="d-flex">
              <div class="pe-2 d-flex flex-column justify-content-center align-items-center">
                <label class="text-white">Chào bạn: <span class="text-danger"><?= $_SESSION['username'] ?></span></label>
              </div>
              <div id="user_popup">
                <span class="float-end bg-primary d-flex flex-column justify-content-center align-items-center rounded-circle" style="height: 30px; width:30px;margin-top:5px; margin-right: 5px;"><i class="fa fa-user"></i></span>
                <ul id="list_user_popup">
                  <li><a href="#exampleModal" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-key border p-2 rounded"></i> Thay đổi mật khẩu</a></li>
                  <li><a href=""><i class="fa fa-user border p-2 rounded"></i> Thông tin cá nhân</a></li>
                  <hr>
                  <li align="center"><a href=""><i class="fa fa-sign-out text-danger"></i> Logout</a></li>
                </ul>
              </div>

            </div>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thay đổi mật khẩu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="row mb-2">
            <div class="col-sm-4">
            <label for="">Mật khẩu cũ</label>
            </div>
            <div class="col-sm-8">
            <input type="password" class="form-control">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-sm-4">
            <label for="">Mật khẩu mới</label>
            </div>
            <div class="col-sm-8">
            <input type="password" class="form-control">
            </div>
          </div>
          <div class="row ">
            <div class="col-sm-4">
            <label for="">Xác nhận Mật khẩu</label>
            </div>
            <div class="col-sm-8">
            <input type="password" class="form-control">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-success">Lưu</button>
      </div>
    </div>
  </div>
</div>
  <!-- <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script> -->
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