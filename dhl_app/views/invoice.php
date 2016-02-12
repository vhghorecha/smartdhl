<?php error_reporting(0); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Commercial Invoice</div>
            <div class="panel-body">
                <?php echo form_open(current_url(),array('class' => 'form-group','id' => 'frminvoice'));?>
                <?php if(!empty($error)) { ?>
                    <div class="col-sm-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true"><i class="fa fa-close"></i></button>
                            <?=$error?>
                        </div>
                    </div>
                <?php } ?>




                <div class="col-xs-12">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group required">
                        <div class="col-xs-4 text-right"><label class="control-label" for="txtTaxVatId">Receiver Tax ID / VAT :</label></div>
                        <div class="col-xs-8"><input type="text" class="form-control input-sm required" name="txtTaxVatId" id="txtTaxVatId" value="<?=set_value('txtTaxVatId')?>"></div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
                        <div class="col-xs-4 text-right"><label class="control-label" for="termsOftrade">Terms of Trade :</label></div>
                        <div class="col-xs-8"><?php
                            $trade_attributes = ' id = "termsOftrade" name="termsOftrade" class="form-control input-sm"';
                            echo form_dropdown('termsOftrade',$tradeTerms,set_value('termsOftrade'),$trade_attributes);?>
                        </div>
                    </div>


                    <div class="col-xs-12">
                        <div class="col-xs-2 text-right"><label class="control-label" for="PackageMarks">Package Marks :</label></div>
                        <div class="col-xs-10"><textarea class="form-control input-sm" id="txtPackageMarks" name="txtPackageMarks" placeholder="Package marks" style="resize: none;" rows="3"><?=set_value('txtPackageMarks')?></textarea></div>
                    </div>
                </div>



                <div class="col-xs-12">

                    <div class="col-xs-12">
                        <div class="col-sm-4 col-xs-6 text-center"><label class="control-label" for="Commodity description">Descritpion</label></div>
                        <div class="col-sm-2 col-xs-6 text-center"><label class="control-label" for="HTS / B">HTS# / B#</label></div>
                        <div class="col-sm-1 col-xs-4 text-center"><label class="control-label" for="vat">Weight</label></div>
                        <div class="col-sm-2 col-xs-4 text-center"><label class="control-label" for="Qunatity">Qty</label></div>
                        <div class="col-sm-1 col-xs-4 text-center"><label class="control-label" for="Unit value">Unit value</label></div>
                        <div class="col-sm-1 col-xs-2 text-center"><label class="control-label" for="Total">Total</label></div>
                    </div>

                    <!-- need loop here from custom -->
                    <?php

                        $item_total;
                        $sub_total=0.00;
                        $invoice_total = 0.00;
                        foreach($commodity as $items)
                        {
                            $item_total = $items["quantity"] * $items["value"];
                            $sub_total += $item_total;

                            ?>
                            <div class="col-xs-12">
                                <div class="col-sm-4 col-xs-6 text-center"><?php echo $items["description"]; ?></div>
                                <div class="col-sm-2 col-xs-6 text-center"><?php echo $items["hs_tariff_number"]; ?></div>
                                <div class="col-sm-1 col-xs-4 text-center"><?php echo $items["weight"]; ?></div>
                                <div class="col-sm-2 col-xs-4 text-center"><?php echo $items["quantity"]; ?></div>
                                <div class="col-sm-1 col-xs-4 text-center"><?php echo $items["value"]; ?></div>
                                <div class="col-sm-1 col-xs-2 text-center"><?php echo $item_total; ?></div>
                            </div>
                            <?php
                        }

                        $invoice_total = $sub_total;
                    ?>

                    <!-- need loop here from custom -->
                    <div class="col-xs-12">
                        <div class="col-xs-10 text-right"><label class="control-label" for="PackageMarks">Item Sub-total :</label></div>
                        <div class="col-xs-2"><?php echo $sub_total; ?><input type="hidden" id="item_sub_total" name="item_sub_total" value="<?php echo $sub_total; ?>" /> </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="col-xs-12">
                        <div class="col-xs-2 text-right"><label class="control-label" for="PackageMarks">Miscellaneous Charge :</label></div>
                        <div class="col-xs-8"><input type="text" class="form-control input-sm" name="txt_misc_desc" id="txt_misc_desc" value="<?=set_value('txt_misc_desc')?>"></div>
                        <div class="col-xs-2"><input type="number" step="0.01" class="form-control input-sm" name="txt_misc_charge" id="txt_misc_charge" value="<?=set_value('txt_misc_charge')?>"></div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-10 text-right"><label class="control-label" for="PackageMarks">Invoice Total :</label></div>
                        <div class="col-xs-2"><span id="inv_total"><?php echo $invoice_total; ?></span><input type="hidden" id="invoice_total" name="invoice_total" value="<?php echo $invoice_total; ?>" /> </div>

                    </div>
                </div>


                <div class="col-xs-12">
                    <div class="col-xs-12 text-right">
                        <input type="submit" class="btn btn-danger btn-large" id="btnInvoice" name="btnInvoice" value="Save" />
                    </div>
                </div>

                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
</div>
<?php $this->load->view('scripts');?>
<script type="text/javascript">
    $(document).ready(function(){
        var def_addr = '<?=$shp_from;?>';


        $("#txt_misc_charge").blur(function(){
           var misc_charge = $(this).val();
           var inv_total = $("#invoice_total").val();
           var total = parseFloat(misc_charge) + parseFloat(inv_total);
           $("#invoice_total").val(total);
            $("#inv_total").html(total);
        })




    });
</script>