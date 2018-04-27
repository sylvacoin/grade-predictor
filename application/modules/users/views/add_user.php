<div class="card card-underline">
    <div class="card-head">
	<header>Sign up</header>
    </div>
    <div class="card-body ">


	<div id="quizwizard" class="form-wizard form-wizard-horizontal">
	    <form method="post" class="form floating-label form-validation" role="form" novalidate="novalidate">
		<div class="form-wizard-nav">
		    <div class="progress"><div class="progress-bar progress-bar-primary"></div></div>
		    <ul class="nav nav-justified">
			<li class="active"><a href="#tab2" data-toggle="tab"><span class="step">2</span> <span class="title">Address information</span></a></li>
			<li><a href="#tab3" data-toggle="tab"><span class="step">3</span> <span class="title">User settings</span></a></li>
			<li><a href="#tab4" data-toggle="tab"><span class="step">4</span> <span class="title">Confirmation</span></a></li>
		    </ul>
		</div><!--end .form-wizard-nav -->
		<div class="tab-content">
		    <?= validation_errors('<div class="alert alert-danger alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>', '</div>') ?>
		    <?php
		    if ($this->session->flashdata('error') != NULL) {
			echo '<div class="alert alert-danger alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>' . $this->session->flashdata('error') . '</div>';
		    }

		    if ($this->session->flashdata('success') != NULL) {
			echo '<div class="alert alert-success alert-dismissable"><button class="close" data-dismiss="alert">&times;</button>' . $this->session->flashdata('success') . '</div>';
		    }
		    ?>
		    <div class="tab-pane active" id="tab2">
			<div class="col-sm-8 col-sm-offset-2 padded">
			    <div class="form-group floating-label">
				<?= form_input('fname', ( isset($fname) ? $fname : set_value('fname')), 'class="form-control" required') ?>
				<label for="fname" class="control-label">First name</label>
			    </div> <!-- /.form-group -->

			    <div class="form-group floating-label">
				<?= form_input('lname', ( isset($lname) ? $lname : set_value('lname')), 'class="form-control" required') ?>
				<label for="lname" class="control-label">Last name</label>
			    </div> <!-- /.form-group -->

			    <div class="form-group floating-label">
				<?= form_input('email', ( isset($email) ? $email : set_value('email')), 'class="form-control" required') ?>
				<label for="email" class="control-label">Email Address</label>
			    </div> <!-- /.form-group -->
			</div>
		    </div><!--end #tab2 -->
		    <div class="tab-pane" id="tab3">
			<div class="col-sm-8 col-sm-offset-2">
			    <div class="form-group floating-label">
				<?= Modules::run('departments/get_dropdown_option', 'dept', isset($dept) ? $dept : set_value('dept'), 'class="form-control" placeholder="Select department" required') ?>
				<label for="dept" class="control-label">Department</label>
			    </div> <!-- /.form-group -->

			    <div class="form-group floating-label">
				<?= form_custom_dropdown('nolevel', 100, 700, 100, isset($nolevel) ? $nolevel : set_value('nolevel'), 'class="form-control" required', 'level') ?>
				<label for="nolevel" class="control-label">Highest level in department</label>
			    </div> <!-- /.form-group -->

			    <div class="form-group floating-label">
				<?= form_custom_dropdown('level', 100, 700, 100, isset($level) ? $level : set_value('level'), 'class="form-control" required id="curLevel"', 'level') ?>
				<label for="level" class="control-label">Current Level</label>
			    </div> <!-- /.form-group -->
			    
			    <div class="form-group floating-label">
				<?= form_input('tgp', ( isset($tgp) ? $tgp : set_value('tgp')), 'class="form-control" required') ?>
				<label for="tgp" class="control-label">Total C.G.P</label>
			    </div> <!-- /.form-group -->
			    
			    <div class="form-group">
				<?php 
				    $grades = [
					'1' => 'First Class',
					'21' => 'Second Class Upper division',
					'22' => 'Second Class Lower division',
					'3' => 'Third Class',
				    ];
				    echo form_dropdown('tagp', $grades, NULL, 'class="form-control" required');
				?>
				<label for="tagp" class="control-label">Target C.G.P</label>
			    </div> <!-- /.form-group -->
			</div>
		    </div><!--end #tab3 -->
		    <div class="tab-pane" id="tab4">
			<div class="col-sm-8 col-sm-offset-2">
			    <div class="form-group floating-label">
				<?= form_password('pswd', NULL, 'class="form-control" placeholder="Password" required') ?>
			    </div> <!-- /.form-group -->
			    <div class="form-group floating-label">
				<?= form_password('pswd2', NULL, 'class="form-control" placeholder="Confirm password" required') ?>
			    </div> <!-- /.form-group -->

			    <div class="form-group floating-label">
				<?= form_submit('submit', 'Register', 'class="col-sm-offset-4 col-sm-4 btn btn-primary"') ?>
			    </div> <!-- /.form-group -->
			</div>
		    </div><!--end #tab4 -->
		</div><!--end .tab-content -->
		<div class="clearfix"></div>

		<ul class="pager wizard">
		    <li class="previous first"><a href="javascript:void(0);">First</a></li>
		    <li class="previous"><a href="javascript:void(0);">Previous</a></li>
		    <li class="next last"><a href="javascript:void(0);">Last</a></li>
		    <li class="next"><a href="javascript:void(0);">Next</a></li>
		</ul>
	    </form>
	</div><!--end #rootwizard -->


    </div><!--end .card-body -->
</div><!--end .card -->


<script src="<?= base_url() ?>assets/js/jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#quizwizard').bootstrapWizard({
            onTabShow: function (tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 0;
                var percent = (current / (total - 1)) * 100;
                var percentWidth = 100 - (100 / total) + '%';

                navigation.find('li').removeClass('done');
                navigation.find('li.active').prevAll().addClass('done');

                $('#quizwizard').find('.progress-bar').css({width: percent + '%'});
                $('.form-wizard-horizontal').find('.progress').css({'width': percentWidth});

            }
        });
	
	$('#tgp').hide();
	$(document).on('change', '#curLevel', function(){
	    var $lvl = $(this).val();
	    if ( $lvl > 100 )
	    {
		$('#tgp').show();
	    }else{
		$('#tgp').hide();
	    }
	});
    });

</script>