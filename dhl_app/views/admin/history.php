<div class="row">
    <div id="resmodify"></div>
    <div class="col-xs-12 text-center">
        <button id="btnviewship" class="btn btn-primary" disabled="disabled" data-remote="false" data-toggle="modal" data-target="#detmodal">View Details</button> |
        <button id="btnviewlabel" class="btn btn-primary" disabled="disabled">View Airbill</button> |
        <button id="btntrack" class="btn btn-primary" disabled="disabled">Track</button> |
        <button id="btnvoid" class="btn btn-primary" disabled="disabled">Void</button> |
        <a role="button" id="btnexport" class="btn btn-primary" href="<?=site_url('admin/export_ships');?>">Export CSV</a> |
        <a role="button" id="btnprint" class="btn btn-primary" href="<?=site_url('admin/print_ships');?>" target="_blank">Print</a>
        <a href="" id="trackurl" target="_blank"></a>
    </div>
</div>
<table id="tbltrans">
    <thead>
    <tr>
        <th class="all">ID</th>
        <th class="all">Reference No</th>
        <th>Sender</th>
        <th>Receiver</th>
        <th>Date</th>
        <th>Rate</th>
        <th>Tracking Code</th>
        <th>Delivery Date</th>
        <th>Status</th>
        <th>Signed By</th>
        <th>Type</th>
        <th>Payment Status</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th class="all">Reference No</th>
        <th>Sender</th>
        <th>Receiver</th>
        <th>Date</th>
        <th>Rate</th>
        <th>Tracking Code</th>
        <th>Delivery Date</th>
        <th>Status</th>
        <th>Signed By</th>
        <th>Type</th>
        <th>Payment Status</th>
    </tr>
    </tfoot>
</table>
<!-- Default bootstrap modal example -->
<div class="modal fade" id="detmodal" tabindex="-1" role="dialog" aria-labelledby="delmodallabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Shipment Details</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('scripts');?>
<script type="text/javascript">
    var selID = 0;
    var selUrl = '';
    var table = $('#tbltrans').dataTable( {
        "sDom": '<"top"pl>rt<"bottom"><"clear">',
        "aaSorting": [[0, "desc"]],
        "oLanguage": {
            "sLengthMenu": "_MENU_ records per page"
        },
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?=site_url('admin/get_trans');?>",
        "responsive" : true,
        fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            // Row click
            $(nRow).on('click', function() {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                    selID = 0;
                    selUrl = '';
                    $('#btnviewship, #btnviewlabel, #btntrack, #btnvoid').prop('disabled',true);
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    selID = aData[0];
                    selUrl = aData[12];
                    $('#btnviewship, #btnviewlabel, #btntrack, #btnvoid').prop('disabled',false);
                }
            });
        }
    } );

    // Setup - add a text input to each footer cell
    $('#tbltrans tfoot th').each( function () {
        $(this).html( txtsearch );
    } );

    // Fill modal with content from link href
    $("#detmodal").on("show.bs.modal", function(e) {
        var link = '';
        $btn = e.relatedTarget.id;
        $(this).find(".modal-body").html('');
        if($btn == 'btntrack'){
            link = '<?=site_url('admin/track');?>/' + selID;
        }else{
            link = '<?=site_url('admin/viewtrans');?>/' + selID;
        }

        $(this).find(".modal-body").load(link);
    });

    $('#btntrack').click(function(){
       if(selID > 0){
           $('#trackurl').attr('href', '<?=site_url("admin/track");?>' + '/' + selID);
           document.getElementById("trackurl").click();
       }
    });

    $('#btnviewlabel').click(function(){
        if(selUrl != ''){
            $('#trackurl').attr('href', selUrl);
            document.getElementById("trackurl").click();
        }
    });

    $('#btnvoid').click(function(){
        isVoid = confirm("Do you really want to Void this Shipment?");
        if(isVoid){
            $.ajax({
                type:'POST',
                url: '<?=site_url("admin/refund");?>',
                dataType: 'json',
                data: {'shp_id': selID},
                success:function(data, textStatus, jqXHR){
                    if(typeof data.success !== 'undefined'){
                        $('#resmodify').html('<div class="alert alert-success">' + data.success + '</div>');
                    }else{
                        $('#resmodify').html('<div class="alert alert-danger">' + data.error + '</div>')
                    }
                }
            });
        }
    });

</script>