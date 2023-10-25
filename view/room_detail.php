<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<style>
    #container_detail {
        background-color: maroon;
        border-radius: 10px;
    }

    * {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
  margin-top: 13px;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
.chi_tiet {
    background-color: black;
    width: 500px;
    height: 310px;
    border-radius: 5px;
}
</style>

<body>
    <div style="height: 100px;">
        <?php include "../layout/header.php" ?>
    </div>
        
        <div class="container-fluid pt-2 p-0 content">
        <div class="content">
            <div class="row p-0 m-0">
            
            </div>
        </div>
        <div>
    

    <div class="container" >
        <div class="row" id="container_detail">
            <section class="col-md-6">
                <!-- Slideshow container -->
                    <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="img_detail/pic1.jpg" style="width:100%">
                    <div class="text">Hình ảnh 1</div>
                    </div>

                    <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="img_detail/pic4.jpg" style="width:100%">
                    <div class="text">Hình ảnh 2</div>
                    </div>

                    <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="img_detail/pic3.jpg" style="width:100%">
                    <div class="text">Hình ảnh 3</div>
                    </div>

                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                    <br>

                    <!-- The dots/circles -->
                    <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    </div>

                    <script>
                        let slideIndex = 0;
                            showSlides();

                            function showSlides() {
                            let i;
                            let slides = document.getElementsByClassName("mySlides");
                            let dots = document.getElementsByClassName("dot");
                            for (i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";  
                            }
                            slideIndex++;
                            if (slideIndex > slides.length) {slideIndex = 1}    
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" active", "");
                            }
                            slides[slideIndex-1].style.display = "block";  
                            dots[slideIndex-1].className += " active";
                            setTimeout(showSlides, 2000); // Change image every 2 seconds
                            }
                    </script>
            </section>
            <section class="col=md-6" style="color:ivory;">
                <h1>CHI TIẾT:</h1>
                <section class="chi_tiet">
                    <p>Nhà trò phòng này </p>
                </section>
            </section>
        </div>
        <div class="row" style="background-color: Lightsalmon; margin-top:15px;">
            <section>Mô tả chi tiết</section>
        </div>
    </div>
        </div>
        </div>
        <?php include "../layout/footer.php" ?>

</body>
</html>