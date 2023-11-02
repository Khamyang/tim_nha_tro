<?php 
    if(isset($_SESSION['username']) == ''){
        if(isset($_REQUEST['page'])){
            if($_REQUEST['page'] == 'my_home'){
                echo"<script>window.location.href='./index.php?page=login'</script>";
            } else if ($_REQUEST['page'] == 'about'){
                echo"<script>window.location.href='./index.php?page=about'</script>";
            } else if ($_REQUEST['page'] == 'contact'){
                echo"<script>window.location.href='./index.php?page=contact'</script>";
            } else if ($_REQUEST['page'] == 'blog'){
                echo"<script>window.location.href='./index.php?page=blog'</script>";
            } else if ($_REQUEST['page'] == 'login'){
                echo"<script>window.location.href='./index.php?page=login'</script>";
            }
             else {
                echo"<script>window.location.href='./index.php?page=home'</script>";
            }
        }
        
    } 
?>