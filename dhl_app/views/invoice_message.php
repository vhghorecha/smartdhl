<?php error_reporting(0); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Invoice message</div>
            <div class="panel-body">

                <?php if(!empty($error)) { ?>
                    <div class="col-sm-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true"><i class="fa fa-close"></i></button>
                            <?=$error?>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-xs-12">
                    <div class="col-xs-12"><?php echo $message; ?></div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
