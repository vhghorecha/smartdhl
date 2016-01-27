</div>
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
                        <input type="password" class="form-control" name="txtpass" id="txtpass" placeholder="Email Address" required/>
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

</div>
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