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

<div class="mt-3" style="margin-top: 5px;">
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
              die("Lỗi kết nối DB ". mysqli_connect_error());
            }
            $sql = "SELECT * FROM tb_thong_tin_nha";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = $result->fetch_assoc()) {

        ?>
        <div class="col-sm-3 d-flex justify-content-center">
          <div class="card d-flex align-items-lg-center " style="width: 18rem; margin-bottom: 20px;">
            <img style="max-height: 180px;" src=<?php echo '"./image/product_image/'.$row['HinhAnh'].'"'; ?> class="card-img-top" alt="...">
            <div class="card-body">
                <h3><?php echo $row['TenNha']; ?></h3>
                <textarea name="" id="" cols="30" rows="5" class="form-control" disabled style="background: #FFF;"><?php echo $row['MoTa'].'"'; ?></textarea>
            </div>
            <table style="margin-bottom: 4px; margin-left: auto; margin-right: auto; ">
              <tr>
                <td>
                  <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                  </label>
                </td>
                <td>
                    <a class='btn btn-success' id='btn_edit' href='?page=edit_home&edit_home=<?php echo $row['MaNha']; ?>'>Sửa</a>   
                </td>
                <td>
                    <a class='btn btn-danger' id='btn_del' href='?page=del_home&del_home=<?php echo $row['MaNha']; ?>'>Xóa</a> 
                </td>
              </tr>
            </table>
          </div>
        </div>
        <?php 
                }
            } else {
                echo "Bạn chưa có nhà trọ nào cho cho thuê";
            }
            mysqli_close($conn);
        ?>
      </div>
    </div>

  </div>
</div>