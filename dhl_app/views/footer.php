
<div class="wrapper10" id="wrapper4">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer_menu"> <img src="<?php echo RES_URL; ?>images/footer_logo.png" class="img-responsive">
                    <p>Our firm was founded May of 2010 in Chantilly, Virginia. We was started as small firm with vision to do international courier service out grown ...<br>
                        More info </p>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer_menu1">
                    <h4>About Us</h4>
                    <ul class="ul1">

                        <li><a href="<?=site_url();?>">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="<?=site_url('#HOWITWORKS');?>">How it Works</a></li>
                        <li><a href="#">Shipping Rate</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Review </a></li>
                        <li><a href="<?=site_url('#CONTACT');?>">Contact Us</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer_menu">
                    <h4>Links</h4>
                    <ul>
                        <li><!--<a href="<?=site_url('user/login');?>">Log In</a>--><a href="#"  data-toggle="modal" data-target="#login-modal"> Log In</a></li>
                        <li><a href="<?=site_url('user/register');?>">Register</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms and Condition</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer_menu">
                    <h4>CONTACT US</h4>
                    <p class="no-border phonne" >888-525-8882 </p>
                    <p class="no-border add" >14101 Sullyfield Circle #320A Chantilly, VA 20151</p>
                    <p class="no-border email">Sales@smartdhl.com</p>
                    <h5>CONTACT  WITH US</h5>
                    <div class="social_icon1">
                        <ul>
                            <li class="no-border"><a href="#" class="facebook "><i class="fa fa-facebook"></i></a></li>
                            <li class="no-border"><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li class="no-border"><a href="#" class="linkedin "><i class="fa fa-tumblr"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper12">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-menu">
                    <p> 2016 © Copyright <span style="color:#fa9633">SmartDHL</span>. All rights Reserved.. </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center"> <img src="<?php echo RES_URL; ?>images/footer_logo.png" class="img-responsive">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>
            </div>

            <!-- Begin # DIV Form -->
            <div id="div-forms">

                <div id="update_res"></div>
                <div id="login_res"></div>

                <!-- Begin # Login Form -->
                <?php echo form_open('user/login',array('class' => 'form-group','id' => 'frmlogin'));?>

                <input type="hidden" name="hidredirect" id="hidredirect" value=""/>
                <!--<form id="login-form">-->
                    <div class="modal-body">
                        <div id="div-login-msg">

                        </div>
                        <input id="txtemail" class="form-control" name="txtemail" type="text" placeholder="Username" required>
                        <input id="txtpass" class="form-control" name="txtpass" type="password" placeholder="Password" required>
                        <!--<div style="margin-top:15px" class="g-recaptcha" data-sitekey="6LefiB0TAAAAAGQpDr4ZXRqiXFJkZ5l08uzfMnMt"></div>-->
                        <div>
                            <label class="control-label"><img id="imgcaptcha" src="<?=site_url('ajax/get_captcha/login/');?>"/></label>
                            <a href="#" id="lnkcaptcha"><i class="fa fa-refresh"></i></a>
                            <input type="text" class="form-control" name="txtcaptcha" id="txtcaptcha" placeholder="Image Code" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>

                            <button type="submit"  id="btnlogin" name="btnlogin" value="Login" class="btn btn-success btn-lg btn-block">Login</button>
                        </div>
                        <div>
                            <button id="login_lost_btn" type="button" class="btn btn-link pull-right">Lost Password?</button>
                            <button id="login_register_btn" type="button" class="btn btn-link ">Register</button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- End # DIV Form -->

        </div>
    </div>
</div>
<?php $this->load->view('scripts'); ?>
<!--//footer-->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script>// Carousel Auto-Cycle
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: 6000
        })
    });

</script>
<a href="#0" class="cd-top">Top</a>

