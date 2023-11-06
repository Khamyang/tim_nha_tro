<?php
include "./controller/check_access.php";
?>
<style type="text/css">
  /*switch button*/
  .switch {
    margin: 0;
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }

  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked+.slider {
    background-color: #2196F3;
  }

  input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }

  #btn_add {
    math-depth: 5px;
    margin-bottom: 10px;
    border-radius: 8px;
    background: #2196F3;
    text-align: center;
    text-decoration: none;
    font-size: 16pt;
    border: none;
    color: #000;
  }

  #btn_edit {
    margin-left: 30px;
    margin-right: 30px;
    border-radius: 8px;
    padding: 3px 16px;
    background: green;
  }

  #btn_del {
    border-radius: 8px;
    padding: 3px 16px;
    background: red;
  }

  #btn_edit:hover {
    background-color: #50C878;
    color: #fff;
  }

  #btn_del:hover {
    background-color: #F08080;
    color: #fff;
  }
</style>

<div class="mt-3" style="margin-top: 5px; ">
  <div class="container">
    <!-- <div class="row">
            <div class="content_header alert-success p-3 d-flex align-items-lg-center rounded" style="margin-top: 8px;">
                <div style="width: 50%;">
                    <span>Nhà trọ bạn đang có hiện tại bạn</span>
                </div>
                <div style="width: 50%;">
                    <input type="text" class="form-control rounded-pill" name="search" id="search" placeholder="Tìm kiếm">
                </div>
            </div>
        </div> -->
    <div class=" d-flex justify-content-between">
      <div class="" style="font-size: 24pt;">Danh sách nhà bạn đang có hiện tại</div>
      <a href="?page=add_home" class="btn btn-primary" id="btn_add">Thêm mới</a>
    </div>
    <div class="card p-3">
      <div class="row pt-3 pb-3" id="content_all">
        <?php
        // Check connection
        if (!$conn) {
          die("Lỗi kết nối DB " . mysqli_connect_error());
        }
        $MaTK = $_SESSION['matk'];

        $sql1 = mysqli_query($conn, "SELECT * FROM tb_dondk WHERE MaDK = (SELECT MAX(MaDK) FROM tb_dondk WHERE MaTK = $MaTK)");
        $res = $sql1->fetch_object();
        $trang_thai_dondk = $res->TrangThai;


        $sql = "SELECT * FROM tb_thong_tin_nha WHERE MaTK = $MaTK";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row_nha = $result->fetch_assoc()) {

        ?>
            <div class="col-sm-3 d-flex justify-content-center">
              <div class="card d-flex align-items-lg-center " style="width: 18rem; margin-bottom: 20px;">
                <img style="height: 180px;" src=<?php echo '"./image/product_image/' . $row_nha['HinhAnh'] . '"'; ?> class="card-img-top" alt="...">
                <div class="card-body">
                  <h3><?php echo $row_nha['TenNha']; ?></h3>
                  <textarea name="" id="" cols="30" rows="5" disabled class="form-control" style="background: #FFF;"><?php echo $row_nha['MoTa'] . '"'; ?></textarea>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                  <table style="margin-bottom: 4px; margin-left: auto; margin-right: auto; ">
                    <tr>
                      <td>
                        <label class="switch">
                          <input type="checkbox" id="dang_nha<?= $row_nha['MaNha'] ?>" name="dang_nha<?= $row_nha['MaNha'] ?>" value="<?php echo $row_nha['MaNha']; ?>" <?php if ($row_nha['TrangThai'] == 1) {
                                                                                                                                                                      echo "checked";
                                                                                                                                                                    } else {
                                                                                                                                                                      echo "";
                                                                                                                                                                    } ?> onclick="dang_nha('dang_nha<?= $row_nha['MaNha'] ?>','<?= $trang_thai_dondk ?>','<?= $row_nha['MaNha'] ?>')">
                          <span class="slider round"></span>
                        </label>
                      </td>
                      <td>
                        <a class='btn btn-success' id='btn_edit' href='?page=edit_home&edit_home=<?php echo $row_nha['MaNha']; ?>'>Sửa</a>
                      </td>
                      <td>
                        <button class='btn btn-danger' type="submit" id='btn_del' name="btn_del" value="<?php echo $row_nha['MaNha']; ?>">Xóa</button>
                      </td>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
        <?php
          }
        } else {
          echo "Bạn chưa có nhà trọ nào cho cho thuê";
        }
        // mysqli_close($conn);
        ?>
      </div>
    </div>

  </div>
</div>
<?php
//Delete Home
//include "../connect/connect.php";
if (isset($_POST['btn_del'])) {
  $MaNha = $_POST['btn_del'];
  $sql = "SELECT * FROM tb_thong_tin_nha WHERE MaNha = $MaNha";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
      $image = $row['HinhAnh'];
    }
  }
  unlink("./image/product_image/" . $image);
  $sql = "DELETE FROM tb_thong_tin_nha WHERE MaNha = $MaNha";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo "<script type='text/javascript'>";
    //echo "alert('Đã xóa thành công".$MaNha."');";
    echo "location='index.php?page=my_home';";
    echo "</script>";
  } else {
    echo "<script type='text/javascript'>";
    //echo "alert('Xóa không thành công!');";
    echo "location='index.php?page=my_home';";
    echo "</script>";
  }
  mysqli_close($conn);
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function dang_nha(dang_nha_id, trangthai_dangky, ma_nha) {
    var action = '';
    if (trangthai_dangky == 1) {
      if ($('#' + dang_nha_id).is(':checked')) {
        action = "to_unchecked";
      } else {
        action = "to_checked";
      }
      $.ajax({
        url: "controller/ControllerCheckPost.php?ma_nha=" + ma_nha + "&action=" + action,
        type: "POST",
        // data: {"huyen_id": huyen_id},
        success: function(data_res) {
          var db = JSON.parse(data_res);
          if (db.status == 1) {
            if (db.trang_thai == 1) {
              $('#' + dang_nha_id).prop('checked', true);
            }
            if (db.trang_thai == 0) {
              $('#' + dang_nha_id).prop('checked', false);
            }
            // location.reload();
          }
          if (db.status == 0) {
            alert('1')
            $('#' + dang_nha_id).prop('checked', false);
          }
        }
      })
    } else {
      Swal.fire({
        // toast: true,
        position: 'center',
        icon: 'warning',
        title: 'Đăng nhà không thành công',
        html: '<span>Vui lòng liên hệ admin để được hỗ trợ <br> 0914791272</span>',
        showConfirmButton: true,
      });
      $('#' + dang_nha_id).prop('checked', false);
    }

  }
</script>