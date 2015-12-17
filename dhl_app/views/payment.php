<?php
$attributes = 'id = "login-form" name="login-form" ';
echo form_open('payment/init',$attributes);?>
    <input type="hidden" name="shp_id" value="<?=$shp_id;?>"/>
    <div class="row">
        <?php if(!empty($message)) { ?>
            <div class="col-sm-12">
                <div class="alert alert-success alert-dismissable">
                    <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                            aria-hidden="true"><i class="fa fa-close"></i></button>
                    <?=$message?>
                </div>
            </div>
        <?php } ?>

        <div class="col-xs-12 text-center">
            <div class="payment-selector">
                <input id="paypal" type="radio" name="gateway" value="paypal" checked />
                <label class="drinkcard-cc paypal" for="paypal"></label>
                <input id="authorize" type="radio" name="gateway" value="authorize" />
                <label class="drinkcard-cc authorize"for="authorize"></label>
            </div>
            <input type="submit" class="btn btn-success btn-large" name="btnpay" value="Pay Now" />
        </div>
    </div>
</form>
<?php $this->load->view('scripts');?>
<script type="text/javascript">
    $(document).ready(function(){

    }); // end document.ready
</script>