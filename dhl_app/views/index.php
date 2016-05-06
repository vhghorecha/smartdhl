<div id="top_mid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="med_text">
                    <h1>TO SEND DOCUMENTS
                        ANYWHERE IN THE WORLD</h1>
                    <h2>$29.95</h2>
                    <P>from your home or office</P>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="top_form">
                    <div class="form">
                        <h3>Get An Estimate</h3>
                        <div class="col-lg-12 center-box">
                            <form id="frmcalc">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Delivering To</label>
                                            <?php
                                            $attributes = 'class = "form-control" id = "txtrcountry" name="txtrcountry" ';
                                            echo form_dropdown('txtrcountry',$country,set_value('txtrcountry'),$attributes);?>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="aro"><img src="<?php echo RES_URL; ?>images/aroimg.png" class="img-responsive"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>lb</label>
                                            <!--<input type="text" class="form-control" placeholder="Weight">-->
                                            <input id="txtweight" class="form-control" type="number" name="txtweight" placeholder="Weight in Oz" min="1" step="0.01" max="150.00" required>
                                        </div>
                                        <div class="clear"></div>
                                    </div><div class="aro"><img src="<?php echo RES_URL; ?>images/aroimg.png" class="img-responsive"></div>
                                </div>
                                <div class="col-lg-12"><div class="border_img"><img src="<?php echo RES_URL; ?>images/borderimg.png" class="img-responsive"><p>Start Typing in The Boxes Above and Let Us Do The Rest</p> </div></div>
                                <div class="col-lg-12"><div class="form_btn text-center">
                                        <!--<a href="#" id="btncalc"><img src="<?php echo RES_URL; ?>images/fombtn.png" class="img-responsive"></a>-->
                                        <button id="btncalc text-center"><img src="<?php echo RES_URL; ?>images/fombtn.png" class="img-responsive"></button>
                                    </div></div>
                            <!--</form>-->
                            <?php echo form_close(); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<a name="HOWITWORKS"></a>
<div class="wrapper6">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h2>How it Works</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 post1">
                <div class="midd"> <img src="<?php echo RES_URL; ?>images/pic-1.jpg" class="img-responsive">
                </div>
            </div>
            <div class="col-md-4 col-sm-12 post3">
                <div class="midd"> <img src="<?php echo RES_URL; ?>images/pic-2.jpg" class="img-responsive">
                </div>
            </div>
            <div class="col-md-4 col-sm-12 post2">
                <div class="midd"> <img src="<?php echo RES_URL; ?>images/pic-3.jpg" class="img-responsive">

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 post1">
                <div class="midd"> <img src="<?php echo RES_URL; ?>images/pic-4.jpg" class="img-responsive">

                </div>
            </div>
            <div class="col-md-4 col-sm-12 post3">
                <div class="midd"> <img src="<?php echo RES_URL; ?>images/pic-5.jpg" class="img-responsive">

                </div>
            </div>
            <div class="col-md-4 col-sm-12 post2">
                <div class="midd"> <img src="<?php echo RES_URL; ?>images/pic-6.jpg" class="img-responsive">

                </div>
            </div>

        </div>
    </div>
</div>

