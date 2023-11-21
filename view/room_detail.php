<style>
  .form {
    background-color: #eee;
    border-radius: 10px;
    padding: 40px;
    color: black;
    font-family: "Times New Roman", Times, serif;
  }

  .submit_button {
    text-align: center;
    display: block;
    margin-bottom: 10px;
  }
</style>

<?php
// session_start();
if (isset($_REQUEST['home_id'])) {
  $detail_id = $_REQUEST['home_id'];

  $sql = mysqli_query($conn, "SELECT nha.*, tk.*, ban.TenBan, h.TenHuyen FROM tb_thong_tin_nha as nha left join tb_taikhoan as tk on tk.MaTK = nha.MaTK left join tb_ban as ban on nha.MaBan = ban.MaBan left join tb_huyen as h on nha.MaHuyen = h.MaHuyen WHERE MaNha = '$detail_id'");
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
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="./image/<?= $res->HinhAnh ?>" class="card-img-top" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="./image/<?= $res->HinhAnh ?>" class="card-img-top" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="./image/<?= $res->HinhAnh ?>" class="card-img-top" alt="...">
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
            <div class="row mb-2">
              <div class="col-sm-3">
                <label for="">Tên chủ trọ</label>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= ($res->HoTen == '') ? $res->TenDN : $res->HoTen; ?>">
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-sm-3">
                <label for="">Số điện thoại</label>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $res->SoDT ?>">
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-sm-3">
                <label for="">Huyện</label>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $res->TenHuyen ?>">
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-sm-3">
                <label for="">Bản</label>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $res->TenBan ?>">
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-sm-3">
                <label for="">Đia chỉ cụ thể</label>
              </div>
              <div class="col-sm-9">
                <textarea name="" id="" rows="3" class="form-control"><?= $res->DiaChi ?></textarea>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-sm-3">
                <label for="">Mô tả</label>
              </div>
              <div class="col-sm-9">
                <textarea name="" id="" rows="3" class="form-control"><?= $res->MoTa ?></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-3 mb-3">
      <div class="col-sm-12 p-0">
        <h3>Ðáng giá nhà trọ: <?php echo $res->TenNha ?> </h3>
        <form action="" method="post" class="form">
          Họ và tên <input type="text" name="ten" class="form-control" placeholder="Họ và tên"><br>
          Số điện thoại <input type="number" name="so_dien_thoai" class=" form-control" placeholder="Số điện thoại"><br>
          <textarea name="binh_luan" class=" form-control" cols="30" rows="10" placeholder="Câu bình luận"></textarea><br>
          <span class="submit_button">
            <button type="submit" name="gui_binh_luan" class="btn btn-success">Gửi bình luận</button>
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
      echo "<script>window.location.href='./?page=detail&home_id=" . $detail_id . "'</script>";
    }
    ?>
    <div class="row">
      <?php
      $sql = "SELECT * FROM tb_binh_luan_nha where MaNha = '$detail_id'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?><div class="col-sm-12 mb-2 rounded p-3 border">
            <h5>Người bình luận: <?php echo $row['TenNguoiBL']; ?>, <i style="font-weight: normal; font-size:medium">SĐT : <?php echo $row['SoDT'] ?></i></h5>
            <p style="color: #c0392b;"><strong>Nội dung:</strong> <?php echo $row['BinhLuan'] ?></p>
          </div>
      <?php }
      } ?>
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