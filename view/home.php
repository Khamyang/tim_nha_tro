<style>
    .content_district {
        background-color: #333;
        padding: 20px;
    }
</style>
<div class="content_district">
    <div class="contaiber">
        <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card-wrapper container-sm d-flex  justify-content-around">
                        <div class="card  " style="width: 18rem;">
                            <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Patuxay</h5>
                            </div>
                        </div>
                        <div class="card  " style="width: 18rem;">
                            <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Patuxay</h5>
                            </div>
                        </div>
                        <div class="card  " style="width: 18rem;">
                            <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Patuxay</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card-wrapper container-sm d-flex   justify-content-around">
                        <div class="card  " style="width: 18rem;">
                            <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Patuxay</h5>
                            </div>
                        </div>
                        <div class="card  " style="width: 18rem;">
                            <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Patuxay</h5>
                            </div>
                        </div>
                        <div class="card  " style="width: 18rem;">
                            <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Patuxay</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card-wrapper container-sm d-flex  justify-content-around">
                        <div class="card  " style="width: 18rem;">
                            <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Patuxay</h5>
                            </div>
                        </div>
                        <div class="card  " style="width: 18rem;">
                            <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Patuxay</h5>
                            </div>
                        </div>
                        <div class="card  " style="width: 18rem;">
                            <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Patuxay</h5>
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
<div class="mt-3">
    <div class="container">
        <div class="row">
            <div class="content_header alert-success p-3 d-flex align-items-lg-center rounded">
                <div style="width: 50%;">
                    <span>Nhà trọ đang trống</span>
                </div>
                <div style="width: 50%;">
                    <input type="text" class="form-control rounded-pill" name="search" id="search" placeholder="Tìm kiếm">
                </div>
                
            </div>
        </div>
        <div class="row pt-3 pb-3" id="content_all">
            <div class="col-sm-3 d-flex justify-content-center">
                <div class="card d-flex align-items-lg-center " style="width: 18rem;">
                    <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 d-flex justify-content-center">
                <div class="card d-flex align-items-lg-center " style="width: 18rem;">
                    <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
            </div>
             <div class="col-sm-3 d-flex justify-content-center">
                <div class="card d-flex align-items-lg-center " style="width: 18rem;">
                    <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
            </div>
             <div class="col-sm-3 d-flex justify-content-center">
                <div class="card d-flex align-items-lg-center " style="width: 18rem;">
                    <img src="./image/patuxay.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>
<script>
    const con = document.getElementById('content_all');
    var vale = document.getElementById('search').value;
    document.getElementById('search').onkeydown = function(e){
   if(e.keyCode == 13){
    alert(document.getElementById('search').value)
    }
    };
</script>