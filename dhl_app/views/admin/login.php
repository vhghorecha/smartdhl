<?php
$attributes = 'id = "login-form" name="login-form" ';
echo form_open('admin/login',$attributes);?>
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
        <div class="col-xs-12 form-group required">
            <label class="control-label" for="username">Username</label>
            <input type="text" class="form-control required" name="username" id="username">
        </div>

        <div class="col-xs-12 form-group required">
            <label class="control-label" for="name">Password</label>
            <input type="password" class="form-control required" name="password" id="password">
        </div>

        <div class="col-xs-12 form-group required">
            <label class="control-label"><img id="imgcaptcha" src="<?=site_url('ajax/get_captcha/login');?>"/></label>
            <a href="#" id="lnkcaptcha"><i class="fa fa-refresh"></i></a>
            <input type="text" class="form-control" name="txtcaptcha" id="txtcaptcha" placeholder="Image Code" required/>
        </div>

        <div class="col-xs-12 text-center">
            <input type="submit" class="btn btn-success btn-large" name="btnlogin" value="Login" />
            <button type="reset" class="btn">Cancel</button>
        </div>
    </div>
</form>
<?php $this->load->view('scripts');?>
<script type="text/javascript">
    $(document).ready(function(){

        $('#lnkcaptcha').click(function(e){
            e.preventDefault();
            $('#imgcaptcha').attr('src','<?=site_url("ajax/get_captcha/register");?>' + $.now());
        });

    }); // end document.ready
</script>