<?php include "connect/connect.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="style.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- slide -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <style>
    body{
      font-family: 'Times New Roman', Times, serif;
    }
    #district:hover {
      margin-top: -40px;
      background-color: #f65129;
    }

    p:hover {
      color: #f65129;
      cursor: pointer;
    }

    .content_district {
      height: 300px;
    }

    .site-footer-bottom {
      background-color: #666;
      display: flex;
      justify-items: center;
      height: 50px;
      justify-content: center;
    }
    a {
      text-decoration: none;
      color:black;
    }
    .fa-facebook,.fa-twitter,.fa-youtube {
        padding: 20px;
        font-size: 30px;
        width: 70px;
        text-align: center;
        text-decoration: none;
        text-align: center;
    }

    .fa:hover {
        opacity: 0.7;
    }
    .fa-facebook {
        background: #3B5998;
        color: white;
    }

    .fa-twitter {
        background: #55ACEE;
        color: white;
    }
    .fa-youtube {
    background: #bb0000;
    color: white;
    }
  </style>
</head>

<body>
  <div style="height: 60px;">
    <?php include "layout/header.php" ?>
  </div>

  <div class="container-fluid pt-2 p-0 content">
    <div class="content">
      <div class="row p-0 m-0">
        <?php include "layout/page.php"
        ?>
      </div>
    </div>
  </div>
  <?php include "layout/footer.php" ?>
</body>
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

</html>