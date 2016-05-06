<div id="registe-new">
    <center><h2>Tracking Detail</h2></center>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Tracking Details</div>
                    <div class="panel-body">
                        <div class="col-sm-6 col-xs-12">
                            <p>Tracking No: <b><?=$shp_trackingcode;?></b></p>
                            <p>Ship Date:<b><?=$shp_date;?></b></p>
                            <p>Delivery Date:<b><?=$shp_estdate?></b></p>
                            <p>Signed By:<b><?=$shp_signedby;?></b></p>
                            <p>Status<b><?=$shp_status;?></b></p>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <p>Shipped By: <b><?=$from['adr_contact']?></b></p>
                            <p>Consignee: <b><?=$to['adr_contact']?></b></p>
                            <p>Weight: <b><?=$shp_weight;?></b></p>
                            <p>Price: <b><?=$shp_rate;?></b></p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <th>Date/Time</th>
                                <th>Activity</th>
                                <th>Status</th>
                                <th>Location</th>
                                </thead>
                                <?php
                                foreach($track_data as $td){
                                    $row = '<tr>';
                                    $row .= '<td>' . date('d-m-Y H:i:s',strtotime($td['datetime'])) . '</td>';
                                    $row .= '<td>' . $td['message'] . '</td>';
                                    $row .= '<td>' . $td['status'] . '</td>';
                                    $row .= '<td>' . $td['tracking_location']['city'] . ',' . $td['tracking_location']['state']. ',' . $td['tracking_location']['country'] . ',' . $td['tracking_location']['zip'] . '</td>';
                                    $row .= '</tr>';
                                    echo $row;
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

