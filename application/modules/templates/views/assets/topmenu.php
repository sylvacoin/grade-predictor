<ul class="header-nav header-nav-options">
    <li class="dropdown">
	<a href="<?= base_url() ?>" class="btn btn-default">
	   Home
	</a>
    </li><!--end .dropdown -->

<?php if (! isset($this->session->user_id)): ?>
    <li class="dropdown">
	<a href="<?= base_url('auth/login') ?>" class="btn btn-default">
	   Login / Register
	</a>
    </li><!--end .dropdown -->
</ul>
<?php else: ?>
</ul><!--end .header-nav-options -->
<ul class="header-nav header-nav-profile">
    <li class="dropdown">
	<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
	    <img src="<?= base_url() ?>assets/img/avatar2.png" alt="" />
	    <span class="profile-info">

		<?= array_key_exists( 'username', $this->session->userdata )   && !is_array($this->session->username)? $this->session->username : $this->session->regno ?>
		<small><?= array_key_exists( 'role', $this->session->userdata )  && !is_array($this->session->role)? $this->session->role : 'No role'  ?></small>
	    </span>
	</a>
	<ul class="dropdown-menu animation-dock">
	    <li><a href="<?= base_url('dashboard') ?>">Go to Dashboard</a></li>
	    <li><a href="<?= base_url('users/profile') ?>">My profile</a></li>
	    <li class="divider"></li>
	    <?php $this->session->role == 'administrator' ? $url = 'backend' : $url = 'login'; ?>
	    <li><a href="<?= site_url('auth/logout?redirect=auth/'.$url) ?>"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
	</ul><!--end .dropdown-menu -->
    </li><!--end .dropdown -->
</ul><!--end .header-nav-profile -->

<?php endif; ?>