<a name="PRICING"></a>
<div id="shipping">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text_ship">
                    <h3>Shipping Rate</h3>
                </div>
                <div class="table_text">
                    <div class="table-responsive">
                        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">

                            <thead>
                            <tr>
                                <th>weight</th>
                                <th>China</th>
                                <th>South Korea</th>
                                <th>Japan</th>
                                <th>Philippines</th>
                                <th>Germany</th>
                                <th>France</th>
                                <th>Columbia</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="back1">1</td>
                                <td>$28.99 </td>
                                <td class="back1">$26.16</td>
                                <td>$26.16</td>
                                <td class="back1">$29.89</td>
                                <td>$26.30</td>
                                <td class="back1">$26.30</td>
                                <td>$38.43</td>
                            </tr>
                            <tr>
                                <td class="back1">3</td>
                                <td>$38.74</td>
                                <td class="back1">$38.40</td>
                                <td>$38.40</td>
                                <td class="back1">$38.95</td>
                                <td>$36.22</td>
                                <td class="back1">$36.22</td>
                                <td>$58.33</td>
                            </tr>
                            <tr>
                                <td class="back1">5</td>
                                <td>$47.98</td>
                                <td class="back1">$45.45</td>
                                <td>$45.45</td>
                                <td class="back1">$49.01</td>
                                <td>$46.05</td>
                                <td class="back1">$46.05</td>
                                <td>$78.43</td>
                            </tr>
                            <tr>
                                <td class="back1">10</td>
                                <td>$70.23</td>
                                <td class="back1">$59.77</td>
                                <td>$59.77</td>
                                <td class="back1">$73.03</td>
                                <td>$60.54</td>
                                <td class="back1">$60.54</td>
                                <td>$124.67</td>
                            </tr>


                            </tbody>

                        </table>
                    </div><!--end of .table-responsive-->
                    <div class="sample"><img src="<?php echo RES_URL; ?>images/sample.png" class="img-responsive"></div>
                </div>
                <div class="table_text1">
                    <!--end of .table-responsive-->
                    <p>Download the complete rate sheet on below link</p>
                    <a href="#"><img src="<?php echo RES_URL; ?>images/downlod.png" class="img-responsive"></a>
                    <div class="sample"><img src="<?php echo RES_URL; ?>images/full.png" class="img-responsive"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="wrapper13">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <a name="FAQ"></a>
                <h2>FAQ's</h2>
            </div>
        </div>
        <div class="row">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. Why so cheaper but same service as DHL?</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p>A. We have one of largest account with DHL in Europe which grandfather to us. We are passing saving to you are as our customer.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> 2.  How do I track shipment?</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>We have one of largest account with DHL in Europe which grandfather to us. We are passing saving to you are as our customer.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">3.  When will DHL come to pick up package?</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>We have one of largest account with DHL in Europe which grandfather to us. We are passing saving to you are as our customer.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour">4.   Can I request same day pick up?</a>
                        </h4>
                    </div>
                    <div id="collapsefour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>We have one of largest account with DHL in Europe which grandfather to us. We are passing saving to you are as our customer.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsefive">5. Will DHL pick up at my house or office?</a>
                        </h4>
                    </div>
                    <div id="collapsefive" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>DHL will pick up address where you registered as From address. We won’t be able to change once it is enter in to system. If your pick up address change, please go to nearest DHL drop off location rather than re-schedule to new address.</p>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsesix">6. Will DHL pick up my cabin in top of mountain?</a>
                        </h4>
                    </div>
                    <div id="collapsesix" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Answer is No. DHL only pick up service area which mountain isn’t area of pick up service.</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="wrapper8">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h2>our valuable happy clients</h2>
                <p>We’re a small, friendly and talented team. Each of us spent many hours polishing professional
                    skills and earning a unique experience </p>
            </div>
        </div>
        <div class="slider1">
            <div class="slide">
                <div class="our">
                    <div class="row">
                        <div class="col-md-2 col-sm-12"><img src="<?= RES_URL; ?>images/quot.png"> </div>
                        <div class="col-md-10 col-sm-12"><i> Sed modus munere menandri ius
                                vero qualisque concludaturque ne
                                vide fastidii incorrupte</i></div>
                    </div>
                </div>
                <div class="arrow"><img src="<?= RES_URL; ?>images/arow.png"></div>
                <div class="immg">
                    <div class="row">
                        <div class="col-md-3 col-sm-12"><img src="<?= RES_URL; ?>images/img1.png"></div>
                        <div class="col-md-9 col-sm-12">
                            <h3>Anna Gibson </h3>
                            <span><img src="<?= RES_URL; ?>images/starrating.png"></span></div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="our">
                    <div class="row">
                        <div class="col-md-2 col-sm-12"><img src="<?= RES_URL; ?>images/quot.png"> </div>
                        <div class="col-md-10 col-sm-12"><i> Sed modus munere menandri ius
                                vero qualisque concludaturque ne
                                vide fastidii incorrupte</i></div>
                    </div>
                </div>
                <div class="arrow"><img src="<?= RES_URL; ?>images/arow.png"></div>
                <div class="immg">
                    <div class="row">
                        <div class="col-md-3 col-sm-12"><img src="<?= RES_URL; ?>images/img2.png"></div>
                        <div class="col-md-9 col-sm-12">
                            <h3>Shawn Mille </h3>
                            <span><img src="<?= RES_URL; ?>images/starrating.png"></span></div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="our">
                    <div class="row">
                        <div class="col-md-2 col-sm-12"><img src="<?= RES_URL; ?>images/quot.png"> </div>
                        <div class="col-md-10 col-sm-12"><i> Sed modus munere menandri ius
                                vero qualisque concludaturque ne
                                vide fastidii incorrupte</i></div>
                    </div>
                </div>
                <div class="arrow"><img src="<?= RES_URL; ?>images/arow.png"></div>
                <div class="immg">
                    <div class="row">
                        <div class="col-md-3 col-sm-12"><img src="<?= RES_URL; ?>images/img3.png"></div>
                        <div class="col-md-9 col-sm-12">
                            <h3>Mike Roland  </h3>
                            <span><img src="<?= RES_URL; ?>images/starrating.png"></span></div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="our">
                    <div class="row">
                        <div class="col-md-2 col-sm-12"><img src="<?= RES_URL; ?>images/quot.png"> </div>
                        <div class="col-md-10 col-sm-12"><i> Sed modus munere menandri ius
                                vero qualisque concludaturque ne
                                vide fastidii incorrupte</i></div>
                    </div>
                </div>
                <div class="arrow"><img src="<?= RES_URL; ?>images/arow.png"></div>
                <div class="immg">
                    <div class="row">
                        <div class="col-md-3 col-sm-12"><img src="<?= RES_URL; ?>images/img1.png"></div>
                        <div class="col-md-9 col-sm-12">
                            <h3>Anna Gibson </h3>
                            <span><img src="<?= RES_URL; ?>images/starrating.png"></span></div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="our">
                    <div class="row">
                        <div class="col-md-2 col-sm-12"><img src="<?= RES_URL; ?>images/quot.png"> </div>
                        <div class="col-md-10 col-sm-12"><i> Sed modus munere menandri ius
                                vero qualisque concludaturque ne
                                vide fastidii incorrupte</i></div>
                    </div>
                </div>
                <div class="arrow"><img src="<?= RES_URL; ?>images/arow.png"></div>
                <div class="immg">
                    <div class="row">
                        <div class="col-md-3 col-sm-12"><img src="<?= RES_URL; ?>images/img2.png"></div>
                        <div class="col-md-9 col-sm-12">
                            <h3>Shawn Mille </h3>
                            <span><img src="<?= RES_URL; ?>images/starrating.png"></span></div>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="our">
                    <div class="row">
                        <div class="col-md-2 col-sm-12"><img src="<?= RES_URL; ?>images/quot.png"> </div>
                        <div class="col-md-10 col-sm-12"><i> Sed modus munere menandri ius
                                vero qualisque concludaturque ne
                                vide fastidii incorrupte</i></div>
                    </div>
                </div>
                <div class="arrow"><img src="<?= RES_URL; ?>images/arow.png"></div>
                <div class="immg">
                    <div class="row">
                        <div class="col-md-3 col-sm-12"><img src="<?= RES_URL; ?>images/img3.png"></div>
                        <div class="col-md-9 col-sm-12">
                            <h3>Mike Roland  </h3>
                            <span><img src="<?= RES_URL; ?>images/starrating.png"></span></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<a name="CONTACT"></a>
