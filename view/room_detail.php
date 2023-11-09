
<style>

  .form {
    background-color: #eee;
    border-radius: 10px;
    padding: 40px;
    color: black;
    font-family: "Times New Roman", Times, serif;
  }
 
  .submit_button{
    text-align: center;
    display: block;
    margin-bottom: 10px;
  }
</style>

<?php
// session_start();
if (isset($_REQUEST['home_id'])) {
  $detail_id = $_REQUEST['home_id'];

  $sql = mysqli_query($conn, "SELECT*FROM tb_thong_tin_nha WHERE MaNha = '$detail_id'");
  $res = mysqli_fetch_object($sql);

}
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
              <img src="./image/<?=$res->HinhAnh?>" class="card-img-top" alt="...">
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
                    <img src="./image/<?=$res->HinhAnh?>" class="card-img-top" alt="...">
                  </div>
                  <div class="card  " style="width: 6rem;" onmouseover="change_img('vt-image.jpg')" onmouseout="img_old('<?=$res->HinhAnh?>')">
                    <img src="./image/<?=$res->HinhAnh?>" class="card-img-top" alt="...">
                  </div>
                  <div class="card  " style="width: 6rem;">
                    <img src="./image/<?=$res->HinhAnh?>" class="card-img-top" alt="...">
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card-wrapper container-sm d-flex   justify-content-around">
                  <div class="card  " style="width: 6rem;">
                    <img src="./image/<?=$res->HinhAnh?>" class="card-img-top" alt="...">
                  </div>
                  <div class="card  " style="width: 6rem;">
                    <img src="./image/<?=$res->HinhAnh?>" class="card-img-top" alt="...">
                  </div>
                  <div class="card  " style="width: 6rem;">
                    <img src="./image/<?=$res->HinhAnh?>" class="card-img-top" alt="...">
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

    <div class="row mt-3">
        <div class="col-sm-12 p-0">
          <h3>Ðáng giá nhà trọ: <?php echo $res->TenNha ?> </h3>
          <form action="" method="post" class="form">
           Họ và tên  <input type="text" name="ten" class="form-control" placeholder="Họ và tên" ><br>
           Số điện thoại <input type="number" name="so_dien_thoai" class=" form-control" placeholder="Số điện thoại"><br>
           <textarea name="binh_luan" class=" form-control" cols="30" rows="10" placeholder="Câu bình lu?n"></textarea><br>
           <span class="submit_button">
                <button type="submit" name="gui_binh_luan" class="btn btn-success" >Gửi bình luận</button>
                <button type="reset" class="btn btn-danger"> Làm lại</button>
           </span>
          </form>
        </div>
    </div>

    <!-- Insert to databse -->
    <?php
          if (isset($_POST['gui_binh_luan'])) {
              $ten = $_POST['ten'];
              $so_dien_thoai = $_POST['so_dien_thoai'];
              $binh_luan = $_POST['binh_luan'];
                $sql = "INSERT INTO tb_binh_luan_nha (TenNguoiBL,SoDT,BinhLuan,MaNha) VALUES ('$ten',' $so_dien_thoai','$binh_luan','$detail_id')";
                $query = mysqli_query($conn, $sql);

                // header('Location: ./?page=detail&home_id='.$detail_id.'');
                echo "<script>window.location.href='./?page=detail&home_id=".$detail_id."'</script>";
              
          }
          ?>
          <div class="content">
            <?php 
            $sql = "SELECT * FROM tb_binh_luan_nha where MaNha = '$detail_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0 ){
              while ($row = $result->fetch_assoc()){
                ?>
                  <h3><?php echo $row ['TenNguoiBL']?></h3>                  
                  <p><?php echo $row ['BinhLuan']?></p>
           <?php }} ?>
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