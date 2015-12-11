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
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Sender Address</div>
                    <div class="panel-body">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtsname">Name</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtsname" id="txtsname" value="<?=set_value('txtsname')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtsstreet1">Street 1</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtsstreet1" id="txtsstreet1" value="<?=set_value('txtsstreet1')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtscity">City</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtscity" id="txtscity" value="<?=set_value('txtscity')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtsstate">State</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtsstate" id="txtsstate" value="<?=set_value('txtsstate')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtszipcode">Zipcode</label></div>
                            <div class="col-xs-8"><input type="number" class="form-control" name="txtszipcode" id="txtszipcode" value="<?=set_value('txtszipcode')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtscountry">Country</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtscountry" id="txtscountry" value="US" disabled/></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="name">Phone</label></div>
                            <div class="col-xs-8"><input type="number" class="form-control" name="txtsphone" id="txtsphone" value="<?=set_value('txtsphone')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="name">Email</label></div>
                            <div class="col-xs-8"><input type="email" class="form-control" name="txtsemail" id="txtsemail" value="<?=set_value('txtsemail')?>"></div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Receiver Address</div>
                    <div class="panel-body">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrname">Name</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtrname" id="txtrname" value="<?=set_value('txtrname')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrstreet1">Street 1</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtrstreet1" id="txtrstreet1" value="<?=set_value('txtrstreet1')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrcity">City</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtrcity" id="txtrcity" value="<?=set_value('txtrcity')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrstate">State</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtrstate" id="txtrstate" value="<?=set_value('txtrstate')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrzipcode">Zipcode</label></div>
                            <div class="col-xs-8"><input type="number" class="form-control" name="txtrzipcode" id="txtrzipcode" value="<?=set_value('txtrzipcode')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrcountry">Country</label></div>
                            <div class="col-xs-8"><?php
                                $attributes = 'class = "form-control" id = "txtrcountry" name="txtrcountry" ';
                                echo form_dropdown('txtrcountry',$country,set_value('txtrcountry'),$attributes);?></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="name">Phone</label></div>
                            <div class="col-xs-8"><input type="number" class="form-control" name="txtrphone" id="txtrphone" value="<?=set_value('txtrphone')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="name">Email</label></div>
                            <div class="col-xs-8"><input type="email" class="form-control" name="txtremail" id="txtremail" value="<?=set_value('txtremail')?>"></div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Packaging Details</div>
                    <div class="panel-body">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 form-group required">
                            <label class="control-label">Length (INCH)</label>
                            <input type="number" class="form-control" id="txtlength" name="txtlength" step="0.1" placeholder="Length" value="<?=set_value('txtlength')?>"/>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 form-group required">
                            <label class="control-label">Width (INCH)</label>
                            <input type="number" class="form-control" id="txtwidth" name="txtwidth" step="0.1" placeholder="Width" value="<?=set_value('txtwidth')?>"/>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 form-group required">
                            <label class="control-label">Height (INCH)</label>
                            <input type="number" class="form-control" id="txtheight" name="txtheight" step="0.1" placeholder="Height" value="<?=set_value('txtheight')?>"/>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 form-group required">
                            <label class="control-label">Weight (Oz)</label>
                            <input type="number" class="form-control" id="txtweight" name="txtweight" step="0.1" placeholder="Weight" value="<?=set_value('txtweight')?>"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Custom Details</div>
                    <div class="panel-body">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required" >
                            <label class="control-label">Description</label>
                            <textarea class="form-control" id="txtdesc" name="txtdesc" placeholder="Package Description" style="resize: none;"><?=set_value('txtdesc')?></textarea>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 form-group required">
                            <label class="control-label">Quantity</label>
                            <input type="number" class="form-control" id="txtquantity" name="txtquantity" placeholder="Quantity" value="<?=set_value('txtquantity')?>"/>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 form-group required">
                            <label class="control-label">Height (INCH)</label>
                            <input type="number" class="form-control" id="txtvalue" name="txtvalue" placeholder="Value(USD)" value="<?=set_value('txtvalue')?>"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 text-center">
                <input type="submit" class="btn btn-danger btn-large" name="btnbooking" value="Book" />
                <button type="reset" class="btn">Cancel</button>
            </div>
        </div>
    </form>
</div>
<?php $this->load->view('scripts');?>
<script type="text/javascript">
    $(document).ready(function(){

        $('#lnkcaptcha').click(function(e){
            e.preventDefault();
            change_captch('register');
        });

        $('#booking-form').validate({
            rules: {
                txtsname: {
                    required: true,
                    minlength:3,
                }
                txtsstreet1: {
                    required: true,
                    minlength: 5
                },
                txtscity: {
                    required: true,
                },
                txtsstate: {
                    required: true,
                },
                txtszipcode: {
                    required: true,
                    digits: true,
                    maxlength:6,
                },
                txtscountry: {
                    required: true,
                },
                txtsphone: {
                    required: true,
                    digits:true,
                },
                txtsemail: {
                    required: true,
                    email:true,
                },
                txtrname: {
                    required: true,
                    minlength:3,
                },
                txtrstreet1: {
                    required: true,
                    minlength: 5
                },
                txtrcity: {
                    required: true,
                },
                txtrstate: {
                    required: true,
                },
                txtrzipcode: {
                    required: true,
                    digits: true,
                    maxlength:6,
                },
                txtrcountry: {
                    required: true,
                },
                txtrphone: {
                    required: true,
                    digits:true,
                },
                txtremail: {
                    required: true,
                    email:true,
                },
                txtlength: {
                    required: true,
                    number:true,
                },
                txtwidth: {
                    required: true,
                    number:true,
                },
                txtheight: {
                    required: true,
                    number:true,
                },
                txtweight: {
                    required: true,
                    number:true,
                },
                txtdesc: {
                    required:true,
                },
                txtquantity{
                    required:true,
                    number:true,
                },
                txtvalue{
                    required:true,
                    number:true,
                }
            },
            showErrors: function(errorMap, errorList) {
                $.each(this.successList, function(index, value) {
                    $(value).addClass('valid').removeClass('warning');
                    return $(value).popover("hide");
                });
                return $.each(errorList, function(index, value) {
                    $(value.element).addClass('warning').removeClass('valid');
                    /*var _popover;
                    _popover = $(value.element).popover({
                        trigger: "manual",
                        placement: "top",
                        content: value.message,
                        template: "<div class=\"popover\"><div class=\"arrow\"></div><div class=\"popover-inner\"><div class=\"popover-content\"><p></p></div></div></div>"
                    });
                    // Bootstrap 3.x :
                    _popover.data("bs.popover").options.content = value.message;
                    return $(value.element).popover("show");*/
                });
            }
        });

    }); // end document.ready
</script>