<div class="wrapper9">
    <div class="container">
        <div class="pass">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h2>Auto Form</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 wid_pad">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="inputEmail" placeholder="FIRST NAME">
                            </div>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="inputEmail" placeholder="LAST NAME">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="inputEmail" placeholder="PHONE">
                            </div>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="inputEmail" placeholder="EMAIL">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea name="msg" placeholder="MESSAGE"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-primary bnnt">SEND NOW! </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="wrapper14">
    <div class="container">

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <div class="item active container">
                    <img class="col-md-2 col-sm-2 col-xs-2 logo img-responsive" src="<?= RES_URL; ?>images/cl-1.png" alt="...">
                    <img class="col-md-2 col-sm-2 col-xs-2 logo img-responsive" src="<?= RES_URL; ?>images/cl-7.png" alt="...">
                    <img class="col-md-2 col-sm-2 col-xs-2 logo img-responsive" src="<?= RES_URL; ?>images/cl-3.png" alt="...">
                    <img class="col-md-2 col-sm-2 col-xs-2 logo img-responsive" src="<?= RES_URL; ?>images/cl-4.png" alt="...">
                    <img class="col-md-2 col-sm-2 col-xs-2 logo img-responsive" src="<?= RES_URL; ?>images/cl-5.png" alt="...">
                    <img class="col-md-2 col-sm-2 col-xs-2 logo img-responsive" src="<?= RES_URL; ?>images/cl-6.png" alt="...">

                </div>

                <div class="item container">
                    <img class="col-md-2 col-sm-2 col-xs-2 logo img-responsive" src="<?= RES_URL; ?>images/cl-1.png" alt="...">
                    <img class="col-md-2 col-sm-2 col-xs-2 logo img-responsive" src="<?= RES_URL; ?>images/cl-7.png" alt="...">
                    <img class="col-md-2 col-sm-2 col-xs-2 logo img-responsive" src="<?= RES_URL; ?>images/cl-3.png" alt="...">
                    <img class="col-md-2 col-sm-2 col-xs-2 logo img-responsive" src="<?= RES_URL; ?>images/cl-4.png" alt="...">
                    <img class="col-md-2 col-sm-2 col-xs-2 logo img-responsive" src="<?= RES_URL; ?>images/cl-5.png" alt="...">
                    <img class="col-md-2 col-sm-2 col-xs-2 logo img-responsive" src="<?= RES_URL; ?>images/cl-6.png" alt="...">
                </div>

            </div>

            <div align="center" style="margin-top:20px;">
                <!-- Controls -->
                <a class="left" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>

        </div>
    </div>
