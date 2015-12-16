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
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtsname">Name your address</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtsname" id="txtsname" value="<?=set_value('txtsname')?>"></div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtscontact">Contact name</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtscontact" id="txtscontact" value="<?=set_value('txtscontact')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtsstr1">Street 1</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtsstr1" id="txtsstr1" value="<?=set_value('txtsstr1')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtsstr2">Street 2</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtsstr2" id="txtsstr2" value="<?=set_value('txtsstr2')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtszip">Zip code</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtszip" id="txtszip" value="<?=set_value('txtszip')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
                            <div class="col-xs-4 text-right"><label class="control-label" for="country">Country</label></div>
                            <div class="col-xs-8"><?php
                                $attributes = ' id = "txtscountry" name="txtscountry" style="width:100%"';
                                echo form_dropdown('txtscountry',$country,set_value('txtscountry'),$attributes);?></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtsstate">State</label></div>
                            <div class="col-xs-8">
                                <select id="txtsstate" name="txtsstate" class="form-control">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtscity">City</label></div>
                            <div class="col-xs-8">
                                <select id="txtscity" name="txtscity" class="form-control">
                                    <option value="">Select city</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtsphone">Phone</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtsphone" id="txtsphone" value="<?=set_value('txtsphone')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtsemail">Email</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtsemail" id="txtsemail" value="<?=set_value('txtsemail')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtstype">Address type</label></div>
                            <div class="col-xs-8">
                                <select id="txtstype" name="txtstype" class="form-control">
                                    <option value="Sender">Sender</option>
                                    <option value="Receiver">Receiver</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Receiver Address</div>

                    <div class="panel-body">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrname">Name your address</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtrname" id="txtrname" value="<?=set_value('txtrname')?>"></div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrcontact">Contact name</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtrcontact" id="txtrcontact" value="<?=set_value('txtrcontact')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrstr1">Street 1</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtrstr1" id="txtrstr1" value="<?=set_value('txtrstr1')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrstr2">Street 2</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtrstr2" id="txtrstr2" value="<?=set_value('txtrstr2')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrzip">Zip code</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtrzip" id="txtrzip" value="<?=set_value('txtrzip')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
                            <div class="col-xs-4 text-right"><label class="control-label" for="rcountry">Country</label></div>
                            <div class="col-xs-8"><?php
                                $attributes = ' id = "txtrcountry" name="txtrcountry" style="width:100%"';
                                echo form_dropdown('txtrcountry',$country,set_value('txtrcountry'),$attributes);?></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrstate">State</label></div>
                            <div class="col-xs-8">
                                <select id="txtrstate" name="txtrstate" class="form-control">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrcity">City</label></div>
                            <div class="col-xs-8">
                                <select id="txtrcity" name="txtrcity" class="form-control">
                                    <option value="">Select city</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrphone">Phone</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtrphone" id="txtrphone" value="<?=set_value('txtrphone')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtremail">Email</label></div>
                            <div class="col-xs-8"><input type="text" class="form-control" name="txtremail" id="txtremail" value="<?=set_value('txtremail')?>"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrtype">Address type</label></div>
                            <div class="col-xs-8">
                                <select id="txtrtype" name="txtrtype" class="form-control">
                                    <option value="Sender">Sender</option>
                                    <option value="Receiver">Receiver</option>
                                </select>
                            </div>
                        </div>

                    </div>








                    <!--<div class="panel-body">
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

                    </div>-->




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
    var strsstate, strscity,strrstate, strrcity;;
    $(document).ready(function(){

        $('#lnkcaptcha').click(function(e){
            e.preventDefault();
            change_captch('register');
        });

        $('#booking-form').validate({
            /*rules: {
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
            },*/

            rules: {
                //sender rules
                txtsname: {
                    required: true,
                    minlength:3,
                },
                txtscontact: {
                    required: true,
                    minlength: 3
                },
                txtsstr1: {
                    required: true,
                    minlength:3,
                },
                txtscity: {
                    required: true,
                },
                txtsstate: {
                    required: true,
                },
                txtszip: {
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

                //recever rules
                txtrname: {
                    required: true,
                    minlength:3,
                },
                txtrcontact: {
                    required: true,
                    minlength: 3
                },
                txtrstr1: {
                    required: true,
                    minlength:3,
                },
                txtrcity: {
                    required: true,
                },
                txtrstate: {
                    required: true,
                },
                txtrzip: {
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
        //sender
        $('#txtszip, #txtsstr1').blur(function(){
            zip = $('#txtszip').val();
            street = $('#txtsstr1').val();
            if(zip != "" && street != ""){
                filtersAddress(zip,street);
            }
        });
        //receiver
        $('#txtrzip, #txtrstr1').blur(function(){
            zip = $('#txtrzip').val();
            street = $('#txtrstr1').val();
            if(zip != "" && street != ""){
                filterrAddress(zip,street);
            }
        });
        //sender
        function filtersAddress(zip, street){
            $('#select2-txtscountry-container, #select2-txtsstate-container, #select2-txtscity-container').html('Loading...');
            $.ajax({
                type:'POST',
                url: '<?=site_url("ajax/get_addr_from_zip");?>',
                dataType: 'json',
                data: {txtzip: zip, txtstr1: street},
                success:function(data, textStatus, jqXHR){
                    if(typeof data.country !== 'undefined'){
                        $('#txtscountry').val($('#txtscountry option').filter(function () { return $(this).html().toUpperCase() == data.country.toUpperCase(); }).val()).trigger('change').select2();
                        strsstate = data.state;
                        strscity = data.city;
                    }
                },
                complete:function(jqXHR, textStatus){

                }
            });
        }
        //receiver
        function filterrAddress(zip, street){
            $('#select2-txtrcountry-container, #select2-txtrstate-container, #select2-txtrcity-container').html('Loading...');
            $.ajax({
                type:'POST',
                url: '<?=site_url("ajax/get_addr_from_zip");?>',
                dataType: 'json',
                data: {txtzip: zip, txtstr1: street},
                success:function(data, textStatus, jqXHR){
                    if(typeof data.country !== 'undefined'){
                        $('#txtrcountry').val($('#txtrcountry option').filter(function () { return $(this).html().toUpperCase() == data.country.toUpperCase(); }).val()).trigger('change').select2();
                        strrstate = data.state;
                        strrcity = data.city;
                    }
                },
                complete:function(jqXHR, textStatus){

                }
            });
        }
        //sender
        $('#txtscountry').change(function(){

            $.ajax({
                type:'POST',
                url: '<?=site_url("ajax/get_state_from_country");?>',
                dataType: 'json',
                data: {txtcountry: $(this).val()},
                success:function(data, textStatus, jqXHR){
                    if(typeof data.states !== 'undefined'){
                        $('#txtsstate').find('option').remove().end();
                        $.each( data.states , function( index, value ){
                            $('<option>').val(value.state_id).text(value.state_name).appendTo('#txtsstate');
                        });
                        $('#txtsstate').val($('#txtsstate option').filter(function () { return $(this).html().toUpperCase() == strsstate.toUpperCase(); }).val()).trigger('change').select2();
                    }
                },
                error:function(data){

                }
            });

        });
        //receiver
        $('#txtrcountry').change(function(){

            $.ajax({
                type:'POST',
                url: '<?=site_url("ajax/get_state_from_country");?>',
                dataType: 'json',
                data: {txtcountry: $(this).val()},
                success:function(data, textStatus, jqXHR){
                    if(typeof data.states !== 'undefined'){
                        $('#txtrstate').find('option').remove().end();
                        $.each( data.states , function( index, value ){
                            $('<option>').val(value.state_id).text(value.state_name).appendTo('#txtrstate');
                        });
                        $('#txtrstate').val($('#txtrstate option').filter(function () { return $(this).html().toUpperCase() == strrstate.toUpperCase(); }).val()).trigger('change').select2();
                    }
                },
                error:function(data){

                }
            });

        });
        //sender
        $('#txtsstate').change(function(){

            $.ajax({
                type:'POST',
                url: '<?=site_url("ajax/get_city_from_state");?>',
                dataType: 'json',
                data: {txtstate: $(this).val()},
                success:function(data, textStatus, jqXHR){
                    if(typeof data.cities !== 'undefined'){
                        $('#txtscity').find('option').remove().end();
                        $.each( data.cities , function( index, value ){
                            $('<option>').val(value.city_id).text(value.city_name).appendTo('#txtscity');
                        });
                        $('#txtscity').val($('#txtscity option').filter(function () { return $(this).html().toUpperCase() == strscity.toUpperCase(); }).val()).trigger('change').select2();
                    }
                },
                error:function(data){

                }
            });

        });
        //receiver
        $('#txtrstate').change(function(){

            $.ajax({
                type:'POST',
                url: '<?=site_url("ajax/get_city_from_state");?>',
                dataType: 'json',
                data: {txtstate: $(this).val()},
                success:function(data, textStatus, jqXHR){
                    if(typeof data.cities !== 'undefined'){
                        $('#txtrcity').find('option').remove().end();
                        $.each( data.cities , function( index, value ){
                            $('<option>').val(value.city_id).text(value.city_name).appendTo('#txtrcity');
                        });
                        $('#txtrcity').val($('#txtrcity option').filter(function () { return $(this).html().toUpperCase() == strrcity.toUpperCase(); }).val()).trigger('change').select2();
                    }
                },
                error:function(data){

                }
            });

        });


    }); // end document.ready
</script>