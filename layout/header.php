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
            <a class="nav-link mx-2 <?= ($page == "home" || $page == "") ? "bg-primary rounded" : ""; ?>" aria-current="page" href="?page=home">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 <?= ($page == "blog") ? "bg-primary rounded" : ""; ?>" href="?page=blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 <?= ($page == "my_home") ? "bg-primary rounded" : ""; ?>" href="?page=my_home">Quản lý nhà</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 <?= ($page == "about") ? "bg-primary rounded" : ""; ?>" href="?page=about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2 <?= ($page == "lien_he") ? "bg-primary rounded" : ""; ?>" href="?page=lien_he">Liên hệ</a>
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
                  <li><a href="?page=profile"><i class="fa fa-user border p-2 rounded"></i> Thông tin cá nhân</a></li>
                  <hr>
                  <li align="center"><a href="./controller/ControllerLogout.php?logout"><i class="fa fa-sign-out text-danger"></i> Logout</a></li>
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
        <form action="" id="form_change_pass">
          <div class="modal-body">
            <input type="hidden" name="matk" id="matk" value="<?= $_SESSION['matk'] ?>">
            <div class="row mb-2">
              <div class="col-sm-4">
                <label for="">Mật khẩu cũ</label>
              </div>
              <div class="col-sm-8">
                <input type="password" name="old_password" id="old_password" class="form-control" required>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-sm-4">
                <label for="">Mật khẩu mới</label>
              </div>
              <div class="col-sm-8">
                <input type="password" name="new_password" id="new_password" class="form-control" required>
              </div>
            </div>
            <div class="row ">
              <div class="col-sm-4">
                <label for="">Xác nhận Mật khẩu</label>
              </div>
              <div class="col-sm-8">
                <input type="password" name="comfirm_password" id="comfirm_password" class="form-control" required>
                <span class="text-danger" hidden id="comfirm_pass_err">Xác nhận Mật khẩu không đúng</span>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-success">Lưu</button>
          </div>
        </form>
      </div>
    </div>
  </div>
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

  <script>
    $(document).ready(function() {
      $('#form_change_pass').submit(function(e) {
        e.preventDefault();
        var matk = $("#matk").val();
        var old_pass = $('#old_password').val();
        var new_pass = $('#new_password').val();
        var comfirm_pass = $('#comfirm_password').val();

        if (new_pass != comfirm_pass) {
          $('#comfirm_pass_err').attr('hidden', false);
        } else {
          $.ajax({
            url: "controller/ControllerChangePassword.php?change_pass=1",
            type: "POST",
            data: {
              "matk": matk,
              "old_pass": old_pass,
              "new_pass": new_pass
            },
            success: function(data_res) {
              var db_res = JSON.parse(data_res);
              console.log(db_res)
              if (db_res.status == 1) {
                swal_success(db_res.msg);
                window.setTimeout(function() {
                  location.reload();
                }, 1500);
              }
              if (db_res.status == 0) {
                swal_err(db_res.msg, db_res.txt);
              }
            }
          })
        }
      })
    })
  </script>