<div class="menubar-fixed-panel">
    <div>
	<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
	    <i class="fa fa-bars"></i>
	</a>
    </div>
    <div class="expanded">
	<a href="<?= site_url() ?>">
	    <span class="text-lg text-bold text-primary "><?= SITENAME ?></span>
	</a>
    </div>
</div>
<div class="menubar-scroll-panel">

    <!-- BEGIN MAIN MENU -->
    <ul id="main-menu" class="gui-controls">

	<!-- BEGIN DASHBOARD -->
	<li>

	    <a href="<?= site_url( 'dashboard' ) ?>" <?= in_array($this->uri->segment( 1 ), ['dashboard','']) ? 'class="active"' : '' ?>>
		<div class="gui-icon"><i class="md md-home"></i></div>
		<span class="title">Dashboard</span>
	    </a>
	</li><!--end /menu-li -->
	
	<?php if ( $this->session->role == 1 ): ?>
	<li>

	    <a href="<?= site_url( 'schools' ) ?>" <?= $this->uri->segment( 1 ) == 'schools' ? 'class="active"' : '' ?>>
		<div class="gui-icon"><i class="md md-account-balance"></i></div>
		<span class="title">School Manager</span>
	    </a>
	</li><!--end /menu-li -->
	<li>

	    <a href="<?= site_url( 'departments' ) ?>" <?= $this->uri->segment( 1 ) == 'departments' ? 'class="active"' : '' ?>>
		<div class="gui-icon"><i class="md md-local-library"></i></div>
		<span class="title">Department Manager</span>
	    </a>
	</li><!--end /menu-li -->
	<?php else: ?>
	<?php require('dynamic_sidebar.php'); ?>
    	<li>
    	    <a href="<?= site_url( 'calculator/grade-history' ) ?>" <?= $this->uri->segment( 2 ) == 'profile' ? 'class="active"' : '' ?>>
    		<div class="gui-icon"><i class="md md-trending-up"></i></div>
    		<span class="title">My G.P.A History</span>
    	    </a>
    	</li><!--end /menu-li -->
	<li>
	    <a onclick="showAjaxModal('<?= site_url('calculator/suggest') ?>')">
    		<div class="gui-icon"><i class="md md-beenhere"></i></div>
    		<span class="title">Suggest Target</span>
    	    </a>
    	</li><!--end /menu-li -->
	<li>
	    <a onclick="showAjaxModal('<?= site_url('calculator/calculate_cgpa') ?>')">
    		<div class="gui-icon"><i class="fa fa-calculator"></i></div>
    		<span class="title">Calculate CGPA</span>
    	    </a>
    	</li><!--end /menu-li -->
	<?php endif; ?>
	<li>
	    <a href="<?= site_url( 'auth/change_password' ) ?>" <?= $this->uri->segment( 2 ) == 'change_password' ? 'class="active"' : '' ?>>
		<div class="gui-icon"><i class="md md-lock"></i></div>
		<span class="title">Change password</span>
	    </a>
	</li><!--end /menu-li -->
	<li>
	    <a href="<?= site_url( 'auth/logout' ) ?>" >
		<div class="gui-icon"><i class="fa fa-power-off"></i></div>
		<span class="title">Log out</span>
	    </a>
	</li><!--end /menu-li -->

    </ul><!--end .main-menu -->
    <!-- END MAIN MENU -->

    <div class="menubar-foot-panel">
	<small class="no-linebreak hidden-folded">
	    <span class="opacity-75">Copyright &copy; <?= date( 'Y' ) ?></span> <strong></strong>
	</small>
    </div>
</div><!--end .menubar-scroll-panel-->
