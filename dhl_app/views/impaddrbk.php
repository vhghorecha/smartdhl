<div id="registe-new">
    <center><h2>Import Address book</h2></center>
    <div class="container">
        <div class="row">
            <?php
            $attributes = 'id = "import-addr" name="import-addr" ';
            echo form_open_multipart('',$attributes);?>
            <div class="container-fluid">
                <?php if(!empty($error)) { ?>
                <div class="col-sm-12">
                    <div class="alert alert-danger alert-dismissable">
                        <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                                aria-hidden="true"><i class="fa fa-close"></i></button>
                        <?=$error?></div>
                </div>
            </div>
        <?php } ?>
            <?php if(!empty($message)) { ?>
            <div class="col-sm-12">
                <div class="alert alert-success alert-dismissable">
                    <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                            aria-hidden="true"><i class="fa fa-close"></i></button>
                    <?=$message?></div>
            </div>
        </div>
        <?php } ?>

        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Import Addresses</div>
                <div class="panel-body">
                    <div class="form-group">
                        <a href="<?=RES_URL . 'files/addressbook.xlsx';?>">Download Sample Address Book</a>
                        <label>Select Excel File*</label>
                        <input type="file" id="file" name="userfile" size="20" autofocus>

                    </div>
                    <div class="col-xs-12 text-center">
                        <!--<input type="submit" class="btn btn-danger btn-large" name="btnimport" value="Import" />-->
                        <button  type="submit" class="btn btn-danger btn-large" name="btnimport" value="Import">Import</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>

                </div>
            </div>
        </div>
        </form>
    </div>
    </div>
</div>


<?php $this->load->view('scripts');?>


