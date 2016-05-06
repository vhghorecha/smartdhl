<div id="registe-new">
    <center><h2>Address book</h2></center>
    <div class="container">
        <div class="row">
            <div id="resmodify"></div>
            <div class="col-xs-12 text-center">
                <a role="button" href="#model-addr" id="btnadd" class="btn btn-primary" data-toggle="modal">Add</a> |
                <button id="btnedit" class="btn btn-primary" disabled="disabled">Edit</button> |
                <button id="btndelete" class="btn btn-primary" disabled="disabled">Delete</button> |
                <!--<button id="btnimport" class="btn btn-primary">Import</button> |-->
                <a role="button" id="btnexport" class="btn btn-primary" href="<?=site_url('user/export_addr');?>">Export CSV</a> <!--|
        <button id="btnrall" class="btn btn-primary">Remove All</button>-->
            </div>
        </div>
        <table id="tbladdr">
            <thead>
            <tr>
                <th class="never">ID</th>
                <th class="all">Address Name</th>
                <th>Contact Name</th>
                <th>Street 1</th>
                <th>Street 2</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Zipcode</th>
                <th>Phone</th>
                <th>Type</th>
                <th>Email</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Address Name</th>
                <th>Contact Name</th>
                <th>Street 1</th>
                <th>Street 2</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Zipcode</th>
                <th>Phone</th>
                <th>Type</th>
                <th>Email</th>
            </tr>
            </tfoot>
        </table>

        <div class="modal fade" id="model-addr" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <?php echo form_open('user/updateaddr',array('class' => 'form-group','id' => 'frmaddr'));?>
                    <input type="hidden" name="hidadrid" id="hidadrid" value=""/>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="fa fa-close"></i>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Address Entry
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div id="update_res"></div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group required">
                                    <label class="control-label">Name your address</label>
                                    <div class="col-xs-12"><input type="text" class="form-control" name="txtname" id="txtname" placeholder="Name your address" required/></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group required">
                                    <label class="control-label">Contact Name</label>
                                    <div class="col-xs-12"><input type="text" class="form-control" name="txtcontact" id="txtcontact" placeholder="Contact Person Name" required/></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group required">
                                    <label class="control-label">Street 1</label>
                                    <div class="col-xs-12"><input type="text" class="form-control" name="txtstr1" id="txtstr1" placeholder="Street Address 1" required/></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Street 2</label>
                                    <div class="col-xs-12"><input type="text" class="form-control" name="txtstr2" id="txtstr2" placeholder="Street Address 2"/></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group required">
                                    <label class="control-label">Zipcode</label>
                                    <div class="col-xs-12"><input type="number" class="form-control" name="txtzip" id="txtzip" placeholder="Zipcode" max="999999" required/></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label class="control-label">Country</label>
                                    <div class="col-xs-12"><?php
                                        $attributes = ' id = "txtcountry" name="txtcountry" class="form-control"';
                                        echo form_dropdown('txtcountry',$country,set_value('txtcountry'),$attributes);?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group required">
                                    <label class="control-label">State</label>
                                    <div class="col-xs-12">
                                        <select id="txtstate" name="txtstate" class="form-control">
                                            <option value="">Select State</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group required">
                                    <label class="control-label">City</label>
                                    <div class="col-xs-12">
                                        <select id="txtcity" name="txtcity" class="form-control">
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group required">
                                    <label class="control-label">Phone</label>
                                    <div class="col-xs-12">
                                        <input type="number" class="form-control" name="txtphone" id="txtphone" value="<?=set_value('txtphone')?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group required">
                                    <label class="control-label">Email</label>
                                    <div class="col-xs-12">
                                        <input type="email" class="form-control" name="txtemail" id="txtemail">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group required">
                                    <label class="control-label">Address Type</label>
                                    <div class="col-xs-12">
                                        <select id="txttype" name="txttype" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="Sender">Sender</option>
                                            <option value="Receiver">Receiver</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group required">
                                    <label class="control-label">Users</label>
                                    <div class="col-xs-12"><?php
                                        $attributes = ' id = "txtuser" name="txtuser" class="form-control"';
                                        echo form_dropdown('txtuser',$user,set_value('txtuser'),$attributes);?>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" id="btnsave" name="btnsave" value="Save" />
                    </div>
                    <?php echo form_close();?>
                </div>

            </div>

        </div>

    </div>
