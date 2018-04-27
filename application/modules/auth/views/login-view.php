
<div class="card-body">
    <div class="row">
	<?php
	if ( $this->session->flashdata( 'error' ) != NULL ) {
	    echo '<div class="alert alert-danger alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>' . $this->session->flashdata( 'error' ) . '</div>';
	}

	if ( $this->session->flashdata( 'success' ) != NULL ) {
	    echo '<div class="alert alert-success alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>' . $this->session->flashdata( 'success' ) . '</div>';
	}
	?>
	<?= validation_errors( '<div class="alert alert-danger">', '</div>' ) ?>
	<div class="col-sm-6">
	    <br/>
	    <span class="text-lg text-bold text-primary">LOGIN <?= ($this->uri->segment( 2 ) == 'backend' )? 'ADMINISTRATOR':'USER' ?></span>
	    <br/><br/>
	    <form class="form floating-label" action="" accept-charset="utf-8" method="post">
		<?php if ( $this->uri->segment( 2 ) == 'backend' ): ?>
    		<div class="form-group">
    		    <input type="email" class="form-control" id="email" name="email">
    		    <label for="email">(Administrator) Email</label>
    		</div>
		<?php else: ?>
    		<div class="form-group">
    		    <input type="text" class="form-control" id="regno" name="email">
    		    <label for="regno">Email Address</label>
    		</div>
		<?php endif; ?>

		<div class="form-group">
		    <input type="password" class="form-control" id="password" name="pswd">
		    <label for="password">Password</label>
		    <p class="help-block"><a href="#">Forgotten?</a></p>
		</div>
		<br/>
		<div class="row">
		    <div class="col-xs-6 text-left">
			<div class="checkbox checkbox-inline checkbox-styled">
			    <label>
				<input type="checkbox"> <span>Remember me</span>
			    </label>
			</div>
		    </div><!--end .col -->
		    <div class="col-xs-6 text-right">
			<button class="btn btn-primary btn-raised" type="submit">Login</button>
		    </div><!--end .col -->
		</div><!--end .row -->
	    </form>
	</div><!--end .col -->
	<div class="col-sm-5 col-sm-offset-1 text-center">
	    <br><br>
	    <h3 class="text-light">
		No account yet?
	    </h3>
	    <a class="btn btn-block btn-raised btn-primary" href="<?= site_url( 'users/signup' ) ?>">Sign up here</a>
	    <br><br>
	    <h3 class="text-light">
		forgot password?
	    </h3>
	    <p>
		<a href="<?= site_url( 'auth/recovery' ) ?>" class="btn btn-block btn-raised btn-info"><i class="fa fa-facebook pull-left"></i>Recover password</a>
	    </p>
	</div><!--end .col -->
    </div><!--end .row -->
</div><!--end .card-body -->