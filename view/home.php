<style>
    .content_district {
        background-color: #333;
        padding: 20px;

    }

    .prd-block {
        width: 100%;
        height: auto;
        padding: 0px;
    }

    .prd-block h5 {
        width: 100%;
        height: 35px;
        line-height: 35px;
        font-size: 20px;
        font-weight: bold;
        /* color:#FFF; */
        text-transform: capitalize;
        border-bottom: 1px solid brown;
        padding-left: 12px;
        /* border-radius: 20px; */
    }

    .pr-list {
        width: 100%;
        height: auto;
        padding: 10px 0px;
    }

    .prd-item {
        float: left;
        width: 32%;
        height: 570px;
        border: 1px solid #eee;
        margin-right: 15px;
        margin-bottom: 15px;
        padding: 20px;
        border-radius: 5px;
    }

    .prd-item:hover {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .prd-item p {
        width: 400px;
        height: auto;
        font-size: 15px;
        color: #666;
        margin: 5px 0px;
    }

    .prd-item a img {
        transition: transform .6s;
        border-top: 10px solid brown;
        border-radius: 10px;
    }

    .prd-item a img:hover {
        /* transform: scale(.95); */
    }

    .prd-item h6 {
        margin-top: 20px;
    }

    .prd-item h6 a:hover {
        color: #3F3F3F;
    }

    .prd-item a {
        text-decoration: none;
    }

    .prd-item p.price {
        padding-top: 10px;
        font-size: 15px;
        font-weight: bold;
        color: brown;
    }

    .prd-item p.price span {
        padding: 5px 10px;
        background: linear-gradient(180deg, #F0EFEF 20%, #E0DEDE 60%) repeat scroll 0 0 transparent;
        border-radius: 40px 40px 40px 40px;
    }

    #pagination {
        padding: 5px;
        font-weight: bold;
    }

    #pagination span {
        color: white;
        background-color: brown;
        border-radius: 2px;
        padding: 2px 5px;
    }

    #pagination a {
        text-decoration: none;
        padding: 2px 4px;
        color: #000;
        text-align: center;
    }

    #pagination a:hover {
        background-color: brown;
        color: #ffffff;
        border-radius: 2px;
    }
</style>

<?php
include_once('connect/connect.php');
?>
<div class="content_district">
    <div class="contaiber">
        <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card-wrapper container-sm d-flex  justify-content-around">
                        <div class="card  " style="width: 18rem;">
                            <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Xaythany</h5>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Xaysettha</h5>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Sisattanak</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card-wrapper container-sm d-flex   justify-content-around">
                        <div class="card  " style="width: 18rem;">
                            <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Naxaithong</h5>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Sikhottabong</h5>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Pakngum</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card-wrapper container-sm d-flex  justify-content-around">
                        <div class="card " style="width: 18rem;">
                            <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Sangthong</h5>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Hadxaifong</h5>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Chanthabuly</h5>
                            </div>
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
</div>
<div class="mt-4">
    <div class="container">
        <h2 class="text-center mt-3">NHÀ TRỌ</h2>
        <div class="prd-block">
            <h5></h5>
            <div class="pr-list">
                <?php

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $rowsPerPage = 3;
                $perRow = $page * $rowsPerPage - $rowsPerPage;
                $sql = "SELECT nha.*, tk.HoTen, ban.TenBan FROM tb_thong_tin_nha as nha left join tb_taikhoan as tk on tk.MaTK = nha.MaTK left join tb_ban as ban on nha.MaBan = ban.MaBan WHERE TrangThai = 1 ORDER BY MaNha LIMIT $perRow, $rowsPerPage";
                $query = mysqli_query($conn, $sql);

                $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_thong_tin_nha WHERE TrangThai = 1"));
                $totalPage = ceil($totalRows / $rowsPerPage);
                $listPage = '';
                for ($i = 1; $i <= $totalPage; $i++) {
                    if ($i == $page) {
                        $listPage .= " <span>" . $i . "</span> ";
                    } else {
                        $listPage .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page=home&page=' . $i . '">' . $i . '</a> ';
                    }
                }

                // $sql = "SELECT nha.*, tk.HoTen, ban.TenBan FROM tb_thong_tin_nha as nha left join tb_taikhoan as tk on tk.MaTK = nha.MaTK left join tb_ban as ban on nha.MaBan = ban.MaBan WHERE TrangThai = 1 ORDER BY MaNha LIMIT 0,9";
                // $query = $conn->query($sql);

                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="prd-item">
                        <a href="/layout/page.php?page=chitiet&MaNha=<?php echo $row['MaNha'] ?>">
                            <img width="365" height="auto" src="./image/apartment.jpg<?php //echo //$row['HinhAnh'] ?>" /></a>
                        <h6><a href="/layout/page.php?page=chitiet&MaNha=<?php echo $row['MaNha'] ?>">
                                <?php echo "Nhà Trọ " . $row['TenNha'] ?></a></h6>
                        <p>Tên Chủ Nhà: <?php echo $row['HoTen'] ?></p>
                        <p>Địa Chỉ: <?php echo $row['DiaChi'] . ", Ban " . $row['TenBan'] ?></p>
                        <p>Ngày Đăng: <?php echo $row['NgayDang'] ?></p>
                        <p>Trạng Thái: <?php echo $row['TrangThai'] ?></p>
                        <p>Mô Tả: <?php echo $row['MoTa'] ?></p>
                        <p class="price"><span>Giá: <?php echo number_format($row['Gia']) ?> KIP</span></p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>

</div>
</div>

<div id="pagination" class="text-center"><?php echo $listPage ?></div>
<script>
    const con = document.getElementById('content_all');
    var vale = document.getElementById('search').value;
    document.getElementById('search').onkeydown = function(e) {
        if (e.keyCode == 13) {
            alert(document.getElementById('search').value)
        }
    };
</script>