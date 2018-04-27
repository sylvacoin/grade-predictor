<div class="col-sm-6">
    <div class="card card-underline">
	<div class="card-head">
	    <header>Clearance Dashboard</header>
	</div>
	<div class="card-body">
	    <?= validation_errors( '<div class="alert alert-danger alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>', '</div>' ) ?>
	    <?php
	    if ( $this->session->flashdata( 'error' ) != NULL ) {
		echo '<div class="alert alert-danger alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>' . $this->session->flashdata( 'error' ) . '</div>';
	    }

	    if ( $this->session->flashdata( 'success' ) != NULL ) {
		echo '<div class="alert alert-success alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>' . $this->session->flashdata( 'success' ) . '</div>';
	    }
	    ?>
	    <?= form_open( '' ) ?>
	    <div class="alert alert-info">
		<p>Enter matric number of the candidate in the space provided below and click go to activate user if user was registered.</p>
	    </div>
            <div class="form-group floating-label">
		<?= form_input( 'regno', ( isset( $regno ) ? $regno : set_value( 'regno' ) ), 'class="form-control" placeholder="Enter Mat. Number"' ) ?>
            </div> <!-- /.form-group -->

            <div class="form-group floating-label">
		<?= form_submit( 'submit', 'Clear user', 'class="btn style-primary col-sm-4 col-sm-offset-4"' ) ?>
            </div>
	    <?= form_close() ?>
	</div>
    </div>
</div>
<div class="col-sm-offset-3 col-sm-3">
    <div class="card card-underline">
	<div class="card-head">
	    <header>Reset user clearance</header>
	</div>
	<div class="card-body">
	    <div class="alert alert-info">
		<p>Resets all users access to vote to false. Only use this after all elections has been conducted and a new election is about to be conducted. note this should be used annually.</p>
	    </div>
	    
	    <a href="<?= site_url('users/reset_clearance'); ?>" class="btn btn-lg style-danger" onclick="if (! confirm('Are you sure you want to reset all users vote access to false?')) { return false; }">
		RESET CLEARANCE
	    </a>
	</div>
    </div>
</div>