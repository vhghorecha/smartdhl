<table id="tbltrans">
    <thead>
    <tr>
        <th>View</th>
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
        <th>View</th>
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
<?php $this->load->view('scripts');?>
<script type="text/javascript">
    var table = $('#tbltrans').dataTable( {
        "sDom": '<"top"pl>rt<"bottom"><"clear">',
        "aaSorting": [[3, "desc"]],
        "oLanguage": {
            "sLengthMenu": "_MENU_ records per page"
        },
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?=site_url('admin/get_trans');?>",
        "responsive" : true,
    } );

    // Setup - add a text input to each footer cell
    $('#tbltrans tfoot th').each( function () {
        $(this).html( txtsearch );
    } );
</script>