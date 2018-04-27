<!DOCTYPE html>
<html lang="en">
    <head>
	<title>Material Admin - Dashboard</title>

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
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/rickshaw/rickshaw.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/morris.core.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/summernote.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/dropzone.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/datepicker3.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/owl.theme.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/owl.transitions.css" />

	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/wizard.css" />
	<style>
	    .attachment {
		width: 16.66%;
		padding: 8px !important;
		margin: 0;
		overflow: hidden;
	    }

	    .borderSelect{
		border:3px solid #0070d6;
		width: 98%;
	    }

	    .attachment-browser{
		max-height: 350px;
		overflow: scroll;
	    }

	    /*	    .hidden {
			    display:none;
			}*/
	    #librayr a{
		float:left;
		position:relative;
		border: 1px solid #e7e7e7;
	    }

	    /*==================== styles........ =========================*/
	    .product-img{
		float:left;
		position:relative;
		border: 1px solid #e9e9e9;
		margin-right: 10px;
	    }

	    .product-img .btn{
		position: absolute;
		right: 0;
		bottom: 0;
	    }

	    #librayr input{
		position:absolute;
		right: 0;
		bottom: 0;
	    }

	    .product-images img{
		width: 100px;
	    }
	</style>
	<script src="<?= base_url() ?>assets/js/jquery.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
	<!-- END STYLESHEETS -->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/libs/utils/html5shiv.js?1403934957"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/libs/utils/respond.min.js?1403934956"></script>
	<![endif]-->
    </head>
    <body class="menubar-hoverable header-fixed menubar-pin">

	<!-- BEGIN HEADER-->
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
		    <?php require('assets/admin_topmenu.php'); ?>
		</div><!--end #header-navbar-collapse -->
	    </div>
	</header>
	<!-- END HEADER-->

	<!-- BEGIN BASE-->
	<div id="base">

	    <!-- BEGIN OFFCANVAS LEFT -->
	    <div class="offcanvas">
	    </div><!--end .offcanvas-->
	    <!-- END OFFCANVAS LEFT -->

	    <!-- BEGIN CONTENT-->
	    <div id="content">
		<section>
		    <div class="section-body">
			<?php
			if (!isset($view_file)) {
			    $view_file = "";
			}

			if (!isset($module)) {
			    $module = $this->uri->segment(1);
			}

			if ($view_file != "" && $module != "") {
			    $path = $module . '/' . $view_file;
			    $this->load->view($path);
			} else {
			    echo nl2br($body);
			}
			?>
		    </div>
		</section>
	    </div><!--end #content-->
	    <!-- END CONTENT -->

	    <!-- BEGIN MENUBAR-->
	    <div id="menubar" class="menubar-inverse ">
		<?= require 'assets/admin_sidebar.php'; ?>
	    </div><!--end #menubar-->
	    <!-- END MENUBAR -->
	</div><!--end #base-->
	<!-- END BASE -->

	<!-- BEGIN JAVASCRIPT -->
	<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/js/spin.js/spin.min.js"></script>
	<script src="<?= base_url() ?>assets/js/autosize/jquery.autosize.min.js"></script>
	<script src="<?= base_url() ?>assets/js/moment/moment.min.js"></script>
	<script src="<?= base_url() ?>assets/js/flot/curvedLines.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery-knob/jquery.knob.min.js"></script>
	<script src="<?= base_url() ?>assets/js/sparkline/jquery.sparkline.min.js"></script>
	<script src="<?= base_url() ?>assets/js/nanoscroller/jquery.nanoscroller.min.js"></script>

	<script src="<?= base_url() ?>assets/js/source/App.js"></script>
	<script src="<?= base_url() ?>assets/js/source/AppNavigation.js"></script>
	<script src="<?= base_url() ?>assets/js/summernote.min.js"></script>
	<script src="<?= base_url() ?>assets/js/dropzone.js"></script>
	<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
	<script src="<?= base_url() ?>assets/js/vendor/jquery.ui.widget.js"></script>
	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
	<script src="<?= base_url() ?>assets/js/load-image.all.min.js"></script>
	<!-- The Canvas to Blob plugin is included for image resizing functionality -->
	<script src="<?= base_url() ?>assets/js/canvas-to-blob.min.js"></script>
	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	<script src="<?= base_url() ?>assets/js/jquery.iframe-transport.js"></script>
	<!-- The basic File Upload plugin -->
	<script src="<?= base_url() ?>assets/js/jquery.fileupload.js"></script>
	<!-- The File Upload processing plugin -->
	<script src="<?= base_url() ?>assets/js/jquery.fileupload-process.js"></script>
	<!-- The File Upload image preview & resize plugin -->
	<script src="<?= base_url() ?>assets/js/jquery.fileupload-image.js"></script>
	<!-- The File Upload audio preview plugin -->
	<script src="<?= base_url() ?>assets/js/jquery.fileupload-audio.js"></script>
	<!-- The File Upload video preview plugin -->
	<script src="<?= base_url() ?>assets/js/jquery.fileupload-video.js"></script>
	<!-- The File Upload validation plugin -->
	<script src="<?= base_url() ?>assets/js/jquery.fileupload-validate.js"></script>

	<script src="<?= base_url() ?>assets/js/owl.carousel.js"></script>

	<script src="<?= base_url() ?>assets/js/script.js"></script>


<!--	<script src="< ?= base_url() ?>assets/js/rickshaw/rickshaw.min.js"></script>
	<script src="< ?= base_url() ?>assets/js/source/App.js"></script>
	<script src="< ?= base_url() ?>assets/js/source/AppOffcanvas.js"></script>
	<script src="< ?= base_url() ?>assets/js/source/AppCard.js"></script>
	<script src="< ?= base_url() ?>assets/js/source/AppForm.js"></script>
	<script src="< ?= base_url() ?>assets/js/source/AppNavSearch.js"></script>
	<script src="< ?= base_url() ?>assets/js/source/AppVendor.js"></script>
	<script src="< ?= base_url() ?>assets/js/clipboard.min.js"></script>
	<script src="< ?= base_url() ?>assets/js/demo/Demo.js"></script>
	<script src="< ?= base_url() ?>assets/js/demo/DemoDashboard.js"></script>-->
	<!-- END JAVASCRIPT -->
	<script type="text/javascript">
            function showAjaxModal(url)
            {
                // SHOWING AJAX PRELOADER IMAGE
                jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url() ?>assets/images/preloader.gif" /></div>');

                // LOADING THE AJAX MODAL
                jQuery('#modal_ajax').modal('show', {backdrop: 'true'});

                // SHOW AJAX RESPONSE ON REQUEST SUCCESS
                $.ajax({
                    url: url,
                    success: function (response)
                    {
                        jQuery('#modal_ajax .modal-body').html(response);
                    }
                });
            }
	</script>

	<!-- (Ajax Modal)-->
	<div class="modal fade" id="modal_ajax">
	    <div class="modal-dialog">
		<div class="modal-content">

		    <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title"><?= SITENAME ?></h4>
		    </div>

		    <div class="modal-body" style="min-height:100px; overflow:auto;">



		    </div>

		    <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    </div>
		</div>
	    </div>
	</div>


    </body>
</html>
