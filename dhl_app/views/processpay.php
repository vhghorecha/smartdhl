<div class="row">
    <div class="col-sm-12">
        <?php if(!empty($trans_message)) { ?>
        <div class="alert alert-success alert-dismissable">
            <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                    aria-hidden="true"><i class="fa fa-close"></i></button>
            <?=$trans_message?>
        </div>
        <?php } ?>
        <?php if(is_array(@$shp_result)) { ?>
            <div class="table-responsive table-bordered">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Trackign Code</th>
                            <th>Label URL</th>
                            <th>Invoice</th>
                            <th>Estimate Delivery</th>
                            <th>Pickup</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?=$shp_result['shp_trackingcode'];?></td>
                            <td><a href="<?=site_url('user/viewlabel/'. $shp_result['shp_id']);?>" target="_blank">Click Here</a></td>
                            <th><a href="<?=site_url('user/invoice/' . $shp_result['shp_id']);?>">Generate Invoice</a></th>
                            <td><?=$shp_result['shp_estdate'];?></td>
                            <td><a href="<?=site_url('user/pickup/'.$shp_result['shp_id']);?>">Schedule Pickup</a></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        <?php } else { ?>
            <div class="alert alert-danger alert-dismissable">
                <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                        aria-hidden="true"><i class="fa fa-close"></i></button>
                <?=@$shp_result;?>
            </div>
        <?php } ?>

    </div>
</div>
<?php $this->load->view('scripts');?>
<script type="text/javascript">
    $(document).ready(function(){

    }); // end document.ready
</script>