</div>



<?php $this->load->view('scripts');?>
<script type="text/javascript">
    $(document).ready(function(){

        $('#lnkcaptcha').click(function(e){
            e.preventDefault();
            change_captch('login');
        });

        //this will stop the submit of the form but allow the native HTML5 validation (which is what i believe you are after)
        $("#frmcalc").on('submit',function(e){
            e.preventDefault();
            $('#btncalc').html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...');
            //ajax code here
            $.ajax({
                type:'POST',
                url: '<?=site_url("ajax/get_rate");?>',
                dataType: 'json',
                data: $('#frmcalc').serializeArray(),
                success:function(data, textStatus, jqXHR){
                    if(typeof data.rate !== 'undefined'){
                        $('#rate_res').html('');
                        $('#update_res').html('<div class="alert alert-success">' + data.rate + '</div>');
                        var redurl = "<?=site_url('user/booking?rcountry=');?>" + $('#txtrcountry').val();
                        if(data.is_login){
                            window.location = redurl;
                            return false;
                        }
                        $('#hidredirect').val(redurl);
                        $('#login-modal').modal('show');
                    }else{
                        $('#rate_res').html('<div class="alert alert-danger">' + data.error + '</div>')
                        $('#update_res').html('');
                    }

                },
                complete:function(jqXHR, textStatus){
                    $('#btncalc').html('<img src="<?php echo RES_URL; ?>images/fombtn.png" class="img-responsive">');
                }
            });
        });

        //this will stop the submit of the form but allow the native HTML5 validation (which is what i believe you are after)
        $("#frmlogin").on('submit',function(e){
            e.preventDefault();
            formData = $('#frmlogin').serializeArray();
            formData.push({ name: 'btnlogin', value: 'login' });
            //ajax code here
            $.ajax({
                type:'POST',
                url: '<?=site_url("user/login/1");?>',
                dataType: 'json',
                data: formData,
                success:function(data, textStatus, jqXHR){
                    if(typeof data.success !== 'undefined'){
                        window.location = data.redirect_to;
                    }else{
                        $('#login_res').html('<div class="alert alert-danger">' + data.error + '</div>')
                    }
                    $('#modal-container-575041').modal('show');
                },
                complete:function(jqXHR, textStatus){
                    change_captch('login');
                }
            });
        });

        $('#item_type').on('change',function(){
            item_type = $(this).val();
            if(item_type == 'document'){
                $('#txtweight').attr('placeholder','Weight in Oz');
            }else{
                $('#txtweight').attr('placeholder','Weight in lbs');
            }
        });

    });
</script>





