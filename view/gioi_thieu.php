<style>
    .container {
        width: 1300px;
        margin-top: 60px;
    }

    p:hover {
        color: #000;
    }

    #more {
        display: none;
    }
</style>

<div class="container mt-4 mb-4">
    <h1 class="mt-4 mb-4 text-center">Giới thiệu</h1>
    <div class="row">
        <div class="col-sm-6">
            <div class="about_us_profile">
                <img src="./image/nha-tro.jpg" alt="" width="600px">
            </div>
        </div>
        <div class="col-sm-6">
            <h3 class="mt-4">Về chúng tôi</h3>
            <p class="mt-4">Chúng tôi là nhóm hỗ trợ bạn tìm kiếm một nhà trọ mà bạn mong muốn trong khu vực thủ đô Viêng Chăn. Với hằng nghìn nhà đăng cho thuê (tính tới 14/11/2023), Chợ tốt đang là một trong số các website mua bán, rao vặt trực tuyến hàng đầu tại Lào. Website sở hữu giao diện đơn giản, dễ nhìn, cách sắp xếp các tiêu chí rõ ràng, giúp bạn tìm được các nội dung cần thiết nhanh chóng và dễ dàng hơn.<span id="dots"></span></p>
            <span id="more">
                <p>Bạn có thể dễ dàng tìm kiếm phòng trọ cho thuê bằng cách lọc các tiêu chí cơ bản, được hiển thị trên trang như: giá, khu vực, diện tích, tình trạng nội thất và có hình ảnh mô tả.</p>
                <p>Đây là kênh thông tin Phòng Trọ số 1 tại Lào với hơn 100.000 tin đăng và hơn 2.500.000 lượt xem mỗi tháng. Giao diện của trang web thân thiện, dễ dàng sử dụng, được phân loại theo 4 đặc điểm chính là hình thức cho thuê, khu vực, giá và diện tích. Ưu điểm của trang web này các sản phẩm phòng trọ cho thuê đa dạng, phù hợp với túi tiền của mọi người. Bên cạnh đó, bạn có thể liên hệ với người chủ nhà thông qua số điện thoại, hoặc để lại số điện thoại của bạn trên phần comment để chủ có thể liên hệ bạn.</p>
            </span>

            <button onclick="readMore();" id="myBtn" class="btn btn-success">Read more >></button>
        </div>
    </div>
    <div class="row mt-4">
        <div class="row mt-4">
            <div class="col-sm-6 mt-4">
                <h3 class="">Mục tiêu</h3>
                <p class="mt-4">Website của chúng ta được tạo ra nhằm mục đích giúp những người muốn tìm một nhà trọ phù hợp theo mong muốn của mình trong khu vực thủ đô Viêng Chăn, đặc biệt là những người ở xa sang Viêng Chăn để học tập hay làm việc.</p>
                <p>Để tiết kiểm thời gian và chi phí của bạn phải đi tìm khắp nơi hãy truy cập <a href="#">Website</a> của chúng tôi ngay để bạn còn được hỗ trợ </p>
            </div>
            <div class="col-sm-6">
                <img src="./image/muc-tieu.jpg" alt="" width="300px" style="margin: auto; display: block;">
            </div>
        </div>
    </div>
</div>

<script>
    function readMore() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    }
</script>