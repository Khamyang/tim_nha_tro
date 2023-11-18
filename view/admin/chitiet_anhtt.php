<?php
    $anh_chitiet = '';
    if (isset($_GET['chitiet_anhtt'])) {
        $anh_chitiet = $_GET['chitiet_anhtt'];

    }
 ?>
<div class="card p-3" >
    <img  class="rounded mx-auto d-block" src="<?php echo "../../image/order_image/".$anh_chitiet; ?>" alt=""  style="width: 20%; margin-top: 5px;">
    <div class="text-end" >
        <input type="button"  class="btn btn-success " style="width: 100px;" onclick="history.back()" value="Thoát">
    </div>
</div>