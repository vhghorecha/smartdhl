<div id="registe-new">
    <center><h2>Pickup Information</h2></center>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Update Pickup Information</div>
                    <div class="panel-body">
                        <?php echo form_open(current_url(),array('class' => 'form-group','id' => 'frmpickup'));?>
                        <?php if(!empty($error)) { ?>
                            <div class="col-sm-12">
                                <div class="alert alert-danger alert-dismissable">
                                    <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true"><i class="fa fa-close"></i></button>
                                    <?=$error?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-sm-6 col-xs-12">
                            <div class="col-xs-12">
                                <div class="col-xs-4 text-right"><label class="control-label" for="selfromaddr">Address from Address Book</label></div>
                                <div class="col-xs-8"><?php
                                    $attributes = ' id = "selfromaddr" name="selfromaddr" class="form-control input-sm"';
                                    echo form_dropdown('selfromaddr',$fromaddr,set_value('selfromaddr'),$attributes);?></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                                <div class="col-xs-4 text-right"><label class="control-label" for="txtsname">Address Name</label></div>
                                <div class="col-xs-8"><input type="text" class="form-control input-sm" name="txtsname" id="txtsname" value="<?=set_value('txtsname')?>"></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                                <div class="col-xs-4 text-right"><label class="control-label" for="txtscontact">Contact name</label></div>
                                <div class="col-xs-8"><input type="text" class="form-control input-sm" name="txtscontact" id="txtscontact" value="<?=set_value('txtscontact')?>"></div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                                <div class="col-xs-4 text-right"><label class="control-label" for="txtsstr1">Street 1</label></div>
                                <div class="col-xs-8"><input type="text" class="form-control input-sm" name="txtsstr1" id="txtsstr1" value="<?=set_value('txtsstr1')?>"></div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
                                <div class="col-xs-4 text-right"><label class="control-label" for="txtsstr2">Street 2</label></div>
                                <div class="col-xs-8"><input type="text" class="form-control input-sm" name="txtsstr2" id="txtsstr2" value="<?=set_value('txtsstr2')?>"></div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                                <div class="col-xs-4 text-right"><label class="control-label" for="txtszip">Zip code</label></div>
                                <div class="col-xs-8"><input type="text" class="form-control input-sm" name="txtszip" id="txtszip" value="<?=set_value('txtszip')?>"></div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                                <div class="col-xs-4 text-right"><label class="control-label" for="country">Country</label></div>
                                <div class="col-xs-8"><?php
                                    $attributes = ' id = "txtscountry" name="txtscountry" class="form-control input-sm"';
                                    echo form_dropdown('txtscountry',$scountry,set_value('txtscountry'),$attributes);?></div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                                <div class="col-xs-4 text-right"><label class="control-label" for="txtsstate">State</label></div>
                                <div class="col-xs-8">
                                    <select id="txtsstate" name="txtsstate" class="form-control input-sm">
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                                <div class="col-xs-4 text-right"><label class="control-label" for="txtscity">City</label></div>
                                <div class="col-xs-8">
                                    <select id="txtscity" name="txtscity" class="form-control input-sm">
                                        <option value="">Select city</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                                <div class="col-xs-4 text-right"><label class="control-label" for="txtsphone">Phone</label></div>
                                <div class="col-xs-8"><input type="text" class="form-control input-sm" name="txtsphone" id="txtsphone" value="<?=set_value('txtsphone')?>"></div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                                <div class="col-xs-4 text-right"><label class="control-label" for="txtsemail">Email</label></div>
                                <div class="col-xs-8"><input type="text" class="form-control input-sm" name="txtsemail" id="txtsemail" value="<?=set_value('txtsemail')?>"></div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input type="checkbox" name="savesaddr" id="savesaddr" value="1"/> Save this address
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtrtime">Ready Time</label></div>
                            <div class="col-xs-8">
                                <div class="input-group clockpicker">
                                    <input type="text" id="txtrtime" name="txtrtime" class="form-control" value="<?=set_value('txtrtime')?>">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                                </div>
                            </div>
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtctime">Close Time</label></div>
                            <div class="col-xs-8">
                                <div class="input-group clockpicker">
                                    <input type="text" id="txtctime" name="txtctime" class="form-control" value="<?=set_value('txtctime')?>">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                                </div>
                            </div>
                            <div class="col-xs-4 text-right"><label class="control-label" for="txtins">Instructions</label></div>
                            <div class="col-xs-8">
                                <textarea class="form-control input-sm" id="txtins" name="txtins" placeholder="Special Instructions" style="resize: none;" rows="3"><?=set_value('txtins')?></textarea>
                            </div>
                            <div class="col-xs-12 text-right">
                                <!--<input type="submit" class="btn btn-danger btn-large" name="btnschedule" value="Schedule" />-->
                                <button  type="submit" class="btn btn-danger btn-large" name="btnschedule" value="Schedule">Schedule</button>
                            </div>
                        </div>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
     </div>
</div>


<?php $this->load->view('scripts');?>
<script type="text/javascript">
    $(document).ready(function(){
        var def_addr = '<?=$shp_from;?>';

        //sender
        $('#txtscountry').change(function(){
            //if(!refsaddr) return;
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
                        if(strsstate != ''){
                            $('#txtsstate').val($('#txtsstate option').filter(function () { return $(this).html().toUpperCase() == strsstate.toUpperCase(); }).val()).trigger('change');
                        }
                    }
                },
                error:function(data){

                }
            });

        });

        //sender
        $('#txtsstate').change(function(){
            //if(!refsaddr) return;
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
                        if(strscity != ''){
                            $('#txtscity').val($('#txtscity option').filter(function () { return $(this).html().toUpperCase() == strscity.toUpperCase(); }).val()).trigger('change');
                        }
                    }
                },
                error:function(data){

                }
            });

        });

        $('#selfromaddr').change(function(){
            //refsaddr = false;
            $adr_id = $(this).val();
            if($adr_id > 0){
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: '<?=site_url('ajax/get_address');?>',
                    data: {adr_id: $adr_id},
                    dataType: 'json',
                    success:function(data){
                        if(typeof data.adr_id !== 'undefined'){
                            $('#txtsname').val(data.adr_name);
                            $('#txtscontact').val(data.adr_contact);
                            $('#txtsstr1').val(data.adr_street1);
                            $('#txtsstr2').val(data.adr_street2);
                            $('#txtszip').val(data.adr_zip);
                            $('#txtsphone').val(data.adr_phone);
                            $('#txtsemail').val(data.adr_email);
                            strsstate = data.state_name;
                            strscity = data.city_name;
                            $('#txtscountry').val($('#txtscountry option').filter(function () { return $(this).html().toUpperCase() == data.cnt_name.toUpperCase(); }).val()).trigger('change');
                            //refsaddr = true;
                            //$('#savesaddr').prop('disabled',true);
                        }
                    },
                    error:function(jqXHR, textStatus, error){
                        $('#resmodify').html('<div class="alert alert-danger">The following error occurred: ' + error + '</div>');
                    }
                });
            }else{
                //refsaddr = false;
                //$('#savesaddr').prop('disabled',false);
                $('#txtsname, #txtscontact, #txtsstr1, #txtsstr2, #txtszip, #txtsphone, #txtsemail').val('');
                $('#txtscountry, #txtsstate, #txtscity').val('').trigger('change');
                //setTimeout('refsaddr=true;',3000);
            }
        });

        if(def_addr != ''){
            $('#selfromaddr').val(def_addr).trigger('change');
        }

        $('.clockpicker').clockpicker({
            autoclose: true,
        });

        $('#frmpickup').submit(function(){
            $(".dhlmodal").show();
        });
    });
</script>