<!--<div class="row">
    <div class="col-md-12">
        <div id="rate_res"></div>
        <?php echo form_open('#',array('class' => 'form-group form-inline','id' => 'frmcalc'));?>
            <div class="row text-center">
                <div class="form-group col-xs-12">
                    <label for="delivering" >Delivering To:</label>
                    <?php
                    $attributes = 'class = "form-control" id = "txtrcountry" name="txtrcountry" ';
                    echo form_dropdown('txtrcountry',$country,set_value('txtrcountry'),$attributes);?>
                    <?php /*<label for="zipcode">&nbsp;</label>
                    <input id="zipcode" class="form-control input-group-lg reg_name" type="text" name="zipcode" placeholder="Zipcode">*/?>
                </div>

            </div>
            <div class="row"></div>
            <div class="row text-center">
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="delivering" >Item Type:</label>
                    <select class="form-control input-group-lg" id="item_type" name="item_type">
                        <option value="document">Document</option>
                        <option value="parcel">Parcel</option>
                    </select>
                </div>
                <?php /*<div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="delivering" >No of Items:</label>
                    <select class="form-control input-group-lg" id="noitem" name="noitem">
                        <?php for($i=1;$i<=100;$i++){echo "<option value='".$i."'>".$i."</option>"; }?>
                    </select>
                </div>*/ ?>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="weight" >Weight:</label>
                    <input id="txtweight" class="form-control input-group-lg reg_name" type="number" name="txtweight" placeholder="Weight in Oz" min="1" step="0.01" max="150.00" required>
                </div>
            </div>
            <div class="row"></div>
            <div class="text-center col-xs-12">
                <button id="btncalc" class="btn btn-lg btn-primary"><i class="fa fa-calculator"></i> Calculate Rate</button>
            </div>
        <?php echo form_close();?>
    </div>
</div>
<?php /* $this->load->view('scripts'); */?>
<script type="text/javascript">
    $(document).ready(function(){

        $('#lnkcaptcha').click(function(e){
            e.preventDefault();
            change_captch('login');
        });

        //this will stop the submit of the form but allow the native HTML5 validation (which is what i believe you are after)
        $("#frmcalc").on('submit',function(e){
            e.preventDefault();
            $('#btncalc').html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...');
            //ajax code here
            $.ajax({
                type:'POST',
                url: '<?=site_url("ajax/get_rate");?>',
                dataType: 'json',
                data: $('#frmcalc').serializeArray(),
                success:function(data, textStatus, jqXHR){
                    if(typeof data.rate !== 'undefined'){
                        $('#rate_res').html('');
                        $('#update_res').html('<div class="alert alert-success">' + data.rate + '</div>');
                        var redurl = "<?=site_url('user/booking?rcountry=');?>" + $('#txtrcountry').val();
                        if(data.is_login){
                            window.location = redurl;
                            return false;
                        }
                        $('#hidredirect').val(redurl);
                        $('#modal-container-575041').modal('show');
                    }else{
                        $('#rate_res').html('<div class="alert alert-danger">' + data.error + '</div>')
                        $('#update_res').html('');
                    }

                },
                complete:function(jqXHR, textStatus){
                    $('#btncalc').html('<i class="fa fa-calculator"></i> Calculate Rate');
                }
            });
        });

        //this will stop the submit of the form but allow the native HTML5 validation (which is what i believe you are after)
        $("#frmlogin").on('submit',function(e){
            e.preventDefault();
            formData = $('#frmlogin').serializeArray();
            formData.push({ name: 'btnlogin', value: 'login' });
            //ajax code here
            $.ajax({
                type:'POST',
                url: '<?=site_url("user/login/1");?>',
                dataType: 'json',
                data: formData,
                success:function(data, textStatus, jqXHR){
                    if(typeof data.success !== 'undefined'){
                        window.location = data.redirect_to;
                    }else{
                        $('#login_res').html('<div class="alert alert-danger">' + data.error + '</div>')
                    }
                    $('#modal-container-575041').modal('show');
                },
                complete:function(jqXHR, textStatus){
                    change_captch('login');
                }
            });
        });

        $('#item_type').on('change',function(){
           item_type = $(this).val();
            if(item_type == 'document'){
                $('#txtweight').attr('placeholder','Weight in Oz');
            }else{
                $('#txtweight').attr('placeholder','Weight in lbs');
            }
        });
        
    });
</script>-->
