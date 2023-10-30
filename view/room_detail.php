<?php
// session_start();
// if (isset($_REQUEST['detail_id'])) {
//   $detail_id = 1;
// }
?>
<!-- Carousel wrapper -->
<div class="mt-3 mb-3">
  <div class="container">
    <div class="row">
      <div class="card p-4">
        <div class="row">
        <div class="col-sm-5 fa-border p-2">
          <div class="p-3 border rounded">
            <div class="card d-flex align-items-lg-center " style="width:100%" id="img_main">
              <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
            </div>
          </div>

          <!-- <div class="mt-3 mb-3 d-flex justify-content-center">
            <div class="m-2 d-flex align-items-lg-center " style="width:6rem">
              <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
            </div>
            <div class="m-2 d-flex align-items-lg-center " style="width:6rem">
              <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
            </div>
            <div class="m-2 d-flex align-items-lg-center " style="width:6rem">
              <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
            </div>
          </div> -->
          <div id="carouselExampleControls" class="mt-3 mb-3 carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="card-wrapper container-sm d-flex  justify-content-around">
                  <div class="card " style="width: 6rem;" id="img_sub1">
                    <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                  </div>
                  <div class="card  " style="width: 6rem;" onmouseover="change_img('vt-image.jpg')" onmouseout="img_old('patuxay.jpg')">
                    <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                  </div>
                  <div class="card  " style="width: 6rem;">
                    <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card-wrapper container-sm d-flex   justify-content-around">
                  <div class="card  " style="width: 6rem;">
                    <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                  </div>
                  <div class="card  " style="width: 6rem;">
                    <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                  </div>
                  <div class="card  " style="width: 6rem;">
                    <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                  </div>
                </div>
              </div>

              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
        <div class="col-sm-7">
            <textarea name="" id="" rows="10" class="form-control"></textarea>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function() {
    $('#img_sub1').click(function() {
      $('#img_main').html('<img src="./image/vt-image.jpg" class="card-img-top" alt="...">')
    })
  });

  function change_img(img) {
    $('#img_main').html('<img src="./image/vt-image.jpg" class="card-img-top" alt="...">')
  }

  function img_old(img) {
    $('#img_main').html('<img src="./image/' + img + '" class="card-img-top" alt="...">')
  }
</script>