﻿﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SmartDHL</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="<?= RES_URL; ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= RES_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= RES_URL; ?>css/datepicker.css" rel="stylesheet">
    <link href="<?= RES_URL; ?>css/clockpicker.css" rel="stylesheet">

    <link href="<?= RES_URL; ?>css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?= RES_URL; ?>css/dataTables.responsive.css" rel="stylesheet">
    <!--<link href="<?= RES_URL; ?>css/style.css" rel="stylesheet">-->



    <!-- Bootstrap core CSS -->
    <!--<link rel="stylesheet" href="css/font-awesome.min.css">-->

    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->

    <!-- Font Awesome iconic font-->

    <!--<link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/style.css" />-->
    <link rel="stylesheet" href="<?= RES_URL; ?>css/animate.css">
    <link href="<?= RES_URL; ?>css/allinone_carousel.css" rel="stylesheet" type="text/css">
    <link href="<?= RES_URL; ?>css/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= RES_URL; ?>css/styles.css" media="all">



    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<!--header-->

<div class="wrapper1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6"></div>
            <div class="col-md-6 col-sm-6">
                <div class="tect">
                    <div class="txt">Call <span class="spnn">888-525-8882</span> Ext 1 | <?php if(!empty($user_info['validated'])){ echo $user_info['username'];  } else {?> <a href="#"  data-toggle="modal" data-target="#login-modal"> Log In</a> |<a href="<?=site_url('user/register');?>"> Register</a> <?php  } ?> </div>
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

<div class="wrapper1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6"></div>
            <div class="col-md-6 col-sm-6 text-left">
                <div class="tect">
                    <div>
                        <?php if(!empty($user_info['validated']))
                            {
                                ?>
                                    <span <?php if($current_action=='booking'){echo "class='active'";} ?> ><a href="<?=site_url('user/booking');?>"><i class="fa fa-book"></i> Book Now</a></span> &nbsp;|&nbsp;
                                    <span <?php if($current_action=='addrbook'){echo "class='active'";} ?>><a href="<?=site_url('user/addrbook');?>"><i class="fa fa-list"></i> Address Book</a></span> &nbsp;|&nbsp;
                                    <span <?php if($current_action=='transactions'){echo "class='active'";} ?>><a href="<?=site_url('user/transactions');?>"><i class="fa fa-history"></i> Transactions</a></span>&nbsp;|&nbsp;
                                    <span><a href="<?=site_url('user/logout');?>"><i class="fa fa-sign-out"></i> Logout</a></span>
                                <?php
                            }
                        ?>
                    </div>


                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>

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
                                <li <?php if($current_action=='index'){echo "class='active'";} ?>><a href="<?=site_url();?>">HOME</a></li>

                                <li><a href="<?=site_url('#HOWITWORKS');?>">HOW IT WORKS</a></li>
                                <li><a href="<?=site_url('#PRICING');?>"> PRICING</a></li>
                                <li><a href="<?=site_url('#FAQ');?>">FAQ</a></li>
                                <li><a href="<?=site_url('#CONTACT');?>">CONTACT</a></li>
                                <li>
                                    <div class="box">
                                        <input class="search" type="search" placeholder="Search">
                                        <div class="icon"><span class="glyphicon glyphicon-search"></span></div>
                                    </div>
                                </li>
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
<!--//Slied-->



<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Smart DHL</title>

    <meta name="description" content="International Shipping Documents at $24.99 Fast, Reliable Service provided by DHL only better price. Conveniently send from Home or Office.">
    <meta name="author" content="Eryushion TechSol Pvt Ltd">

    <link href="<?= RES_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= RES_URL; ?>css/datepicker.css" rel="stylesheet">
    <link href="<?= RES_URL; ?>css/clockpicker.css" rel="stylesheet">
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

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
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
                            <li><a href="<?=site_url('user/transactions');?>"><i class="fa fa-history"></i> Transactions</a></li>
                            <li><a href="<?=site_url('user/logout');?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                        <?php }else{ ?>
                            <li><a href="#modal-container-575041" data-toggle="modal"><i class="fa fa-sign-in"></i> Login</a></li>
                            <li><a href="<?=site_url('user/register');?>"><i class="fa fa-user"></i> Register</a></li>
                        <?php } ?>
                    </ul>
                </div>

            </nav>
        </div>
    </div>-->