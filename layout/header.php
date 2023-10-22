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
<nav class="navbar navbar-expand-lg navbar-light bg-info p-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">DBook Inc</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2 active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="#">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Company
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Blog</a></li>
                <li><a class="dropdown-item" href="#">About Us</a></li>
                <li><a class="dropdown-item" href="#">Contact us</a></li>
              </ul>
            </li>
          </ul>
          <!-- <ul class="navbar-nav ms-auto d-none d-lg-inline-flex">
            <li class="nav-item mx-2">
              <a class="nav-link text-dark h5" href="" target="blank"><i class="fab fa-google-plus-square"></i></a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link text-dark h5" href="" target="blank"><i class="fab fa-twitter"></i></a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link text-dark h5" href="" target="blank"><i class="fab fa-facebook-square"></i></a>
            </li>
          </ul> -->
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, qui.</p>
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