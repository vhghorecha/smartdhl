<table id="tbladdr">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Street 1</th>
            <th>Street 2</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Zipcode</th>
            <th>Phone</th>
            <th>EasyPost Ref</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Street 1</th>
            <th>Street 2</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Zipcode</th>
            <th>Phone</th>
            <th>EasyPost Ref</th>
        </tr>
    </tfoot>
</table>
<?php $this->load->view('scripts');?>
<script type="text/javascript">
    var table = $('#tbladdr').dataTable( {
        "sDom": '<"top"pl>rt<"bottom"><"clear">',
        "aaSorting": [[0, "desc"]],
        "oLanguage": {
            "sLengthMenu": "_MENU_ records per page"
        },
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?=site_url('user/get_addrs');?>",
        "responsive" : true,
        "columns": [
            { "data": "adr_id" },
            { "data": "adr_name" },
            { "data": "adr_street1" },
            { "data": "adr_street2" },
            { "data": "adr_city" },
            { "data": "adr_state" },
            { "data": "adr_country" },
            { "data": "adr_zip" },
            { "data": "adr_phone" },
            { "data": "adr_ep_ref" },
        ],
    } );
    // Setup - add a text input to each footer cell
    $('#tbladdr tfoot th').each( function () {
        $(this).html( txtsearch );
    } );
</script>
