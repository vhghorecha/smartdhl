<div class="row">
    <div class="col-md-12">
        <?php echo form_open('#',array('class' => 'form-group form-inline','id' => 'frmcalc'));?>
            <div class="row text-center">
                <div class="form-group col-xs-12">
                    <label for="delivering" >Delivering To:</label>
                    <?php
                    $attributes = 'class = "form-control" id = "country" name="country" ';
                    echo form_dropdown('country',$country,set_value('country'),$attributes);?>
                    <?php /*<label for="zipcode">&nbsp;</label>
                    <input id="zipcode" class="form-control input-group-lg reg_name" type="text" name="zipcode" placeholder="Zipcode">*/?>
                </div>

            </div>
            <div class="row text-center">
                <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="delivering" >Parcel Type:</label>
                    <select class="form-control input-group-lg" id="item_type" name="item_type">
                        <option value="">Select Parcel Type</option>
                        <option value="documents">Documents</option>
                        <option value="parcels">Parcel</option>
                    </select>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="delivering" >No of Items:</label>
                    <select class="form-control input-group-lg" id="noitem" name="noitem">
                        <option>Select No of Items</option>
                        <?php for($i=1;$i<=100;$i++){echo "<option value='".$i."'>".$i."</option>"; }?>
                    </select>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="weight" >Weight:</label>
                    <input id="weight" class="form-control input-group-lg reg_name" type="number" name="weight" placeholder="Weight" min="0.01" step="0.01" max="150.00">
                </div>
            </div>
            <div class="text-center col-lg-12">
                <input type="submit" class="btn btn-primary" value="Calculate Rate"/>
            </div>
        <?php echo form_close();?>
    </div>
</div>
<div class="modal fade" id="modal-container-575041" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-close"></i>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    SmartDHL Rate
                </h4>
            </div>
            <div class="modal-body">
                <div id="update_res"></div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">
                    Login
                </button>
            </div>
        </div>

    </div>

</div>
<?php $this->load->view('scripts');?>
<script type="text/javascript">
    $(document).ready(function(){
        //this will stop the submit of the form but allow the native HTML5 validation (which is what i believe you are after)
        $("#frmcalc").on('submit',function(e){
            e.preventDefault();
            $weight = $('#weight').val();
            $country_id = $('#country').val();
            $item_type = $('#item_type').val();
            //ajax code here
            $.ajax({
                type:'POST',
                url: '<?=site_url("ajax/get_rate");?>',
                dataType: 'json',
                data: {weight: $weight, country_id: $country_id, item_type: $item_type},
                success:function(data, textStatus, jqXHR){
                    if(typeof data.rate !== 'undefined'){
                        $('#update_res').html('<div class="alert alert-success">' + data.rate + '</div>')
                    }else{
                        $('#update_res').html('<div class="alert alert-danger">' + data.error + '</div>')
                    }
                    $('#modal-container-575041').modal('show');
                }
            });
        });
    });
</script>
