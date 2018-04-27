
<div class="row">
    <div class="card card-underline">
	<div class="card-head">
	    <header>Change password</header>
	</div>
	<div class="card-body">
	    <div class="col-sm-6" >
		<?= validation_errors('<div class="alert alert-danger alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>', '</div>') ?>
		<?php
		if ($this->session->flashdata('error') != NULL) {
		    echo '<div class="alert alert-danger alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>' . $this->session->flashdata('error') . '</div>';
		}

		if ($this->session->flashdata('success') != NULL) {
		    echo '<div class="alert alert-success alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>' . $this->session->flashdata('success') . '</div>';
		}
		?>
		<?= form_open('', 'class="form-horizontal"') ?>
		<div class="form-group">
		    <label class="control-label col-sm-4">New Password:</label>
		    <div class="col-sm-8">
			<?= form_password('pswd', '', 'class="form-control" placeholder="password"') ?>
		    </div>
		</div>
		<div class="form-group">
		    <label class="control-label col-sm-4">COnfirm Password:</label>
		    <div class="col-sm-8">
			<?= form_password('pswd2', '', 'class="form-control" placeholder="Confirm password"') ?>
		    </div>
		</div>
		<div class="form-group">
		    <?= form_submit('submit', 'Change Password', 'class="col-sm-offset-4 btn btn-info btn-sm"') ?>
		</div>
	    </div>
        </div> <!-- /.card-body -->
    </div><!-- /.card -->
</div><!-- /.row -->