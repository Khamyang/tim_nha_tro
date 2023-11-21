
<footer class="site-footer">
    <div class="container" style="background-color: #eee; padding: 10px;">
        <div class="row ">
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="d-flex align-items-center mb-4">
                    <img src="image/logo.png" class="img-fluid logo-image" width="100">

                    <div class="d-flex flex-column">
                        <strong class="logo-text">VT-APARTMENT</strong>
                        <small class="logo-slogan" style="color: #c0392b;">Online 24 th</small>
                    </div>
                </div>
                <p class="mb-2">
                Chúng tôi là nhóm hỗ trợ bạn tìm kiếm một nhà trọ mà bạn mong muốn trong khu vực thủ đô Viêng Chăn
                </p>
            </div>
            <div class="col-lg-4 col-md-3 col-6 ms-lg-auto">
            </div>
            <div class="col-lg-4 col-md-8 col-12 mt-3 mt-lg-0">
                <h1 class="site-footer-title">Contact</h1>

                <p class="mb-2">
                    <span> Số điện thoại: 
                        <i class="custom-icon bi-telephone me-1"></i>
                        <a href="tel: 305-240-9671" class="site-footer-link">
                            +8562077716407
                        </a>
                    </span>

                </p>

                <p>
                    <span> Email:
                        <i class="custom-icon bi-envelope me-1"></i>

                        <a href="mailto:info@yourgmail.com" class="site-footer-link">
                            5xyoosovn@gmail.com
                        </a>
                    </span>

                </p>
                <div class="social_icon">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-youtube"></a>
                </div>
            </div>

        </div>
    </div>
    <div class="bg-secondary">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between" style="height: 50px;">
                <div>
                    <span>Copyright © VT-APARTMENT 2024</span>
                </div>
                <div>
                    <span>Phát triển bởi: <a class="sponsored-link" rel="sponsored" href="#">Nick Si Văn Bút Đa Phim</a></span>
                </div>
            </div>
        </div>

    </div>
</footer>
<button onclick="topFunction()" class="btn rounded p-3" style="position: fixed;bottom: 1.2rem; right:2px; display:none;background-color: #c0392b;" id="btn_back_top" title="Back to top" ><i class="fa fa-angles-up text-white" style="font-size:20px"></i></button>
            <script>
                var btn_back_top = document.getElementById('btn_back_top');

                function scrollFunction() {
                    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                        btn_back_top.style.display = "block";
                    } else {
                        btn_back_top.style.display = "none";
                    }
                }
                window.onscroll = function() {
                    scrollFunction();
                }

                function topFunction() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }
            </script>
</body>
</html>