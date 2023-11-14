<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .container {
        width: 1300px;
        margin-top: 60px;
    }

    .lien_he h1 {
        text-align: center;
        margin-bottom: 40px;

    }

    .lien_he small {
        margin-top: 20px;
        text-align: center;
    }

    .lien_he h3 {
        margin-top: 40px;
        text-align: left;
    }

    .lien_he p {
        text-align: left;
        font-size: 16pt;
    }
    p:hover{
        color: #000;
    }
    .map {
        margin: auto;
    }

    .form {
        margin-top: 80px;
    }

    .form small {
        color: orange;
        margin-bottom: 40px;
    }
    .social{
        margin-top: 40px;
        width: 100%;
        display: inline-block;
        text-align: center;
    }
    .social_icon{
        margin-top: 40px;
    }
    .fa {
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
    .social p{
        color: orange;
    }
</style>

<div class="container">
    <div class="lien_he">
        <h1 class="display3">Liên Hệ</h1>
        <small>Chúng tôi sẵn sàng hỗ trợ bạn</small>
        <hr>
        <h3>Liên hệ với bộ phận hỗ trợ của chúng tôi</h3>
        <p>Đội ngũ hỗ trợ của chúng tôi luôn sẵn sàng giúp đỡ bạn trong việc đăng nhà trọ của bạn và tìm kiếm phòng trọ phù hợp với yêu cầu và sự mong muốn của bạn.</p>
        <div class="map mt-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3717.0266061462503!2d103.94161450000001!3d21.309965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31328b2de8124fc1%3A0x854e8fc5957d1f6c!2sTay%20Bac%20University!5e0!3m2!1sen!2sla!4v1676732244900!5m2!1sen!2sla" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="thong_diep">
            <div class="row">
                <div class="col-sm-6">
                    <img src="./image/sending_mail.webp" alt="" class="mt-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="./image/email.jpg" alt="" width="250" height="auto">
                        </div>
                        <div class="col-sm-6">
                            <img src="./image/email_1.jpg" alt="" width="300" height="auto">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form">
                        <small><b>THÔNG ĐIỆP</b></small>
                        <h4 class="mb-4">Gửi tin nhắn tới chúng tôi</h4>
                        <form action="" method="post">
                            <div class="input-group mb-4">
                                <input type="text" name="cust_name" class="form-control p-3" placeholder="Họ tên" required>
                            </div>
                            <div class="input-group mb-4">
                                <input type="phone" name="phone" class="form-control p-3" placeholder="Điện thoại" required>
                            </div>
                            <div class="input-group mb-4">
                                <input type="email" name="email" class="form-control p-3" placeholder="Email" required>
                            </div>
                            <div class="input-group mb-4">
                                <textarea name="message" id="" class="form-control p-3" cols="30" rows="5" placeholder="Thông điệp"></textarea>
                            </div>
                            <input type="submit" name="submit" class="btn btn-success fw-bold p-3" value="Gửi thông điệp">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="social">
        <p class="text-center text-orange"><b>SOCIAL</b></p>
        <h3 class="text-center">Kết nối qua mạng xã hội</h3>
        <div class="social_icon">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-youtube"></a>
        </div>
    </div>
</div>

<?php

include_once('connect/connect.php');

if (isset($_POST['submit'])) {
    $name = $_POST['cust_name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $email = $_POST['email'];
    date_default_timezone_set('Asia/SaiGon');
    $date = date('Y/m/d H:i:s');
    
    $sql = "INSERT INTO lien_he (ten,dien_thoai,email, thong_diep,ngay_gio) VALUES ('$name','$phone', '$email','$message','$date')";
    // $query = mysqli_query($conn, $sql);

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Cảm ơn bạn, Chúng tôi sẽ liên hệ sớm đến bạn!')</script>";
        echo "<script>window.location.href='?page=lien_he'</script>";
    }
}
?>