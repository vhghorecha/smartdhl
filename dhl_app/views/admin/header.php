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
    <!--<link href="<?= RES_URL; ?>css/style.css" rel="stylesheet">-->


    <link rel="stylesheet" href="<?= RES_URL; ?>css/animate.css">
    <link href="<?= RES_URL; ?>css/allinone_carousel.css" rel="stylesheet" type="text/css">
    <link href="<?= RES_URL; ?>css/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= RES_URL; ?>css/styles.css" media="all">

</head>
<body>
<div class="dhlmodal" style="display: none">
    <div class="dhlcenter">
        <img alt="" src="<?=RES_URL;?>images/ajax-loader.gif" />
    </div>
    <div id="ajaxerror" class="alert alert-danger"></div>
</div>
<div class="container-fluid">
    <!--<div class="row">
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
                            <a href="<?=site_url('admin/price');?>"><i class="fa fa-dollar"></i> Price</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?=site_url('admin/logout');?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </div>
                <?php } ?>
            </nav>
        </div>
    </div>-->

    <div class="wrapper1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6"></div>
                <div class="col-md-6 col-sm-6">
                    <div class="tect">
                        <div class="txt">Call <span class="spnn">888-525-8882</span> Ext 1 <!--|<a href="#"  data-toggle="modal" data-target="#login-modal"> Log In</a> |<a href="#"> Register</a>--> </div>
                        <div class="social"><a href="#"><img src="<?= RES_URL; ?>images/fb.png"></a><a href="#"><img src="<?= RES_URL; ?>images/twit.png"></a><a href="#"><img src="<?= RES_URL; ?>images/gplus.png"></a></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!--//header-->


    <!--Slied-->
    <div class="wrapper2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                <a class="navbar-brand" href="#"><img src="<?= RES_URL; ?>images/logo.png" class="img-responsive"></a> </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <?php

                                    if($admin_info)
                                    {
                                        ?>
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
                                            <a href="<?=site_url('admin/price');?>"><i class="fa fa-dollar"></i> Price</a>
                                        </li>
                                        <?php
                                    }

                                    ?>

                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
