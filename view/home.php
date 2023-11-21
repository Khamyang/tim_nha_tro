<style>
    .content_district {
        background-color: darkgreen;
        height: 400px;
        padding-top: 70px;

    }

    .prd-block {
        width: 100%;
        height: auto;
        padding: 0px;
    }

    .pr-list {
        width: 100%;
        height: auto;
        padding: 10px 0px;
    }

    .prd-item {
        float: left;
        width: 32%;
        height: 600px;
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
        transform: scale(.95);
    }

    .prd-item h6 {
        margin-top: 20px;
        text-transform: uppercase;
        font-weight: bold;
        color: dodgerblue;
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

    .detail {
        padding: 10px;
        margin-top: 10px;
        border: 1px solid #eee;
        background-color: #efefef;
        border-radius: 3px;
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
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card-wrapper container-sm d-flex text-center justify-content-around">
                    <div class="card " style="width: 18rem;" onclick="home_district('2000');">
                        <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Chanthabuly</h5>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;" onclick="home_district('2001');">
                        <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Sikhottabong</h5>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;" onclick="home_district('2002');">
                        <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Xaysetha</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card-wrapper container-sm d-flex  text-center justify-content-around">
                    <div class="card" style="width: 18rem;" onclick="home_district('2003');">
                        <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Sisattanak</h5>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;" onclick="home_district('2004');">
                        <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Naxaithong</h5>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;" onclick="home_district('2005');">
                        <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Xaythany</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card-wrapper container-sm d-flex text-center justify-content-around">
                    <div class="card " style="width: 18rem;" onclick="home_district('2006');">
                        <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Hadxayfong</h5>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;" onclick="home_district('2007');">
                        <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Sangthong</h5>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;" onclick="home_district('2008');">
                        <img src="./image/apartment.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Parknguem</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="mt-4">
    <div class="container">
        <h2 class="text-center mt-3">NHÀ TRỌ</h2>
        <hr class="mt-4 mb-4">
        <div class="prd-block">
            <h5></h5>
            <div class="pr-list">
                <?php

                if (isset($_GET['page_number'])) {
                    $page = $_GET['page_number'];
                } else {
                    $page = 1;
                }
                $rowsPerPage = 6;
                $perRow = $page * $rowsPerPage - $rowsPerPage;
                // echo $perRow . "Per row";

                if (isset($_GET['district_id'])) {
                    $district_id = $_GET['district_id'];
                    $sql = "SELECT nha.*, tk.HoTen, ban.TenBan, h.TenHuyen FROM tb_thong_tin_nha as nha left join tb_taikhoan as tk on tk.MaTK = nha.MaTK left join tb_ban as ban on nha.MaBan = ban.MaBan left join tb_huyen as h on nha.MaHuyen = h.MaHuyen WHERE TrangThai = 1 and nha.Mahuyen = $district_id ORDER BY MaNha LIMIT $perRow, $rowsPerPage";
                    $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_thong_tin_nha WHERE TrangThai = 1 and MaHuyen = $district_id"));
                    $query = mysqli_query($conn, $sql);
                } else if (isset($_POST['stext'])) {
                    $stext = $_POST['stext'];

                    $newStext = str_replace(' ', '%', $stext);
                    $sql = "SELECT nha.*, tk.HoTen, ban.*, h.* FROM tb_thong_tin_nha as nha left join tb_taikhoan as tk on tk.MaTK = nha.MaTK left join tb_ban as ban on nha.MaBan = ban.MaBan left join tb_huyen as h on nha.MaHuyen = h.MaHuyen  WHERE ban.TenBan LIKE '%".$newStext."%'";
                    $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT nha.*, tk.HoTen, ban.* FROM tb_thong_tin_nha as nha left join tb_taikhoan as tk on tk.MaTK = nha.MaTK left join tb_ban as ban on nha.MaBan = ban.MaBan left join tb_huyen as h on nha.MaHuyen = h.MaHuyen WHERE ban.TenBan LIKE '%".$newStext."%'"));
                    $query = mysqli_query($conn, $sql);
                } else {
                    $sql = "SELECT nha.*, tk.HoTen, ban.TenBan, h.TenHuyen FROM tb_thong_tin_nha as nha left join tb_taikhoan as tk on tk.MaTK = nha.MaTK left join tb_ban as ban on nha.MaBan = ban.MaBan left join tb_huyen as h on nha.MaHuyen = h.MaHuyen WHERE TrangThai = 1 ORDER BY MaNha LIMIT $perRow, $rowsPerPage";
                    $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_thong_tin_nha WHERE TrangThai = 1"));
                    $query = mysqli_query($conn, $sql);
                }


                $totalPage = ceil($totalRows / $rowsPerPage);
                $listPage = '';
                for ($i = 1; $i <= $totalPage; $i++) {
                    if ($i == $page) {
                        $listPage .= " <span>" . $i . "</span> ";
                    } else {
                        $listPage .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page=home&page_number=' . $i . '">' . $i . '</a> ';
                    }
                }

                // $sql = "SELECT nha.*, tk.HoTen, ban.TenBan FROM tb_thong_tin_nha as nha left join tb_taikhoan as tk on tk.MaTK = nha.MaTK left join tb_ban as ban on nha.MaBan = ban.MaBan WHERE TrangThai = 1 ORDER BY MaNha LIMIT 0,9";
                // $query = $conn->query($sql);

                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="prd-item" onclick="home_details('<?php echo $row['MaNha'] ?>')">
                        <img width="365" height="300" src="./image/<?php echo $row['HinhAnh']
                                                                    ?>" />
                        <h6 class="text-center"><?php echo "Nhà Trọ " . $row['TenNha'] ?></h6>
                        
                        <div class="detail">
                            <p><b>Tên Chủ Trọ: </b><?php echo $row['HoTen'] ?></p>
                            <p><b>Địa Chỉ: </b><?php echo $row['DiaChi'] ?></p>
                            <p><b>Ngày Đăng: </b><?php echo $row['NgayDang'] ?></p>
                            <p><b>Bản: </b><?php echo $row['TenBan'] ?><b>, Huyện: </b><?php echo $row['TenHuyen'] ?></p>
                        </div>
                        <p class="price text-center"><span>Giá: <?php echo number_format($row['Gia']) ?> KIP/ THÁNG</span></p>
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

    function home_district(district_id) {
        window.location.href = './?page=home&district_id=' + district_id;
    }

    function home_details(home_id) {
        window.location.href = './?page=detail&home_id=' + home_id;
    }
</script>