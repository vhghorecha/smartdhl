<div class="panel panel-primary">
    <div class="panel-heading">Change Pricing</div>
    <div class="panel-body">
        <?php echo form_open_multipart('admin/price');?>
            <div class="row">
                <?php if(!empty($message)) { ?>
                    <div class="col-sm-12">
                        <div class="alert alert-success alert-dismissable">
                            <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true"><i class="fa fa-close"></i></button>
                            <?=$message?>
                        </div>
                    </div>
                <?php } ?>
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
                    <div class="form-group">
                        <a href="<?=RES_URL . 'files/document.csv';?>">Current Document Pricing File</a><br/>
                        <a href="<?=RES_URL . 'files/parcel.csv';?>">Current Parcel Pricing File</a>
                    </div>
                    <div class="form-group col-lg-3 col-md-4 col-sm-6 required">
                        <label class="control-label">Select which price to update</label>
                        <select id="filename" name="filename" class="form-control input-xs" required>
                            <option value="document.csv">Document</option>
                            <option value="parcel.csv">Parcel</option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group required">
                        <label class="control-label">Select Excel File</label>
                        <input type="file" id="file" name="userfile" size="20" required>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="btnImport" id="btnImport" value="Update">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('scripts');?>