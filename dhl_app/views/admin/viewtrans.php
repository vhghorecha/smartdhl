<div class="row">
    <?php
    $attributes = 'id = "booking-form" name="booking-form" ';
    echo form_open('',$attributes);?>
    <div class="container-fluid">
        <?php if(!empty($error)) { ?>
            <div class="col-sm-12">
                <div class="alert alert-danger alert-dismissable">
                    <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                            aria-hidden="true"><i class="fa fa-close"></i></button>
                    <?=$error?>
                </div>
            </div>
        <?php } ?>
        <?php if(!empty($message)) { ?>
            <div class="col-sm-12">
                <div class="alert alert-success alert-dismissable">
                    <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                            aria-hidden="true"><i class="fa fa-close"></i></button>
                    <?=$message?>
                </div>
            </div>
        <?php } ?>
        <?php if(!empty($last_rate['rate'])) { ?>
            <div class="col-sm-12">
                <div class="alert alert-success alert-dismissable">
                    <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                            aria-hidden="true"><i class="fa fa-close"></i></button>
                    <?=$last_rate['rate']?>
                </div>
            </div>
        <?php } ?>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Sender Address</div>
                <div class="panel-body">

                    <p><b><?=$from['adr_contact']?></b></p>
                    <p><?=$from['adr_street1']?></p>
                    <p><?=$from['adr_street2']?></p>
                    <p><?=$from['city_name']." , ".$from['adr_zip']?></p>
                    <p><?=$from['state_name']." , ".$from['cnt_name']?></p>
                    <p><?=$from['adr_phone']?></p>
                    <p><?=$from['adr_email']?></p>


                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Receiver Address</div>

                <div class="panel-body">

                    <p><b><?=$to['adr_contact']?></b></p>
                    <p><?=$to['adr_street1']?></p>
                    <p><?=$to['adr_street2']?></p>
                    <p><?=$to['city_name']." , ".$from['adr_zip']?></p>
                    <p><?=$to['state_name']." , ".$from['cnt_name']?></p>
                    <p><?=$to['adr_phone']?></p>
                    <p><?=$to['adr_email']?></p>


                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Custom Details</div>

                <div class="panel-body">
                    <p><b>Description : </b><?=$shp_desc;?></p>
                    <p><b>Quantity : </b><?=$shp_quantity;?></p>
                    <p><b>Value (USD) : </b><?=$shp_value;?></p>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Payment Detail</div>

                <div class="panel-body">
                    <p><b>Transection no : </b><?=$shp_transno;?></p>
                    <p><b>Gateway : </b><?=$shp_gatewayid;?></p>
                    <p><b>Payment status : </b><?=$shp_payment;?></p>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Tracking Details</div>

                <div class="panel-body">
                    <p><b>Shipping Date : </b><?=$shp_date;?></p>
                    <p><b>Tracing code : </b><?=$shp_trackingcode;?></p>
                    <p><b>Label Url : </b><a href="<?=$shp_labelurl;?>" target="_blank">View</a></p>
                    <p><b>Estimate Date : </b><?=$shp_estdate;?></p>
                    <p><b>Status : </b><?=$shp_status;?></p>
                    <p><b>Updated At : </b><?=$shp_updateat;?></p>
                    <p><b>Signed By : </b><?=$shp_signedby;?></p>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Packaging Details</div>

                <div class="panel-body">
                    <p><b>Item type : </b><?=$shp_type;?></p>
                    <p><b>Length (INCH) : </b><?=$shp_length;?></p>
                    <p><b>Width (INCH) : </b><?=$shp_weight;?></p>
                    <p><b>Height (INCH) : </b><?=$shp_height;?></p>
                    <p><b>Weight (Oz) : </b><?=$shp_weight;?></p>
                </div>
            </div>
        </div>


        <!--<div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Packaging Details</div>
                <div class="panel-body">
                    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12 form-group">
                        <label class="control-label">Item Type</label>
                        <?=$shp_type?>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 form-group">
                        <label class="control-label">Length (INCH)</label>
                        <?=$shp_length;?>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 form-group">
                        <label class="control-label">Width (INCH)</label>
                        <?=$shp_width;?>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 form-group">
                        <label class="control-label">Height (INCH)</label>
                        <?=$shp_height;?>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 form-group">
                        <label class="control-label">Weight (Oz)</label>
                        <?=$shp_weight;?>
                    </div>
                </div>
            </div>
        </div>-->

        <!--<div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Custom Details</div>
                <div class="panel-body">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group" >
                        <label class="control-label">Description</label>
                        <?=$shp_desc;?>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 form-group">
                        <label class="control-label">Quantity</label>
                        <?=$shp_quantity;?>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 form-group">
                        <label class="control-label">Value (USD)</label>
                        <?=$shp_value;?>
                    </div>
                </div>
            </div>
        </div>-->

        <!--<div class="col-xs-12 text-center">
            <input type="submit" class="btn btn-danger btn-large" name="btnbooking" value="Book" />
            <button type="reset" class="btn">Cancel</button>
        </div>-->
    </div>
    </form>
</div>