<script>$(document).ready(function(){
        $('.slider1').bxSlider({
            slideWidth: 200,
            minSlides: 2,
            maxSlides: 3,
            slideMargin: 10
        });

        $('#lnkcaptcha').click(function(e){
            e.preventDefault();
            $('#imgcaptcha').attr('src','<?php if($current_action=='login'){echo site_url('ajax/get_captcha/login/'); }else{ echo site_url('ajax/get_captcha/register/');} ?>' + $.now());
        });

        $('#modal_lnkcaptcha').click(function(e){
            e.preventDefault();
            $('#modal_imgcaptcha').attr('src','<?php echo site_url('ajax/get_captcha/login/');?>' + $.now());
        });

    });


</script>

<!--<script src="js/search.js"></script>-->
<!-- Fixed Area End -->
<script>
    $(window).scroll(function() {var height = $(window).scrollTop();if(height >= 90) {$('.newwrap').css('margin-top', '-33px');} else {$('.newwrap').css('margin-top', '0px');}});
</script>
<!--animation-effect-->

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.post1').addClass("hideme").viewportChecker({
            classToAdd: 'visb animated fadeInRight', // Class to add to the elements when they are visible
            offset: 100
        });
        jQuery('.post2').addClass("hideme").viewportChecker({
            classToAdd: 'visb animated fadeInLeft', // Class to add to the elements when they are visible
            offset: 100
        });
        jQuery('.post3').addClass("hideme").viewportChecker({
            classToAdd: 'visb animated fadeInDown', // Class to add to the elements when they are visible
            offset: 100
        });

        jQuery('.post4').addClass("hideme").viewportChecker({
            classToAdd: 'visb animated fadeInUp', // Class to add to the elements when they are visible
            offset: 100
        });





    });



</script>
<!--animation-effect-->
<script>
    $('.icon').click(function () {
        $('.search').toggleClass('expanded');
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.datepicker').datepicker({});
        $('.datepicker').on('changeDate', function(ev){
            $(this).datepicker('hide');
        });

        //$('select').select2();
        $(".dhlmodal").click(function(){
            $(this).hide();
            $('.dhlcenter').show();
            $("#ajaxerror").hide();
        })
    });
    $(document)
        .ajaxStart(function(){
            $(".dhlmodal").show();
        })
        .ajaxStop(function(){
            $(".dhlmodal").hide();
        }).ajaxError(function( event, jqxhr, settings, thrownError ) {
        $(".dhlcenter").hide();
        $("ajaxerror").html(thrownError).show();
    });
</script>

</body>
</html>

<!--</div>
<div class="modal fade" id="modal-container-575041" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open('user/login',array('class' => 'form-group','id' => 'frmlogin'));?>
            <input type="hidden" name="hidredirect" id="hidredirect" value=""/>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-close"></i>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    SmartDHL
                </h4>
            </div>
            <div class="modal-body">
                <div id="update_res"></div>
                <div id="login_res"></div>
                <div class="row-container">
                    <div class="form-group required">
                        <label class="control-label">Email</label>
                        <input type="email" class="form-control" name="txtemail" id="txtemail" placeholder="Email Address" required/>
                    </div>
                </div>
                <div class="row-container">
                    <div class="form-group required">
                        <label class="control-label">Password</label>
                        <input type="password" class="form-control" name="txtpass" id="txtpass" placeholder="Password" required/>
                    </div>
                </div>
                <div class="row-container">
                    <div class="form-group required">
                        <label class="control-label"><img id="imgcaptcha" src="<?=site_url('ajax/get_captcha/login/');?>"/></label>
                        <a href="#" id="lnkcaptcha"><i class="fa fa-refresh"></i></a>
                        <input type="text" class="form-control" name="txtcaptcha" id="txtcaptcha" placeholder="Image Code" required/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" id="btnlogin" name="btnlogin" value="Login" />
                <a href="" role="button" class="btn btn-success">
                    Register
                </a>
            </div>
            <?php echo form_close();?>
        </div>

    </div>

</div>-->

    <!--</body>
</html>-->