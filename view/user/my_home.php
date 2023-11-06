<?php
   include "./controller/check_access.php";
?>
<style type="text/css">
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
    background: #2196F3;
  }

  #btn_del {
    border-radius: 8px;
    padding: 3px 16px;
    background: red;
  }

  #btn_edit:hover {
    background-color: #63C5DA;
    color: #fff;
  }

  #btn_del:hover {
    background-color: #F08080;
    color: #fff;
  }
</style>

<div class="mt-3" style="margin-top: 5px; " >
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
      <div class="row pt-3 pb-3" id="content_all" >
        <?php 
            // Check connection
            if (!$conn) {
              die("Lỗi kết nối DB ". mysqli_connect_error());
            }
            $MaTK = $_SESSION['matk'];
            $sql = "SELECT * FROM tb_thong_tin_nha WHERE MaTK = $MaTK";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row_nha = $result->fetch_assoc()) {

        ?>
        <div class="col-sm-3 d-flex justify-content-center">
          <div class="card d-flex align-items-lg-center " style="width: 18rem; margin-bottom: 20px;">
            <img style="height: 180px;" src=<?php echo '"./image/product_image/'.$row_nha['HinhAnh'].'"'; ?> class="card-img-top" alt="...">
            <div class="card-body">
                <h3><?php echo $row_nha['TenNha']; ?></h3>
                <textarea name="" id="" cols="30" rows="5" disabled class="form-control"  style="background: #FFF;"><?php echo $row_nha['MoTa'].'"'; ?></textarea>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <table style="margin-bottom: 4px; margin-left: auto; margin-right: auto; ">
                  <tr>
                    <td>
                        <i class="fa fa-eye" style="font-size:40px; color: <?php if ($row_nha['TrangThai'] == 1) { echo "green"; } else {echo "#000";} ?>"></i>

                    </td>
                    <td>
                        <a class='btn btn-success' id='btn_edit' href='?page=edit_home&edit_home=<?php echo$row_nha['MaNha']; ?>'>Sửa</a>   
                    </td>
                    <td>
                        <button class='btn btn-danger' type="submit" id='btn_del' name="btn_del" value="<?php echo$row_nha['MaNha']; ?>">Xóa</button>
                        <!-- <input class='btn btn-danger' type="submit" id='btn_del' name="btn_del" value="Xóa"> -->
                        <!-- <a class='btn btn-danger' id='btn_del' name="btn_del">Xóa</a>  -->
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
        while($row = $result->fetch_assoc()) {
            $image = $row['HinhAnh'];
        }
    }
        unlink("./image/product_image/".$image);
        $sql = "DELETE FROM tb_thong_tin_nha WHERE MaNha = $MaNha";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script type='text/javascript'>";
            //echo "alert('Đã xóa thành công".$MaNha."');";
            echo "location='index.php?page=my_home';";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
            //echo "alert('Xóa không thành công!');";
            echo "location='index.php?page=my_home';";
            echo "</script>";
        }
        mysqli_close($conn);
 }
?>



<script type="text/javascript">
function statusUpdate() {
    //alert('Hay vào sửa để thay đổi trạng thái!');
   // var MaNha = document.getElementById("checkbox").value;
  // var checkBox = document.getElementById("checkbox");
  // if (checkBox.checked == true){
  //   alert('On! ');
  // } else {
  //   alert('Of! ');
  // }
}
</script>