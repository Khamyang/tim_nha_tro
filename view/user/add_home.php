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
                                <input type="file" id="image" name="image">
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
                                    <OPTION Value="Under 16">Chanthabuly</OPTION>
                                    <OPTION Value="16 to 25">Sikhottabong</OPTION>
                                    <OPTION Value="26 to 40">Xaysetha</OPTION>
                                    <OPTION Value="40 to 60">Sisattanak</OPTION>
                                    <OPTION Value="Over 60">Naxaithong</OPTION>
                                    <OPTION Value="16 to 25">Xaythany</OPTION>
                                    <OPTION Value="26 to 40">Hadxayfong</OPTION>
                                    <OPTION Value="40 to 60">Sangthong</OPTION>
                                    <OPTION Value="Over 60">Parknguem</OPTION>
                                </SELECT>
                                <br>
                                <label style="margin-bottom: 15px;" for="">&nbsp;&nbsp;Chọn Bản: </label>
                                <SELECT style=" width: 85%; float: right;" class="forn-control" id="sl_ban" name="sl_ban">
                                    <OPTION selected Value="Under 16"> - Chọn bàn -</OPTION>
                                    <OPTION Value="Under 16">Chanthabuly</OPTION>
                                    <OPTION Value="16 to 25">Sikhottabong</OPTION>
                                    <OPTION Value="26 to 40">Xaysetha</OPTION>
                                    <OPTION Value="40 to 60">Sisattanak</OPTION>
                                    <OPTION Value="Over 60">Naxaithong</OPTION>
                                    <OPTION Value="16 to 25">Xaythany</OPTION>
                                    <OPTION Value="26 to 40">Hadxayfong</OPTION>
                                    <OPTION Value="40 to 60">Sangthong</OPTION>
                                    <OPTION Value="Over 60">Parknguem</OPTION>
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