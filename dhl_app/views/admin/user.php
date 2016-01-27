<div class="row">
    <div id="resmodify"></div>
    <div class="col-xs-12 text-center">
        <a role="button" href="#model-addr" id="btnadd" class="btn btn-primary" data-toggle="modal">Add</a> |
        <button id="btnedit" class="btn btn-primary" disabled="disabled">Edit</button> |
        <button id="btndelete" class="btn btn-primary" disabled="disabled">Delete</button> |
        <!--<button id="btnimport" class="btn btn-primary">Import</button> |-->
        <a role="button" id="btnexport" class="btn btn-primary" href="<?=site_url('admin/export_user');?>">Export CSV</a> <!--|
        <button id="btnrall" class="btn btn-primary">Remove All</button>-->
    </div>
</div>
<table id="tbluser">
    <thead>
    <tr>
        <th class="never">User Id</th>
        <th class="all">User Email</th>
        <th>User name</th>
        <th>Is verfied</th>
        <th>Is active</th>
     </tr>
    </thead>
    <tfoot>
    <tr>
        <th class="never">User Id</th>
        <th class="all">User Email</th>
        <th>User name</th>
        <th>Is verfied</th>
        <th>Is active</th>
    </tr>
    </tfoot>
</table>

<div class="modal fade" id="model-addr" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open('admin/updateuser',array('class' => 'form-group','id' => 'frmaddr'));?>
            <input type="hidden" name="hidadrid" id="hidadrid" value=""/>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-close"></i>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                   User
                </h4>
            </div>
            <div class="modal-body">
                <div id="update_res"></div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group required">
                            <label class="control-label">Username</label>
                            <div class="col-xs-12"><input type="text" class="form-control" name="txtusername" id="txtusername" placeholder="Username" required/></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group required">
                            <label class="control-label">Email</label>
                            <div class="col-xs-12"><input type="text" class="form-control" name="txtemail" id="txtemail" placeholder="Email address" required email/></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group required">
                            <label class="control-label">Password</label>
                            <div class="col-xs-12"><input type="password" class="form-control" name="txtpassword" id="txtpassword" placeholder="Password" required email/></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" id="userid" name="userid" value="" />
                <input type="submit" class="btn btn-primary" id="btnsave" name="btnsave" value="Save" />
            </div>
            <?php echo form_close();?>
        </div>

    </div>

</div>


<?php $this->load->view('scripts');?>
<script type="text/javascript">
    var strstate = strcity='';

    $('#btnadd').click(function(){
        strstate = strcity = '';
        $('#update_res').html('');
        $('input[type!="submit"], select, textarea').val('');
    });

    /*$('#txtzip, #txtstr1').blur(function(){
     zip = $('#txtzip').val();
     street = $('#txtstr1').val();
     if(zip != "" && street != "" && isedit == 0){
     filterAddress(zip,street);
     }
     });*/


    var selID = 0;
    var isedit = 0;
    var table = $('#tbluser').dataTable( {
        "sDom": '<"top"pl>rt<"bottom"><"clear">',
        "aaSorting": [[0, "desc"]],
        "oLanguage": {
            "sLengthMenu": "_MENU_ records per page"
        },
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?=site_url('admin/all_user');?>",
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
    $('#tbluser tfoot th').each( function () {
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

        var conf = confirm('Are you sure to delete this user?');
        if(conf==true){
            if(selID > 0) {
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: '<?=site_url('admin/delete_user');?>',
                    data: {userid: selID},
                    dataType: 'json',
                    success: function (data) {
                        if (typeof data.deleted !== 'undefined') {
                            table.fnDraw();
                            $('#resmodify').html('User removed successfully...');
                        } else {
                            $('#resmodify').html('<div class="alert alert-danger">The following error occurred: ' + data.error + '</div>');
                        }

                    },
                    error: function (jqXHR, textStatus, error) {
                        $('#resmodify').html('<div class="alert alert-danger">The following error occurred: ' + error + '</div>');
                    }
                });
            }
        }

    });

    $('#btnedit').click(function(){

        if(selID > 0){
            $("#userid").val(selID);

            $.ajax({
                type: "POST",
                cache: false,
                url: '<?=site_url('admin/get_userdetail');?>',
                data: {userid: selID},
                dataType: 'json',
                success:function(data){

                    if(typeof data.user_id !== 'undefined'){
                        $('#userid').val(data.user_id);
                        $('#txtusername').val(data.user_name);
                        $('#txtpassword').val(data.user_pass);
                        $('#txtemail').val(data.user_email);
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
            txtusername: {
                required: true,

            },
            txtpassword: {
                required: true,

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
