<div class="card card-underline">
    <div class="card-head">
	<header class="opacity-75"><small>Personal info</small></header>
	<div class="tools">
	    <a class="btn btn-icon-toggle ink-reaction"><i class="md md-edit"></i></a>
	</div><!--end .tools -->
    </div><!--end .card-head -->
    <div class="card-body no-padding">
	<ul class="list">
	     <li class="tile">
		<a class="tile-content ink-reaction">
		    <div class="tile-icon">
			<i class="md md-account-circle"></i>
		    </div>
		    <div class="tile-text">
			<?= isset($user->full_name)? $user->full_name: 'Administrator'?>
			<small>Full Name</small>
		    </div>
		</a>
	    </li>
	    <li class="divider-inset"></li>
	    <li class="tile">
		<a class="tile-content ink-reaction">
		    <div class="tile-icon">
			<i class="md md-email"></i>
		    </div>
		    <div class="tile-text">
			<?= isset($user->email)? $user->email: 'no email' ?>
			<small>Email Address</small>
		    </div>
		</a>
	    </li>

	    <li class="divider-inset"></li>
	    <li class="tile">
		<a class="tile-content ink-reaction">
		    <div class="tile-icon">
			<i class="fa fa-graduation-cap"></i>
		    </div>
		    <div class="tile-text">
			<?= isset($user->deptname)? $user->deptname: 'No department' ?>
			<small>Department</small>
		    </div>
		</a>
	    </li>
	    <li class="tile">
		<a class="tile-content ink-reaction">
		    <div class="tile-icon"></div>
		    <div class="tile-text">
			<?= isset($user->regno)? $user->regno: 'No registration number' ?>
			<small>Registration Number</small>
		    </div>
		</a>
	    </li>
	    <li class="tile">
		<a class="tile-content ink-reaction">
		    <div class="tile-icon"></div>
		    <div class="tile-text">
			<?= isset($user->level)? $user->level: 'No Level'; ?>
			<small>Level</small>
		    </div>
		</a>
	    </li>
	</ul>
    </div><!--end .card-body -->
</div><!--end .card -->