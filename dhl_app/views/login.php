<div id="registe-new">
    <center><h2>Login</h2></center>
    <div class="container">

        <?php
        $attributes = 'id = "login-form" name="login-form" ';
        echo form_open('user/login',$attributes);?>

        <div class="row">
            <?php if(!empty($error)) { ?>
                <div class="col-sm-12">
                    <div class="alert alert-danger alert-dismissable">
                        <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                                aria-hidden="true"><i class="fa fa-close"></i></button>
                        <?=$error?></div>
                </div>
            <?php } ?>
            <?php if(!empty($message)) { ?>
                <div class="col-sm-12">
                    <?=$message?>
                </div>
            <?php } ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group required">
                <label class="control-label" for="email">Email Address</label>
                <input type="email" class="form-control" name="txtemail" id="txtemail">
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group required">
                <label class="control-label" for="name">Password</label>
                <input type="password" class="form-control" name="txtpass" id="txtpass">
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group required">
                <label class="control-label"><img id="imgcaptcha" src="<?=site_url('ajax/get_captcha/login');?>"/></label>
                <a href="#" id="lnkcaptcha"><i class="fa fa-refresh"></i></a>
                <input type="text" class="form-control" name="txtcaptcha" id="txtcaptcha" placeholder="Image Code" required/>
            </div>

            <div class="col-xs-12 text-center">
                <!--<input type="submit" class="btn btn-success btn-large" name="btnlogin" value="Login" />-->
                <button type="submit" class="btn btn-success btn-large" name="btnlogin" value="Login">Login</button>
                <button type="reset" class="btn">Cancel</button>
            </div>
        </div>


        </form>
    </div>

</div>
<?php $this->load->view('scripts');?>
<script type="text/javascript">
    $(document).ready(function(){

        $('#lnkcaptcha').click(function(e){
            e.preventDefault();
            $('#imgcaptcha').attr('src','<?=site_url("ajax/get_captcha/register");?>' + $.now());
        });

    }); // end document.ready
</script>