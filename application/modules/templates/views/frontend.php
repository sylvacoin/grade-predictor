<!DOCTYPE html>
<html lang="en">
    <head>
	<title>Material Admin - Login</title>

	<!-- BEGIN META -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="your,keywords">
	<meta name="description" content="Short explanation about this website">
	<!-- END META -->

	<!-- BEGIN STYLESHEETS -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/materialadmin.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/material-design-iconic-font.min.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/wizard.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" />
	<script src="<?= base_url() ?>assets/js/jquery.js"></script>
	<!-- END STYLESHEETS -->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/utils/html5shiv.js?1403934957"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/utils/respond.min.js?1403934956"></script>
	<![endif]-->
	<style type="text/css">
	    body {
		background: #fff;
	    }
	    section.section-account .img-backdrop, section.section-account .spacer {
		height: 150px;
	    }
	</style>
	
    </head>
    
    <body class="menubar-hoverable header-fixed ">
	<header id="header" >
	    <div class="headerbar">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="headerbar-left">
		    <ul class="header-nav header-nav-options">
			<li class="header-nav-brand" >
			    <div class="brand-holder">
				<a href="<?= site_url('dashboard') ?>">
				    <span class="text-lg text-bold text-primary"><?= SITENAME ?></span>
				</a>
			    </div>
			</li>
			<li>
			    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
				<i class="fa fa-bars"></i>
			    </a>
			</li>
		    </ul>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="headerbar-right">
		   <?php require('assets/topmenu.php'); ?>
		</div><!--end #header-navbar-collapse -->
	    </div>
	</header>
	<!-- BEGIN LOGIN SECTION -->
	<section class="section-account">
	    <div class="spacer"></div>
	    <div class="card contain-sm style-transparent">
		<?php

		if (!isset($view_file)){
		    $view_file = "";
		}

		if (!isset($module)){
		    $module = $this->uri->segment(1);
		}

		if ($view_file != "" && $module != "") { 
		    $path = $module.'/'.$view_file;
		    $this->load->view($path);
		}else{
		    echo nl2br($body);
		}

		?>
	    </div><!--end .card -->
	</section>
	<!-- END LOGIN SECTION -->

	<!-- BEGIN JAVASCRIPT -->
	
	<script src="<?= base_url() ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/js/spin.js/spin.min.js"></script>
	<script src="<?= base_url() ?>assets/js/autosize/jquery.autosize.min.js"></script>
	<script src="<?= base_url() ?>assets/js/nanoscroller/jquery.nanoscroller.min.js"></script>
	<script src="<?= base_url() ?>assets/js/source/App.js"></script>
	<script src="<?= base_url() ?>assets/js/source/AppNavigation.js"></script>
	<script src="<?= base_url() ?>assets/js/source/AppOffcanvas.js"></script>
	<script src="<?= base_url() ?>assets/js/source/AppCard.js"></script>
	<script src="<?= base_url() ?>assets/js/source/AppForm.js"></script>
	<script src="<?= base_url() ?>assets/js/source/AppNavSearch.js"></script>
	<script src="<?= base_url() ?>assets/js/source/AppVendor.js"></script>
	<script src="<?= base_url() ?>assets/js/demo/Demo.js"></script>
	<!-- END JAVASCRIPT -->

    </body>
</html>
