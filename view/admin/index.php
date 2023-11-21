<?php include "../../connect/connect.php";
include "../../connect/session.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tim-nha-tro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<!-- select 2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
      background-color: #eeee;
    }

    /* .header span{
      display: ;
    } */
    .card {
      position: static;
      top: 30px;
    }

    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #0F2C59;
      overflow-x:hidden;
      transition: 0.4s;
      /* padding-top: 10px; */
    }

    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    .sidenav a:hover {
      color: #000;
      /* border-radius: 2px solid #c0392b; */
      background-color: #fff;
    }

    .sidenav .closebtn {
      /* position: absolute; */
      top: 0;
      right: 25px;
      font-size: 26px;
      margin-left: 50px;
    }
    #mySidenav{
      width: 260px;
    }

    .logo {
      background-color: darkgreen;
      border-bottom-right-radius: 20px;
      border-bottom-left-radius: 20px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .brand_logo_container {
      /* position: absolute; */
      height: 150px;
      width: 150px;
      border-radius: 50%;
      background: #fff;
      padding: 30px;
      text-align: center;
      /* border: 1px solid #c0392b; */
    }

    .brand_logo {
      height: 100px;
      width: 100px;
      border-radius: 50%;
      border: 2px solid white;
    }

    #main {
      transition: margin-left .5s;
      padding: 16px;
      background-color: #ffff;
      min-height: 100vh;
      margin-left: 260px;
    }

    .header {
      background-color: darkgreen;
      display: flex;
      justify-content: center;
      justify-items: center;
      justify-content: space-between
        /* position:fixed; */
    }

    .main_header {
      padding: 8px;
      box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
    }
    th{
      font-size: large;
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
      background-color: darkgrey;
      color: #333;
    }


    @media screen and (max-height: 450px) {
      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 18px;
      }
    }
  </style>
</head>
<body>
  <?php include "../../layout/admin/sidebar.php" ?>
  <div id="main">
    <div class="main_header">
      <header class="btn p-1 w-100 text-start header text-white">
        <span style="font-size:20px;cursor:pointer" id="open_sidebar" onclick="openNav()">&#9776; <?= $title ?> </span>
        <span style="font-size:20px;cursor:pointer; display:none" id="close_sidebar" onclick="closeNav()">&#9776; <?= $title ?> </span>
        <?php include "../../layout/admin/user_popup.php";?>
      </header>
    </div>
    <div class="container-fluid pt-2 p-0">
      <div class="content">
        <div class="row p-0 m-0">
          <?php include "../../layout/admin/page.php"
          ?>
        </div>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <!-- select2 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.getElementById('open_sidebar').style.display="none";
        document.getElementById('close_sidebar').style.display="block";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "260px";
        document.getElementById("main").style.marginLeft = "260px";
        document.getElementById('open_sidebar').style.display="block";
        document.getElementById('close_sidebar').style.display="none";
      }
    </script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script> -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
    <!-- <script src="../layout/swal.js" type="text/javascript"></script> -->
    
    
    <script>
      function swal_success(text_succ) {
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'success',
          title: text_succ,
          showConfirmButton: false,
          timer: 1500
        });
      }

      function swal_err(title, txt_err) {
        Swal.fire({
          // toast: true,
          position: 'center',
          icon: 'error',
          title: title,
          text: txt_err,
          showConfirmButton: true,
        });
      }
    </script>
</body>

</html>