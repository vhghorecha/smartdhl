<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Smart DHL</title>

    <meta name="description" content="International Shipping Documents at $24.99 Fast, Reliable Service provided by DHL only better price. Conveniently send from Home or Office.">
    <meta name="author" content="Eryushion TechSol Pvt Ltd">

    <link href="<?= RES_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= RES_URL; ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= RES_URL; ?>css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?= RES_URL; ?>css/dataTables.responsive.css" rel="stylesheet">
    <link href="<?= RES_URL; ?>css/style.css" rel="stylesheet">

</head>
<body>
<div class="dhlmodal" style="display: none">
    <div class="dhlcenter">
        <img alt="" src="<?=RES_URL;?>images/ajax-loader.gif" />
    </div>
    <div id="ajaxerror" class="alert alert-danger"></div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="navbar-header">
                    <a href="<?=base_url();?>"><img src="http://localhost/smartdhl/dhl_asset/images/logo.png" class="img-responsive pull-left"></a>
                    <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <?php if($admin_info){ ?>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li <?=$current_action == 'dashboard' ? 'class="active"' : '';?>>
                            <a href="<?=site_url('admin/dashboard');?>"><i class="fa fa-home"></i> Dashboard</a>
                        </li>
                        <li <?=$current_action == 'users' ? 'class="active"' : '';?>>
                            <a href="<?=site_url('admin/users');?>"><i class="fa fa-info"></i> Users</a>
                        </li>
                        <li <?=$current_action == 'addresses' ? 'class="active"' : '';?>>
                            <a href="<?=site_url('admin/addresses');?>"><i class="fa fa-question"></i> Addresses</a>
                        </li>
                        <li <?=$current_action == 'shipments' ? 'class="active"' : '';?>>
                            <a href="<?=site_url('admin/shipments');?>"><i class="fa fa-money"></i> Shipments</a>
                        </li>
                        <li <?=$current_action == 'price' ? 'class="active"' : '';?>>
                            <a href="<?=site_url('admin/price');?>"><i class="fa fa-dollar"></i> price</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?=site_url('admin/logout');?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </div>
                <?php } ?>
            </nav>
        </div>
    </div>
