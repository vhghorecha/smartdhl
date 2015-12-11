<?php
$attributes = 'id = "registration-form" name="registration-form" ';
echo form_open('',$attributes);?>
    <div class="row">
        <?php if(!empty($error)) { ?>
        <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissable">
                <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                        aria-hidden="true"><i class="fa fa-close"></i></button>
                <?=$error?></div>
            </div>
        </div>
        <?php } ?>
        <?php if(!empty($message)) { ?>
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissable">
                <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                        aria-hidden="true"><i class="fa fa-close"></i></button>
                <?=$message?></div>
            </div>
        </div>
        <?php } ?>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group required">
            <label class="control-label" for="email">Email Address</label>
            <input type="email" class="form-control" name="txtemail" id="txtemail">
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group required">
            <label class="control-label" for="name">Your Name</label>
            <input type="text" class="form-control" name="txtname" id="txtname">
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group required">
            <label class="control-label" for="name">Password</label>
            <input type="password" class="form-control" name="txtpassword" id="txtpassword">
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group required">
            <label class="control-label" for="name"> Retype Password</label>
            <input type="password" class="form-control" name="txtcpassword" id="txtcpassword">
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group required">
            <label class="control-label"><img id="imgcaptcha" src="<?=site_url('ajax/get_captcha/register');?>"/></label>
            <a href="#" id="lnkcaptcha"><i class="fa fa-refresh"></i></a>
            <input type="text" class="form-control" name="txtcaptcha" id="txtcaptcha" placeholder="Image Code" required/>
        </div>

        <div class="col-xs-12 text-center">
            <input type="submit" class="btn btn-success btn-large" name="btnRegister" value="Register" />
            <button type="reset" class="btn">Cancel</button>
        </div>
    </div>
</form>
<?php $this->load->view('scripts');?>
<script type="text/javascript">
    $(document).ready(function(){

        $('#lnkcaptcha').click(function(e){
            e.preventDefault();
            change_captch('register');
        });

        $('#registration-form').validate({
            rules: {
                txtname: {
                    required: true,
                    minlength:3,
                },
                txtpassword: {
                    required: true,
                    minlength: 3
                },
                txtcpassword: {
                    required: true,
                    minlength: 3,
                    equalTo: "#txtpassword"
                },
                txtemail: {
                    required: true,
                    email: true
                },
            },
            showErrors: function(errorMap, errorList) {
                $.each(this.successList, function(index, value) {
                    $(value).addClass('valid').removeClass('warning');
                    return $(value).popover("hide");
                });
                return $.each(errorList, function(index, value) {
                    $(value.element).addClass('warning').removeClass('valid');
                    var _popover;
                    _popover = $(value.element).popover({
                        trigger: "manual",
                        placement: "top",
                        content: value.message,
                        template: "<div class=\"popover\"><div class=\"arrow\"></div><div class=\"popover-inner\"><div class=\"popover-content\"><p></p></div></div></div>"
                    });
                    // Bootstrap 3.x :
                    _popover.data("bs.popover").options.content = value.message;
                    return $(value.element).popover("show");
                });
            }
        });

    }); // end document.ready
</script>