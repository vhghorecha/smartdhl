<div class="row">
    <div class="col-md-12">
        <div id="rate_res"></div>
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
            <div class="row"></div>
            <div class="row text-center">
                <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="delivering" >Item Type:</label>
                    <select class="form-control input-group-lg" id="item_type" name="item_type">
                        <option value="document">Document</option>
                        <option value="parcel">Parcel</option>
                    </select>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="delivering" >No of Items:</label>
                    <select class="form-control input-group-lg" id="noitem" name="noitem">
                        <?php for($i=1;$i<=100;$i++){echo "<option value='".$i."'>".$i."</option>"; }?>
                    </select>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="weight" >Weight:</label>
                    <input id="weight" class="form-control input-group-lg reg_name" type="number" name="weight" placeholder="Weight in Oz" min="1" step="0.01" max="150.00" required>
                </div>
            </div>
            <div class="row"></div>
            <div class="text-center col-xs-12">
                <button id="btncalc" class="btn btn-lg btn-primary"><i class="fa fa-calculator"></i> Calculate Rate</button>
            </div>
        <?php echo form_close();?>
    </div>
</div>
<?php $this->load->view('scripts');?>
<script type="text/javascript">
    $(document).ready(function(){

        $('#lnkcaptcha').click(function(e){
            e.preventDefault();
            change_captch('login');
        });

        //this will stop the submit of the form but allow the native HTML5 validation (which is what i believe you are after)
        $("#frmcalc").on('submit',function(e){
            e.preventDefault();
            $('#btncalc').html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...');
            //ajax code here
            $.ajax({
                type:'POST',
                url: '<?=site_url("ajax/get_rate");?>',
                dataType: 'json',
                data: $('#frmcalc').serializeArray(),
                success:function(data, textStatus, jqXHR){
                    if(typeof data.rate !== 'undefined'){
                        $('#rate_res').html('');
                        $('#update_res').html('<div class="alert alert-success">' + data.rate + '</div>');
                        $('#hidredirect').val('<?=site_url('user/booking');?>');
                        $('#modal-container-575041').modal('show');
                    }else{
                        $('#rate_res').html('<div class="alert alert-danger">' + data.error + '</div>')
                        $('#update_res').html('');
                    }

                },
                complete:function(jqXHR, textStatus){
                    $('#btncalc').html('<i class="fa fa-calculator"></i> Calculate Rate');
                }
            });
        });

        //this will stop the submit of the form but allow the native HTML5 validation (which is what i believe you are after)
        $("#frmlogin").on('submit',function(e){
            e.preventDefault();
            formData = $('#frmlogin').serializeArray();
            formData.push({ name: 'btnlogin', value: 'login' });
            //ajax code here
            $.ajax({
                type:'POST',
                url: '<?=site_url("user/login/1");?>',
                dataType: 'json',
                data: formData,
                success:function(data, textStatus, jqXHR){
                    if(typeof data.success !== 'undefined'){
                        window.location = data.redirect_to;
                    }else{
                        $('#login_res').html('<div class="alert alert-danger">' + data.error + '</div>')
                    }
                    $('#modal-container-575041').modal('show');
                },
                complete:function(jqXHR, textStatus){
                    change_captch('login');
                }
            });
        });

        $('#item_type').on('change',function(){
           item_type = $(this).val();
            if(item_type == 'documents'){
                $('#weight').attr('placeholder','Weight in Oz');
            }else{
                $('#weight').attr('placeholder','Weight in lbs');
            }
        });
        
    });
</script>
