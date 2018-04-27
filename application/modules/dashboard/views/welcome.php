<div class="row">
    <!-- BEGIN REGISTRATION HISTORY -->
    <div class="col-md-9">
	<div class="card">
	    <div class="card-head">
		<header>Welcome <?= isset($this->session->name) ? $this->session->name : '' ?></header>
		<div class="tools">
		    <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>
		    <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
		    <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
		</div>
	    </div><!--end .card-head -->
	</div><!--end .card -->
	<div class="row">

	    <!-- BEGIN ALERT - REVENUE -->
	    <div class="col-md-3 col-sm-6">
		<div class="card">
		    <div class="card-body no-padding">
			<div class="alert alert-callout alert-success no-margin">
			    <h1 class="pull-right text-success"><i class="md md-beenhere"></i></h1>
			    <strong class="text-xl"><?= isset($notice->cgpa)?$notice->cgpa:number_format(0,2) ?></strong><br>
			    <span class="opacity-50">Current C.G.P.A</span>
			</div>
		    </div><!--end .card-body -->
		</div><!--end .card -->
	    </div><!--end .col -->
	    <!-- END ALERT - REVENUE -->

	    <!-- BEGIN ALERT - VISITS -->
	    <div class="col-md-3 col-sm-6">
		<div class="card">
		    <div class="card-body no-padding">
			<div class="alert alert-callout alert-success no-margin">
			    <h1 class="pull-right text-success"><i class="md md-trending-up"></i></h1>
			    <strong class="text-xl"><?= isset($notice->tcgpa)?$notice->tcgpa:number_format(0,2) ?></strong><br>
			    <span class="opacity-50">Target C.G.P.A</span>
			</div>
		    </div><!--end .card-body -->
		</div><!--end .card -->
	    </div><!--end .col -->
	    <!-- END ALERT - VISITS -->

	    <!-- BEGIN ALERT - BOUNCE RATES -->
	    <div class="col-md-3 col-sm-6">
		<div class="card">
		    <div class="card-body no-padding">
			<div class="alert alert-callout alert-success no-margin">
			    <h1 class="pull-right text-success"><i class="md md-local-library"></i></h1>
			    <strong class="text-xl"><?= isset($notice->courses)?$notice->courses:0 ?></strong><br>
			    <span class="opacity-50">Total Courses</span>
			</div>
		    </div><!--end .card-body -->
		</div><!--end .card -->
	    </div><!--end .col -->
	    <!-- END ALERT - BOUNCE RATES -->

	    <!-- BEGIN ALERT - TIME ON SITE -->
	    <div class="col-md-3 col-sm-6">
		<div class="card">
		    <div class="card-body no-padding">
			<div class="alert alert-callout alert-success no-margin">
			    <h1 class="pull-right text-success"><i class="md md-timer"></i></h1>
			    <strong class="text-xl"><?= isset($notice->credits)?$notice->credits:0 ?></strong><br>
			    <span class="opacity-50">Total credits</span>
			</div>
		    </div><!--end .card-body -->
		</div><!--end .card -->
	    </div><!--end .col -->
	    <!-- END ALERT - TIME ON SITE -->

	</div>
    </div><!--end .col -->
    <!-- END REGISTRATION HISTORY -->

    <!-- BEGIN NEW REGISTRATIONS -->
    <div class="col-md-3">
	<div class="card">
	    <div class="card-head">
		<header>Other details</header>
		<div class="tools hidden-md">
		    <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
		</div>
	    </div><!--end .card-head -->
	    <div class="card-body no-padding height-9 scroll">
		<ul class="list divider-full-bleed">
		    <li class="tile">
			<div class="tile-content">
			    <div class="tile-icon">
				<i class="md md-wallet-membership"></i>
			    </div>
			    <div class="tile-text"><?= $this->session->role == 1 ? 'Administrator': 'Student' ?></div>
			</div>
			<a class="btn btn-flat ink-reaction">
			    <i class="md md-block text-default-light"></i>
			</a>
		    </li>
		    <li class="tile">
			<div class="tile-content">
			    <div class="tile-icon">
				<i class="md md-account-balance"></i>
			    </div>
			    <div class="tile-text"><?= isset($notice->school)?$notice->school:'N/A' ?></div>
			</div>
			<a class="btn btn-flat ink-reaction">
			    <i class="md md-block text-default-light"></i>
			</a>
		    </li>
		    <li class="tile">
			<div class="tile-content">
			    <div class="tile-icon">
				<i class="md md-account-box"></i>
			    </div>
			    <div class="tile-text"><?= isset($notice->dept)?$notice->dept:'N/A' ?></div>
			</div>
			<a class="btn btn-flat ink-reaction">
			    <i class="md md-block text-default-light"></i>
			</a>
		    </li>
		    <li class="tile">
			<div class="tile-content">
			    <div class="tile-icon">
				<i class="md md-trending-neutral"></i>
			    </div>
			    <div class="tile-text"><?= $this->session->curr_yr ?> Level</div>
			</div>
			<a class="btn btn-flat ink-reaction">
			    <i class="md md-block text-default-light"></i>
			</a>
		    </li>
		    <li class="tile">
			<div class="tile-content">
			    <div class="tile-icon">
				<i class="md md-trending-neutral"></i>
			    </div>
			    <div class="tile-text"><?= $this->session->grad_yr ?> Level</div>
			</div>
			<a class="btn btn-flat ink-reaction">
			    <i class="md md-block text-default-light"></i>
			</a>
		    </li>
		</ul>
	    </div><!--end .card-body -->
	</div><!--end .card -->
    </div><!--end .col -->
    <!-- END NEW REGISTRATIONS -->
</div>