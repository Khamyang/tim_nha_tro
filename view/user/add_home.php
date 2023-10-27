<section class="mt-5 mb-5">
    <div class="d-flex justify-content-center">
        <div class="col-sm-12" style="width: 900px;">
            <form action="" method="post">
                <div class="row border border-success rounded">
                    <div class="col-sm- p-0 bg-light" style="width: 100%;height:auto">
                        <div class="p-4" id="add">
                            <center>
                                <h4 style="color: #f65129;">Điền thông tin nhà</h4>
                            </center>
                            <div class="form-group ">
                                <label for="username">Tên nhà</label>
                                <input type="text" class="form-control" name="home_name" id="home_name" placeholder="">
                                <span class="text-danger" id="home_name_err"></span>
                            </div>
                            <br>                        
                            <div class="form-group">
                                <label for="address">Chọn ảnh</label>
                                <input type="file" id="image[]" name="image[]" class="form-control">
                            </div>
                            <br>                        
                            <div class="form-group">
                                <label for="text">Giá thuê/tháng</label>
                                <input type="text" class="form-control" name="fee" id="fee" placeholder="">
                                <span class="text-danger" id="fee"></span>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <br>
                                <label style="margin-bottom: 15px;" for="">&nbsp;&nbsp;Chọn huyện: </label>
                                <SELECT style=" width: 85%; float: right;" class="forn-control" id="sl_huyen" name="sl_huyen">
                                    <OPTION selected Value="Under 16"> - Chọn huyện -</OPTION>
                                    <OPTION Value="1">Chanthabuly</OPTION>
                                    <OPTION Value="2">Sikhottabong</OPTION>
                                    <OPTION Value="3">Xaysetha</OPTION>
                                    <OPTION Value="4">Sisattanak</OPTION>
                                    <OPTION Value="5">Naxaithong</OPTION>
                                    <OPTION Value="6">Xaythany</OPTION>
                                    <OPTION Value="7">Hadxayfong</OPTION>
                                    <OPTION Value="8">Sangthong</OPTION>
                                    <OPTION Value="9">Parknguem</OPTION>
                                </SELECT>
                                <br>
                                <label style="margin-bottom: 15px;" for="">&nbsp;&nbsp;Chọn Bản: </label>
                                <SELECT style=" width: 85%; float: right;" class="forn-control" id="sl_ban" name="sl_ban">
                                    <OPTION selected Value="Under 16"> - Chọn bàn -</OPTION>
                                    <!-- <OPTION Value="Under 16">Chanthabuly</OPTION> -->

                                </SELECT>
                                <input type="text" class="form-control" name="home_address" id="home_address" placeholder="Địa chỉ chi tiết (Phường, đường, Số nhà...)">
                                <span class="text-danger" id="home_address"></span>
                            </div>    
                            <br>
                            <br>
                            <div class="mb-3">
                                <input style="float: right; margin-bottom: 8px;" type="submit" class="btn btn-success" name="add_home" id="add_home" value="Thêm">
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#sl_huyen').change(function(){
            var huyen_id = $('#sl_huyen').val();
            // alert(id_huyen);
            $.ajax({
                url: "ControllerGetBan.php",
                type: "POST",
                data: {"huyen_id": huyen_id},
                success: function(data_res){
                    // var db = JSON.parse(data_res);
                    console.log(data_res);
                    // var html = '';
                    // if(db.status == 1){
                    //     $.each(db, function(index, value){
                    //     html += "<OPTION Value="+db.ban_id+">"+db.ban_name+"</OPTION>";
                    //     })
                    // }
                    // if(db.status == 0){
                    //     alert('lỗi');
                    // }
                    
                    // $('#sl_ban').html(html);
                }
            })
        })
    })
</script>