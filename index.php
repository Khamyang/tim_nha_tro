


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">


    <link href="css/style.css" rel="stylesheet">
    <style>
        #district:hover {
            margin-top: -40px;
            background-color: #f65129;
        }

        p:hover {
            color: #f65129;
            cursor: pointer;
        }
        .content_district{
          height: 300px;
        }
    </style>
</head>
<body>
  <div style="height: 100px;">
    <?php include "layout/header.php" ?>
  </div>
    
    <div class="container-fluid pt-2 p-0 content">
      <div class="content">
        <div class="row p-0 m-0">
          <?php include "layout/page.php"
          ?>
        </div>
      </div>
      <div>
        kham-update
      </div>
    </div>
    <?php include "layout/footer.php" ?>
</body>
</html>