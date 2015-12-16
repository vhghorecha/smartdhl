<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Smart DHL</title>

    <meta name="description" content="International Shipping Documents at $24.99 Fast, Reliable Service provided by DHL only better price. Conveniently send from Home or Office.">
    <meta name="author" content="Eryushion TechSol Pvt Ltd">

    <link href="<?= RES_URL; ?>css/select2.min.css" rel="stylesheet">
    <link href="<?= RES_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= RES_URL; ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= RES_URL; ?>css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?= RES_URL; ?>css/dataTables.responsive.css" rel="stylesheet">
    <link href="<?= RES_URL; ?>css/style.css" rel="stylesheet">

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-xs-10 text-center">
            <center><img class="img-responsive" src="<?= RES_URL; ?>images/logo.jpg"/></center>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="<?=base_url();?>"><i class="fa fa-home"></i> Home</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-info"></i> Who Us</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-question"></i> How it works</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-money"></i> Pricing</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-support"></i> FAQ's</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-connectdevelop"></i> Contact Us</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(!empty($user_info['validated'])){ ?>
                            <li><a href="<?=site_url('user/booking');?>"><i class="fa fa-book"></i> Book Now</a></li>
                            <li><a href="<?=site_url('user/addrbook');?>"><i class="fa fa-list"></i> Address Book</a></li>
                            <li><a href="<?=site_url('user/history');?>"><i class="fa fa-history"></i> Transactions</a></li>
                            <li><a href="<?=site_url('user/logout');?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                        <?php }else{ ?>
                            <li><a href="#modal-container-575041" data-toggle="modal"><i class="fa fa-sign-in"></i> Login</a></li>
                            <li><a href="<?=site_url('user/register');?>"><i class="fa fa-user"></i> Register</a></li>
                        <?php } ?>
                    </ul>
                </div>

            </nav>
        </div>
    </div>