</div>




<?php $this->load->view('scripts');?>
<script type="text/javascript">
    var strstate = strcity='';

    $('#btnadd').click(function(){
        strstate = strcity = '';
        $('input[type!="submit"], select, textarea').val('');
    });

    /*$('#txtzip, #txtstr1').blur(function(){
        zip = $('#txtzip').val();
        street = $('#txtstr1').val();
        if(zip != "" && street != "" && isedit == 0){
            filterAddress(zip,street);
        }
    });*/

    function filterAddress(zip, street){
        $('#select2-txtcountry-container, #select2-txtstate-container, #select2-txtcity-container').html('Loading...');
        $.ajax({
            type:'POST',
            url: '<?=site_url("ajax/get_addr_from_zip");?>',
            dataType: 'json',
            data: {txtzip: zip, txtstr1: street},
            success:function(data, textStatus, jqXHR){
                if(typeof data.country !== 'undefined'){
                    $('#txtcountry').val($('#txtcountry option').filter(function () { return $(this).html().toUpperCase() == data.country.toUpperCase(); }).val()).trigger('change');
                    strstate = data.state;
                    strcity = data.city;
                }
            },
            complete:function(jqXHR, textStatus){

            }
        });
    }

    $('#txtcountry').change(function(){
        if(isedit) return;
        $.ajax({
            type:'POST',
            url: '<?=site_url("ajax/get_state_from_country");?>',
            dataType: 'json',
            data: {txtcountry: $(this).val()},
            success:function(data, textStatus, jqXHR){
                if(typeof data.states !== 'undefined'){
                    $('#txtstate').find('option').remove().end();
                    $('<option>').val('').text('Select State').appendTo('#txtstate');
                    $.each( data.states , function( index, value ){
                        $('<option>').val(value.state_id).text(value.state_name).appendTo('#txtstate');
                    });
                    if(strstate != ''){
                        $('#txtstate').val($('#txtstate option').filter(function () { return $(this).html().toUpperCase() == strstate.toUpperCase(); }).val()).trigger('change');
                    }
                }
            },
            error:function(data){

            }
        });

    });

    $('#txtstate').change(function(){
        if(isedit) return;
        $.ajax({
            type:'POST',
            url: '<?=site_url("ajax/get_city_from_state");?>',
            dataType: 'json',
            data: {txtstate: $(this).val()},
            success:function(data, textStatus, jqXHR){
                if(typeof data.cities !== 'undefined'){
                    $('#txtcity').find('option').remove().end();
                    $('<option>').val('').text('Select City').appendTo('#txtcity');
                    $.each( data.cities , function( index, value ){
                        $('<option>').val(value.city_id).text(value.city_name).appendTo('#txtcity');
                    });
                    $('#txtcity').val($('#txtcity option').filter(function () { return $(this).html().toUpperCase() == strcity.toUpperCase(); }).val()).trigger('change');
                }
            },
            error:function(data){

            }
        });

    });

    var selID = 0;
    var isedit = 0;
    var table = $('#tbladdr').dataTable( {
        "sDom": '<"top"pl>rt<"bottom"><"clear">',
        "aaSorting": [[0, "desc"]],
        "oLanguage": {
            "sLengthMenu": "_MENU_ records per page"
        },
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?=site_url('user/get_addrs_admin');?>",
        "responsive" : true,
        fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            // Row click
            $(nRow).on('click', function() {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                    selID = 0;
                    $('#btnedit').prop('disabled',true);
                    $('#btndelete').prop('disabled',true);
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    selID = aData[0];
                    $('#btnedit').prop('disabled',false);
                    $('#btndelete').prop('disabled',false);
                }
            });

        }
    } );

    // Setup - add a text input to each footer cell
    $('#tbladdr tfoot th').each( function () {
        $(this).html( txtsearch );
    } );

    $('#btnrall').click(function(){
        $.ajax({
            type: "POST",
            cache: false,
            url: '<?=site_url('user/del_addr_all');?>',
            dataType: 'json',
            success: function (data) {
                if (typeof data.deleted !== 'undefined') {
                    table.fnDraw();
                    $('#resmodify').html('<div class="alert alert-success">All addresses removed successfully...</div>');
                } else {
                    $('#resmodify').html('<div class="alert alert-danger">The following error occurred: ' + data.error + '</div>');
                }

            },
            error: function (jqXHR, textStatus, error) {
                $('#resmodify').html('<div class="alert alert-danger">The following error occurred: ' + error + '</div>');
            }
        });
    });

    $('#btndelete').click(function(){
        if(selID > 0) {
            $.ajax({
                type: "POST",
                cache: false,
                url: '<?=site_url('user/del_addr');?>',
                data: {adr_id: selID},
                dataType: 'json',
                success: function (data) {
                    if (typeof data.deleted !== 'undefined') {
                        table.fnDraw();
                        $('#resmodify').html('Address removed successfully...');
                    } else {
                        $('#resmodify').html('<div class="alert alert-danger">The following error occurred: ' + data.error + '</div>');
                    }

                },
                error: function (jqXHR, textStatus, error) {
                    $('#resmodify').html('<div class="alert alert-danger">The following error occurred: ' + error + '</div>');
                }
            });
        }
    });

    $('#btnedit').click(function(){
        if(selID > 0){
            $.ajax({
                type: "POST",
                cache: false,
                url: '<?=site_url('ajax/get_address');?>',
                data: {adr_id: selID},
                dataType: 'json',
                success:function(data){

                    if(typeof data.adr_id !== 'undefined'){
                        $('#hidadrid').val(data.adr_id);
                        $('#txtname').val(data.adr_name);
                        $('#txtcontact').val(data.adr_contact);
                        $('#txtstr1').val(data.adr_street1);
                        $('#txtstr2').val(data.adr_street2);
                        $('#txtzip').val(data.adr_zip);
                        $('#txtphone').val(data.adr_phone);
                        $('#txtemail').val(data.adr_email);
                        $('#txttype').val(data.adr_type).trigger('change');
                        $('#txtuser').val(data.adr_userid).trigger('change');
                        strstate = data.state_name;
                        strcity = data.city_name;
                        $('#txtcountry').val($('#txtcountry option').filter(function () { return $(this).html().toUpperCase() == data.cnt_name.toUpperCase(); }).val()).trigger('change');
                        if(data.adr_default > 0){
                            $('#isdefault').prop('checked',true);
                        }else{
                            $('#isdefault').prop('checked',false);
                        }
                        $('#model-addr').modal('show');
                    }else{
                        $('#resmodify').html('<div class="alert alert-danger">The following error occurred: ' + data.error + '</div>');
                    }

                },
                error:function(jqXHR, textStatus, error){
                    $('#resmodify').html('<div class="alert alert-danger">The following error occurred: ' + error + '</div>');
                }
            });
        }else{
            $(this).prop("disabled", true);
        }
    });

    $('#frmaddr').validate({
        rules: {
            txtname: {
                required: true,
                minlength:3,
            },
            txtcontact: {
                required: true,
                minlength: 3
            },
            txtstr1: {
                required: true,
                minlength:3,
            },
            txtcity: {
                required: true,
            },
            txtstate: {
                required: true,
            },
            txtzip: {
                required: true,
                digits: true,
                maxlength:6,
            },
            txtcountry: {
                required: true,
            },
            txtphone: {
                required: true,
                digits:true,
            },
            txtemail: {
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
            });
        },
        submitHandler: function(form) {
            request = $.ajax({
                type: "POST",
                cache: false,
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType: 'json',
                success:function(data){
                    if(typeof data.success !== 'undefined'){
                        $('#update_res').html('<div class="alert alert-success">' + data.success + '</div>');
                        table.fnDraw();
                    }else{
                        $('#update_res').html('<div class="alert alert-danger">The following error occurred: ' + data.error + '</div>');
                    }
                },
                error:function(jqXHR, textStatus, error){
                    $('#update_res').html('<div class="alert alert-danger">The following error occurred: ' + error + '</div>');
                }
            });

            return false;
        }
    });
</script>
